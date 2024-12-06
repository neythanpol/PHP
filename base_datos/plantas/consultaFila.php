<?php
    include "conexion.php";

    try {
        $conexion = obtenerConexion();

        $sql = "SELECT * FROM plantas";

        $query = $conexion -> query($sql);

        while($fila = $query -> fetch()){
            echo $fila['nombre_comun'] . " | ";
            echo $fila['nombre_cientifico']. " | ";
            echo $fila['origen']. " | ";
            echo $fila['tipo']. " | ";
            echo $fila['cuidados']. " | ";
            echo $fila['curiosidades']. " | ";
            echo "<br />";
        }

        $num_filas = $query -> rowCount();
        echo "El número de filas es: " . $num_filas;
    } catch (PDOException $e) {
        echo $e -> getMessage();
    }finally {
        // Cerrar conexión
        $conexion = null;
    }
?>