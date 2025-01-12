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
    echo $unserializedLolo -> getApellido() . "<br>";

    // Comprobar si el objeto deserializado también funciona con la función
    echo $unserializedLolo -> debePagarImpuestos() ? "Debe pagar impuestos<br>" : "No debe pagar impuestos<br>";

    // Añadir un teléfono al array
    $unserializedLolo -> anadirTelefono(979101606);
    $unserializedLolo -> anadirTelefono(689157848);

    // Devuelve la lista de números del empleado
    echo $unserializedLolo -> listarTelefonos() . "<br>";

    // Limpia la lista de teléfonos del empleado
    $unserializedLolo -> vaciarTelefonos();
?>