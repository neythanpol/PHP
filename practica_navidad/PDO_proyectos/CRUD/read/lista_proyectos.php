<?php
$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : 'dni';
$order_dir = isset($_GET['order_dir']) ? $_GET['order_dir'] : 'ASC';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 10;
$offset = ($page - 1) * $records_per_page;

$valid_columns = ['titulo', 'descripcion', 'periodo', 'curso', 'fecha_presentacion', 'nota', 'logotipo', 'pdf_proyecto', 'alumno', 'tutor'];
if (!in_array($order_by, $valid_columns)) {
    $order_by = 'titulo';
}

if ($order_dir !== 'ASC' && $order_dir !== 'DESC') {
    $order_dir = 'ASC';
}

function toggleOrderDir($current_dir, $current_column, $new_column) {
    if ($current_column === $new_column) {
        return $current_dir === 'ASC' ? 'DESC' : 'ASC';
    }
    return 'ASC';
}

function getOrderIndicator($column, $order_by, $order_dir) {
    if ($column === $order_by) {
        return $order_dir === 'ASC' ? ' ▲' : ' ▼';
    }
    return '';
}

$titulo = "Listado de Proyectos"; // Título de la página
include('../../../includes/encabezado.php'); // Incluye el encabezado
include('../../../conexion/conexionPDO.php'); // Incluye la conexión a la base de datos
?>
<header>
    <h1>Listado de Alumnos</h1>
</header>
<main>
    <div id="cont_agregar">
        <a href="../create/agregar_proyecto.php">
            <button id="boton">Agregar</button>
        </a>
    </div>
    <div id="contenedor">
        <table>
            <thead>
                <tr>
                    <th><a href="?order_by=dni&order_dir=<?= toggleOrderDir($order_dir, $order_by, 'titulo')?>">Título<?= getOrderIndicator('titulo', $order_by, $order_dir) ?></a></th>
                    <th><a href="?order_by=nombre&order_dir=<?= toggleOrderDir($order_dir, $order_by, 'descripcion')?>">Descripción<?= getOrderIndicator('descripcion', $order_by, $order_dir) ?></a></th>
                    <th><a href="?order_by=apellido1&order_dir=<?= toggleOrderDir($order_dir, $order_by, 'periodo')?>">Periodo<?= getOrderIndicator('periodo', $order_by, $order_dir) ?></a></th>
                    <th><a href="?order_by=telefono&order_dir=<?= toggleOrderDir($order_dir, $order_by, 'curso')?>">Curso<?= getOrderIndicator('curso', $order_by, $order_dir) ?></a></th>
                    <th><a href="?order_by=email&order_dir=<?= toggleOrderDir($order_dir, $order_by, 'fecha_presentacion')?>">Fecha<?= getOrderIndicator('fecha_presentacion', $order_by, $order_dir) ?></a></th>
                    <th><a href="?order_by=curso&order_dir=<?= toggleOrderDir($order_dir, $order_by, 'nota')?>">Nota<?= getOrderIndicator('nota', $order_by, $order_dir) ?></a></th>
                    <th><a href="?order_by=curso&order_dir=<?= toggleOrderDir($order_dir, $order_by, 'logotipo')?>">Logotipo<?= getOrderIndicator('logotipo', $order_by, $order_dir) ?></a></th>
                    <th><a href="?order_by=curso&order_dir=<?= toggleOrderDir($order_dir, $order_by, 'pdf_proyecto')?>">PDF<?= getOrderIndicator('pdf_proyecto', $order_by, $order_dir) ?></a></th>
                    <th>Detalles Alumno</th>
                    <th>Detalles Tutor</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $conexion = obtenerConexion();

                    // Consulta a la base de datos con ordenación y paginación
                    $sql = "SELECT * FROM `proyecto` ORDER BY $order_by $order_dir LIMIT $records_per_page OFFSET $offset";

                    // Guarda los registros en un array
                    $query = $conexion->query($sql);
                    $proyectos = $query->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($proyectos as $proyecto) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($proyecto['titulo']) . "</td>";
                        echo "<td>" . htmlspecialchars($proyecto['descripcion']) . "</td>";
                        echo "<td>" . htmlspecialchars($proyecto['periodo']) . "</td>";
                        echo "<td>" . htmlspecialchars($proyecto['curso']) . "</td>";
                        echo "<td>" . htmlspecialchars($proyecto['fecha_presentacion']) . "</td>";
                        echo "<td>" . htmlspecialchars($proyecto['nota']) . "</td>";
                        echo "<td>" . htmlspecialchars($proyecto['logotipo']) . "</td>";
                        echo "<td>" . htmlspecialchars($proyecto['pdf_proyecto']) . "</td>";
                        echo "<td><a href='detalles_alumno.php?id=" . htmlspecialchars($proyecto['alumno']) . "'>Detalles Alumno</a></td>";
                        echo "<td><a href='detalles_tutor.php?id=" . htmlspecialchars($proyecto['tutor']) . "'>Detalles Tutor</a></td>";
                        echo "<td><a href='../update/modificar_proyecto.php?id=" . htmlspecialchars($proyecto['id_proyecto']) . "'>Modificar</a></td>";
                        echo "<td><a href='../delete/eliminar_proyecto.php?id=" . htmlspecialchars($proyecto['id_proyecto']) . "'>Eliminar</a></td>";
                        echo "</tr>";
                    }

                    // Obtener el número total de registros
                    $sql_total = "SELECT COUNT(*) AS total FROM proyecto";
                    $total_records = $conexion->query($sql_total)->fetchColumn();
                    $total_pages = ceil($total_records / $records_per_page);

                } catch (PDOException $e) {
                    echo "Error al obtener los proyectos: " . $e->getMessage();
                }
                ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?order_by=<?= $order_by ?>&order_dir=<?= $order_dir ?>&page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>
        </div>
    </div>
</main>
<?php
include('../../../includes/pie.php'); // Incluye el pie de página
?>
</body>
</html>