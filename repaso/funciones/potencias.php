<?php
    // Crea una función llamada potencia($base, $exponente) que reciba dos números como parámetros: una base y un exponente. La función debe calcular y devolver la potencia usando un bucle.
    function potencia($base, $exponente) {
        if (gettype($base) == "integer" && gettype($exponente) == "integer") {
            $potencia = pow($base, $exponente);
            echo $potencia;
        } else {
            echo "Debes escribir dos números enteros";
        }
    }

    potencia(6, 2);
?>
