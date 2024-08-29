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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener la fecha actual
    $fecha_pedido = date('Y-m-d H:i:s');

    // Obtener el carrito de la sesión
    $carrito = $_POST['carrito'];
    $productos = json_decode($carrito, true);

    // Calcular el total
    $total = 0;
    foreach ($productos as $producto_id => $cantidad) {
        $sql = "SELECT precio, nombre FROM productos WHERE producto_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $producto_id);
        $stmt->execute();
        $stmt->bind_result($precio, $nombre_producto);
        $stmt->fetch();
        $subtotal = $precio * $cantidad;
        $total += $subtotal;
        $stmt->close();

        // Insertar en la tabla 'pedidos' con nombre_producto y cantidad
        $sql = "INSERT INTO pedidos (fecha_pedido, total, nombre_producto, cantidad) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdsi", $fecha_pedido, $total, $nombre_producto, $cantidad);
        $stmt->execute();
        $stmt->close();
    }

    // Vaciar el carrito
    unset($_SESSION['carrito']);

    echo "Pedido realizado con éxito.";
}

// Cerrar la conexión
$conn->close();
?>
