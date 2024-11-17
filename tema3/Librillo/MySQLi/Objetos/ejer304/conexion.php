<?php
    // Prueba de conexión a una base de datos.

    $conexion = new mysqli("localhost", "root", "", "gestion_alumnos");// Servidor, Usuario, Contraseña, Base de datos
    if ($conexion -> connect_errno) {
        echo "Error de conexión con la base de datos: " . $conexion -> connect_errno;
        exit;
    }else{
        // Conectada correctamente
    }
     // Si estoy aquí es que la base de datos ha podido conectarse, por lo que seguiré con el código de la página.
?>