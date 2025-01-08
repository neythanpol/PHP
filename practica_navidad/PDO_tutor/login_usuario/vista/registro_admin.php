<?php
include '../../../conexion/conexionPDO.php';

$usuario = 'admin';
$password = password_hash('admin', PASSWORD_DEFAULT);
$correo = 'admin@example.com';
$nombre = 'Admin';
$apellidos = 'Admin';
$tipo_usu = 1; // Administrador
$baja = 1; // Activo
$activar = 'activo'; // Activo

$conexion = obtenerConexion();
$sql = "INSERT INTO tutor (login, password, correo, nombre, apellidos, tipo_usu, baja, activar) VALUES (:usuario, :password, :correo, :nombre, :apellidos, :tipo_usu, :baja, :activar)";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':apellidos', $apellidos);
$stmt->bindParam(':tipo_usu', $tipo_usu);
$stmt->bindParam(':baja', $baja);
$stmt->bindParam(':activar', $activar);

if ($stmt->execute()) {
    echo "Administrador registrado correctamente.";
} else {
    echo "Error al registrar el administrador.";
}
?>