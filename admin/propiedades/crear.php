<?php 

    require '../../includes/funciones.php';
    $auth = estaAutenticado();

    if(!$auth){
        header('Location: /');
    }
    //Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // echo '<pre>';
    // var_dump($_SERVER['REQUEST_METHOD']);
    // echo '</pre>';

    // Arreglo con mensajes de error
    $errores = [];

    // Crea las variables vacias    
    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';

    // Ejecuta el codigo despues de que el usuario envia el codigo
    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";
        

        $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] );
        $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
        $wc = mysqli_real_escape_string( $db, $_POST['wc'] );
        $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
        $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor'] );
        $creado = date('Y/m/d');

        // Asignar files hacia una variable

        $imagen = $_FILES['imagen'];

        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";

        // echo "<pre>";
        // var_dump($imagen['tmp_name']);
        // echo "</pre>";

        if(!$titulo){
            $errores[] = "El titulo es obliagatorio";
        }

        if(!$precio){
            $errores[] = "El precio es obliagatorio";
        }

        if(!$imagen['name']){
            $errores[] = "La imagen es obligatoria";
        }

        if(strlen ($descripcion)< 50){
            $errores[] = "La descripcion es obliagatoria y debe tener al menos 50 caracteres";
        }

        if(!$habitaciones){
            $errores[] = "el numero de habitaciones es obliagatorio";
        }

        if(!$wc){
            $errores[] = "El numero de baños es obliagatorio";
        }

        if(!$estacionamiento){
            $errores[] = "El numero de estacionamientos es obliagatorio";
        }

        if(!$vendedorId){
            $errores[] = "Elije un vendedor";
        }

        // Validar por tamaño (1 mb máximo)

        $medida = 1000 * 1000;

        if($imagen['size']>$medida){
            $errores[] = "La imagen es muy pesada";
        }

        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";

        // Revisar que el arrglo de errores este vacio

        if(empty($errores)){
            // SUBIDA DE ARCHIVOS

            // crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            // Generar un nombre unico
            $nombreImagen = md5( uniqid( rand(), true )).".jpg" ;

            // subir la imagen a la carpeta
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);


            // Insertar en la base de datos
            $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId')";

            // echo $query;

            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                header('Location: /admin?resultado=1');
            }
        }

        
    }

    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Información general</legend>

                <label for="titulo">Titulo:</label>
                <input 
                    type="text"
                    id="titulo"
                    name="titulo"
                    placeholder="Escriba el titulo de la propiedad"
                    value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input 
                    type="number"
                    id="precio"
                    name="precio"
                    placeholder="Escriba el precio de la propiedad"
                    value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input
                    type="file"
                    id="imagen"
                    accept="image/jpeg, image/png"
                    name="imagen">

                <label for="descripcion">Descripción:</label>
                <textarea
                    id="descripcion"
                    name="descripcion"
                    placeholder="Escriba una descripcion para la propiedad"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información propiedad</legend>
                
                <label for="habitaciones">Habitaciones:</label>
                <input
                    type="number"
                    id="habitaciones"
                    name="habitaciones"
                    placeholder="Escriba cuantas habitaciones tiene la propiedad"
                    min="1"
                    max="9"
                    value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños:</label>
                <input
                    type="number"
                    id="wc"
                    name="wc"
                    placeholder="Escriba cuantos baños tiene la propiedad"
                    min="1"
                    max="9"
                    value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input 
                    type="number"
                    id="estacionamiento"
                    name="estacionamiento"
                    placeholder="Escriba cuantos coches caben en el garage de la propiedad"
                    min="1"
                    max="9"
                    value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                
                <select name="vendedor">
                    <option value="">-- Seleccione --</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                        <option <?php echo $vendedorId == $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>">
                        <?php echo $vendedor['nombre']." ".$vendedor['apellido']; ?></option>
                    <?php endwhile ?>
                </select>
            </fieldset>
            <input type="submit" value="crear propiedad" class="boton boton-verde">
        </form>
    </main>
 <?php 
    incluirTemplate('footer');
 ?>