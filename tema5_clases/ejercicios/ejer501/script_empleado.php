<?php
    include_once 'clase_empleado.php';

    // Crear un objeto Empleado
    $lolo = new Empleado("Lolo", "Garcia", 1600);

    // Serializar el objeto
    $serializedLolo = serialize($lolo);
    echo $serializedLolo . "<br>";

    // Mostrar datos completos del empleado
    echo $lolo -> getDatosCompletos() . "<br>";

    // Comprobar si debe pagar impuestos
    echo $lolo -> debePagarImpuestos() ? "Debe pagar impuestos<br>" : "No debe pagar impuestos<br>";

    // Deserializar el objeto
    $unserializedLolo = unserialize($serializedLolo);

    // Mostrar datos del objeto deserializado
    echo "<br>" . $unserializedLolo -> getNombre() . "<br>";
    echo $unserializedLolo -> getApellido();

    // Comprobar si el objeto deserializado también funciona con la función
    echo $unserializedLolo -> debePagarImpuestos() ? "Debe pagar impuestos<br>" : "No debe pagar impuestos<br>";
?>