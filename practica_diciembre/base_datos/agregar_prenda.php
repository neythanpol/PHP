<?php
    // Conexión a la base de datos
    include("conexion.php");

    // Verificar si se han enviado todos los datos necesarios
    $fields = ["prenda", "foto", "precio", "rebajada", "rebaja"];
    $missing_fields = [];

    foreach ($fields as $field) {
        if (!isset($_POST[$field])) {
            $missing_fields[] = $field;
        }
    }

    if (empty($missing_fields)) {
        // Recibo de datos por parte del formulario
        $prenda = $_POST["prenda"];
        $foto = $_POST["foto"];
        $precio = $_POST["precio"];
        $rebajada = $_POST["rebajada"];
        $rebaja = $_POST["rebaja"];

        // Consulta
        $consulta = $conexion -> prepare("INSERT INTO rebajas_natan (prenda, foto, precio, rebajada, rebaja) VALUES (?, ?, ?, ?, ?)");

        // Vincular variables a los parámetros
        $consulta -> bind_param("sbdbd", $prenda, $foto, $precio, $rebajada, $rebaja);

        // Ejecutar la consulta
        if ($consulta -> execute()) {
            header("Location: listar_prenda.php");
            exit();
        }else {
            echo "Error al enviar los datos: ".$consulta -> error;
        }
        // Cerrar conexiones
        $consulta -> close();
        $conexion -> close();
    } else {
        echo "Error: Faltan los siguientes campos: " . implode(", ", $missing_fields);
    }
?>