<?php
declare(strict_types=1);
    $arrDesord= [2,8,9,6,7,15,8,9,0];

    function mayor(): int {
        $arrOrd = func_get_args();
        for ($i = 0; $i < count($arrOrd)-1; $i++) {
            for ($j = 0; $j < count($arrOrd)-1; $j++) {  
                if ($arrOrd[$j] < $arrOrd[$j+1]) {
                    $numT = $arrOrd[$j];
                    $arrOrd[$j] = $arrOrd[$j+1];
                    $arrOrd[$j+ 1] = $numT;
                }            
            }
        }
        return $arrOrd[0];
    }

    echo mayor(2,8,9,6,7,8,9,0,15)."<br>";

    function concatenar(...$palabras): string {
        $cadena = "";
        foreach ($palabras as $palabra) {
            $cadena= $cadena.$palabra." ";
        }
        return $cadena;
    } 

    echo concatenar("Hola","soy","Jose");