<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natan Blanco"> 
    <title>Ecuacion 2 grado</title>
</head>
<body>
    <?php
    $a = 1;
    $b = 2;
    $c = 3;

    $x = 0;
    $raiz = ($b * $b) - (4 * $a * $c);
    if ($raiz > 0) {
        $x = (-$b + sqrt(($b * $b) - (4 * $a * $c))) / 2 * $a;
        echo "La primera solución es $x";
        $x = (-$b - sqrt(($b * $b) - (4 * $a * $c))) / 2 * $a;
        echo "La primera solución es $x";
    }elseif($raiz < 0){
        echo "La ecuación no se puede hacer";
    }else{
        
    }
    ?>
</body>
</html>