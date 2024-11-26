<?php
    include "conexionPDOFuncion.php";
    
    try {
        $conexion = obtenerConexion();

        $sql = "SELECT * FROM persona";

        $sentencia = $conexion -> prepare($sql);
        $sentencia -> setFetchMode(PDO::FETCH_ASSOC);
        $sentencia -> execute();

        while ($fila = $sentencia -> fetch()) {
            echo "ID: " . $fila["id_persona"] . "<br />";
            echo "Título: " . $fila["nombre"] . "<br />";
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