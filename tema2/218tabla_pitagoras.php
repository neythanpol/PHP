<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natan Blanco">
    <title>Tabla de Pitágoras</title>
    <style>
        table, th, td{
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th{
            background-color: aqua;
        }
        .principal{
            background-color: chartreuse;
        }
    </style>
</head>
<body>
<h1>Tabla de Pitágoras</h1>
    <table>
        <thead>
            <tr>
                <th>X</th>
                <?php
                //Cabecera de la tabla
                for ($i = 1; $i <= 10; $i++) {
                    echo "<th>$i</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            //Tabla de multiplicar
            for ($i = 1; $i <= 10; $i++) {
                echo "<tr>";
                //Columna principal
                echo "<th class='principal'>$i</th>"; // Estilo para la columna principal
                //Filas con las multiplicaciones
                for ($j = 1; $j <= 10; $j++) {
                    $resultado = $i * $j;
                    echo "<td>$resultado</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>