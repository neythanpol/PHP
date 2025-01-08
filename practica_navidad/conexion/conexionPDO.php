<?php
    function obtenerConexion() {
        $servidor = 'mysql:dbname=gestion_alumnos;host=localhost';
        $usuario = 'root';
        $password = '';
        
        $conexion = null;
        try {
            $conexion = new PDO($servidor, $usuario, $password);
            $conexion-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ATTR_ERRMODE indica a PHP que queremos un reporte de errores. ERRMODE_EXCEPTION obligamos a que lance excepciones
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e -> getMessage();
            return null; // Retornamos null si la conexión falla
        }
        
        return $conexion; // Retornamos la conexión exitosa
    }

    function filtrado($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>