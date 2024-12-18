<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Correo Electrónico</title>
</head>
<body>
    <form action="procesar_formulario.php" method="post">
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Validar usando filter_var
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico es válido.";
    } else {
        echo "El correo electrónico no es válido.";
    }
}
?>


<?php
include_once "../config/conexion.php";
$conexion = null;//Conexion();

if (!$conexion) {
    echo "Ha fallado la conexión con la base de datos";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre'];
    $pin = $_POST['pin'];
    $correo = $_POST['correo'];

    // Validación del correo electrónico
    $patron = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    if (!preg_match($patron, $correo)) {
        echo "El correo electrónico no tiene un formato válido.";
        exit;
    }

    if ($nombre_usuario == "james_bon" && $pin == "007") {
        header('Location: ../vista/listarDatos.php');
        exit;
    } else {
        echo "Nombre de usuario, correo o pin incorrecto.";
    }
}
?>