<?php
    include('conexion.php');

    $nombre = $_POST['nombre'];

    if (isset($_POST['telefono'])) {
        $telefono = $_POST['telefono'];
    }else {
        $telefono = ' ';
    }

    if (isset($_POST['apellidos'])) {
        $apellidos = $_POST['apellidos'];
    }else {
        $apellidos = ' ';
    }

    $consultaInsert = $conexion -> prepare("INSERT INTO persona(nombre, apellidos, telefono) VALUES(?, ?, ?)");

    $consultaInsert -> bind_param("sss", $nombre, $apellidos, $telefono);

    if ($consultaInsert -> execute()){
        header("Location: listar_personas.php");
        exit();
    }else{
        // Error
    }

    $conexion -> close();

?>