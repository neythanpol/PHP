<?php
    require_once("../modelo/Producto.php");
    // Incluye el controlador para obtener los productos y la lógica del carrito
    require_once("../controlador/controlador.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Pago de Productos</title>
</head>
<body>
    <?php
    if (isset($_SESSION['carrito'])) {
        // Lógica para el proceso del pago
        // Vaciar el carrito después de completar el pago
        unset($_SESSION['carrito']);

        // Eliminar la cookie del carrito
        setcookie('carrito', '', time() - 3600, "/");
        echo "<p>Pago completado. El carrito ha sido vaciado.</p>";
    } else {
        echo "<p>No hay productos en el carrito para realizar el pago.</p>";
    }
    ?>
    <p><a href="productos.php">Volver a la lista de productos</a></p>
</body>
</html>