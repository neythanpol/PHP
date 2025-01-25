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
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Realizar Pago</h1>
        <?php
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
            // Lógica para el proceso del pago
            // Vaciar el carrito después de completar el pago
            unset($_SESSION['carrito']);

            // Eliminar la cookie del carrito
            setcookie('carrito', '', time() - 3600, "/");
            echo "<div class='alert alert-success' role='alert'>Pago completado. El carrito ha sido vaciado.</div>";
        } else {
            echo "<div class='alert alert-warning' role='alert'>No hay productos en el carrito para realizar el pago.</div>";
        }
        ?>
        <a href="productos.php" class="btn btn-primary">Volver a la lista de productos</a>
    </div>
</body>
</html>