<?php
    // Incluimos la configuración con el hash de la contraseña de admin
    include "config.php";

    // Comprobamos si ya se ha enviado el formulario
    if (isset($_POST['enviar'])) {
        $usuario = $_POST['inputUsuario'];
        $password = $_POST['inputPassword'];

        // Validamos que recibimos ambos parámetros
        if (empty($usuario) || empty($password)) {
            $error = "Debes introducir un usuario y contraseña";
            include "index.php";
        } else {
            // Validamos las credenciales
            if ($usuario == "admin" && password_verify($password, $adminPasswordHash)) {
                // Autenticación exitosa
                session_start();
                $_SESSION['usuario'] = $usuario;

                // Cargamos la página principal
                include "main.php";
            } else {
                // Si las credenciales no son válidas, se vuelven a pedir
                $error = "Usuario o contraseña no válidos";
                include "index.php";
            }
        }
    }
?>