<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Ejercicio 7</title>
</head>
<body>
    <?php
    // Crea un array asociativo de 4 elementos cuya clave será un tipo de mueble: armario, mesa, .... y valor el peso del mueble.

    // Recórrelo mostrando claves y valores, guardándolos en dos arrays simples en el recorrido.

    // Ordena el array por peso

    // Hecho esto, crea otro array asociativo, donde guardes los mismos datos pero en orden inverso del siguiente modo: sacando los datos del primero (empezando por el último dato) y metiéndolo en el segundo.
    
    // Muestra los resultados del segundo.

    // Creo el array asociativo con valores inventados
    $muebles = array(
        "armario" => 150,
        "mesa" => 70,
        "silla" => 15,
        "estanteria" => 50
    );

    // Creo dos arrays simples donde meto los valores del array asociativo
    $soloMuebles = array();
    $soloPeso = array();

    // Recorro el array asociativo 
    foreach ($muebles as $mueble => $peso) {
        // Mostrando las claves y sus respectivos valores
        echo "$mueble -> $peso<br>";
        // Añadiendo las claves al array simple de claves
        array_push($soloMuebles, $mueble);
        // Añadiendo los valores al array simple de valores
        array_push($soloPeso, $peso);
    }
    // Ordeno el array por su valor de menor a mayor
    asort($muebles);
    echo "<br><br>";
    //print_r($muebles);

    // Creando otro array asociativo con los datos inversos
    $mueblesInverso = array(
        "" => 0,
        "" => 0,
        "" => 0,
        "" => 0
    );
    $cont = 0;

    /*for ($i=(count($muebles)-1); $i >= 0; $i--) { 
        $mueblesInverso[$i] = $muebles[$cont];
        $cont++;
    }
    echo "<br><br>";
    print_r($mueblesInverso);*/
    ?>
</body>
</html>