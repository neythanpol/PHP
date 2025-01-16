<?php
session_start();
require_once("../modelo/producto.php");

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Deserializar los objetos del carrito
$carrito = [];
foreach ($_SESSION['carrito'] as $item_serializado => $cantidad) {
    $producto = unserialize($item_serializado);
    if ($producto !== false) {
        $carrito[] = ['producto' => $producto, 'cantidad' => $cantidad];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>
<body>
    <h1>Carrito de Compras</h1>
    <ul>
        <?php foreach ($carrito as $indice => $item): ?>
            <li>
                <?= $item['producto']->getNombre() ?> - <?= $item['producto']->getPrecio() ?>&euro; - Cantidad: <?= $item['cantidad'] ?>
                <form action="../controlador/controlador.php" method="post" style="display:inline;">
                    <input type="hidden" name="indice" value="<?= $indice ?>">
                    <input type="submit" name="eliminar" value="Eliminar uno">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <p><a href="../vista/realizar_pago.php">Comprar</a></p>
    <form action="../controlador/controlador.php" method="post">
        <input type="submit" name="vaciar" value="Vaciar carrito">
    </form>
    <p><a href="../vista/productos.php">Volver a productos</a></p>
</body>
</html>