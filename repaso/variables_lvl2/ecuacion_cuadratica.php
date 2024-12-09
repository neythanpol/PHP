<?php
// Crea tres variables $a, $b y $c que representen los coeficientes de una ecuación cuadrática de la forma:
//  ax2+bx+c=0
// Calcula las dos posibles soluciones usando la fórmula general:
// x = (-b +- raiz b cuadrado - 4ac) / 2ab
// Muestra los resultados. Asegúrate de manejar casos donde no exista solución real (discriminante negativo).
    $a = 1;
    $b = -3;
    $c = 2;

    $discriminante = $b * $b - 4 * $a * $c;

    if ($discriminante < 0) {
        echo "No hay soluciones reales";
    } elseif ($discriminante == 0) {
        $x = -$b / (2 * $a);
        echo "Hay una solución real: x = $x";
    } else {
        $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
        $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
        echo "Hay dos soluciones reales: x1 = $x1 y x2 = $x2";
    }
?>