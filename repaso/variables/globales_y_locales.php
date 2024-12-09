<?php
    // Crea una función llamada mostrarEdad() que acceda a una variable $edad global. Dentro de la función, usa la variable $edad y muéstrala con echo. Luego, fuera de la función, intenta acceder a la variable $edad y muestra su valor.
    $edad = 20;

    function mostrarEdad() {
        $edad = 10;
        echo $edad;
    }
    echo mostrarEdad();

    echo "<br>";
    echo $edad;
?>