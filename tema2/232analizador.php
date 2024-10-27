<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Analizador</title>
</head>
<body>
    <?php
    // A partir de una frase con palabras sólo separadas por espacios, devolver:
    // Letras totales y cantidad de palabras
    $frase = "Mañana no me apetece trabajar";
    $cont = 0;
    $totalLetras = 0;
    $divisiones = explode(" ", $frase);
    foreach ($divisiones as $division) {
        $cont++;
        $totalLetras += mb_strlen($division); // Si pones solamente strlen y la letra lleva tilde te la cuenta doble ya que esa función lee bytes y las letras con tildes son multibyte. Por eso se corrige con mb_strlen
    }
    echo "Las letras totales son: $totalLetras<br><br>";
    echo "La cantidad de palabras es: $cont";

    echo "<br><br>";

    // Una línea por cada palabra indicando su tamaño
    foreach ($divisiones as $division) {
        $tamaño = mb_strlen($division);
        echo "El tamaño de la palabra ".$division." es: ".$tamaño;
        echo "<br>";
    }
    ?>
</body>
</html>