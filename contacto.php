<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>

        <h2>Llene el formulario de contacto</h2>
        <form class="formulario">
            <fieldset>
                <legend>Información personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Escribe aquí tu nombre" id="nombre">
                
                <label for="email">Correo electronico</label>
                <input type="email" placeholder="Escribe aquí tu correo" id="email">

                <label for="telefono">Teléfono</label>
                <input type="tel" placeholder="Escribe aquí tu teléfono" id="telefono">
                
                <label for="mensaje">Mensaje</label>
                <textarea placeholder="Escribe aquí tu mensaje" id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Vende o compra:</label>
                <select id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input type="number" placeholder="Escribe tu precio o presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">
                    <label for="contactar-telefono">Teléfono</label>
                    
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                    <label for="contactar-email">E-mail</label>
                </div>
                
                <p>Si eligio teléfono, elija la fecha y la hora</p>

                <label for="fecha">Fecha:</label>
                <input type="date"  id="fecha">

                <label for="hora">hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde size">
        </form>
    </main>
 <?php 
    incluirTemplate('footer');
 ?>