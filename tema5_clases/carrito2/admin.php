<?php
    session_start();
    include 'global/config.php';
    include 'global/conexion.php';

    // Verificar si el usuario está autenticado como admin
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
        header('Location: login.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $imagen = file_get_contents($_FILES['imagen']['tmp_name']);

        if (isset($_POST['id']) && !empty($_POST['id'])) {
            // Actualizar producto existente
            $id = $_POST['id'];
            $sql = "UPDATE productos SET nombre = :nombre, precio = :precio, descripcion = :descripcion, imagen = :imagen WHERE id = :id";
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindParam(':id', $id);
        } else {
            // Insertar nuevo producto
            $sql = "INSERT INTO productos (nombre, precio, descripcion, imagen) VALUES (:nombre, :precio, :descripcion, :imagen)";
            $stmt = $pdo -> prepare($sql);
        }

        $stmt -> bindParam(':nombre', $nombre);
        $stmt -> bindParam(':precio', $precio);
        $stmt -> bindParam(':descripcion', $descripcion);
        $stmt -> bindParam(':imagen', $imagen, PDO::PARAM_LOB);
        $stmt -> execute();

        header('Location: admin.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco Rodríguez">
    <title>Administración de Productos</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Administración de Productos</h1>
        <form action="admin.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre del producto</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" class="form-control" name="precio" id="precio" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen del producto</label>
                <input type="file" class="form-control" name="imagen" id="imagen" required>
            </div>
            <input type="hidden" name="id" id="id">
            <button type="submit" class="btn btn-primary">Guardar Producto</button>
        </form>
    </div>
</body>
</html>