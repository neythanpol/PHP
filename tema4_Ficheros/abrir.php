<?php
    $nombreArchivo = "archivo.txt";

    if (file_exists($nombreArchivo)) {
        $archivo = fopen($nombreArchivo, "r");

        if ($archivo) {
            echo "El archivo se abrió correctamente<br><br>";
            while (!feof($archivo)) {
                $car = fgetc($archivo);
                echo $car;
            }
            fclose($archivo);
        } else {
            echo "No se pudo abrir '$nombreArchivo'.";
        }
    } else {
        echo "El archivo '$nombreArchivo' no existe.";
    }
?>