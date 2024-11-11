<?php
    // Prueba de conexión a una base de datos.

    $mysqli_conexion = new mysqli("localhost", "root", "", "prueba");
    if ($mysqli_conexion -> connect_errno) {
        echo "Error de conexión con la base de datos: " . $mysqli_conexion -> connect_errno;
        exit;
    }
    
    // Consulta a la base de datos
    $consulta = "SELECT * FROM empresa";
    $resultado = $mysqli_conexion -> query($consulta);
    $numRegistros = $resultado -> num_rows;

    $listaPersonas = $resultado -> fetch_all(MYSQLI_ASSOC);
    echo "Número de registros: " . $numRegistros . "<br>";

    if ($numRegistros > 0) {
        // Recorremos los resultados
        foreach ($listaPersonas as $persona) {
            echo "Número de empleado: " . $persona["num_empleado"] . "<br>";
        }
    }else {
        // Error
    }

    $resultado -> free();
    $mysqli_conexion -> close();
?>