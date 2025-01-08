<?php
    // Recuperamos la información de la sesión
    session_start();

    // Eliminamos las variables de sesión
    session_unset();

    // La destruimos
    session_destroy();

    header("Location: index.php");
?>