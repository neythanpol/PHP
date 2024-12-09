<?php
// Crea dos variables $inicio y $fin, y asígnales dos números enteros. Muestra todos los números entre $inicio y $fin (incluyéndolos) en una sola línea, separados por comas.
$inicio = 14;
$fin = 35;

for ($i=$inicio; $i <= $fin; $i++) {
    if ($i != $fin) {
        echo "$i, ";
    } else{
        echo $i;
    }
    
}
?>
