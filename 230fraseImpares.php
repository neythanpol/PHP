<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Frase impar</title>
</head>
<body>
    <?php
    // Lee una frase y devuelve una nueva con solo los caracteres de las posiciones impares.
    $frase = "Frase de ejemplo predeterminada para este ejercicio";
    // He contado impares vistas desde la posición y no de como se lee de forma natural.
    // En caso de que la F de Frase sea la letra 1 entonces debemos cambiar el bucle for y que empiece en 0 y no en 1
    for ($i=1; $i < strlen($frase); $i+=2) { 
        echo $frase[$i];
    }
    ?>
</body>
</html>