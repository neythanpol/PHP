<?php
    // Crea una variable $edad con un valor numérico. Luego, convierte ese valor a un tipo de dato texto (string) y muéstralo utilizando echo
    $edad = 25;
    echo gettype($edad);
    echo " Aquí la edad de $edad es un valor entero";

    echo "<br>";
    $edad = "25";
    echo gettype($edad);
    echo " Aquí en cambio la variable edad $edad es de tipo string";

    // El método gettype nos devuelve el tipo de dato de la variable que le pasamos por parámetro
?>