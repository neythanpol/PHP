
<?php
    /* declaración de variables */
    $entero = 4; // tipo integer
    echo 'El valor de $entero es '.$entero." y es de tipo ".gettype($entero);
    echo "<br>";
    $numero = 4.5;   // tipo coma flotante
    echo 'El valor de $numero es '.$numero." y es de tipo ".gettype($numero);
    echo "<br>";
    $cadena = "cadena"; // tipo cadena de caracteres
    echo 'El valor de $cadena es '.$cadena." y es de tipo ".gettype($cadena);
    echo "<br>";
    $bool = true; //tipo booleano
    echo 'El valor de $bool es '.$bool." y es de tipo ".gettype($bool);
    echo "<br>";
    /* cambio de tipo de una variable */
    $a = 5; // entero
    echo gettype($a); // imprime el tipo de dato de a
    echo "<br>";
    $a = "Hola"; // cambia a cadena
    echo gettype($a); // se comprueba que ha cambiado
