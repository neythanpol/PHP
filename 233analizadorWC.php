<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Analizador WC</title>
</head>
<body>
    <?php
    // Investiga que hace la función str_word_count, y vuelve a hacer el ejercicio.
    $frase = "Mañana no me apetece trabajar";
    echo str_word_count($frase, 0);

    echo "<br><br>";

    $palabras = str_word_count($frase, 1);
    print_r($palabras);

    ?>
</body>
</html>