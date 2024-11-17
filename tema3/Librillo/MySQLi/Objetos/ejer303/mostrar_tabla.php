<?php
    // Incluye el archivo de conexión
    include "conexion.php";

    // Ejecuta la consulta SQL
    $consulta = "SELECT * FROM `persona`";
    // Guardar los registros en un array
    $listaPersonas = mysqli_query($conexion, $consulta);
    $resultado = $conexion -> query($consulta);
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
    <h2>Lista de Personas</h2><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
        </tr>
        <?php
            if ($listaPersonas -> num_rows > 0) {
                // Recorre cada fila del resultado
                while($row = $resultado -> fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id_persona"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["apellidos"] . "</td>";
                    echo "<td>" . $row["telefono"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No hay resultados</td></tr>";
            }
        ?>
    </table>
</body>
</html>