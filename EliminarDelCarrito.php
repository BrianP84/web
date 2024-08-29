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

$producto_id = $_POST['producto_id'];

// Eliminar producto del carrito
$sql = "DELETE FROM Carrito WHERE producto_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $producto_id);
$stmt->execute();

$conn->close();

// Redirigir de vuelta al carrito
header("Location: Carrito.php");
exit();
?>
