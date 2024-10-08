<?php
//Crea las siguientes funciones
//Una función que averigüe si un número es par
function esPar(int $num): bool {
    return $num % 2 === 0;
}
//Una función que devuelva un array de tamaño $tam con números aleatorios comprendido entre $min y $max 
function arrayAleatorio(int $tam, int $min, int $max): array {
    $array = [];
    for ($i = 0; $i < $tam; $i++) {
        $array[$i] = rand($min, $max);
    }
    return $array;
}
//Una función que reciba un $array por referencia y devuelva la cantidad de números pares que hay almacenados y los sustituya por 0
function arrayPares(array &$array): int {
    $contador = 0;
    foreach ($array as &$num) {
        if (esPar($num)) {
            $contador++;
            $num = 0;
        }
    }
    return $contador;
}
//Variables
$tam = 5;
$min = 1;
$max = 50;
//Recorremos la función para crear un array aleatorio dado su tamaño y su máximo y mínimo
$arrayAleatorio = arrayAleatorio($tam, $min, $max);
echo "Array aleatorio: ";
//Mostramos el array
foreach ($arrayAleatorio as $arrayAl){
    echo ($arrayAl)." | ";
}

echo "<br><br>";//Salto de línea para mejor comprensión

//Contamos los números pares y esos pares les cambiamos por un 0
$cantidadPares = arrayPares($arrayAleatorio);
echo "Cantidad de números pares: $cantidadPares<br>";
echo "Array después de sustituir pares por 0: ";
//Mostramos el array modificado
foreach ($arrayAleatorio as $pares){
    echo ($pares)." | ";
}
?>