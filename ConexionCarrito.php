<?php
session_start(); // Asegúrate de iniciar la sesión

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

// Comprobar si se ha enviado un formulario para añadir un producto al carrito
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto_id = intval($_POST['producto_id']);
    $usuario_id = $_SESSION['usuario_id']; // Asegúrate de que el ID del usuario está guardado en la sesión

    // Añadir el producto al carrito
    $sql = "INSERT INTO Carrito (usuario_id, producto_id, cantidad)
            VALUES (?, 1) 
            ON DUPLICATE KEY UPDATE cantidad = cantidad + 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $usuario_id, $producto_id);

    if ($stmt->execute()) {
        echo "Producto añadido al carrito";
    } else {
        echo "Error al añadir producto: " . $stmt->error;
    }
}

$conn->close();
?>
