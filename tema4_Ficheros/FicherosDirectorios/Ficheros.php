<?php
$nombreArchivo = 'archivo.txt';

$archivo = fopen($nombreArchivo, 'r');  /*r -> Apertura para lectura*/

if ($archivo) {
    echo "El archivo se abrió correctamente.";
    fclose($archivo); // No olvides cerrar 
   } else {
    echo "No se pudo abrir '$nombreArchivo'.";
   }
   
?>