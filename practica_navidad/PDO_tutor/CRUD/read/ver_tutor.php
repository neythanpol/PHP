<?php
session_start();
if (!isset($_SESSION['tutor_id'])) {
    header('Location: index.php');
    exit();
}

include '../../../conexion/conexionPDO.php';
$conexion = obtenerConexion();
$tutor_id = $_SESSION['tutor_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;

    $sql = "UPDATE tutor SET nombre = :nombre, apellidos = :apellidos, correo = :correo";
    if ($password) {
        $sql .= ", password = :password";
    }
    $sql .= " WHERE id_tutor = :id_tutor";

    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':correo', $correo);
    if ($password) {
        $stmt->bindParam(':password', $password);
    }
    $stmt->bindParam(':id_tutor', $tutor_id);
    $stmt->execute();

    $_SESSION['mensaje'] = "Datos actualizados correctamente.";
}

$sql = "SELECT * FROM tutor WHERE id_tutor = :id_tutor";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id_tutor', $tutor_id);
$stmt->execute();
$tutor = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver y Modificar Mis Datos</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Ver y Modificar Mis Datos</h1>
    <?php if (isset($_SESSION['mensaje'])): ?>
        <p style="color: green;"><?= $_SESSION['mensaje'] ?></p>
        <?php unset($_SESSION['mensaje']); ?>
    <?php endif; ?>
    <form action="ver_datos_tutor.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($tutor['nombre']) ?>" required>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" value="<?= htmlspecialchars($tutor['apellidos']) ?>" required>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?= htmlspecialchars($tutor['correo']) ?>" required>

        <label for="password">Nueva Contraseña (opcional):</label>
        <input type="password" id="password" name="password">

        <button type="submit">Actualizar Datos</button>
    </form>
    <a href="../../login_usuario/vista/dashboard.php" class="btn">Volver al Dashboard</a>
</body>
</html>