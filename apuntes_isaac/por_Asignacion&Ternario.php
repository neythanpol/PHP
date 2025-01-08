<?php

$miArray = [
    "uno" => 1,
    "dos" => 2,
    "tres" => 3
];

// Función que modifica el array usando foreach y referencia
function modificarArray(&$array) {
    // Iteramos sobre el array con foreach usando una referencia en el valor
    foreach ($array as $clave => &$valor) {
        $valor += 10; // Modificamos el valor directamente
    }
}

//operador ternario

// Variable que almacenará una edad
$edad = 20;

// Usamos el operador ternario para verificar si la edad es mayor o igual a 18
// Si la condición $edad >= 18 es verdadera, se asigna 'Es mayor de edad'
// Si la condición es falsa, se asigna 'Es menor de edad'

$mensaje = ($edad >= 18) ? 'Es mayor de edad' : 'Es menor de edad';

// Mostramos el mensaje en pantalla
echo $mensaje;

// En este caso, como $edad es 20 (mayor de 18), el mensaje será: "Es mayor de edad"