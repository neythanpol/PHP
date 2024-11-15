<?php
    // Incluye el archivo de conexión
    include "conexion.php";

    // Ejecuta la consulta SQL
    $consulta = "SELECT * FROM alumnos";
    $resultado = $mysqli_conexion -> query($consulta);
    $numRegistros = $resultado -> num_rows;
    
    $listaAlumnos = $resultado -> fetch_all(MYSQLI_ASSOC);
    echo "Número de registros: " . $numRegistros . "<br>";

    if ($numRegistros > 0) {
        // Recorremos los resultados
        foreach ($listaAlumnos as $alumno) {
            echo "ID: " . $alumno["id_alumno"] . "<br>";
        }
    }
?>
