<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Categorías | POOMSTORE</title>

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
            <a href="Carrito.php" class="navbar-item">Carrito</a>
          </div>
        </div>
      </div>
    </section>
  </nav>
</header>


<!-- hero area -->
<section class="hero-area has-background-primary" id="parallax">
  <div class="container">
    <div class="columns">
      <div class="column is-11-desktop is-offset-1-desktop">
        <h1 class="has-text-white font-tertiary">Categorías Disponibles</h1>
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
<!-- Dropdown buttons -->
<section class="section">
      <div class="container">
        <div class="dropdown is-hoverable">
          <div class="dropdown-trigger">
            <button class="button is-primary" aria-haspopup="true" aria-controls="dropdown-menu-1">
              <span>Agregar</span>
              <span class="icon is-small">
                <i class="ti-angle-down" aria-hidden="true"></i>
              </span>
            </button>
          </div>
          <div class="dropdown-menu" id="dropdown-menu-1" role="menu">
            <div class="dropdown-content">
              <a href="AgregarUsuario.php" class="dropdown-item">Usuario</a>
              <a href="AgregarProducto.php" class="dropdown-item">Producto</a>
              <a href="AgregarCategoria.php" class="dropdown-item">Categoria</a>
            </div>
          </div>
        </div>
    
        <div class="dropdown is-hoverable">
          <div class="dropdown-trigger">
            <button class="button is-primary" aria-haspopup="true" aria-controls="dropdown-menu-2">
              <span>Actualizar</span>
              <span class="icon is-small">
                <i class="ti-angle-down" aria-hidden="true"></i>
              </span>
            </button>
          </div>
          <div class="dropdown-menu" id="dropdown-menu-2" role="menu">
            <div class="dropdown-content">
              <a href="ActualizarUsuario.php" class="dropdown-item">Usuario</a>
              <a href="ActualizarProductos.php" class="dropdown-item">Producto</a>
              <a href="ActualizarCategoria.php" class="dropdown-item">Categoria</a>
            </div>
          </div>
        </div>
        
        <div class="dropdown is-hoverable">
          <div class="dropdown-trigger">
            <button class="button is-primary" aria-haspopup="true" aria-controls="dropdown-menu-3">
              <span>Eliminar</span>
              <span class="icon is-small">
                <i class="ti-angle-down" aria-hidden="true"></i>
              </span>
            </button>
          </div>
          <div class="dropdown-menu" id="dropdown-menu-3" role="menu">
            <div class="dropdown-content">
              <a href="EliminarUsuario.php" class="dropdown-item">Usuario</a>
              <a href="EliminarProducto.php" class="dropdown-item">Producto</a>
              <a href="EliminarCategoria.php" class="dropdown-item">Categoria</a>
            </div>
          </div>
        </div>

        <div class="dropdown is-hoverable">
          <div class="dropdown-trigger">
            <button class="button is-primary" aria-haspopup="true" aria-controls="dropdown-menu-4">
              <span>Mostrar</span>
              <span class="icon is-small">
                <i class="ti-angle-down" aria-hidden="true"></i>
              </span>
            </button>
          </div>
          <div class="dropdown-menu" id="dropdown-menu-4" role="menu">
            <div class="dropdown-content">
              <a href="MostrarUsuario.php" class="dropdown-item">Usuario</a>
              <a href="MostrarProductos.php" class="dropdown-item">Producto</a>
              <a href="MostrarCategorias.php" class="dropdown-item">Categoria</a>
              <a href="mostrar_pedido.php" class="dropdown-item">pedidos</a>
            </div>
          </div>
        </div>

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
            </tr>
          </thead>
          <tbody>
            <?php
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

            // Consultar las categorías
            $sql = "SELECT * FROM categorias";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar datos de cada fila
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["categoria_id"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["descripcion"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No hay categorías disponibles</td></tr>";
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
