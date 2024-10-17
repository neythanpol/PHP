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
    $frase = "Ojalá el viernes sea fiesta";
    $fraseNueva = str_split($frase, 1);
    $arrayMayus = array();
    $arrayMinus = array();
    $arrayUltimo = array();


    $count = 0;
    
    for ($i=0; $i < count($fraseNueva); $i++) { 
        if ($count % 2 === 0) {
            mb_strtoupper($fraseNueva[$i]);
        }else {
            mb_strtolower($fraseNueva[$i]);
        }
    }
    
    foreach ($fraseNueva as $frase1) {
        echo $frase1;
    }
    ?>
</body>
</html>