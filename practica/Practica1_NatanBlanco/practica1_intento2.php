<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Array números</title>
</head>
<body>
    <?php
    // Crea un script que recoja datos desde URL: num_numeros,num_min y num_max (controla errores posibles).
    // num_numeros será el tamaño de un array de números: números
    // num_min y num_max determinan el rango al que pertenecen los números generados.
    // Guarda en contados cuantos hay menores a la mitad del rango y cuantos mayores.
    // Genera otro array números y vuelve a contar los menores y mayores a la mitad. Caso de haber más menores, nos quedaremos con el segundo números y cambiaremos el array.

    // Control de errores: Control que exista, control que se ponga el dato bien y control lógico (menor debe ser menor a mayor).
    $num_numeros = $_GET("num_numeros");
    $num_min = $_GET("num_min");
    $num_max = $_GET("num_max");
    $flag = true;

    while($flag){
        if ($num_min >= $num_max) {
            echo "Repite los números, recuerda que el mínimo debe ser menor al máximo";
            $num_min = $_GET("num_min");
            $num_max = $_GET("num_max");
        }else{
            $flag = false;
        }
    }

    function crearArray($num_numeros, $num_min, $num_max): array{
        $array1 = array();
        for ($i=0; $i < $num_numeros; $i++) { 
            $valor = rand($num_min, $num_max);
            array_push($array1, $valor);
        }
        return $array1;
    }

    $contados = ['menores' => 0, 'mayores' => 0];

    function contados($array1, &$contados): array{
        $contMenor = 0;
        $contMayor = 0;
        $media = $num_min;


        return $contados;
    }
    ?>
</body>
</html>