<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Ejercicio 5</title>
</head>
<body>
    <?php
    // Un anagrama es una palabra que resulta de la transposición de todas las letras de otra palabra. Dicho de otra forma, una palabra es anagrama de otra si las dos tienen las mismas letras, con el mismo número de apariciones, pero en un orden diferente. Por ejemplo: AMAR-RAMA-RMAA-ARMA...

    // Crea una función llamada compruebeAnagrama, que al pasar el usuario, una palabra de 4 letras, compruebe si es un anagrama de una palabra de 4 letras generada por el programa de forma aleatoria.

    // Las palabras deben serlo y de 4 caracteres.

    // El programa devolverá "La palabra rama es un anagrama de amar". En caso de que lo sea
    // NOTA: código ASCII A-Z: 65-90, a-z: 97-122.

    function compruebeAnagrama($palabra){
        $palabraGenerada = "";
        $contadorLetras = [
            "a" => 0,
            "b" => 0,
            "c" => 0,
            "d" => 0,
            "e" => 0,
            "f" => 0,
            "g" => 0,
            "h" => 0,
            "i" => 0,
            "j" => 0,
            "k" => 0,
            "l" => 0,
            "m" => 0,
            "n" => 0,
            "o" => 0,
            "p" => 0,
            "q" => 0,
            "r" => 0,
            "s" => 0,
            "t" => 0,
            "u" => 0,
            "v" => 0,
            "w" => 0,
            "x" => 0,
            "y" => 0,
            "z" => 0
        ];
        if(is_string($palabra)){
            if (strlen($palabra) === 4) {
                for ($i=0; $i < 4; $i++) { 
                    $palabra[$i]
                }
            }else{
                echo "La palabra debe ser de 4 letras";
            }
        }else{
            echo "La palabra debe ser un string";
        }

        return "La palabra $palabraGenerada es un anagrama de $palabra";
    }
    ?>
</body>
</html>