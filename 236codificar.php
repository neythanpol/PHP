<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Codificar</title>
</head>
<body>
    <?php
    // Utilizando las funciones para trabajar con caracteres, a partir de una cadena y un desplazamiento:
    // Si el desplazamiento es 1, sustituye la A por B, la B por C, etc.
    // El desplazamiento no puede ser negativo.
    // Si se sale del abecedario, debe volver a empezar.
    // Hay que respetar los espacios, puntos y comas.

    $frase = "natan, blanco.";
    $desplazamiento = 7;
    

    function desplazamiento($frase, $desplazamiento){
        $fraseMinuscula = strtolower($frase); // Cambio todo a minúscula
        $abecedario = "abcdefghijklmnopqrstuvwxyz"; // Creo un abecedario para comparar letras y órdenes
        $numerosABC = strlen($abecedario); // Variable para el total de caracteres

        // Esto lo hago para más comodidad, si fuese mayor pues se tendría que calcular el número de veces que se pasa y calcular el número para que nos dé el número que queremos en el desplazamiento
        if ($desplazamiento > $numerosABC) {
            echo "Intenta que el desplazamiento sea menor";
        }else{
            // Aquí respetamos que el desplazamiento debe ser positivo
            if($desplazamiento < 0){
                echo "El desplazamiento no puede ser negativo";
            }else{
            // Comparamos la letra de la frase
            for ($i=0; $i < strlen($fraseMinuscula); $i++) { 
                // Aquí respetamos los espacios, comas y puntos
                if($fraseMinuscula[$i] !== " " || $fraseMinuscula[$i] !== "," || $fraseMinuscula[$i] !== "."){
                    for ($j=0; $j < $numerosABC; $j++) {
                        // Cuando son iguales entra aquí
                        if ($fraseMinuscula[$i] === $abecedario[$j]) {
                            // Si la posición en conjunto con el desplazamiento es superior al total del abecedario entonces hacemos el cálculo para dar la vuelta
                            if (($j + $desplazamiento) >= $numerosABC) {
                                $fraseMinuscula[$i] = $abecedario[$j + $desplazamiento - $numerosABC -1];
                                break;
                            }else{
                                // Si no lo es entonces simplemente sumamos el desplazamiento
                                $fraseMinuscula[$i] = $abecedario[$j + $desplazamiento];
                                break;
                            }
                        
                        }
                
                    }
                }
            
            }
        }
        $fraseDesplazada = $fraseMinuscula;
        echo $fraseDesplazada;
        return $fraseDesplazada;
        }
    }

    desplazamiento($frase, $desplazamiento);
    
    ?>
</body>
</html>