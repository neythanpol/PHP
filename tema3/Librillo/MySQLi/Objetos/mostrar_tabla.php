<?php
    // Incluye el archivo de conexión
    include "conexion.php";

    // Ejecuta la consulta SQL
    $consulta = "SELECT * FROM alumnos";
    // Guardar los registros en un array
    $listaAlumnos = mysqli_query($mysqli_conexion, $consulta);
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
    <h2>Lista de Alumnos</h2><br>
    <table>
        <tr>
            <th>ID Alumno</th>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Curso</th>
        </tr>
        <?php
            if ($listaAlumnos -> num_rows > 0) {
                // Recorre cada fila del resultado
                while($row = $resultado -> fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id_alumno"] . "</td>";
                    echo "<td>" . $row["dni"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["apellido1"] . "</td>";
                    echo "<td>" . $row["apellido2"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["telefono"] . "</td>";
                    echo "<td>" . $row["curso"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No hay resultados</td></tr>";
            }
        ?>
    </table>
</body>
</html>