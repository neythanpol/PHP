<?php
require_once("../controlador/controlador.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <h1>Productos:</h1>
    <ul>
        <?php foreach ($productos as $indice => $producto): ?>
            <li>
                <?= $producto->getNombre() ?> - <?= $producto->getPrecio() ?>&euro;
                <form action="../controlador/controlador.php" method="post">
                    <input type="hidden" name="indice" value="<?= $indice ?>">
                    <input type="submit" name="agregar" value="Agregar al carrito">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <p><a href="../vista/carrito.php">Ver carrito</a></p>
</body>
</html>