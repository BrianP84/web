<?php
session_start();

// Configuración de la conexión a la base de datos
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
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Carrito | POOMSTORE</title>

    <!-- Meta Responsivo -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- Estilos y Plugins -->
    <link rel="stylesheet" href="plugins/bulma/bulma.min.css">
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
    <link href="css/style.css" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>

<body>

<!-- Header -->
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


<!-- Hero Area -->
<section class="hero-area has-background-primary" id="parallax">
  <div class="container">
    <div class="columns">
      <div class="column is-11-desktop is-offset-1-desktop">
        <h1 class="has-text-white font-tertiary">Tu Carrito de Compras</h1>
      </div>
    </div>
  </div>
</section>

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
<!-- Carrito Section -->
<section class="section">
    <div class="container">
        <?php
        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
            // Obtener los IDs y cantidades de productos del carrito
            $productos = $_SESSION['carrito'];

            // Preparar una lista de IDs
            $ids = array_keys($productos);

            // Convertir el array de IDs en una cadena separada por comas
            $ids = implode(',', $ids);

            // Consulta para obtener los detalles de los productos
            $sql = "SELECT * FROM productos WHERE producto_id IN ($ids)";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $total = 0; // Inicializar el total
                ?>
                <table class="table is-fullwidth is-striped is-hoverable">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Categoría</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($producto = $result->fetch_assoc()) {
                            $producto_id = $producto['producto_id'];
                            $cantidad = $productos[$producto_id];
                            $subtotal = $producto['precio'] * $cantidad;
                            $total += $subtotal; // Sumar al total
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
                                <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                                <td><?php echo htmlspecialchars($producto['categoria_id']); ?></td>
                                <td><?php echo htmlspecialchars($cantidad); ?></td>
                                <td>$<?php echo number_format($subtotal, 2); ?></td>
                                <td>
                                    <form action="eliminar_producto.php" method="POST">
                                        <input type="hidden" name="producto_id" value="<?php echo htmlspecialchars($producto_id); ?>">
                                        <button class="button is-danger" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                
                <!-- Mostrar el total -->
                <div class="has-text-right">
                    <h2 class="title is-4">Total: $<?php echo number_format($total, 2); ?></h2>
                </div>
                
                <!-- Botón para vaciar el carrito -->
                <div class="has-text-right">
                    <form action="vaciar_carrito.php" method="POST">
                        <button class="button is-warning" type="submit">Vaciar Carrito</button>
                    </form>
                </div>
                
                <!-- Botón para generar la factura -->
                <!-- Botón para generar factura -->
<form action="generar_factura.php" method="POST">
    <!-- Campo oculto con el carrito en formato JSON -->
    <input type="hidden" name="carrito" value='<?php echo htmlspecialchars(json_encode($_SESSION['carrito'])); ?>'>
    <button class="button is-primary" type="submit">Generar Pedido</button>
</form>

                </div>
                <?php
            } else {
                echo '<div class="notification is-warning">No se encontraron productos en el carrito.</div>';
            }
        } else {
            echo '<div class="notification is-info">Tu carrito está vacío.</div>';
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </div>
</section>

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
          <h5 class="has-text-light">Teléfono</h5>
          <p class="has-text-white paragraph-lg font-secondary">+52 631 132 9478</p>
        </div>
        <div class="column is-4-tablet">
          <h5 class="has-text-light">Dirección</h5>
          <p class="has-text-white paragraph-lg font-secondary">ACACIAS 8#C, SONORA, MÉXICO</p>
        </div>
      </div>
    </div>
  </div>
  <div class="section is-small has-text-centered has-border-top is-border-dark">
    <p class="has-text-light">POOMSTORE © <?php echo date("Y"); ?></p>
  </div>
</footer>

<!-- Scripts -->
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/shuffle/shuffle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>