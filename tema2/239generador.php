<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Generador</title>
</head>
<body>
    <?php
    // Crea una función que permite generar una letra aleatoria, mayúscula o minúscula, dependiendo de lo que yo quiera.
    
    function generarLetraAleatoria($letra) {
        // Abecedario en minúsculas y mayúsculas
        $abecedarioMinusculas = "abcdefghijklmnopqrstuvwxyz";
        $abecedarioMayusculas = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    
        // Genera un número aleatorio para obtener una letra
        $aleatorio = rand(0, 25); // Índices del 0 al 25 para las 26 letras del abecedario

        // Retorna la letra en mayúscula o minúscula según el tipo especificado
        if ($letra === 'mayuscula') {
            return $abecedarioMayusculas[$aleatorio];
        } elseif ($letra === 'minuscula') {
            return $abecedarioMinusculas[$aleatorio];
        } else {
            return "La letra debe ser 'mayuscula' o 'minuscula'.";
        }
    }

    echo generarLetraAleatoria('mayuscula'); // Generará una letra mayúscula aleatoria
    echo "<br><br>";
    echo generarLetraAleatoria('minuscula'); // Generará una letra minúscula aleatoria
    ?>
</body>
</html>