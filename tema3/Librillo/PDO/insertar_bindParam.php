<?php
    include "conexionPDOFuncion.php";
    
    try {
        $conexion = obtenerConexion();

        // Recibir datos del formulario
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];

        // Sentencia SQL para la inserción de datos
        $sql = "INSERT INTO persona (nombre, apellidos) VALUES (:nombre, :apellidos)";

        // Preparación de la consulta
        $sentencia = $conexion -> prepare($sql);

        // Vincular parámetros usando bindParam
        // Tipo de datos PDO::PARAM_ST (si es String), PDO::PARAM_INT (si es entero)
        $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $sentencia -> bindParam(':apellidos', $apellidos, PDO::PARAM_STR);

        // Ejecución de la consulta
        $sentencia -> execute();

        // Obtener el ID insertado
        $lastId = $conexion -> lastInsertId();
        echo "Datos insertados!! El ID insertado es: " . $lastId;
    } catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    } finally {
        // Cerrar la conexión
        $conexion = null;
    }
?>