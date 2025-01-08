<?php
$titulo = "Detalles del Alumno";
include('../../../includes/encabezado.php');
include('../../../conexion/conexionPDO.php');

if (isset($_GET['id'])) {
    $id = filtrado($_GET['id']);
    $conexion = obtenerConexion();

    if ($conexion) {
        try {
            $sql = "SELECT * FROM alumnos WHERE id_alumno = :id";
            $stmt = $conexion -> prepare($sql);
            $stmt -> bindParam(':id', $id);
            $stmt -> execute();
            $alumno = $stmt -> fetch(PDO::FETCH_ASSOC);

            if ($alumno) {
                // Mostrar detalles del alumno
                echo "<h2>Detalles del Alumno</h2>";
                echo "<p>DNI: " . htmlspecialchars($alumno['dni']) . "</p>";
                echo "<p>Nombre: " . htmlspecialchars($alumno['nombre']) . "</p>";
                echo "<p>Primer Apellido: " . htmlspecialchars($alumno['apellido1']) . "</p>";
                echo "<p>Segundo Apellido: " . htmlspecialchars($alumno['apellido2']) . "</p>";
                echo "<p>Email: " . htmlspecialchars($alumno['email']) . "</p>";
                echo "<p>Teléfono: " . htmlspecialchars($alumno['telefono']) . "</p>";
                echo "<p>Curso: " . htmlspecialchars($alumno['curso']) . "</p>";
            } else {
                echo "Alumno no encontrado.";
            }
        } catch (PDOException $e) {
            echo "Error al obtener los detalles del alumno: " . $e -> getMessage();
        }
    } else {
        echo "Error en la conexión a la base de datos.";
    }
} else {
    echo "ID de alumno no proporcionado.";
}

include('../../../includes/pie.php');
?>