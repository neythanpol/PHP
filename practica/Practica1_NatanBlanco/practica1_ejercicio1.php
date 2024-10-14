<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natan Blanco">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
        $num_numeros = $_GET["num_numeros"];
        $num_min = $_GET["num_min"];
        $num_max = $_GET["num_max"];
        
        function array1($num_numeros, $num_min, $num_max): array{
            $numeros1 = array();
            for ($i=0; $i < $num_numeros; $i++) { 
                array_push($numeros1, rand($num_min, $num_max));
            }
            return $numeros1;
        }
        
        function array2($num_numeros, $num_min, $num_max): array{
            $numeros2 = array();
            for ($i=0; $i < $num_numeros; $i++) { 
                array_push($numeros2, rand($num_min, $num_max));
            }
            return $numeros2;
        }

        function contarArray1(array &$array1, $num_min, $num_max): int{
            $contados = 0;
            $media = ($num_min + $num_max) / 2;
            foreach ($array1 as $array) {
                if ($array > $media) {
                    $contados++;
                }
            }
            return $contados;
        }

        function contarArray2(array &$array2, $num_min, $num_max): int{
            $contados = 0;
            $media = ($num_min + $num_max) / 2;
            foreach ($array2 as $array) {
                if ($array > $media) {
                    $contados++;
                }
            }
            return $contados;
        }

        $array1 = array1($num_numeros, $num_min, $num_max);
        echo print_r($array1)."<br>";
        $array2 = array2($num_numeros, $num_min, $num_max);
        echo print_r($array2)."<br";

        $contados = contarArray1($array1, $num_min, $num_max);
        echo $contados;
        if ($contados < contarArray2($array2, $num_min, $num_max)) {
            $contados = contarArray2($array2, $num_min, $num_max);
            echo "La segunda lista tiene mayor media";
        }else{
            echo "La primera lista tiene mayor media";
        }
    ?>
</body>
</html>