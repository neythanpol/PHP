<?php
    // Conectamos a la base de datos
    include('conexion.php');

    // Consulta a la base de datos
    $id = $_GET["id_persona"];

    // Preparación SELECT
    $consultaSelect = $conexion -> prepare("SELECT * FROM persona WHERE id_persona = ?");

    // Vincular variable a parámetro e indicar tipo
    $consultaSelect -> bind_param("i", $id);

    // Ejecución de la consulta
    if ($consultaSelect -> execute()) {
        // Obtenemos solo una fila
        $resultado = $consultaSelect -> get_result();
        $usuario = $resultado -> fetch_assoc();

        if (!$usuario) {
            exit("No hay resultados para ese ID");
        }else{
            // Encuentra el ID
            // Se muestran los resultados que estarán en el array asociativo $usuario["..."]
            echo "Nombre: ".$usuario["nombre"]."<br>";
            echo "Apellidos: ".$usuario["apellidos"]."<br>";
            echo "Teléfono: ".$usuario["telefono"]."<br>";
        }
    }else {
        // Error
    }

    $resultado -> free();
    $conexion -> close();
?>