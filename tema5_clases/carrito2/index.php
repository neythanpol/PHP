<?php
    include 'global/config.php';
    include 'global/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <title>Tienda</title>

    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="index.php">Logo de la empresa</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Carrito(0)</a>
                </li>
            </ul>
        </div>
    </nav>
    <br/>
    <br/>
    <div class="container">
        <br>
        <div class="alert alert-success">
            Pantalla de mensaje...
            <a class="badge badge-success" href="#">Ver carrito</a>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <img title="Título producto" class="card-img-top" src="imagenes/champu.jpg" alt="Titulo">
                    <div class="card-body">
                        <span>Titulo del producto</span>
                        <h5 class="card-title">300€</h5>
                        <p class="card-text">Descripción</p>
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>