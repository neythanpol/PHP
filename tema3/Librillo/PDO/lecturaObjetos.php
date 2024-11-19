<?php
    include "conexionPDO.php";

    try {
        $sql = "SELECT * FROM persona";

        $sentencia = $conexion -> prepare($sql);
        $sentencia -> setFetchMode(PDO::FETCH_OBJ);
        $sentencia -> execute();

        while ($t = $sentencia -> fetch()) {
            echo "ID: " . $t -> id_persona . "<br />";
            echo "Nombre: " . $t -> nombre . "<br />";
        }

        $num_filas = $sentencia -> rowCount();
        echo "El número de filas es: " . $num_filas;
    } catch (PDOException $e) {
        echo $e -> getMessage();
    }
?>