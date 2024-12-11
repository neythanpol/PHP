<?php
    // Crea una función llamada factorial($n) que reciba un número entero positivo y devuelva su factorial. El factorial de un número n es el producto de todos los números desde 1 hasta n 
    function factorial($n) {
        $factorial = 1;
        for ($i=1; $i <= $n; $i++) { 
            $factorial *= $i;
        }
        echo $factorial;
    }

    factorial(6);
?>
