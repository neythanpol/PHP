<?php
    if (isset($_POST['enviar'])) {
        $usuario = htmlentities($_POST['usuario']);

        // Configurar cookie
        setcookie('usuario', $usuario, time()+3600);

        header("Location: pagina2.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies PHP</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="usuario" placeholder="Ingresa el usuario">
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>