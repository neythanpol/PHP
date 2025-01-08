<?php




// 1. ___________________________________________________________________________is_null(): Devuelve TRUE si la variable es NULL, FALSE en otro caso

$var1 = NULL;
$var2 = "Texto";

echo "is_null(\$var1): " . (is_null($var1) ? 'TRUE' : 'FALSE') . "<br>";  // TRUE
echo "is_null(\$var2): " . (is_null($var2) ? 'TRUE' : 'FALSE') . "<br>";  // FALSE

echo "<br>";



// 2. _________________________________________________________________________________isset(): Devuelve TRUE si la variable ha sido inicializada y no es NULL, FALSE en otro caso

$var3 = "";
echo "isset(\$var3): " . (isset($var3) ? 'TRUE' : 'FALSE') . "<br>";  // TRUE (aunque está vacía, está inicializada)

$var4 = NULL;
echo "isset(\$var4): " . (isset($var4) ? 'TRUE' : 'FALSE') . "<br>";  // FALSE (porque es NULL)

echo "<br>";



// 3. _________________________________________________unset(): Elimina la variable

$var5 = "Algo";
unset($var5);  // Elimina $var5
echo isset($var5) ? 'La variable existe' : 'La variable ha sido eliminada';  // Salida: La variable ha sido eliminada

echo "<br><br>";



// 4. ______________________________________________in________________empty(): Devuelve TRUE si la variable no ha sido inicializada o tiene un valor vacío o falso (como 0, "", NULL)

$var6 = "";
echo "empty(\$var6): " . (empty($var6) ? 'TRUE' : 'FALSE') . "<br>";  // TRUE (porque está vacía)

$var7 = 0;
echo "empty(\$var7): " . (empty($var7) ? 'TRUE' : 'FALSE') . "<br>";  // TRUE (porque el valor es 0)

$var8 = "Texto";
echo "empty(\$var8): " . (empty($var8) ? 'TRUE' : 'FALSE') . "<br>";  // FALSE (porque tiene un valor)

echo "<br>";



// 5. ________________________________________________________________________________________is_int(), is_float(), is_bool(), is_array(): Verifican el tipo de la variable

$var9 = 123;
echo "is_int(\$var9): " . (is_int($var9) ? 'TRUE' : 'FALSE') . "<br>";  // TRUE (es entero)

$var10 = 3.14;
echo "is_float(\$var10): " . (is_float($var10) ? 'TRUE' : 'FALSE') . "<br>";  // TRUE (es float)

$var11 = true;
echo "is_bool(\$var11): " . (is_bool($var11) ? 'TRUE' : 'FALSE') . "<br>";  // TRUE (es booleano)

$var12 = array(1, 2, 3);
echo "is_array(\$var12): " . (is_array($var12) ? 'TRUE' : 'FALSE') . "<br>";  // TRUE (es un array)

echo "<br>";



// 6. _______________________________________________________________________________________print_r() y var_dump(): Muestran información sobre una variable

$var13 = array("a" => 1, "b" => 2, "c" => 3);
echo "Con print_r():<br>";
print_r($var13);  // Muestra el array de forma legible

echo "<br><br>";

echo "Con var_dump():<br>";
var_dump($var13);  // Muestra el array con más detalles, incluyendo el tipo y tamaño

echo "<br><br>";



// 7. ________________________________________________________________Funciones con parámetros variables

function sumaValores() {
    $arrayArgs = func_get_args();  // Obtiene un array con los parámetros
    $cantidad = func_num_args();   // Obtiene la cantidad de parámetros
    $suma = 0;
    for ($i = 0; $i < $cantidad; $i++) {
        $suma += $arrayArgs[$i];
    }
    return $suma;
}
echo "Suma de 10, 20 y 30: " . sumaValores(10, 20, 30) . "<br>";  // Salida: 60

echo "<br>";



// 8. ________________________________________________________________________________________Argumentos con nombre (desde PHP 8.0)

function saludar($nombre, $edad) {
    echo "Hola, soy $nombre y tengo $edad años.<br>";
}
saludar(nombre: "Juan", edad: 25);  // Los parámetros se pasan por nombre

echo "<br>";



// 9. _____________________________________________________________________________________________Funciones tipadas (desde PHP 7)

declare(strict_types=1);  // Activar el chequeo estricto de tipos
function multiplicar(int $a, int $b): int {
    return $a * $b;
}
echo "Multiplicación de 2 y 3: " . multiplicar(2, 3) . "<br>";  // Salida: 6

// Si intentas pasar un valor incorrecto (por ejemplo, un string), generará un error debido a `strict_types`.

echo "<br>";



// ___________________________________________________________________________________________________10. Funciones variables

function decirHola() {
    echo "¡Hola!<br>";
}
$func = "decirHola";  // Asignamos el nombre de la función a una variable
$func();  // Llamamos a la función a través de la variable