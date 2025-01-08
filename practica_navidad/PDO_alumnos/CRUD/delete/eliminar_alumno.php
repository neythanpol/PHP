<?php
$titulo = "Eliminar Alumno";
include('../../../includes/encabezado.php');
include('../../../conexion/conexionPDO.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = filtrado($_GET['id']);
    $conexion = obtenerConexion();

    if ($conexion) {
        try {
            // Obtener los datos del alumno
            $sql = "SELECT * FROM alumnos WHERE id_alumno = :id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $alumno = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($alumno) {
                // Mostrar el formulario de confirmación
                ?>
                <h2>Eliminar Alumno</h2>
                <p>¿Estás seguro de que deseas eliminar al alumno con DNI <?= htmlspecialchars($alumno['dni']) ?>?</p>
                <form action="eliminar_alumno.php" method="post">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($alumno['id_alumno']) ?>">
                    <button type="submit">Eliminar Alumno</button>
                    <a href="../read/listar_alumnos.php"><button type="button">Cancelar</button></a>
                </form>
                <?php
            } else {
                echo "Alumno no encontrado.";
            }
        } catch (PDOException $e) {
            echo "Error al obtener los detalles del alumno: " . $e->getMessage();
        }
    } else {
        echo "Error en la conexión a la base de datos.";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar la eliminación del alumno
    $id = filtrado($_POST['id']);
    $conexion = obtenerConexion();

    if ($conexion) {
        try {
            // Eliminar el alumno
            $sql = "DELETE FROM alumnos WHERE id_alumno = :id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // Redirigir a listar_alumnos.php después de la eliminación
            header("Location: ../read/listar_alumnos.php");
            exit();
        } catch (PDOException $e) {
            echo "Error al eliminar el alumno: " . $e->getMessage();
        }
    } else {
        echo "Error en la conexión a la base de datos.";
    }
} else {
    echo "ID de alumno no proporcionado.";
}

include('../../../includes/pie.php');
?>