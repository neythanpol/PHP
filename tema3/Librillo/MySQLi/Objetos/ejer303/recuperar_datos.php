<?php
    // Incluye el archivo de conexión
    include "conexion.php";

    // Consulta a la base de datos
    $consulta = "SELECT * FROM `persona`";
    $resultado = $conexion -> query($consulta);
    $numRegistros = $resultado -> num_rows;

    $listaPersonas = $resultado -> fetch_all(MYSQLI_ASSOC);
    echo "Número de registros: ".$numRegistros."<br>";

    if ($numRegistros > 0) {
        // Recorremos los resultados
        foreach ($listaPersonas as $persona){
            // Recorremos el array asociativo
            echo "ID: ".$persona["id_persona"]."<br>";
        }
    }else{
        // Error
    }

    $resultado -> free();
    $conexion -> close();
?>