<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Filtrado</title>
</head>
<body>
    <form action="207filtrado.php" method="get">
        <label for="text">Dame números:</label>
        <input type="text" name="numeros">
        <input type="submit" value="Enviar">
    </form>
    <?php
    // Crea un programa que permita al usuario leer un conjunto de números separados por espacios. El programa filtrará los números leídos para volver a mostrar únicamente los números pares e indicará la cantidad existente.
    $numeros = $_GET["numeros"];

    $numero = explode(" ", $numeros);
    foreach ($numero as $numeroSeparado) {
        echo $numeroSeparado."<br>";
    }
    ?>
</body>
</html>