<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Estilo CaNi</title>
</head>
<body>
    <?php
    // EsCrIbE uNa FuNcIóN qUe TrAnSfOrMe UnA cAdEnA eN cAnI.
    $frase = "Ojalá el viernes sea fiesta";
    $fraseNueva = str_split($frase, 1);
    
    foreach ($fraseNueva as $frase1) {
        echo $frase1;
        echo "<br>";
    };
    ?>
</body>
</html>