<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Investiga</title>
</head>
<body>
    <?php
    // Investiga las siguientes funciones de cadena (explica para qué sirven mediante comentarios, y programa un pequeño ejemplo de cada una de ellas): ucwords, strrev, str_repeat y md5.

    // ucwords — Convierte a mayúsculas el primer caracter de cada palabra de una cadena
    $foo = 'hello world!';
    $foo = ucwords($foo);             // Hello World!

    $bar = 'HELLO WORLD!';
    $bar = ucwords($bar);             // HELLO WORLD!
    $bar = ucwords(strtolower($bar)); // Hello World!

    // strrev — Invierte una string
    echo strrev("Hello world!"); // outputs "!dlrow olleH"

    // str_repeat — Repite un string
    echo str_repeat("-=", 10);

    // md5 — Calcula el 'hash' md5 de un string
    $str = 'apple';

    if (md5($str) === '1f3870be274f6c49b3e31a0c6728957f') {
        echo "Would you like a green or red apple?";
    }
    ?>
</body>
</html>