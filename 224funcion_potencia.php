<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natan Blanco">
    <title>Función potencias</title>
</head>
<body>
    <?php
    //Escribe una función para calcular potencias. Recibirá como argumentos la base y el exponente, que es opcional y tiene valor por defecto 2 (elevar al cuadrado)
    function calcularPotencia($base, $exp = 2){
        return pow($base, $exp);
    }
    ?>
</body>
</html>