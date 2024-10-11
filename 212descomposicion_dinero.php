<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        <?php
            $dinero = 125;
            $total = $dinero;
            $billetes = [500, 200, 100, 50, 20, 10, 5, 2, 1];
            $nuevosBill = [];
            $cont = 0;
                echo "Disponemos del total de $dinero euros<br>";
        ?>
    </h1>
    <h2>Los billetes que necesitamos para llegar a esa cantidad son: </h2>
    <p>
        <?php
            for ($i=0; $i < count($billetes); $i++) { 
                if ($dinero >= $billetes[$i]) {
                    $dinero -= $billetes[$i];
                    array_push($nuevosBill, $billetes[$i]);
                    $cont++;
                }
            }
            foreach ($nuevosBill as $billete) {
                echo "$billete - ";
            }
            echo " Todos estos billetes ($cont) suman <strong>$total €</strong>";
        ?>
    </p>
</body>
</html>