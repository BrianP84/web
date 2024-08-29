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

// Consulta para obtener todos los pedidos
$sql = "SELECT * FROM pedidos ORDER BY fecha_pedido DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Historial de Pedidos | POOMSTORE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="plugins/bulma/bulma.min.css">
    <link href="css/style.css" rel="stylesheet">
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
        <a href="index.html" class="navbar-item">Home</a>
        <a href="MostrarProductos.php" class="navbar-item">Productos</a>
        <a href="Carrito.php" class="navbar-item">Carrito</a>
        <a href="HistorialPedidos.php" class="navbar-item">Pedidos</a>
      </div>
    </div>
  </nav>
</header>

<!-- Hero Area -->
<section class="hero-area has-background-primary" id="parallax">
  <div class="container">
    <div class="columns">
      <div class="column is-11-desktop is-offset-1-desktop">
        <h1 class="has-text-white font-tertiary">Historial de Pedidos</h1>
      </div>
    </div>
  </div>
</section>

<!-- Pedidos Section -->
<section class="section">
    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            echo '<table class="table is-fullwidth is-striped is-hoverable">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Usuario ID</th>
                            <th>Carrito ID</th>
                            <th>Fecha del Pedido</th>
                            <th>Total</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>
                    <tbody>';

            while ($pedido = $result->fetch_assoc()) {
                $pedido_id = $pedido['pedido_id'];
                $usuario_id = $pedido['usuario_id'];
                $carrito_id = $pedido['carrito_id'];
                $fecha_pedido = $pedido['fecha_pedido'];
                $total = $pedido['total'];

                // Mostrar los detalles del pedido
                echo '<tr>
                        <td>' . $pedido_id . '</td>
                        <td>' . $usuario_id . '</td>
                        <td>' . $carrito_id . '</td>
                        <td>' . date('d-m-Y H:i:s', strtotime($fecha_pedido)) . '</td>
                        <td>$' . number_format($total, 2) . '</td>
                        <td><a href="detalle_pedido.php?pedido_id=' . $pedido_id . '" class="button is-info">Ver Detalles</a></td>
                      </tr>';
            }

            echo '</tbody>
                </table>';
        } else {
            echo '<div class="notification is-info">No se han realizado pedidos aún.</div>';
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
