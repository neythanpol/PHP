<?php
<<<<<<< HEAD
    include "conexionPDO.php";

    try {
        // Sentencia SQL para la inserción de datos
        $sql = "INSERT INTO persona (nombre, apellido) VALUES (:nombre, :apellido)";

        // Preparación de la consulta
        $sentencia = $conexion -> prepare($sql);

        // Vincular parámetros usando bindParam
        // Tipo de datos PDO::PARAM_ST (si es String), PDO::PARAM_INT (si es entero)
        $sentencia -> bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $sentencia -> bindValue(':apellido', $apellido, PDO::PARAM_STR);

        // Ejecución de la consulta
        $sentencia -> execute();

        echo "Datos insertados";
    } catch (PDOException $e) {
        echo $e -> getMessage();
    }
?>
=======
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

>>>>>>> 451f38ea8d1b4f3a8e39cf73b0be90985957ef85
