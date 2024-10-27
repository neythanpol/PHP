<?php
// procesa_login.php

// Datos de ejemplo para usuario y contraseña correctos.
$usuario_correcto = "usuario";
$contra_correcta = "1234";

// Obtener los datos del formulario
$usuario = $_POST["usuario"];
$contra = $_POST["contra"];

// Verificar si los datos son correctos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($usuario === $usuario_correcto && $contra === $contra_correcta) {
        // Redirigir a la página de bienvenida si el login es correcto
        header("Location: bienvenida.php");
        exit(); // Es importante llamar a exit() después de header()
    }else {
        // Redirigir de vuelta al formulario en caso de error
        header("Location: login.html");
        exit();
        // $err = true;
    }
}
?>