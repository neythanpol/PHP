<?php
// Crea una función llamada factorialRecursivo($n) que calcule el factorial de un número usando recursión. Asegúrate de manejar el caso base correctamente (factorial de 0 es 1).
function factorial($n) {
    // Caso base: el factorial de 0 o 1 es 1
    if ($n <= 1) {
        return 1;
    }
    // Llamada recursiva
    return $n * factorial($n - 1);
}

// Ejemplo de uso:
$numero = 5;
echo "El factorial de $numero es " . factorial($numero); // Salida: El factorial de 5 es 120
?>
