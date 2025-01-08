<?php
// Incluye la conexión a la base de datos
include('conexion.php');

// Recoger el identificador del registro a eliminar desde la URL
$id = $_GET['id_prenda'];

// Preparar la consulta de eliminación
$consulta = $conexion -> prepare("DELETE FROM rebajas_natan WHERE id_prenda = ?");
$consulta -> bind_param("i", $id);

// Ejecutar la consulta
if ($consulta -> execute()) {
    // Redirigir al listado actualizado
    header("Location: listar_prenda.php");
    exit();
} else {
    echo "Error al eliminar los datos: " . $consulta->error;
}
// Cerrar la consulta y la conexión
$consulta->close();
$conexion->close();
?>