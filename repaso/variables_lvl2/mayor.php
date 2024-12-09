<?php
// Crea tres variables: $a, $b y $c, y asígnales valores numéricos. Usa estructuras de control para determinar cuál de los tres números es el mayor. Muestra el resultado.
$a = 4;
$b = 5;
$c = 8;

if ($a > $b && $a > $c) {
    echo "El número $a es el mayor";
} elseif ($b > $a && $b > $c) {
    echo "El número $b es el mayor";
} else {
    echo "El número $c es el mayor";
}
?>
