<?php
// Conexión a la base de datos
include('conexion.php');

// Recibir datos del formulario
$id = $_POST['id_prenda'];
$rebajada = $_POST['rebajada'];
$rebaja = $_POST['rebaja'];

// Preparar la consulta de actualización
$consulta = $conexion -> prepare("UPDATE rebajas_natan SET  rebajada = ?, rebaja = ? WHERE id_prenda = ?");
$consulta->bind_param("bdi", $rebajada, $rebaja, $id);

// Ejecutar la consulta
if ($consulta -> execute()) {
    // Redirigir al listado actualizado
    header("Location: listar_prenda.php");
    exit();
} else {
    echo "Error al modificar los datos: " . $consulta -> error;
}
// Cerrar la consulta y la conexión
$consulta->close();
$conexion->close();
?>