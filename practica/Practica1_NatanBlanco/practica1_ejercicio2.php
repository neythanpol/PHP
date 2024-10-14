<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natan Blanco">
    <title>Ejercicio 2</title>
    <style>

    </style>
</head>
<body>
<h1>Notas</h1>
    <table>
        <thead>
            <tr>
                <th>A</th>
                <th>B</th>
                <th>C</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $datos_notas = [[],[]];
            $suspensosA = 0;
            $suspensosB = 0;
            $suspensosC = 0;
            $aprobadosA = 0;
            $aprobadosB = 0;
            $aprobadosC = 0;
            $mediaA = 0;
            $mediaB = 0;
            $mediaC = 0;
            for ($i = 0; $i < 30; $i++) {
                for ($j = 0; $j < 3; $j++) {
                    array_push($datos_notas[$i][$j], rand(0, 10));
                    if ($datos_notas[$i][0] < 5) {
                        $suspensosA++;
                    }else{
                        $aprobadosA++;
                    }
                    if ($datos_notas[$i][1] < 5) {
                        $suspensosB++;
                    }else{
                        $aprobadosB++;
                    }
                    if ($datos_notas[$i][2] < 5) {
                        $suspensosC++;
                    }else{
                        $aprobadosC++;
                    }
                    echo "<td>$datos_notas[$i][$j]</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>