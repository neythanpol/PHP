<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Matemáticas</title>
</head>
<body>
    <?php
    // Añade las siguientes funciones:
    // digitos(int $num): int → devuelve la cantidad de dígitos de un número.
    function digitos(int $num): int{
        $cont = 0; // Creo un contador para la cantidad de dígitos
        // Empiezo a dividir el número entre 10 hasta que el número redondeado hacia abajo sea igual a 0
        while ($num > 0) {
            $num = floor($num / 10);
            $cont++;
        }
        return $cont;

        // Podría haber utilizado simplemente una cadena como en las funciones siguientes y después sacar su longitud con strlen.
    }

    echo "La cantidad de dígitos del número es: ".digitos(512)."<br><br>";

    // digitoN(int $num, int $pos): int → devuelve el dígito que ocupa, empezando por la izquierda, la posición $pos.
    function digitoN(int $num, int $pos): int{
        $cadena = (string)$num;
        return (int)$cadena[$pos];
    }

    echo "El dígito devuelto es: ".digitoN(512, 0)."<br><br>";

    // quitaPorDetras(int $num, int $cant): int → le quita por detrás (derecha) $cant dígitos.
    function quitarPorDetras(int $num, int $cant): int{
        if ($cant === 0) {
            return $num;
        }else {
            $cadena = (string)$num;
            return (int)substr($cadena, 0, -$cant);
        }
    }

    echo "El resultado al quitar dígitos es: ".quitarPorDetras(512, 1)."<br><br>";

    // quitaPorDelante(int $num, int $cant): int → le quita por delante (izquierda) $cant dígitos.
    function quitaPorDelante(int $num, int $cant): int{
        $cadena = (string)$num;
        return (int)substr($cadena, $cant);
    }

    echo "El resultado al quitar dígitos es: ".quitaPorDelante(512, 1);
    ?>
</body>
</html>