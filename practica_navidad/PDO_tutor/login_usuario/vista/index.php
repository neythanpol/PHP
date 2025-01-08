<?php
session_start();
include '../../../conexion/conexionPDO.php';
$conexion = obtenerConexion();
$bool = $_SESSION['bool'] ?? null;
$mensaje = $bool === false ? "Contraseña o usuario incorrectos, inténtelo de nuevo." : '';
unset($_SESSION['bool']); // Limpiar el mensaje de error después de mostrarlo
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco Rodríguez">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Login Tutor</title>
</head>
<body>
    <h1>Login Tutor</h1>
    <hr>
    <?php if ($bool === false): ?>
        <p style="color: red;"><?= $mensaje ?></p>
    <?php endif; ?>
    <form action="../controlador/login.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" placeholder="Nombre de usuario:" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" placeholder="Contraseña:" required>
        <button type="submit" id="iniciar_sesion">INICIAR SESION</button>
    </form>
    <p>¿No tienes una cuenta? <a href="registro_tutor.php">Regístrate aquí</a></p>
</body>
</html>