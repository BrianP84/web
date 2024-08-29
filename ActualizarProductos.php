<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Actualizar Productos | POOMSTORE</title>

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

  <style>
    .disabled-field {
      pointer-events: none;
      opacity: 0.5;
    }
  </style>

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

// Inicializar variables para el formulario
$nombre = "";
$descripcion = "";
$precio = "";
$categoria_id = "";
$producto_id = "";
$fieldsDisabled = 'disabled-field';

// Verificar si se ha enviado un ID de producto para editar
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $producto_id = $_GET['id'];

    // Consultar los detalles del producto
    $sql = "SELECT * FROM productos WHERE producto_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $producto_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row['nombre'];
        $descripcion = $row['descripcion'];
        $precio = $row['precio'];
        $categoria_id = $row['categoria_id'];
        $fieldsDisabled = ''; // Habilitar campos si se encuentra el producto
    } else {
        $message = "<div class='notification is-danger'>Producto no encontrado.</div>";
    }

    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria_id = $_POST['categoria_id'];
    $producto_id = $_POST['producto_id']; // Campo oculto para el ID del producto

    if ($producto_id) {
        // Actualizar el registro existente
        $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, categoria_id=? WHERE producto_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdii", $nombre, $descripcion, $precio, $categoria_id, $producto_id);

        if ($stmt->execute()) {
            $message = "<div class='notification is-primary'>Producto actualizado exitosamente.</div>";
        } else {
            $message = "<div class='notification is-danger'>Error al actualizar producto: " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {
        // Insertar el nuevo registro (opcional)
        $sql = "INSERT INTO productos (nombre, descripcion, precio, categoria_id) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdi", $nombre, $descripcion, $precio, $categoria_id);

        if ($stmt->execute()) {
            $message = "<div class='notification is-primary'>Nuevo producto registrado exitosamente.</div>";
        } else {
            $message = "<div class='notification is-danger'>Error al registrar producto: " . $stmt->error . "</div>";
        }

        $stmt->close();
    }

    $conn->close();
}
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
        <h1 class="has-text-white font-tertiary">Actualizar Productos</h1>
      </div>
    </div>
  </div>
</section>
<!-- /hero area -->

<!-- action buttons -->
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
  </div>
</section>
<!-- /action buttons -->

<!-- product form -->
<section class="section">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-half">
        <!-- Formulario de búsqueda por ID -->
        <form action="" method="get" class="box">
          <div class="field">
            <label class="label">Buscar por ID de Producto</label>
            <div class="control">
              <input class="input" type="number" name="id" placeholder="Ingresa el ID del producto" value="<?php echo htmlspecialchars($producto_id); ?>">
            </div>
          </div>
          <div class="field">
            <div class="control">
              <button class="button is-primary" type="submit">Buscar</button>
            </div>
          </div>
        </form>

        <!-- Formulario de registro / edición -->
        <form action="" method="post" class="box">
          <input type="hidden" name="producto_id" value="<?php echo htmlspecialchars($producto_id); ?>">
          <div class="field">
            <label class="label">Nombre</label>
            <div class="control">
              <input class="input <?php echo $fieldsDisabled; ?>" type="text" name="nombre" placeholder="Ingresa el nombre del producto" value="<?php echo htmlspecialchars($nombre); ?>" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Descripción</label>
            <div class="control">
              <textarea class="textarea <?php echo $fieldsDisabled; ?>" name="descripcion" placeholder="Ingresa una descripción del producto" required><?php echo htmlspecialchars($descripcion); ?></textarea>
            </div>
          </div>

          <div class="field">
            <label class="label">Precio</label>
            <div class="control">
              <input class="input <?php echo $fieldsDisabled; ?>" type="number" step="0.01" name="precio" placeholder="Ingresa el precio del producto" value="<?php echo htmlspecialchars($precio); ?>" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Categoría ID</label>
            <div class="control">
              <input class="input <?php echo $fieldsDisabled; ?>" type="number" name="categoria_id" placeholder="Ingresa la categoría del producto" value="<?php echo htmlspecialchars($categoria_id); ?>" required>
            </div>
          </div>

          <div class="field is-grouped">
            <div class="control">
              <button class="button is-primary" type="submit">Actualizar</button>
            </div>
          </div>
        </form>

        <!-- Mostrar mensaje después del envío del formulario -->
        <?php if (!empty($message)) echo $message; ?>

      </div>
    </div>
  </div>
</section>
<!-- /product form -->

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
