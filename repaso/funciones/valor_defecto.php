<?php
    // Crea una función llamada multiplicar($a, $b = 2) que reciba dos números. El segundo parámetro debe tener un valor por defecto de 2. Devuelve el producto de ambos números. Llama a la función con uno y con dos argumentos.
    function multiplicar($a, $b = 2) {
        $mult = $a * $b;
        echo $mult;
    }
    multiplicar(15);

    echo "<br>";

    multiplicar(15, 3);
?>
