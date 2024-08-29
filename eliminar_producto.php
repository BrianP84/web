<?php
session_start();

// Verificar si el ID del producto está presente
if (isset($_POST['producto_id'])) {
    $producto_id = intval($_POST['producto_id']);

    // Comprobar si el carrito está presente en la sesión
    if (isset($_SESSION['carrito']) && isset($_SESSION['carrito'][$producto_id])) {
        // Reducir la cantidad en 1
        $_SESSION['carrito'][$producto_id]--;

        // Eliminar el producto si la cantidad llega a 0
        if ($_SESSION['carrito'][$producto_id] <= 0) {
            unset($_SESSION['carrito'][$producto_id]);
        }
    }

    // Redirigir de nuevo al carrito
    header("Location: Carrito.php");
    exit();
}
?>
