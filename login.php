<?php 

    require 'includes/config/database.php';
    $db = conectarDB();
    // Autenricar el usuario

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';

        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));

        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email){
            $errores[] = "El email es obligatorio o no es valido";
        }

        if(!$password){
            $errores[] = "El password es obligatorio";
        }
        
        if(empty($errores)){

            // Revisar si el usuario existe;
            $query = "SELECT * FROM usuarios WHERE email = '{$email}'";
            $resultado = mysqli_query($db, $query);

            

            if($resultado->num_rows){
                // Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);
                
                // Verificar si el password es correcto o no

                $auth = password_verify($password, $usuario['password']);

                if($auth){
                    // El usuario esta autenticado
                    session_start();

                    // Llenar el arreglo de la sesion;
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');
                } else {
                    $errores[] = "El passwod es incorrecto";
                }
            }else{
                $errores[] = "El usuario no existe";
            }
        }
    }
    // Incluye el header 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar sesion</h1>
        
        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario">
            <fieldset>
                <legend> Email y password </legend>
                <label for="email">Correo electronico</label>
                <input type="email" name="email" placeholder="Escribe aquí tu correo" id="email">

                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="Escribe aquí tu contraseña" id="password">
                
            </fieldset>

            <input type="submit" value="Iniciar sesion" class="boton boton-verde">
        </form>
    </main>
 <?php 
    incluirTemplate('footer');
 ?>