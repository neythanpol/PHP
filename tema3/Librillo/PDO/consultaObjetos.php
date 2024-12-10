<?php
    include "conexionPDOFuncion.php";
    
    try {
        $conexion = obtenerConexion();

        $sql = "SELECT * FROM alumnos";

        $sentencia = $conexion -> prepare($sql);
        $sentencia -> setFetchMode(PDO::FETCH_OBJ);
        $sentencia -> execute();

        while ($t = $sentencia -> fetch()) {
            echo "ID: " . $t -> id_alumno . "<br />";
            echo "DNI: " . $t -> dni . "<br />";
            echo "Nombre: " . $t -> nombre . "<br />";
            echo "Primer Apellido: " . $t -> apellido1 . "<br />";
            echo "Segundo Apellido: " . $t -> apellido2 . "<br />";
            echo "Email: " . $t -> email . "<br />";
            echo "Teléfono: " . $t -> telefono . "<br />";
            echo "Curso: " . $t -> curso . "<br />";
        }

        $num_filas = $sentencia -> rowCount();
        echo "El número de filas es: " . $num_filas;
    } catch (PDOException $e) {
        echo $e -> getMessage();
    } finally {
        // Cerrar la conexión
        $conexion = null;
    }
?>