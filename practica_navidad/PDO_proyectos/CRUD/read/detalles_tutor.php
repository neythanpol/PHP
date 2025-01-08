<?php
$titulo = "Detalles del Tutor";
include('../../../includes/encabezado.php');
include('../../../conexion/conexionPDO.php');

if (isset($_GET['id'])) {
    $id = filtrado($_GET['id']);
    $conexion = obtenerConexion();

    if ($conexion) {
        try {
            $sql = "SELECT * FROM tutor WHERE id_tutor = :id";
            $stmt = $conexion -> prepare($sql);
            $stmt -> bindParam(':id', $id);
            $stmt -> execute();
            $tutor = $stmt -> fetch(PDO::FETCH_ASSOC);

            if ($tutor) {
                // Mostrar detalles del tutor
                echo "<h2>Detalles del tutor</h2>";
                echo "<p>Usuario: " . htmlspecialchars($tutor['login']) . "</p>";
                echo "<p>Correo: " . htmlspecialchars($tutor['correo']) . "</p>";
                echo "<p>Nombre: " . htmlspecialchars($tutor['nombre']) . "</p>";
                echo "<p>Apellidos: " . htmlspecialchars($tutor['apellidos']) . "</p>";
            } else {
                echo "Tutor no encontrado.";
            }
        } catch (PDOException $e) {
            echo "Error al obtener los detalles del tutor: " . $e -> getMessage();
        }
    } else {
        echo "Error en la conexión a la base de datos.";
    }
} else {
    echo "ID de tutor no proporcionado.";
}

include('../../../includes/pie.php');
?>