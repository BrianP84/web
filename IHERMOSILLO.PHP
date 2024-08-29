<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Kross | Tienda de Ropa</title>

  <!-- Meta responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- Meta theme -->
  <meta name="theme-name" content="kross-bulma" />
  
  <!-- Plugins necesarios -->
  <link rel="stylesheet" href="plugins/bulma/bulma.min.css">
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">

  <!-- Estilo principal -->
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
      </div>
    </div>
  </nav>
</header>

<!-- Hero Area -->
<section class="hero-area has-background-primary" id="parallax">
  <div class="container">
    <div class="columns">
      <div class="column is-11-desktop is-offset-1-desktop">
        <h1 class="has-text-white font-tertiary">Categorías de Ropa</h1>
      </div>
    </div>
  </div>
  <div class="layer-bg is-full">
    <!-- Iconos sociales -->
    <div class="list list-hero-social">
      <a class="list-item has-text-white" href="#"><i class="ti-facebook"></i></a>
      <a class="list-item has-text-white" href="#"><i class="ti-instagram"></i></a>
      <a class="list-item has-text-white" href="#"><i class="ti-dribbble"></i></a>
      <a class="list-item has-text-white" href="#"><i class="ti-twitter"></i></a>
    </div>
</section>
<!-- /Hero Area -->

<!-- Sección de Categorías -->
<section class="section">
  <div class="container">
    <div class="columns is-multiline">

      <!-- Suéteres -->
      <div class="column is-3-desktop is-6-tablet">
        <div class="card shadow has-text-centered">
          <div class="card-image">
            <figure class="image is-4by3">
              <img src="PRENDAS/PRENDA BLACK.webp" alt="Suéteres">
            </figure>
          </div>
          <div class="card-content has-background-white">
            <h4 class="title is-4">Suéteres</h4>
            <a href="SUETERS.PHP" class="button is-primary">Ver Más</a>
          </div>
        </div>
      </div>

      <!-- Camisetas -->
      <div class="column is-3-desktop is-6-tablet">
        <div class="card shadow has-text-centered">
          <div class="card-image">
            <figure class="image is-4by3">
              <img src="PRENDAS/PRENDA DIOR.avif" alt="Camisetas">
            </figure>
          </div>
          <div class="card-content has-background-white">
            <h4 class="title is-4">Camisetas</h4>
            <a href="CAMISETAS.PHP" class="button is-primary">Ver Más</a>
          </div>
        </div>
      </div>

      <!-- Pantalones -->
      <div class="column is-3-desktop is-6-tablet">
        <div class="card shadow has-text-centered">
          <div class="card-image">
            <figure class="image is-4by3">
              <img src="PRENDAS/pants spider.webp" alt="Pants">
            </figure>
          </div>
          <div class="card-content has-background-white">
            <h4 class="title is-4">Pants</h4>
            <a href="PANTS.PHP" class="button is-primary">Ver Más</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Botón de Catálogo General -->
<section class="section has-text-centered">
  <a href="Catalogo.php" class="button is-link is-large">Catálogo General</a>
</section>
<!-- /Botón de Catálogo General -->

<!-- Footer -->
<footer class="has-background-dark footer-section" id="footer">
  <div class="section">
    <div class="container">
      <div class="columns">
        <div class="column is-4-tablet">
          <h5 class="has-text-light">Correo</h5>
          <p class="has-text-white paragraph-lg font-secondary">bpoomflores@gmail.com</p>
        </div>
        <div class="column is-4-tablet">
        <h5 class="has-text-light">Telefono NOGALES</h5>
          <p class="has-text-white paragraph-lg font-secondary">+52 631 132 9478</p>
          <h5 class="has-text-light">Telefono HERMOSILLO</h5>
          <p class="has-text-white paragraph-lg font-secondary">+52 639 181 5546</p>
          <h5 class="has-text-light">Telefono OBREGON</h5>
          <p class="has-text-white paragraph-lg font-secondary">+52 636 220 1354</p>
        </div>
        <div class="column is-4-tablet">
          <h5 class="has-text-light">Dirección</h5>
          <p class="has-text-white paragraph-lg font-secondary">ACACIAS 8#C, SONORA, MÉXICO</p>
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
<!-- /Footer -->

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>
