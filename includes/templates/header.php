<?php 
    
    if(!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
    <link rel="preload" href="/build/img/logo.svg" as="image">
    <script>
    (function() {
        const darkMode = localStorage.getItem('dark-mode');

        if (
            darkMode === 'true' ||
            (darkMode === null && window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark-mode');
        }
    })();
    </script>
    <style>
        html {
            background-color: #ffffff;
        }
        html.dark-mode {
            background-color: #1a1a1a;
        }
    </style>
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php" class="logo">
                    <img loading="eager" src="/build/img/logo.svg" alt="Logotipo de Bienes Raices" class="logo">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono menú">
                </div>

                <div class="derecha">
                    <img loading="eager" class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="boton modo oscuro">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if($auth): ?>
                            <a href="cerrar-sesion.php">Cerrar sesión</a>
                        <?php elseif(!$auth): ?>
                            <a href="login.php">Iniciar Sesión</a>
                        <?php endif; ?>
                        
                    </nav>
                </div>
            </div> <!-- .barra -->
            <?php echo $inicio ? '<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>' : '' ?>
        </div>
    </header>