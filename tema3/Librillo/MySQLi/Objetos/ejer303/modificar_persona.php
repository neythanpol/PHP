<?php
    // Conexión con la base de datos
    include("conexion.php");

    $id = $_POST["id_persona"];
    $noombre = $_POST["nombre"];

    $consulta = $conexion -> prepare("UPDATE persona SET nombre = ? WHERE id_persona = ?");

    // Si hubiera más campos, separados por comas.

    $consulta -> bind_param("si", $noombre, $id);
    $consulta -> execute();
?>