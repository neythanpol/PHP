<?php
    $servidor = 'mysql:dbname=pruebas;host=localhost';
    $usuario = 'root';
    $pw = '';

    try {
        $conexion = new PDO($servidor, $usuario, $pw);
        $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Falló la conexión: ' . $e -> getMessage();
    }
    echo 'Conectado!';
?>