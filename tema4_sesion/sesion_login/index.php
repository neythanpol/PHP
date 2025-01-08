<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco Rodríguez">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <fieldset>
            <legend>Login</legend>
        <br />
            <label for="usuario">Usuario:</label><br />
            <input type="text" name="inputUsuario" id="usuario" maxlength="50"><br />
            
            <label for="password">Contraseña:</label><br />
            <input type="password" name="inputPassword" id="password" maxlength="50"><br /><br />
            
            <input type="submit" name="enviar" value="Enviar" />
        </fieldset>
    </form>
</body>
</html>
<?php
    if (isset($error)) {
        // Si hay error al hacer login muestra el error
        echo $error;
    }
?>
<?php
    if (isset($_GET['loginEnIndex'])) {
        // Si intento entrar en main, lo mostrará
        echo "Haz login para entrar en esta página<br />";
    }
?>