<?php    
    function calculador($operacion, $numa, $numb){        
        $resul = $operacion($numa, $numb);
        return $resul;
    }
    function sumar($a, $b){
        return $a + $b;
    }
    function multiplicar($a, $b){
        return $a * $b;
    }
    function restar($a, $b){
        return $a - $b;
    }
    function dividir($a, $b){
        if($a || $b == 0){
            echo "No se puede dividir";
        }else{
            return $a / $b;
        }
    }
    function potencia($a, $b){
        return pow($a, $b);
    }
?>