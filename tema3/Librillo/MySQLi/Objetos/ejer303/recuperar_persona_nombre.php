<?php
    // Conectamos a la base de datos
    include('conexion.php');

    // Consulta a la base de datos
    $nombre = $_GET["nombre"];

    // Preparación SELECT
    $consultaSelect = $conexion -> prepare("SELECT * FROM persona WHERE nombre = ?");

    // Vincular variable a parámetro e indicar tipo
    $consultaSelect -> bind_param("s", $nombre);

    // Ejecución de la consulta
    if ($consultaSelect -> execute()) {
        // Obtenemos solo una fila
        $resultado = $consultaSelect -> get_result();

        if ($resultado -> num_rows > 0) {
            while ($usuario = $resultado -> fetch_assoc()) {
                echo "Nombre: ".$usuario["nombre"]."<br>";
                echo "Apellidos: ".$usuario["apellidos"]."<br>";
                echo "Teléfono: ".$usuario["telefono"]."<br><br>";
            }
        }else{
            exit("No hay resultados con ese nombre");
        }
    }else {
        echo "Error en la consulta";
    }

    $resultado -> free();
    $conexion -> close();
?>