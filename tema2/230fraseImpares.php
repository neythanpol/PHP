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
    // He contado impares vistas desde la forma natural y no de como se lee de posición.
    // También cuento únicamente cada palabra sin contar los espacios
    for ($i=0; $i < strlen($frase); $i++) {
        if ($i % 2 === 0  || $frase[$i] === " ") {
            echo $frase[$i];
        }
    }

    // Si quiero contar todas las palabras contando con que los espacios también son caracteres, entonces, el bucle es aún más sencillo
    echo "<br><br>";
    // El bucle for recorre los caracteres de 2 en 2
    for ($i=0; $i < strlen($frase); $i+=2) { 
        echo $frase[$i];
    }
    ?>
</body>
</html>