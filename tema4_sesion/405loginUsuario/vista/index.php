<?php
    session_start();
    include '../conexion/conexion.php';
    $conexion = conexion();
    $bool = $_SESSION['bool'] ?? null;
    $mensaje = $bool === false ? "Contraseña o usuario incorrectos, inténtelo de nuevo." : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco Rodríguez">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Ejercicio 405</title>
</head>
<body>
    <h1>Login Usuario</h1>
    <hr>
    <form action="../controlador/crearUsuario.php">
        <button type="submit" id="insertar_usuarios">INSERTAR USUARIOS</button>
    </form>
    <?php if ($bool === false): ?>
        <p><?=$mensaje?><p>
    <?php endif; ?>
    <?php if ($bool===true): ?>
        <p><?= "Tarea realizada con éxito"?><p>
    <?php endif; ?>
    <form action="../controlador/login.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" placeholder="Nombre de usuario:">

        <label for="password">Contraseña:</label>
        <input type="password" name="password" placeholder="Contraseña:">
        <button type="submit" id="iniciar_sesion">INICIAR SESION</button>
    </form>
</body>
</html>