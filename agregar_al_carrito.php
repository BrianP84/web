<?php
session_start();

// Verificar si el ID del producto está presente
if (isset($_POST['producto_id'])) {
    $producto_id = intval($_POST['producto_id']);

    // Inicializar el carrito si no está definido
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }

    // Verificar si el producto ya está en el carrito
    if (isset($_SESSION['carrito'][$producto_id])) {
        // Incrementar la cantidad del producto en 1
        $_SESSION['carrito'][$producto_id]++;
    } else {
        // Agregar el producto al carrito con cantidad 1
        $_SESSION['carrito'][$producto_id] = 1;
    }

    // Redirigir de vuelta a la página de productos o donde sea necesario
    header("Location: MostrarProductos.php");
    exit();
}
?>
