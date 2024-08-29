<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Registro de Productos | POOMSTORE</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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

$message = ""; // Variable para almacenar el mensaje

// Verificar si hay categorías registradas
$sql_check_categories = "SELECT * FROM categorias";
$result_categories = $conn->query($sql_check_categories);

if ($result_categories->num_rows == 0) {
    $message = "<div class='notification is-warning'>No hay categorías registradas. Por favor, agrega una categoría antes de registrar productos.</div>";
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria_id = $_POST['categoria_id'];

    // Verificar si el producto ya está registrado
    $sql_check = "SELECT * FROM productos WHERE nombre = '$nombre'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        $message = "<div class='notification is-warning'>El producto ya está registrado. Por favor, utiliza otro nombre.</div>";
    } else {
        // Insertar el nuevo registro
        $sql = "INSERT INTO productos (nombre, descripcion, precio, categoria_id) VALUES ('$nombre', '$descripcion', '$precio', '$categoria_id')";
        
        if ($conn->query($sql) === TRUE) {
            $message = "<div class='notification is-primary'>Nuevo producto registrado exitosamente.</div>";
        } else {
            $message = "<div class='notification is-danger'>Error al registrar producto: " . $conn->error . "</div>";
        }
    }
}

$conn->close();
?>

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
  
    <!-- Dropdown buttons -->
    <div id="navigation" class="navbar-menu">
      <div class="navbar-end">
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
        <h1 class="has-text-white font-tertiary">Registro de Productos</h1>
      </div>
    </div>
  </div>
</section>
<!-- /hero area -->

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
          <a href="AgregarCategoria.php" class="dropdown-item">Categoría</a>
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
          <a href="ActualizarCategoria.php" class="dropdown-item">Categoría</a>
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
          <a href="EliminarCategoria.php" class="dropdown-item">Categoría</a>
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
          <a href="MostrarCategorias.php" class="dropdown-item">Categoría</a>
          <a href="mostrar_pedido.php" class="dropdown-item">pedidos</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- registration form -->
<section class="section">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-half">
        <?php if (!empty($message)) echo $message; ?>

        <?php if ($result_categories->num_rows > 0) { ?>
        <form action="" method="post" class="box">
          <div class="field">
            <label class="label">Nombre del Producto</label>
            <div class="control">
              <input class="input" type="text" name="nombre" placeholder="Ingresa el nombre del producto" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Descripción</label>
            <div class="control">
              <textarea class="textarea" name="descripcion" placeholder="Ingresa la descripción del producto" required></textarea>
            </div>
          </div>

          <div class="field">
            <label class="label">Precio</label>
            <div class="control">
              <input class="input" type="number" name="precio" placeholder="Ingresa el precio del producto" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Categoría</label>
            <div class="control">
              <input class="input" type="number" name="categoria_id" placeholder="Ingresa el ID de la categoría" required>
            </div>
          </div>

          <div class="field is-grouped">
            <div class="control">
              <button class="button is-primary" type="submit">Registrar Producto</button>
            </div>
            <!-- Eliminado el botón "Cancelar" -->
          </div>
        </form>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

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

<!-- JS Plugins -->
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/shuffle/shuffle.min.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>

</html>
