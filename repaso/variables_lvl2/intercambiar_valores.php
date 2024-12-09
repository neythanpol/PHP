<?php
    // Crea dos variables $x y $y con los valores 10 y 20, respectivamente. Luego, intercambia los valores entre las variables sin usar una tercera variable. Al final, $x debe valer 20 y $y debe valer 10. Muestra los valores finales.

    $x = 3;

    $y = 20;

    echo "X: $x | Y: $y<br>";

    $x = $x + $y;

    $y = $x - $y;

    $x = $x - $y;


    echo "X: $x | Y: $y<br>";
?>