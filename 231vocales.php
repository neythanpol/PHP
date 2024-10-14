<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Vocales</title>
</head>
<body>
    <?php
    // A partir de una frase, devuelve la cantidad de cada una de las vocales, y el total de ellas.
    $frase = "Frase de ejemplo predeterminada para este ejercicio";
    $contA = 0;
    $contE = 0;
    $contI = 0;
    $contO = 0;
    $contU = 0;
    $total = 0;

    $frase = strtoupper($frase);
    for ($i=0; $i < strlen($frase); $i++) { 
        if ($frase[$i] === "A") {
            $contA++;
        }elseif ($frase[$i] === "E") {
            $contE++;
        }elseif ($frase[$i] === "I") {
            $contI++;
        }elseif ($frase[$i] === "O") {
            $contO++;
        }elseif ($frase[$i] === "U") {
            $contU++;
        }
    }
    $total = $contA + $contE + $contI + $contO + $contU;

    echo "La cantidad de A es: $contA<br><br>";
    echo "La cantidad de E es: $contE<br><br>";
    echo "La cantidad de I es: $contI<br><br>";
    echo "La cantidad de O es: $contO<br><br>";
    echo "La cantidad de U es: $contU<br><br>";

    echo "La cantidad total de vocales es: $total<br><br>";
    ?>
</body>
</html>