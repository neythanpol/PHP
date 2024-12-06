<?php
    // Prueba de conexión a la base de datos
    function obtenerConexion() {
        $servidor = 'mysql:dbname=ejemplo1; host = localhost';
        $usuario = 'root';
        $password = '';

        try {
            $conexion = new PDO($servidor, $usuario, $password);
            $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e -> getMessage();
        }
        // Retornamos la conexión exitosa
        return $conexion;
    }
?>