<?php
    function obtenerConexion() {
        $servidor = 'mysql:dbname=pruebas; host = localhost';
        $usuario = 'root';
        $password = '';
        
        try {
            $conexion = new PDO($servidor, $usuario, $password);
            $conexion-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ATTR_ERRMODE indica a PHP que queremos un reporte de errores. ERRMODE_EXCEPTION obligamos a que lance excepciones
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' .$e->getMessage();
        }
        
        return $conexion; // Retornamos la conexión exitosa
    }
?>