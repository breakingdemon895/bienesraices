<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Acerca de nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Acerca de Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>25 años de experiencia</blockquote>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt repellendus aperiam omnis placeat necessitatibus, incidunt, adipisci quo at voluptates soluta quaerat vero, alias quis? Odit esse doloremque quod aspernatur aliquam. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt repellendus aperiam omnis placeat necessitatibus, incidunt, adipisci quo at voluptates soluta quaerat vero, alias quis? Odit esse doloremque quod aspernatur aliquam.
                </p>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt repellendus aperiam omnis placeat necessitatibus, incidunt, adipisci quo at voluptates soluta quaerat vero, alias quis? Odit esse doloremque quod aspernatur aliquam. 
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más sobre nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Adipisci libero velit, praesentium molestias dolor in ullam? Quidem accusantium, dolorem perferendis dolor asperiores iusto nihil praesentium! Eveniet in ipsum facere iure.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Adipisci libero velit, praesentium molestias dolor in ullam? Quidem accusantium, dolorem perferendis dolor asperiores iusto nihil praesentium! Eveniet in ipsum facere iure.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Adipisci libero velit, praesentium molestias dolor in ullam? Quidem accusantium, dolorem perferendis dolor asperiores iusto nihil praesentium! Eveniet in ipsum facere iure.</p>
            </div>
        </div>
    </section>
 <?php 
    incluirTemplate('footer');
 ?>