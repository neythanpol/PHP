<?php
    // Comprobamos si ya se ha enviado el formulario
    if (isset($_POST['enviar'])) {
        $usuario = $_POST['inputUsuario'];
        $pwd = $_POST['inputPassword'];

        // Validamos que recibimos ambos parametros
        if (empty($usuario) || empty($pwd)) {
            $error = "Debes introducir un usuario y contraseña";
            include "index.php";
        } else {
            if ($usuario == "admin" && $pwd == "admin") {
                // Almacenamos el usuario en la sesión
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