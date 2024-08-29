<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Eliminar Usuarios | POOMSTORE</title>

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
    .disabled-button {
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
$email = "";
$contrasena = "";
$telefono = "";
$usuario_id = "";
$fieldsDisabled = 'disabled-field';
$buttonDisabled = 'disabled-button';

// Verificar si se ha enviado un ID de usuario para eliminar
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $usuario_id = $_GET['id'];

    // Consultar los detalles del usuario
    $sql = "SELECT * FROM usuarios WHERE usuario_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row['nombre'];
        $email = $row['email'];
        $contrasena = $row['contrasena'];
        $telefono = $row['telefono'];
        $fieldsDisabled = ''; // Habilitar campos si se encuentra el usuario
        $buttonDisabled = ''; // Habilitar el botón si se encuentra el usuario
    } else {
        $message = "<div class='notification is-danger'>Usuario no encontrado.</div>";
    }

    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_POST['usuario_id']; // Campo oculto para el ID del usuario

    if ($usuario_id) {
        // Eliminar el registro existente
        $sql = "DELETE FROM usuarios WHERE usuario_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $usuario_id);

        if ($stmt->execute()) {
            $message = "<div class='notification is-primary'>Usuario eliminado exitosamente.</div>";
            $nombre = "";
            $email = "";
            $contrasena = "";
            $telefono = "";
            $usuario_id = "";
            $fieldsDisabled = 'disabled-field'; // Deshabilitar campos después de eliminar
            $buttonDisabled = 'disabled-button'; // Deshabilitar el botón después de eliminar
        } else {
            $message = "<div class='notification is-danger'>Error al eliminar usuario: " . $stmt->error . "</div>";
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
        <img src="images/ShopPoom_logo_white.png" width="190" height="60" alt="POOMSTORE">
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
        <h1 class="has-text-white font-tertiary">Eliminar Usuario</h1>
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

<!-- user form -->
<section class="section">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-8-desktop is-offset-2-desktop">
        <!-- Formulario de búsqueda por ID -->
        <form action="" method="get" class="box">
          <div class="field">
            <label class="label">Buscar por ID de Usuario</label>
            <div class="control">
              <input class="input" type="number" name="id" placeholder="Ingresa el ID del usuario" value="<?php echo htmlspecialchars($usuario_id); ?>">
            </div>
          </div>
          <div class="field">
            <div class="control">
              <button class="button is-primary" type="submit">Buscar</button>
            </div>
          </div>
        </form>

        <!-- Formulario de eliminación -->
        <form action="" method="post" class="box">
          <input type="hidden" name="usuario_id" value="<?php echo htmlspecialchars($usuario_id); ?>">
          <div class="field">
            <label class="label">Nombre</label>
            <div class="control">
              <input class="input <?php echo $fieldsDisabled; ?>" type="text" name="nombre" placeholder="Nombre del usuario" value="<?php echo htmlspecialchars($nombre); ?>" disabled>
            </div>
          </div>

          <div class="field">
            <label class="label">Email</label>
            <div class="control">
              <input class="input <?php echo $fieldsDisabled; ?>" type="email" name="email" placeholder="Correo electrónico" value="<?php echo htmlspecialchars($email); ?>" disabled>
            </div>
          </div>

          <div class="field">
            <label class="label">Contraseña</label>
            <div class="control">
              <input class="input <?php echo $fieldsDisabled; ?>" type="password" name="contrasena" placeholder="Contraseña" value="<?php echo htmlspecialchars($contrasena); ?>" disabled>
            </div>
          </div>

          <div class="field">
            <label class="label">Teléfono</label>
            <div class="control">
              <input class="input <?php echo $fieldsDisabled; ?>" type="tel" name="telefono" placeholder="Número de teléfono" value="<?php echo htmlspecialchars($telefono); ?>" disabled>
            </div>
          </div>

          <div class="field">
            <div class="control">
              <button class="button is-danger <?php echo $buttonDisabled; ?>" type="submit">Eliminar Usuario</button>
            </div>
          </div>
        </form>

        <!-- Mensaje de confirmación o error -->
        <?php if ($message): ?>
          <div class="notification">
            <?php echo $message; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<!-- /user form -->

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

<!-- Essential Scripts -->
<!-- Main jQuery -->
<script src="plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 4.3.1 -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- Slick Slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- Sticky Menu -->
<script src="plugins/stickyjs/sticky.js"></script>

</body>

</html>
