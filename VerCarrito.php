<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Carrito | POOMSTORE</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- theme meta -->
  <meta name="theme-name" content="kross-bulma" />

  <!-- ** Plugins Needed for the Project ** -->
  <!-- bulma -->
  <link rel="stylesheet" href="plugins/bulma/bulma.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">

  <!--Favicon-->
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
        <a href="ActualizarCategoria.php" class="navbar-item">ActualizarCategoria</a>
        <a href="ActualizarProductos.php" class="navbar-item">ActualizarProductos</a>
        <a href="ActualizarUsuario.php" class="navbar-item">ActualizarUsuario</a>
        <a href="AgregarCategoria.php" class="navbar-item">Agregar Cate</a>
        <a href="AgregarProducto.php" class="navbar-item">Agregar Pro</a>
        <a href="AgregarUsuario.php" class="navbar-item">Registro</a>
        <a href="Carrito.php" class="navbar-item">Carrito</a>
      </div>
    </div>
  </nav>
</header>

<!-- hero area -->
<section class="hero-area has-background-primary" id="parallax">
  <div class="container">
    <div class="columns">
      <div class="column is-11-desktop is-offset-1-desktop">
        <h1 class="has-text-white font-tertiary">Carrito</h1>
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
  </div>
</section>
<!-- /hero area -->

<!-- table section -->
<section class="section">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-full">
        <table class="table is-striped is-bordered is-hoverable">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            session_start();

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "prenda";

            // Crear la conexión
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Verificar si hay productos en el carrito
            if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                $total = 0;
                foreach ($_SESSION['carrito'] as $producto_id => $cantidad) {
                    $sql = "SELECT * FROM productos WHERE producto_id = $producto_id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $subtotal = $row['precio'] * $cantidad;
                            $total += $subtotal;

                            echo "<tr>";
                            echo "<td>" . $row["producto_id"] . "</td>";
                            echo "<td>" . $row["nombre"] . "</td>";
                            echo "<td>" . $row["descripcion"] . "</td>";
                            echo "<td>" . $row["precio"] . "</td>";
                            echo "<td>" . $cantidad . "</td>";
                            echo "<td>" . $subtotal . "</td>";
                            echo "</tr>";
                        }
                    }
                }
                echo "<tr><td colspan='5'><strong>Total:</strong></td><td>$total</td></tr>";
            } else {
                echo "<tr><td colspan='6'>El carrito está vacío.</td></tr>";
            }

            $conn->close();
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<!-- /table section -->

<!-- footer -->
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
          <h5 class="has-text-light">Direccion</h5>
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
<!-- /footer -->

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- filter -->
<script src="plugins/shuffle/shuffle.min.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>
