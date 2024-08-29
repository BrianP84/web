<?php
// Iniciar sesión
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-name" content="kross-bulma" />
    
    <!-- Plugins Needed for the Project -->
    <!-- bulma -->
    <link rel="stylesheet" href="plugins/bulma/bulma.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">

    <!-- Main Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
<header>
  <nav class="navbar is-dark is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="index.html">
        <img src="images/ShopPoom_logo_white.png" width="190" height="60">
      </a>
      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navigation">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
    <div id="navigation" class="navbar-menu">
      <div class="navbar-end">
        <a href="index.html" class="navbar-item">Home</a>
        <a href="Iniciar_sesion.php" class="navbar-item">Admin</a>
        <a href="productos.html" class="navbar-item">Productos</a>
      </div>
    </div>
  </nav>
</header>

<!-- hero area -->
<section class="hero-area has-background-primary" id="parallax">
  <div class="container">
    <div class="columns">
      <div class="column is-11-desktop is-offset-1-desktop">
        <h1 class="has-text-white font-tertiary">Inicio de Sesión</h1>
      </div>
    </div>
  </div>
  <div class="layer-bg is-full">
    <!-- social icon -->
    <div class="list list-hero-social">
      <a class="list-item has-text-white" href="#"><i class="ti-facebook"></i></a>
      <a class="list-item has-text-white" href="#"><i class="ti-instagram"></i></a>
      <a class="list-item has-text-white" href="#"><i class="ti-dribbble"></i></a>
      <a class="list-item has-text-white" href="#"><i class="ti-twitter"></i></a>
    </div>
    <!-- /social icon -->
  </div>
</section>
<!-- /hero area -->

<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half-desktop">
                <div class="card shadow">
                    <div class="card-content">
                        <form action="verificar_sesion.php" method="POST">
                            <div class="field">
                                <label class="label">Correo</label>
                                <div class="control">
                                    <input class="input" type="email" name="correo" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Contraseña</label>
                                <div class="control">
                                    <input class="input" type="password" name="contrasena" required>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <button class="button is-primary" type="submit">Iniciar Sesión</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="has-background-dark footer-section">
  <div class="section">
    <div class="container">
      <div class="columns">
        <div class="column is-4-tablet">
          <h5 class="has-text-light">Correo</h5>
          <p class="has-text-white paragraph-lg font-secondary">bpoomflores@gmail.com</p>
        </div>
        <div class="column is-4-tablet">
          <h5 class="has-text-light">Teléfono</h5>
          <p class="has-text-white paragraph-lg font-secondary">+52 631 132 9478</p>
        </div>
        <div class="column is-4-tablet">
          <h5 class="has-text-light">Dirección</h5>
          <p class="has-text-white paragraph-lg font-secondary">ACACIAS 8#C, SONORA, MEXICO</p>
        </div>
      </div>
    </div>
  </div>
  <div class="section is-small has-text-centered has-border-top is-border-dark">
    <p class="has-text-light">ShopPoom ©
      <script>
        var CurrentYear = new Date().getFullYear()
        document.write(CurrentYear)
      </script> papos <a href="themefisher.com">wow</a></p>
  </div>
</footer>

<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/shuffle/shuffle.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>
