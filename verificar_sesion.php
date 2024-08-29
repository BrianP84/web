<?php
session_start();

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

// Obtener datos del formulario
$correo = $_POST['correo'];
$input_contrasena = $_POST['contrasena'];

// Consulta para obtener el empleado por correo
$sql = "SELECT id_empleado, nombre, correo, edad, contrasena FROM empleados WHERE correo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    // Verificar la contraseña (se asume que las contraseñas están encriptadas con password_hash)
    if (password_verify($input_contrasena, $row['contrasena'])) {
        // Iniciar sesión
        $_SESSION['loggedin'] = true;
        $_SESSION['id_empleado'] = $row['id_empleado'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['edad'] = $row['edad'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Correo o contraseña incorrectos.";
    }
} else {
    echo "No se encontró el empleado.";
}

$conn->close();
?>
