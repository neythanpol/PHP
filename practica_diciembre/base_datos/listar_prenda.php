<?php
$titulo = "Listado de Prendas"; // Título de la página
include('encabezado.php'); // Incluye el encabezado
include('conexion.php'); // Incluye la conexión a la base de datos
?>

<h1>Listado de Prendas</h1>
<div id="cont_agregar">
    <a href="formulario_agregar_prenda.php">
        <button>Agregar</button>
    </a>
</div>
<div id="contenedor">
    <table>
        <thead>
            <tr>
                <th>Prenda</th>
                <th>Foto</th>
                <th>Precio</th>
                <th>Rebajada</th>
                <th>Rebaja</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta a la base de datos
            $consulta = "SELECT * FROM `rebajas_natan` ORDER BY rebaja DESC";
            // Guarda los registros en un array
            $listarPrendas = mysqli_query($conexion, $consulta);

            // Comprobamos si el servidor nos ha devuelto resultados
            if ($listarPrendas) {
                // Recorremos cada resultado que nos devuelve el servidor
                foreach ($listarPrendas as $prendas) {
                    // Recorremos el array asociativo y mostramos los datos en filas de la tabla
                    echo "<tr>";
                    echo "<td>" . ucfirst(strtolower(trim($prendas['prenda']))) . "</td>";
                    echo "<td>" . $prendas['foto'] . "</td>";
                    echo "<td>" . $prendas['precio'] . "€</td>";
                    echo "<td>" . $prendas['rebajada'] . "</td>";
                    echo "<td>" . $prendas['rebaja'] . "€</td>";
                    echo "<td><a href='formulario_modificar_prenda.php?id_prenda=" . $prendas['id_prenda'] . "'><button type='button'>Modificar</a></td>";
                    echo "<td><a href='eliminar_prenda.php?id_prenda=" . $prendas['id_prenda'] . "'><button type='button'>Eliminar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Error en la consulta</td></tr>";
            }
            ?>
        </tbody>
    

    </table>
</div>
<?php
include('pie.php'); // Incluye el pie de página
?>