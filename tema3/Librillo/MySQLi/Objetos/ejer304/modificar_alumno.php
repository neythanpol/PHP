<?php
// Conexión a la base de datos
include('conexion.php');

// Recibir datos del formulario
$id = $_POST['id_alumno'];
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$curso = $_POST['curso'];

// Preparar la consulta de actualización
$consulta = $conexion -> prepare("UPDATE alumnos SET dni = ?, nombre = ?, apellido1 = ?, apellido2 = ?, email = ?, telefono = ?, curso = ? WHERE id_alumno = ?");
$consulta->bind_param("sssssssi", $dni, $nombre, $apellido1, $apellido2, $email, $telefono, $curso, $id);

// Ejecutar la consulta
if ($consulta -> execute()) {
    // Redirigir al listado actualizado
    header("Location: listar_alumno.php");
    exit();
} else {
    echo "Error al modificar los datos: " . $consulta -> error;
}
// Cerrar la consulta y la conexión
$consulta->close();
$conexion->close();
?>
