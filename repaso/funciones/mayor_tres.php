<?php
    // Crea una función llamada mayorDeTres($a, $b, $c) que reciba tres números como parámetros y devuelva el mayor de ellos. Muestra el resultado.
    function mayorDeTres($a, $b, $c) {
        if ($a >= $b && $a >= $c) {
            echo $a;
        } elseif ($b >= $a && $b >= $c) {
            echo $b;
        } else {
            echo $c;
        }
    }

    mayorDeTres(15, 6, 5);
?>
