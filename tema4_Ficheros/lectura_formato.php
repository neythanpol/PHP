<?php
    // Ruta del archivo
    $filePath = "matriz.txt";

    // Asegurarse de que el archivo existe
    if (file_exists($filePath)) {
        // Abrir el archivo para lectura
        $file = fopen($filePath, "r");

        if ($file) {
            echo "Lectura fila por fila:";
            while (!feof($file)) {
                // Leer cada fila con fscanf
                fscanf($file, "%d %d %d", $num1, $num2, $num3);
                echo "<br> $num1, $num2, $num3";
            }
            fclose($file);
        } else {
            echo "No se pudo abrir el archivo";
        }
    } else {
        echo "Archivo no encontrado";
    }
?>