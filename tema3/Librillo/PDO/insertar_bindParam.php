<?php
    include "conexionPDO.php";

    try {
        // Sentencia SQL para la inserción de datos
        $sql = "INSERT INTO persona (nombre, apellido) VALUES (:nombre, :apellido)";

        // Preparación de la consulta
        $sentencia = $conexion -> prepare($sql);

        // Vincular parámetros usando bindParam
        // Tipo de datos PDO::PARAM_ST (si es String), PDO::PARAM_INT (si es entero)
        $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $sentencia -> bindParam(':apellido', $apellido, PDO::PARAM_STR);

        // Ejecución de la consulta
        $sentencia -> execute();

        echo "Datos insertados";
    } catch (PDOException $e) {
        echo $e -> getMessage();
    }
?>