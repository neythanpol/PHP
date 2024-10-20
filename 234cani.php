<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Estilo CaNi</title>
</head>
<body>
    <?php
    // EsCrIbE uNa FuNcIóN qUe TrAnSfOrMe UnA cAdEnA eN cAnI.
    $frase = "Ojala el viernes sea fiesta";
    $cont = 0; // El contador aumenta el número con cada espacio para que solo cuenten las letras

    for ($i=0; $i < mb_strlen($frase); $i++) {
        
        if ($frase[$i] !== " ") {
            if ($cont % 2 == 0) {
                $frase[$i] = mb_strtoupper($frase[$i]);
            }else{
                $frase[$i] = mb_strtolower($frase[$i]);
            }
            $cont++;
        }
        
        echo $frase[$i];
    }
    ?>
</body>
</html>