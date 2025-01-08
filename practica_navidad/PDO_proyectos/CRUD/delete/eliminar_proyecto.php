<?php
$titulo = "Eliminar proyecto";
include('../../../includes/encabezado.php');
include('../../../conexion/conexionPDO.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = filtrado($_GET['id']);
    $conexion = obtenerConexion();

    if ($conexion) {
        try {
            // Obtener los datos del proyecto
            $sql = "SELECT * FROM proyecto WHERE id_proyecto = :id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $proyecto = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($proyecto) {
                // Mostrar el formulario de confirmación
                ?>
                <h2>Eliminar Proyecto</h2>
                <p>¿Estás seguro de que deseas eliminar el proyecto <?= htmlspecialchars($proyecto['titulo']) ?>?</p>
                <form action="eliminar_proyecto.php" method="post">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($proyecto['id_proyecto']) ?>">
                    <button type="submit">Eliminar proyecto</button>
                    <a href="../read/lista_proyectos.php"><button type="button">Cancelar</button></a>
                </form>
                <?php
            } else {
                echo "Proyecto no encontrado.";
            }
        } catch (PDOException $e) {
            echo "Error al obtener los detalles del proyecto: " . $e->getMessage();
        }
    } else {
        echo "Error en la conexión a la base de datos.";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar la eliminación del proyecto
    $id = filtrado($_POST['id']);
    $conexion = obtenerConexion();

    if ($conexion) {
        try {
            // Eliminar el proyecto
            $sql = "DELETE FROM proyecto WHERE id_proyecto = :id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // Redirigir a listar_proyecto.php después de la eliminación
            header("Location: ../read/lista_proyectos.php");
            exit();
        } catch (PDOException $e) {
            echo "Error al eliminar el proyecto: " . $e->getMessage();
        }
    } else {
        echo "Error en la conexión a la base de datos.";
    }
} else {
    echo "ID de proyecto no proporcionado.";
}

include('../../../includes/pie.php');
?>