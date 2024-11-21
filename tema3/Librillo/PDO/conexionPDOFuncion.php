<?php
function obtenerConexion() {
    $servidor = 'mysql:dbname=pruebas; host = localhost';
    $usuario = 'root';
    $password = '';
    
    try {
        $conexion = new PDO($servidor, $usuario, $password);
        $conexion-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Falló la conexión: ' .$e->getMessage();
    }
    
    return $conexion; // Retornamos la conexión exitosa
}