<?php
    // Crea una variable $valor y asígnale un valor de tipo entero. Usa la función gettype() para mostrar el tipo de dato de la variable y luego cambia el valor de la variable a un valor de tipo cadena (string). Vuelve a mostrar el tipo de dato después del cambio.

    $valor = 100; // Valor de tipo entero

    echo gettype($valor); // La función nos muestra el tipo de la variable, en este caso integer

    $valor = "Cadena"; // Cambiamos a tipo string

    echo gettype($valor); // Ahora nos muestra que es string
?>