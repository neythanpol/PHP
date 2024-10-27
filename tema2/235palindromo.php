<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Palindromo</title>
</head>
<body>
    <?php
    // Escribe una función que devuelva un booleano indicando si una palabra es palíndroma.
    $frase = "No traces en ese cartón";

    function esPalindromo($frase){
        $esPalindromo = true;

        $fraseMinuscula = strtolower($frase);

        $fraseMinuscula = str_replace(' ', '', $fraseMinuscula);
        // Hago esto porque no sé como cambiarlo de una forma más eficiente
        $fraseMinuscula = str_replace('á', 'a', $fraseMinuscula);
        $fraseMinuscula = str_replace('é', 'e', $fraseMinuscula);
        $fraseMinuscula = str_replace('í', 'i', $fraseMinuscula);
        $fraseMinuscula = str_replace('ó', 'o', $fraseMinuscula);
        $fraseMinuscula = str_replace('ú', 'u', $fraseMinuscula);

        if (strlen($fraseMinuscula) % 2 === 0) {
            $cont = 1;
            for ($i=0; $i < strlen($fraseMinuscula) / 2; $i++) { 
                if ($fraseMinuscula[$i] !== $fraseMinuscula[(strlen($fraseMinuscula) - $cont)]) {
                    $esPalindromo = false;
                }else{
                    $cont++;
                }
            }
        }else {
            $cont = 1;
            for ($i=0; $i < (strlen($fraseMinuscula) / 2) - 1; $i++) { 
                if ($fraseMinuscula[$i] !== $fraseMinuscula[(strlen($fraseMinuscula) - $cont)]) {
                    $esPalindromo = false;
                }else{
                    $cont++;
                }
            }
        }
        return $esPalindromo;
    }

    if (esPalindromo($frase) === true) {
        echo "La frase '$frase' es palíndroma";
    }else{
        echo "La frase '$frase' no es palíndroma";
    }
    ?>
</body>
</html>