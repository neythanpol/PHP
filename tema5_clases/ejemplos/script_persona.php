<?php
    include_once 'clase_persona.php';

    $lolo = new Persona("Lolo", "Garcia");

    $serializedLolo = serialize($lolo);

    echo $serializedLolo . "<br>";

    $lolo -> imprimirNombreCompleto() . "<br>";

    $unserializedLolo = unserialize($serializedLolo);

    echo "<br>" . $unserializedLolo -> getNombre() . "<br>";
    echo $unserializedLolo -> getApellido();
?>