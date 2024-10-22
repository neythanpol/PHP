<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
    // Crea una función llamada operandoValores que recibe un número indefinido de enteros y devuelve la suma y el producto de los mismos
    function operandoValores(){
        // Usamos esta función para obtener el número de funciones
        $numero = func_get_args();

        // Decimos cuántos argumentos hay por pantalla
        echo "Número de argumentos: ".count($numero)."<br>";

        $suma = 0; // Variable para calcular la suma
        // Foreach para pasar por todos los parámetros a los que vamos sumando uno a uno
        foreach ($numero as $valor) {
            $suma += $valor;
        }

        $producto = 1; // Variable para calcular el producto
        // Foreach para pasar por todos los parámetros a los que vamos multiplicando uno a uno
        foreach ($numero as $valor) {
            $producto *= $valor;
        }
        return "La suma de los números es: $suma<br><br>El producto de los números es $producto";
    }
    // Prueba de la función
    echo operandoValores(2, 4, 6);
    ?>
</body>
</html>