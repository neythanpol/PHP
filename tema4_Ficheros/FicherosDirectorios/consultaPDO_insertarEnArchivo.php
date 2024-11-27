<?php
    include "conexionPDOFuncion.php";
    
    try {
        $conexion = obtenerConexion();

        $sql = "SELECT * FROM persona";

        $sentencia = $conexion -> prepare($sql);
        $sentencia -> setFetchMode(PDO::FETCH_OBJ);
        $sentencia -> execute();

        // Abrir archivo en modo escritura
        $archivo = fopen("resultadoPDO.txt", "w");

        while ($t = $sentencia -> fetch()) {
            $linea = "ID: " . $t -> id_persona . ", Nombre: " . $t -> nombre . "\n";
            fwrite($archivo, $linea); // Escribir cada línea en el archivo
        }

        $contenido = file_get_contents("resultadoPDO.txt");

        if ($contenido !== false) {
            // Dividir el contenido en líneas
            $lineas = explode("\n", $contenido);

            // Procesar cada línea
            foreach ($lineas as $linea) {
                // Procesar la línea de alguna manera
                echo $linea . "<br>";
            }
        } else {
            // Error al leer el archivo
            echo "No se pudo leer el archivo";
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