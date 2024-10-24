<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Validación</title>
</head>
<body>
    <h2>Formulario con validación</h2>
    <form action="validacion.php" method="get">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <br><br>

    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" id="email" required>
    <br><br>

    <input type="submit" value="Enviar">
    </form>
    <?php
    // Crear un formulario que recoja el nombre y el correo electrónico de un usuario.
    // Validaremos que ambos campos estén completos y que el correo tenga un formato válido.
    // Además, mostraremos mensajes de error si hay algún problema con los datos ingresados.
    $nombre = isset($_GET["nombre"]) ? $_GET["nombre"] : "";
    ?>
</body>
</html>