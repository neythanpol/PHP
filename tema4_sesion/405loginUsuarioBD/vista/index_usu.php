<?php
session_start();


/* SI NO HAY USUARIO, DEVUELVE AL INDEX */ 
if (!isset($_SESSION['usuario'])) {
    header('Location: ./index.php');
    exit();
/* SI EL TIPO DE USUARIO ES 1 (ADMINISTRADOR) MANDA AL USUARIO AL INDEX DE ADMINISTRADOR */
} else if ($_SESSION['tipo_usu'] == 1 ) {
    header('Location: ./index_admin.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>USUARIO</title>
</head>
<body>
    <h1>Saludos <?= $_SESSION['usuario']?></h1>
</body>
</html>