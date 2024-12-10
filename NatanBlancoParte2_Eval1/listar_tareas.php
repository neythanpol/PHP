<?php
$titulo = "Listado de Tareas"; // Título de la página
include('encabezado.php'); // Incluye el encabezado
include('conexion.php'); // Incluye la conexión a la base de datos
?>

<h1>Listado de Alumnos</h1>
<div id="cont_agregar">
    <a href="formulario_agregar_tarea.php">
        <button>Agregar</button>
    </a>
</div>
<div id="contenedor">
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Fecha</th>
                <th>Prioridad</th>
                <th>Imagen</th>
                <th>Realizada</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta a la base de datos
            $consulta = "SELECT * FROM `tareas` ORDER BY prioridad";
            // Guarda los registros en un array
            $listartareas = mysqli_query($conexion, $consulta);

            // Comprobamos si el servidor nos ha devuelto resultados
            if ($listartareas) {
                // Recorremos cada resultado que nos devuelve el servidor
                foreach ($listartareas as $tareas) {
                    // Recorremos el array asociativo y mostramos los datos en filas de la tabla
                    echo "<tr>";
                    echo "<td>" . $tareas['titulo'] . "</td>";
                    echo "<td>" . $tareas['descripcion'] . "</td>";
                    echo "<td>" . $tareas['fecha'] . "</td>";
                    echo "<td>" . $tareas['prioridad'] . "</td>";
                    echo "<td>" . $tareas['img_tarea'] . "</td>";
                    echo "<td>" . $tareas['realizada'] . "</td>";
                    echo "<td><a href='formulario_modificar_alumno.php?id_alumno=" . $tareas['id_alumno'] . "'><button type='button'>Modificar</a></td>";
                    echo "<td><a href='eliminar_alumno.php?id_alumno=" . $tareas['id_alumno'] . "'><button type='button'>Eliminar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Error en la consulta</td></tr>";
            }
            ?>
        </tbody>
    

    </table>
</div>


<?php
include('pie.php'); // Incluye el pie de página
?>


<?php
include('pie.php'); // Incluye el pie de página
?>