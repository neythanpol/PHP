<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Primer Formulario</title>
</head>
<body>
    <form action="basico.php" method="get">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>

        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email">
        <br><br>

        <button type="submit">Enviar</button>
    </form>
    <?php
    // Crear un formulario HTML que recoja el nombre y el correo electrónico de un usuario.
    $nombre = isset($_GET["nombre"]) ? $_GET["nombre"] : "";
    $email = isset($_GET["email"]) ? $_GET["email"] : "";

    echo "<h3>Datos recibidos:</h3>";
    echo "Nombre: $nombre<br>";
    echo "Correo electrónico: $email<br>";
    ?>
</body>
</html>