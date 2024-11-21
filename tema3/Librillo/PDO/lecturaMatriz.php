<?php
    include "conexionPDO.php";

    try {
        $sql = "SELECT * FROM persona";

        $sentencia = $conexion -> prepare($sql);
        $sentencia -> setFetchMode(PDO::FETCH_ASSOC);
        $sentencia -> execute();

        $personas = $sentencia -> fetchAll();

        foreach ($personas as $persona) {
            echo "ID: " . $persona["id_persona"] . "<br />";
            echo "Nombre: " . $persona["nombre"] . "<br />";
        }

        $num_filas = $sentencia -> rowCount();
        echo "El número de filas es: " . $num_filas;
    } catch (PDOException $e) {
        echo $e -> getMessage();
    }
?>