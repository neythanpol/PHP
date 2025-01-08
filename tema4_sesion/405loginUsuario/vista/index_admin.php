<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: ./index.php');
        exit();
    } else if ($_SESSION['tipo_usu'] == 2 ) {
        header('Location: ./index_usu.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco Rodríguez">
    <link rel="stylesheet" href="./styles.css">
    <title>ADMIN</title>
</head>
<body>
    <h1>¡Bienvenido, <?= $_SESSION['usuario'] ?>!</h1>
</body> 
</html>