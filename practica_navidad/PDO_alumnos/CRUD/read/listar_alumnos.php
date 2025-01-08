<?php
$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : 'dni';
$order_dir = isset($_GET['order_dir']) ? $_GET['order_dir'] : 'ASC';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 10;
$offset = ($page - 1) * $records_per_page;

$valid_columns = ['dni', 'nombre', 'apellido1', 'telefono', 'email', 'curso'];
if (!in_array($order_by, $valid_columns)) {
    $order_by = 'dni';
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

$titulo = "Listado de Alumnos"; // Título de la página
include('../../../includes/encabezado.php'); // Incluye el encabezado
include('../../../conexion/conexionPDO.php'); // Incluye la conexión a la base de datos
?>
<header>
    <h1>Listado de Alumnos</h1>
</header>
<main>
    <div id="cont_agregar">
        <a href="../create/agregar_alumno.php">
            <button id="boton">Agregar</button>
        </a>
    </div>
    <div id="contenedor">
        <table>
            <thead>
                <tr>
                    <th><a href="?order_by=dni&order_dir=<?= toggleOrderDir($order_dir, $order_by, 'dni')?>">DNI<?= getOrderIndicator('dni', $order_by, $order_dir) ?></a></th>
                    <th><a href="?order_by=nombre&order_dir=<?= toggleOrderDir($order_dir, $order_by, 'nombre')?>">Nombre<?= getOrderIndicator('nombre', $order_by, $order_dir) ?></a></th>
                    <th><a href="?order_by=apellido1&order_dir=<?= toggleOrderDir($order_dir, $order_by, 'apellido1')?>">Apellidos<?= getOrderIndicator('apellido1', $order_by, $order_dir) ?></a></th>
                    <th><a href="?order_by=telefono&order_dir=<?= toggleOrderDir($order_dir, $order_by, 'telefono')?>">Teléfono<?= getOrderIndicator('telefono', $order_by, $order_dir) ?></a></th>
                    <th><a href="?order_by=email&order_dir=<?= toggleOrderDir($order_dir, $order_by, 'email')?>">Email<?= getOrderIndicator('email', $order_by, $order_dir) ?></a></th>
                    <th><a href="?order_by=curso&order_dir=<?= toggleOrderDir($order_dir, $order_by, 'curso')?>">Curso<?= getOrderIndicator('curso', $order_by, $order_dir) ?></a></th>
                    <th>Detalles</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $conexion = obtenerConexion();

                    // Consulta a la base de datos con ordenación y paginación
                    $sql = "SELECT * FROM `alumnos` ORDER BY $order_by $order_dir LIMIT $records_per_page OFFSET $offset";

                    // Guarda los registros en un array
                    $query = $conexion->query($sql);
                    $alumnos = $query->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($alumnos as $alumno) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($alumno['dni']) . "</td>";
                        echo "<td>" . htmlspecialchars($alumno['nombre']) . "</td>";
                        echo "<td>" . htmlspecialchars($alumno['apellido1']) . " " . htmlspecialchars($alumno['apellido2']) . "</td>";
                        echo "<td>" . htmlspecialchars($alumno['telefono']) . "</td>";
                        echo "<td>" . htmlspecialchars($alumno['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($alumno['curso']) . "</td>";
                        echo "<td><a href='busqueda_id.php?id=" . htmlspecialchars($alumno['id_alumno']) . "'>Ver Detalles</a></td>";
                        echo "<td><a href='../update/modificar_alumno.php?id=" . htmlspecialchars($alumno['id_alumno']) . "'>Modificar</a></td>";
                        echo "<td><a href='../delete/eliminar_alumno.php?id=" . htmlspecialchars($alumno['id_alumno']) . "'>Eliminar</a></td>";
                        echo "</tr>";
                    }

                    // Obtener el número total de registros
                    $sql_total = "SELECT COUNT(*) AS total FROM alumnos";
                    $total_records = $conexion->query($sql_total)->fetchColumn();
                    $total_pages = ceil($total_records / $records_per_page);

                } catch (PDOException $e) {
                    echo "Error al obtener los alumnos: " . $e->getMessage();
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