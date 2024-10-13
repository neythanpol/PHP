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
    session_start();
    // Inventa un array multidimensional de tipo asociativo.
    $ave = array(
        array("Nombre" => "Gorrión común", "Huevos/año" => 17, "Hábitat" => "Campo"),
        array("Nombre" => "Pato colorado", "Huevos/año" => 18, "Hábitat" => "Humedal")
    );
    print_r($ave);

    echo "<br><br>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $huevos = $_POST["huevos"];
        $habitat = $_POST["habitat"];

        // Añade datos y léelo.
        $nuevoAve = array("Nombre" => $nombre, "Huevos/año" => $huevos, "Hábitat" => $habitat);
        array_push($ave, $nuevoAve);

        // Realiza un cambio (por ejemplo aumentar la nómina). En mi caso aumentaré los huevos ya que consideramos que ha sido un año fértil.
        foreach ($ave as &$aves) {
            if(isset($aves["Huevos/año"])){
                $aves["Huevos/año"] += 2;
            }
        }
    }

    print_r($ave);

    echo "<br><br>";

    // Crea arrays unidimesionales donde guardes los datos en ese recorrido.
    $nombreArray = array();
    $huevosAñoArray = array();
    $habitatArray = array();

    foreach ($ave as $aves) {
        $nombreArray[] = $aves["Nombre"];
        $huevosAñoArray[] = $aves["Huevos/año"];
        $habitatArray[] = $aves["Hábitat"];
    }

    // Muestra posteriormente los datos de esos creados.
    print_r($nombreArray);

    echo "<br><br>";

    print_r($huevosAñoArray);

    echo "<br><br>";

    print_r($habitatArray);
    ?>
</body>
</html>