<?php
session_start();
include '../../../conexion/conexionPDO.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $tipo_usu = 2; // Por defecto, tipo_usu es 2 (tutor)
    $baja = 1; // Por defecto, baja es 1 (activo)
    $activar = 'inactivo'; // Por defecto, el tutor está inactivo

    $conexion = obtenerConexion();
    $sql = "INSERT INTO tutor (login, password, correo, nombre, apellidos, tipo_usu, baja, activar) VALUES (:usuario, :password, :correo, :nombre, :apellidos, :tipo_usu, :baja, :activar)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':tipo_usu', $tipo_usu);
    $stmt->bindParam(':baja', $baja);
    $stmt->bindParam(':activar', $activar);

    if ($stmt->execute()) {
        $_SESSION['registro_exitoso'] = true;
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['registro_exitoso'] = false;
        header('Location: registro_tutor.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Tutor</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Registro Tutor</h1>
    <form action="registro_tutor.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" placeholder="Nombre de usuario:" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" placeholder="Contraseña:" required>

        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" placeholder="example@example.com:" required>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" placeholder="Nombre:" required>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" placeholder="Apellidos:">

        <button type="submit">Registrar</button>
    </form>
</body>
</html>