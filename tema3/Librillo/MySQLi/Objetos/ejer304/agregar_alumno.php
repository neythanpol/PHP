<?php
    // Conexión a la base de datos
    include("conexion.php");

    // Recibo de datos por parte del formulario
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $curso = $_POST["curso"];

    // Consulta
    $consulta = $conexion -> prepare("INSERT INTO alumnos (dni, nombre, apellido1, apellido2, email, telefono, curso) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Vincular variables a los parámetros
    $consulta -> bind_param("sssssss", $dni, $nombre, $apellido1, $apellido2, $email, $telefono, $curso);

    // Ejecutar la consulta
    if ($consulta -> execute()) {
        header("Location: listar_alumno.php");
        exit();
    }else {
        echo "Error al enviar los datos: ".$consulta -> error;
    }
    // Cerrar conexiones
    $consulta -> close();
    $conexion -> close();
?>