<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Parámetros variables</title>
</head>
<body>
    <?php
    // Crea las siguientes funciones
    // Una función que devuelva el mayor de todos los números recibidos como parámetros: function mayor(): int. Utiliza las funciones func_get_args(), etc... No puedes usar la función max().
    function mayor(): int{
        $numero = func_get_args();

        echo "Número de argumentos: ".count($numero)."<br>";

        $mayor = $numero[0];
        foreach ($numero as $valor) {
            if ($valor > $mayor) {
                $mayor = $valor;
            }
        }
        return $mayor;
    }

    echo "El mayor es: ".mayor(4, 6, 3);

    echo "<br><br><br>";
    // Una función que concatene todos los parámetros recibidos separándolos con un espacio: function concatenar(...$palabras) : string. Utiliza el operador ...
    function concatenar(...$palabras): string{
        return implode(" ", $palabras);
    }

    echo concatenar("caballo", "ventana", "cielo", "piscina");
    ?>
</body>
</html>