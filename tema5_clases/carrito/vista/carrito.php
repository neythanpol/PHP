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
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Carrito de Compras</h1>
        <?php if (count($carrito) > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carrito as $indice => $item): ?>
                        <tr>
                            <td><?= $item['producto']->getNombre() ?></td>
                            <td><?= $item['producto']->getPrecio() * $item['cantidad'] ?>&euro;</td>
                            <td><?= $item['cantidad'] ?></td>
                            <td>
                                <form action="../controlador/controlador.php" method="post" style="display:inline;">
                                    <input type="hidden" name="indice" value="<?= $indice ?>">
                                    <button type="submit" name="eliminar" class="btn btn-danger btn-sm">Eliminar uno</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="../controlador/controlador.php" method="post" class="mt-3">
                <button type="submit" name="vaciar" class="btn btn-warning">Vaciar carrito</button>
            </form>
            <p class="mt-3"><a href="../vista/realizar_pago.php" class="btn btn-primary">Comprar</a></p>
        <?php else: ?>
            <p>No hay productos en el carrito.</p>
        <?php endif; ?>
        <p><a href="../vista/productos.php" class="btn btn-secondary mt-3">Volver a productos</a></p>
    </div>
    <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
