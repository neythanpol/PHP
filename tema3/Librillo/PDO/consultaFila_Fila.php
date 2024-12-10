<?php
    include "conexionPDOFuncion.php";
    
    try {
        $conexion = obtenerConexion();

        $sql = "SELECT * FROM alumnos";

        $sentencia = $conexion -> prepare($sql);
        $sentencia -> setFetchMode(PDO::FETCH_ASSOC);
        $sentencia -> execute();

        while ($fila = $sentencia -> fetch()) {
            echo "ID: " . $fila['id_alumno'] . "<br />";
            echo "DNI: " . $fila['dni'] . "<br />";
            echo "Nombre: " . $fila["nombre"] . "<br />";
            echo "Primer Apellido: " . $fila["apellido1"] . "<br />";
            echo "Segundo Apellido: " . $fila["apellido2"] . "<br />";
            echo "Email: " . $fila["email"] . "<br />";
            echo "Teléfono: " . $fila["telefono"] . "<br />";
            echo "Curso: " . $fila["curso"] . "<br />";
        }

        $num_filas = $sentencia -> rowCount();
        echo "El número de filas es: " . $num_filas;
    }catch (PDOException $e) {
        echo $e -> getMessage();
    } finally {
        // Cerrar la conexión
        $conexion = null;
    }
?>