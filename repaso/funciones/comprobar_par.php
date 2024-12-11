<?php
    // Crea una función llamada esPar($numero) que reciba un número y devuelva true si el número es par, o false si es impar. Muestra un mensaje indicando si el número es par o impar al llamar a la función.
    function esPar($numero) {
        if ($numero % 2 == 0) {
            echo "El número es par";
        } else {
            echo "El número es impar";
        }
    }

    esPar(23);
?>
