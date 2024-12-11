<?php
    // Crea una función llamada numerosEnRango($inicio, $fin) que reciba dos números enteros como parámetros y devuelva un array con todos los números entre $inicio y $fin (incluyéndolos). Muestra el resultado usando un bucle foreach.
    function numerosEnRango($inicio, $fin) {
        $numeros = [];
        for ($i=$inicio; $i <= $fin; $i++) { 
            array_push($numeros, $i);
        }
        foreach ($numeros as $numero) {
            echo "$numero <br>";
        }
    }

    numerosEnRango(2, 27);
?>
