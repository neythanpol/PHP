<?php
//Crear un array asociativo, donde guardes de 5 países (claves) sus capitales (valor). Recorre el array mostrando por cada país toda la información ("La capital de España es Madrid"). En ese mismo recorrido crea dos arrays simples, uno que contenga las capitales y otro los países. Recórrelos, en este caso con un for.
$paisesCapitales = array(
    "España" => "Madrid",
    "Italia" => "Roma",
    "Alemania" => "Berlín",
    "Venezuela" => "Caracas",
    "Perú" => "Lima"
);

$paises = array();
$capitales = array();

foreach ($paisesCapitales as $pais => $capital){
    echo "La capital de $pais es $capital<br>";
    $paises[] = $pais;
    $capitales[] = $capital;
}

for ($i=0; $i < 5; $i++) { 
    echo $paises[$i]."<br>";
}

for ($i=0; $i < 5; $i++) { 
    echo $capitales[$i]."<br>";
}