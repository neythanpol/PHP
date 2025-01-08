<?php
// 1. __________________________________________________________________________________
// Ejercicio: Validar si un número es par o impar.
// Enunciado: Escribe un programa que determine si un número dado es par o impar.

function esParOImpar($numero) {
    if ($numero % 2 == 0) { // Verifica si el número es divisible por 2
        return "El número $numero es par.";
    } else {
        return "El número $numero es impar.";
    }
}
echo esParOImpar(10); // Prueba con un número par
echo esParOImpar(7);  // Prueba con un número impar
echo "<br>";

// 2. __________________________________________________________________________________
// Ejercicio: Comprobar si un número es positivo, negativo o cero.
// Enunciado: Escribe una función que clasifique un número como positivo, negativo o cero.

function clasificarNumero($numero) {
    if ($numero > 0) { // Si el número es mayor que 0
        return "El número $numero es positivo.";
    } elseif ($numero < 0) { // Si el número es menor que 0
        return "El número $numero es negativo.";
    } else { // Si el número es igual a 0
        return "El número es cero.";
    }
}
echo clasificarNumero(-5);
echo clasificarNumero(0);
echo clasificarNumero(7);
echo "<br>";

// 3. __________________________________________________________________________________
// Ejercicio: Determinar el mayor de tres números.
// Enunciado: Escribe una función que reciba tres números y devuelva el mayor de ellos.

function mayorDeTres($a, $b, $c) {
    if ($a >= $b && $a >= $c) { // Si $a es mayor que $b y $c
        return "El mayor es $a.";
    } elseif ($b >= $a && $b >= $c) { // Si $b es mayor que $a y $c
        return "El mayor es $b.";
    } else { // En cualquier otro caso, $c es el mayor
        return "El mayor es $c.";
    }
}
echo mayorDeTres(10, 15, 5);
echo mayorDeTres(7, 2, 15);
echo "<br>";

// 4. __________________________________________________________________________________
// Ejercicio: Contar los números del 1 al 10.
// Enunciado: Escribe un bucle que cuente e imprima los números del 1 al 10.

for ($i = 1; $i <= 10; $i++) { // Iteramos desde 1 hasta 10
    echo $i . " "; // Mostramos cada número
}
echo "<br>";

// 5. __________________________________________________________________________________
// Ejercicio: Imprimir una tabla de multiplicar.
// Enunciado: Escribe un bucle que imprima la tabla de multiplicar de un número dado.

function tablaDeMultiplicar($numero) {
    echo "Tabla de multiplicar del $numero:<br>";
    for ($i = 1; $i <= 10; $i++) { // Recorremos del 1 al 10
        echo "$numero x $i = " . ($numero * $i) . "<br>"; // Mostramos la multiplicación
    }
}
tablaDeMultiplicar(5);
echo "<br>";

// 6. __________________________________________________________________________________
// Ejercicio: Mostrar los números pares entre 1 y 50.
// Enunciado: Usa un bucle para mostrar todos los números pares entre 1 y 50.

echo "Números pares entre 1 y 50:<br>";
for ($i = 1; $i <= 50; $i++) {
    if ($i % 2 == 0) { // Verificamos si el número es divisible por 2
        echo $i . " ";
    }
}
echo "<br>";

// 7. __________________________________________________________________________________
// Ejercicio: Suma de los números en un array.
// Enunciado: Escribe una función que reciba un array de números y devuelva su suma.

function sumaArray($array) {
    $suma = 0;
    foreach ($array as $numero) { // Recorremos el array
        $suma += $numero; // Sumamos cada número al total
    }
    return $suma;
}
$numeros = [1, 2, 3, 4, 5];
echo "La suma del array es: " . sumaArray($numeros);
echo "<br>";

// 8. __________________________________________________________________________________
// Ejercicio: Contar la frecuencia de caracteres en una cadena.
// Enunciado: Escribe un programa que reciba una cadena y cuente cuántas veces aparece cada carácter.

function contarCaracteres($cadena) {
    $cadena = str_replace(" ", "", $cadena); // Eliminamos espacios
    $arrayCaracteres = str_split($cadena); // Convertimos la cadena en un array de caracteres
    return array_count_values($arrayCaracteres); // Contamos las repeticiones de cada carácter
}
$cadenaEjemplo = "murcielago vengador";
print_r(contarCaracteres($cadenaEjemplo));
echo "<br>";

// 9. __________________________________________________________________________________
// Ejercicio: Validar si un string es un palíndromo.
// Enunciado: Escribe una función que determine si un string es un palíndromo.

function esPalindromo($cadena) {
    $cadena = strtolower(str_replace(" ", "", $cadena)); // Eliminamos espacios y convertimos a minúsculas
    return $cadena === strrev($cadena); // Comparamos la cadena original con su versión invertida
}
echo esPalindromo("anilina") ? "Es un palíndromo" : "No es un palíndromo";
echo "<br>";
echo esPalindromo("Hola Mundo") ? "Es un palíndromo" : "No es un palíndromo";
echo "<br>";

// 10. __________________________________________________________________________________
// Ejercicio: Filtrar números mayores a un valor dado en un array.
// Enunciado: Escribe una función que reciba un array y un número límite, devolviendo solo los números mayores a ese límite.

function filtrarMayores($array, $limite) {
    return array_filter($array, function($numero) use ($limite) {
        return $numero > $limite; // Incluimos solo los números mayores al límite
    });
}
$numerosEjemplo = [10, 20, 5, 30, 15];
print_r(filtrarMayores($numerosEjemplo, 15));
echo "<br>";


// 11. __________________________________________________________________________________
// Ejercicio: Buscar el número mayor en un array.
// Enunciado: Escribe una función que reciba un array de números y devuelva el mayor.

function encontrarMayor($array) {
    $mayor = $array[0]; // Inicializamos el mayor como el primer elemento
    foreach ($array as $numero) { // Recorremos el array
        if ($numero > $mayor) { // Si encontramos un número mayor, lo actualizamos
            $mayor = $numero;
        }
    }
    return $mayor;
}
$numeros = [10, 50, 30, 70, 40];
echo "El número mayor es: " . encontrarMayor($numeros);
echo "<br>";

// 12. __________________________________________________________________________________
// Ejercicio: Contar palabras en una cadena.
// Enunciado: Escribe una función que reciba una cadena y devuelva el número de palabras.

function contarPalabras($cadena) {
    return str_word_count($cadena); // str_word_count cuenta las palabras en una cadena
}
$texto = "Hola mundo desde PHP";
echo "El número de palabras es: " . contarPalabras($texto);
echo "<br>";

// 13. __________________________________________________________________________________
// Ejercicio: Ordenar un array de números.
// Enunciado: Escribe un programa que ordene un array en orden ascendente.

function ordenarArray($array) {
    sort($array); // sort ordena el array en orden ascendente
    return $array;
}
$numeros = [30, 10, 50, 20, 40];
print_r(ordenarArray($numeros));
echo "<br>";

// 14. __________________________________________________________________________________
// Ejercicio: Comprobar si un valor existe en un array.
// Enunciado: Escribe una función que reciba un array y un valor, devolviendo si existe o no.

function valorExiste($array, $valor) {
    return in_array($valor, $array) ? "El valor existe" : "El valor no existe"; // in_array verifica la existencia de un valor
}
$numeros = [10, 20, 30, 40];
echo valorExiste($numeros, 30);
echo "<br>";
echo valorExiste($numeros, 50);
echo "<br>";

// 15. __________________________________________________________________________________
// Ejercicio: Crear un array asociativo de frutas y colores.
// Enunciado: Escribe un programa que genere un array asociativo de frutas y sus colores.

function generarArrayFrutas() {
    return [
        "manzana" => "rojo",
        "plátano" => "amarillo",
        "uva" => "morado",
        "naranja" => "naranja"
    ];
}
print_r(generarArrayFrutas());
echo "<br>";

// 16. __________________________________________________________________________________
// Ejercicio: Validar si un email es válido.
// Enunciado: Escribe una función que reciba un string y valide si es un email.

function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? "Email válido" : "Email no válido"; // filter_var valida emails
}
echo validarEmail("correo@ejemplo.com");
echo "<br>";
echo validarEmail("correo.ejemplo.com");
echo "<br>";

// 17. __________________________________________________________________________________
// Ejercicio: Generar números aleatorios en un rango.
// Enunciado: Escribe un programa que genere 10 números aleatorios entre 1 y 100.

function generarNumerosAleatorios() {
    $numeros = [];
    for ($i = 0; $i < 10; $i++) { // Generamos 10 números
        $numeros[] = rand(1, 100); // rand genera un número aleatorio
    }
    return $numeros;
}
print_r(generarNumerosAleatorios());
echo "<br>";

// 18. __________________________________________________________________________________
// Ejercicio: Calcular la media de un array.
// Enunciado: Escribe una función que calcule la media de los números en un array.

function calcularMedia($array) {
    $suma = array_sum($array); // array_sum suma todos los elementos
    $cantidad = count($array); // count cuenta los elementos
    return $suma / $cantidad; // Calculamos la media
}
$numeros = [10, 20, 30, 40, 50];
echo "La media es: " . calcularMedia($numeros);
echo "<br>";

// 19. __________________________________________________________________________________
// Ejercicio: Filtrar elementos de un array asociativo.
// Enunciado: Filtra un array asociativo para incluir solo los valores mayores a 50.

function filtrarArrayAsociativo($array) {
    return array_filter($array, function($valor) {
        return $valor > 50; // Incluimos solo los valores mayores a 50
    });
}
$arrayEjemplo = [
    "item1" => 30,
    "item2" => 60,
    "item3" => 90,
    "item4" => 40
];
print_r(filtrarArrayAsociativo($arrayEjemplo));
echo "<br>";

// 20. __________________________________________________________________________________
// Ejercicio: Concatenar cadenas de un array.
// Enunciado: Une todas las cadenas de un array en un solo string, separadas por comas.

function concatenarCadenas($array) {
    return implode(", ", $array); // implode une los elementos de un array con un separador
}
$cadenas = ["Hola", "mundo", "desde", "PHP"];
echo concatenarCadenas($cadenas);
echo "<br>";
?>