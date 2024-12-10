<?php
    // Eliminar cada variable
    session_start();

    unset($_SESSION['nombre']);
    unset($_SESSION['edad']);

    if (!isset($_SESSION['nombre'])) {
        echo "No hay sesiones con ese nombre<br>";
    }

    if (!isset($_SESSION['edad'])) {
        echo "No hay sesiones con esa edad";
    }

    session_unset();
    session_destroy();

    print_r($_SESSION);
?>