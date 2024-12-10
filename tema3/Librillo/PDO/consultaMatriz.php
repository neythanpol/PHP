<?php
    include "conexionPDOFuncion.php";
    
    try {   
        $conexion = obtenerConexion();

        $sql = "SELECT * FROM alumnos";

        $sentencia = $conexion -> prepare($sql);
        $sentencia -> setFetchMode(PDO::FETCH_ASSOC);
        $sentencia -> execute();

        $personas = $sentencia -> fetchAll();

        foreach ($personas as $persona) {
            echo "ID: " . $persona["id_alumno"] . "<br />";
            echo "DNI: " . $persona['dni'] . "<br />";
            echo "Nombre: " . $persona["nombre"] . "<br />";
            echo "Primer Apellido: " . $persona["apellido1"] . "<br />";
            echo "Segundo Apellido: " . $persona["apellido2"] . "<br />";
            echo "Email: " . $persona["email"] . "<br />";
            echo "Teléfono: " . $persona["telefono"] . "<br />";
            echo "Curso: " . $persona["curso"] . "<br />";
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