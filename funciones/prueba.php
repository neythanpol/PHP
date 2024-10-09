<?php
declare(strict_types=1);
    function digitos (int $num): int {
        return strlen((string)$num);
    }


    function digitoN (int $num, int $pos): int {
        $cadena = (string)$num;
        return (int)$cadena[$pos];
    }

    echo digitoN(140, 1)."<br>";