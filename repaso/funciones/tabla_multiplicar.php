<?php
    // Crea una función llamada tablaMultiplicar($numero) que reciba un número como parámetro y muestre su tabla de multiplicar (del 1 al 10)
    function tablaMultiplicar($numero) {
        for ($i=1; $i <= 10; $i++) { 
            echo "$numero x $i = " . $numero * $i;
            echo "<br>";
        }
    }
    tablaMultiplicar(5);
?>
