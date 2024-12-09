<?php
// Crea tres variables: $n1, $n2 y $n3, y asígnales valores numéricos. Usa lógica para ordenarlos de menor a mayor y muestra el resultado en pantalla.
$n2 = 6;
$n3 = 3;
$n1 = 4;

if ($n1 < $n2 && $n1 < $n3 && $n2 < $n3) {
    echo "El orden es: $n1, $n2 y $n3";
} elseif ($n1 < $n2 && $n1 < $n3 && $n3 < $n2) {
    echo "El orden es: $n1, $n3 y $n2";
} elseif ($n2 < $n1 && $n2 < $n3 && $n1 < $n3) {
    echo "El orden es: $n2, $n1 y $n3";
} elseif ($n2 < $n1 && $n2 < $n3 && $n3 < $n1) {
    echo "El orden es: $n2, $n3 y $n1";
} elseif ($n3 < $n1 && $n3 < $n2 && $n1 < $n2) {
    echo "El orden es: $n3, $n1 y $n2";
} else {
    echo "El orden es: $n3, $n2 y $n1";
}
?>
