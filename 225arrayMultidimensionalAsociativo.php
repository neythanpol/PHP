<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Array Multidimensional Asociativo</title>
</head>
<body>
    <?php
    // Inventa un array multidimensional de tipo asociativo. 
    $ave = array(
        array("Nombre" => "Gorrión común", "Huevos/año" => 17, "Hábitat" => "Campo"),
        array("Nombre" => "Pato colorado", "Huevos/año" => 18, "Hábitat" => "Humedal")
    );
    echo "<pre>";
    print_r($ave);
    echo "</pre>";

    echo "<br><br>";

    // Añade datos y léelo.
    $nuevoAve = array("Nombre" => "Golondrina serrana", "Huevos/año" => 9, "Hábitat" => "Bosque");
    array_push($ave, $nuevoAve);
    echo "<pre>";
    print_r($ave);
    echo "</pre>";

    echo "<br><br>";

    // Realiza un cambio (por ejemplo aumentar la nómina). En mi caso aumentaré los huevos ya que consideramos que ha sido un año fértil.
    foreach ($ave as &$aves) {
        if(isset($aves["Huevos/año"])){
            $aves["Huevos/año"] += 2;
        }
    }
    echo "<pre>";
    print_r($ave);
    echo "</pre>";

    echo "<br><br>";

    // Crea arrays unidimesionales donde guardes los datos en ese recorrido.
    $nombre = array();
    $huevosAño = array();
    $habitat = array();

    foreach ($ave as $aves) {
        $nombre[] = $aves["Nombre"];
        $huevosAño[] = $aves["Huevos/año"];
        $habitat[] = $aves["Hábitat"];
    }

    // Muestra posteriormente los datos de esos creados.
    echo "<pre>";
    print_r($nombre);
    echo "</pre>";

    echo "<br><br>";

    echo "<pre>";
    print_r($huevosAño);
    echo "</pre>";

    echo "<br><br>";

    echo "<pre>";
    print_r($habitat);
    echo "</pre>";
    ?>
</body>
</html>