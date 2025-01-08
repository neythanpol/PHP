<?php

//PAres impares

function esPar($arrayAleatorios){
    $countP = 0;
    $countI = 0;
    $arrayGeneral = [
        'pares' => 0,
        'impares' => 0
    ];

    for ($i = 0; $i < count($arrayAleatorios); $i++) { 
        if ($arrayAleatorios[$i] % 2 == 0) {
            $countP ++;
        }else {
            $countI ++;
        }
    }

    return $arrayGeneral = [
        'pares' => $countP,
        'impares' => $countI,
        'resumen' => "en total hay $countP pares y $countI impares"
    ];
}


function generaArray($tam, $min, $max){
    $arrayAleatorios = [];
    

    for ($i= 0; $i <= $tam; $i++) { 
        $arrayAleatorios[$i] = rand($min, $max);
    }


    return esPar($arrayAleatorios);
}




function aleatorio(){
    $tam = 15;
    $min = 234;
    $max = 567;
    return (generaArray($tam, $min, $max));
}

$arraFinal =[];

$arraFinal= aleatorio();

function muestraRes($arraFinal){
    $count = 0;

    foreach ($arraFinal as $key => $value) {
        $count++;
        if ($count < 3) {
            echo ucfirst($key) ." : $value <br>";
        }else {
            echo "$value";
        }
    }
}

muestraRes($arraFinal);



echo "<br><br><br>";

