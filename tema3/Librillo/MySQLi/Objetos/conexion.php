<?php
    // Prueba de conexión a una base de datos.

    $mysqli_conexion = new mysqli("localhost", "root", "", "gestion_alumnos");// Servidor, Usuario, Contraseña, Base de datos
    if ($mysqli_conexion -> connect_errno) {
        echo "Error de conexión con la base de datos: " . $mysqli_conexion -> connect_errno;
        exit;
    }
    // Si estoy aquí es que la base de datos ha podido conectarse, por lo que seguiré con el código de la página.
?>