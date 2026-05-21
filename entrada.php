<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la propiedad">
        </picture>
        
        <p class="informacion-meta">Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>
        
        <div class="resumen-propiedad">
        
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt repellendus aperiam omnis placeat necessitatibus,
                incidunt, adipisci quo at voluptates soluta quaerat vero, alias quis? Odit esse doloremque quod aspernatur
                aliquam. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt repellendus aperiam omnis placeat
                necessitatibus, incidunt, adipisci quo at voluptates soluta quaerat vero, alias quis? Odit esse doloremque quod
                aspernatur aliquam.
            </p>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt repellendus aperiam omnis placeat necessitatibus,
                incidunt, adipisci quo at voluptates soluta quaerat vero, alias quis? Odit esse doloremque quod aspernatur
                aliquam.
            </p>
        </div>
    </main>
 <?php 
    incluirTemplate('footer');
 ?>