<?php
    include "conexionPDOFuncion.php";

    try {
        $conexion = obtenerConexion();

        // Sentencia SQL para insertar datos en la tabla "persona"
        $sql = "INSERT INTO persona (nombre, apellidos) VALUES (:nombre, :apellidos)";

        // Preparo la consulta
        $sentencia = $conexion -> prepare($sql);

        // Vinculo los parámetros usando bindValue()
        // tipo de datos PDO::PARAM_ST, PDO::PARAM_INT si entero
        $sentencia -> bindValue(':nombre', $nombre, PDO::PARAM_STR); // El parámetro :nombre se fija al valor actual de $nombre, especificando que es un string
        $sentencia -> bindValue(':apellidos', $apellidos, PDO::PARAM_STR); // El parámetro :apellidos se fija al valor actual de $apellidos, especificando que es un string

        // Ejecuto la consulta
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

