<?php
    // Incluye el archivo de conexión
    include "conexion.php";

    // Ejecuta la consulta SQL
    $consulta = "SELECT * FROM empresa";
    $resultado = $mysqli_conexion -> query($consulta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco Rodríguez">
    <title>Tabla</title>
    <style>
        table{
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td{
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th{
            background-color: aquamarine;
        }
    </style>
</head>
<body>
    <h2>Lista de Empleados</h2><br>
    <table>
        <tr>
            <th>Número de Empleado</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
        </tr>
        <?php
            if ($resultado -> num_rows > 0) {
                // Recorre cada fila del resultado
                while($row = $resultado -> fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["num_empleado"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["apellidos"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No hay resultados</td></tr>";
            }
        ?>
    </table>
</body>
</html>