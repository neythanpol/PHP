<?php
session_start();


/* SI NO HAY USUARIO, DEVUELVE AL INDEX */ 
if (!isset($_SESSION['usuario'])) {
    header('Location: ./index.php');
    exit();
    /* SI EL TIPO DE USUARIO ES 2 (USUARIO NORMAL) MANDA AL USUARIO AL INDEX DEL USUARIO SIN PRIVILEGIOS */
} else if ($_SESSION['tipo_usu'] == 2 ) {
    header('Location: ./index_usu.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>INICIO</title>
</head>
<body>
    <h1>Saludos <?= $_SESSION['usuario'] ?></h1>
    <hr>

</body> 
</html>