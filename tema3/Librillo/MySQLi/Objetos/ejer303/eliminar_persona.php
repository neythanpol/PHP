<?php
    // Conexión con la base de datos
    include("conexion.php");

    // Recogemos el ID
    if (!isset($_GET["id_persona"])) {
        exit("No hay ID");
    }

    $id = $_GET["id_persona"];
    $consultaDelete = $conexion -> prepare("DELETE FROM persona WHERE id_persona = ?");
    $consultaDelete -> bind_param("i", $id);
    $consultaDelete -> execute();
?>