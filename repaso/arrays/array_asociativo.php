<?php
    $banco = array(
        "nombre" => "Juan",
        "tipo_interes" => 25,
        "interes" => "Madrid",
        "comision" => "si"
    );

    
function mostrarPersona($persona) {
    foreach ($persona as $clave => $valor) {
        echo ucfirst($clave) . ": " . $valor . "\n";
    }
}

$persona = array(
    "nombre" => "Juan",
    "edad" => 25,
    "ciudad" => "Madrid",
    "profesion" => "Ingeniero"
);

// Definir la función mostrarPersona
function mostrarPersona($persona) {
    foreach ($persona as $clave => $valor) {
        echo ucfirst($clave) . ": " . $valor . "\n";
    }
}

// Definir un array asociativo de una persona
$persona = array(
    "nombre" => "Juan",
    "edad" => 25,
    "ciudad" => "Madrid",
    "profesion" => "Ingeniero"
);

// Llamar a la función con el array de la persona
mostrarPersona($persona);





    print_r($persona);

    function listadoBancos() {

    }
?>