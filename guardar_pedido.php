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
// Obtener los datos del carrito desde la solicitud POST
$carrito = json_decode(file_get_contents('php://input'), true);

if ($carrito) {
    // Insertar cada producto en la tabla de pedidos
    foreach ($carrito as $producto) {
        $nombre = $conn->real_escape_string($producto['nombre']);
        $precio = $conn->real_escape_string($producto['precio']);
        $imagen = $conn->real_escape_string($producto['imagen']);
        $fecha = date('Y-m-d H:i:s');

        $sql = "INSERT INTO pedidos (nombre, precio, imagen, fecha) VALUES ('$nombre', '$precio', '$imagen', '$fecha')";

        if (!$conn->query($sql) === TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    echo "Pedido guardado con éxito.";
} else {
    echo "No se recibieron datos.";
}


$conn->close();
?>
