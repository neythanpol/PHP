<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: ./index.php');
        exit();
    } else if ($_SESSION['tipo_usu'] == 1 ) {
        header('Location: ./index_admin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco Rodríguez">
    <link rel="stylesheet" href="./styles.css">
    <title>USUARIO</title>
</head>
<body>
    <h1>¡Bienvenido, <?= $_SESSION['usuario']?>!</h1>
</body>
</html>