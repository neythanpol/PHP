<?php
    // Define una constante llamada PI con el valor 3.14159. Usa esta constante para calcular el área de un círculo dado su radio, almacenado en la variable $radio. La fórmula del área es: Area = PI x radio al cuadrado
    // Muestra el resultado con un mensaje
    $radio = 15;
    const PI = 3.14159;

    $area = PI * (pow($radio, 2));

    echo "El área del círculo con radio $radio es: $area";
?>