<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Funciones de array</title>
</head>
<body>
    <?php
    // Haciendo uso de un array que almacene el nombre de las funciones del archivo anterior, a partir de dos números recibidos por URL, recorre el array e invoca a las funciones de manera dinámica haciendo uso de funciones variable.
    include_once("228biblioteca.php");

    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];

    $funciones = array("sumar", "restar", "multiplicar", "dividir");

    foreach ($funciones as $funcion) {
        $resultado = $funcion($num1, $num2);
        echo "La función $funcion de $num1 y $num2 es igual a $resultado<br>";
    }
    ?>
</body>
</html>