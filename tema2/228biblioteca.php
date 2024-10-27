<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Biblioteca</title>
</head>
<body>
    <?php
    // Crea un archivo con funciones para sumar, restar, multiplicar y dividir dos números.
    function sumar($num1, $num2): float{
        $resultadoSumar = $num1 + $num2;
        return $resultadoSumar;
    }

    function restar($num1, $num2): float{
        $resultadoRestar = $num1 - $num2;
        return $resultadoRestar;
    }

    function multiplicar($num1, $num2): float{
        $resultadoMultiplicar = $num1 * $num2;
        return $resultadoMultiplicar;
    }

    function dividir($num1, $num2): float{
        if($num2 === 0){
            echo "No se puede dividir un número entre 0";
        }else{
            $resultadoDividir = $num1 / $num2;
            return $resultadoDividir;
        }
    }

    echo sumar(4, 7)."<br><br>";
    echo restar(4, 7)."<br><br>";
    echo multiplicar(4, 7)."<br><br>";
    echo dividir(4, 7)."<br><br>";
    ?>
</body>
</html>