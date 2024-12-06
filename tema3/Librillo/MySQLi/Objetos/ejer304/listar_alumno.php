<?php
$titulo = "Listado de Alumnos"; // Título de la página
include('encabezado.php'); // Incluye el encabezado
include('conexion.php'); // Incluye la conexión a la base de datos
?>

<h1>Listado de Alumnos</h1>
<div id="cont_agregar">
    <a href="formulario_agregar_alumno.php">
        <button>Agregar</button>
    </a>
</div>
<div id="contenedor">
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Primer apellido</th>
                <th>Segundo apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Curso</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta a la base de datos
            $consulta = "SELECT * FROM `alumnos`";
            // Guarda los registros en un array
            $listarAlumnos = mysqli_query($conexion, $consulta);

            // Comprobamos si el servidor nos ha devuelto resultados
            if ($listarAlumnos) {
                // Recorremos cada resultado que nos devuelve el servidor
                foreach ($listarAlumnos as $alumnos) {
                    // Recorremos el array asociativo y mostramos los datos en filas de la tabla
                    echo "<tr>";
                    echo "<td>" . $alumnos['dni'] . "</td>";
                    echo "<td>" . $alumnos['nombre'] . "</td>";
                    echo "<td>" . $alumnos['apellido1'] . "</td>";
                    echo "<td>" . $alumnos['apellido2'] . "</td>";
                    echo "<td>" . $alumnos['email'] . "</td>";
                    echo "<td>" . $alumnos['telefono'] . "</td>";
                    echo "<td>" . $alumnos['curso'] . "</td>";
                    echo "<td><a href='formulario_modificar_alumno.php?id_alumno=" . $alumnos['id_alumno'] . "'><button type='button'>Modificar</a></td>";
                    echo "<td><a href='eliminar_alumno.php?id_alumno=" . $alumnos['id_alumno'] . "'><button type='button'>Eliminar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>Error en la consulta</td></tr>";
            }
            ?>
        </tbody>
    

    </table>
</div>
<?php
include('pie.php'); // Incluye el pie de página
?>