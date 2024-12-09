<?php
    // Crea dos variables $a y $b, y asígnales los valores 5 y 10 respectivamente. Luego, realiza y muestra el resultado de las siguientes operaciones:
    $a = 5;
    $b = 10;

    // 1. Suma de ambos valores

    $suma = $a + $b;

    // 2. Resta de ambos valores

    $resta = $a - $b;

    // 3. Multiplicación de ambos valores

    $multi = $a * $b;

    // 4. División de ambos valores

    if ($a >= $b) {
        $div = $a / $b;
    } else {
        $div = $b / $a;
    }

    // Resultados

    echo "La suma de las números es: $suma, la resta: $resta, la multiplicación: $multi y la división: $div";
?>