<?php
//funciones para CADENAS de texto


$palabras = explode(' ', $texto); // Divide la cadena en un array de palabras por cada " " es una posicion del array



// Convertir el string en un array de caracteres
$caracteres = str_split($texto);

array_key_exists();
str_word_count();

printf
$nombre = "Juan";
$edad = 30;
$resultado = sprintf("Hola, mi nombre es %s y tengo %d años.", $nombre, $edad);
echo $resultado; // Salida: Hola, mi nombre es Juan y tengo 30 años.