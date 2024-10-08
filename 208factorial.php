<?php
    $num = rand(0, 10);
    $factorial = 1;

    echo "El número es: $num<br>";
    
    for ($i=1; $i <= $num; $i++) { 
        $factorial = $factorial * $i;
    }
    echo "El factorial de $num es: $factorial";
?>