<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natan Blanco">
    <title>Funcion capitales</title>
</head>
<body>
    <?php
    function obtenerCapital($pais = null){
        $capitales = array(
            "España" => "Madrid",
            "Italia" => "Roma",
            "Alemania" => "Berlin",
            "Portugal" => "Lisboa",
            "Francia" => "Paris"
        );
        if ($pais === null) {
            echo "Esta es la lista de países<br>";
            foreach ($capitales as $pais => $capital) {
                echo "$pais: $capital<br>";
            }
        }else {
            if (isset($capitales[$pais])) {
                return "La capital del pais es ".$capitales[$pais];
            }else {
                return "No conozco la capital del país";
            }
        }
    }
    echo obtenerCapital();
    echo "<br><br>";
    echo obtenerCapital("España");
    echo "<br><br>";
    echo obtenerCapital("Jovenlandia");
    ?>
</body>
</html>