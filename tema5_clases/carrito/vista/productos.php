<?php
    session_start();
    require_once("../controlador/controlador.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco Rodríguez">
    <title>Productos</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Productos:</h1>
        <div class="row">
            <?php foreach ($productos as $indice => $producto): ?>
                <div class="col-md-3">
                    <div class="product-card">
                        <img src="data:image/jpeg;base64,<?= base64_encode($producto->getImagen()) ?>" alt="Imagen del Producto">
                        <h2><?= $producto->getNombre() ?></h2>
                        <p><?= $producto->getPrecio() ?>&euro;</p>
                        <div class="product-description">
                            <p><?= $producto->getDescripcion() ?></p>
                        </div>
                        
                    </div>
                    <form class="text-align-center" action="../controlador/controlador.php" method="post">
                            <input type="hidden" name="indice" value="<?= $indice ?>">
                            <input type="submit" name="agregar" value="Agregar al carrito">
                        </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="view-cart">
        <p><a href="../vista/carrito.php" class="btn btn-success">Ver carrito</a></p>
    </div>
</body>
</html>