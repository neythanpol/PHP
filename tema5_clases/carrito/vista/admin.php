<?php
session_start();
include '../global/conexion.php';

// Verificar si el usuario está autenticado como admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
    header('Location: login.php');
    exit();
}

$pdo = conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $imagen = isset($_FILES['imagen']['tmp_name']) && !empty($_FILES['imagen']['tmp_name']) ? file_get_contents($_FILES['imagen']['tmp_name']) : null;

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Actualizar producto existente
        $id = $_POST['id'];
        if ($imagen) {
            $sql = "UPDATE productos SET nombre = :nombre, precio = :precio, descripcion = :descripcion, imagen = :imagen WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':imagen', $imagen, PDO::PARAM_LOB);
        } else {
            $sql = "UPDATE productos SET nombre = :nombre, precio = :precio, descripcion = :descripcion WHERE id = :id";
            $stmt = $pdo->prepare($sql);
        }
        $stmt->bindParam(':id', $id);
    } else {
        // Insertar nuevo producto
        $sql = "INSERT INTO productos (nombre, precio, descripcion, imagen) VALUES (:nombre, :precio, :descripcion, :imagen)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':imagen', $imagen, PDO::PARAM_LOB);
    }

    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->execute();

    header('Location: admin.php');
    exit();
}

// Manejar la eliminación de productos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM productos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header('Location: admin.php');
    exit();
}

// Obtener la lista de productos desde la base de datos
$sql = "SELECT * FROM productos";
$stmt = $pdo->query($sql);
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Cargar datos del producto para editar
$producto_editar = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM productos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $producto_editar = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Productos</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Administración de Productos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= $producto['id'] ?></td>
                        <td><?= $producto['nombre'] ?></td>
                        <td><?= $producto['precio'] ?>&euro;</td>
                        <td><?= $producto['descripcion'] ?></td>
                        <td><img src="data:image/jpeg;base64,<?= base64_encode($producto['imagen']) ?>" alt="Imagen del Producto" width="50" height="50"></td>
                        <td>
                            <form action="admin.php" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                                <button type="submit" name="editar" class="btn btn-warning">Editar</button>
                            </form>
                            <form action="admin.php" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                                <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2><?= $producto_editar ? 'Editar Producto' : 'Añadir Producto' ?></h2>
        <form action="admin.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre del Producto</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $producto_editar ? $producto_editar['nombre'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" class="form-control" name="precio" id="precio" value="<?= $producto_editar ? $producto_editar['precio'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion"><?= $producto_editar ? $producto_editar['descripcion'] : '' ?></textarea>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen del Producto</label>
                <input type="file" class="form-control" name="imagen" id="imagen">
            </div>
            <input type="hidden" name="id" id="id" value="<?= $producto_editar ? $producto_editar['id'] : '' ?>">
            <button type="submit" name="guardar" class="btn btn-primary"><?= $producto_editar ? 'Actualizar Producto' : 'Guardar Producto' ?></button>
        </form>
    </div>
</body>
</html>