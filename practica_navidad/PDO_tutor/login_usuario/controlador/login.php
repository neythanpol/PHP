<?php
session_start();
include '../../../conexion/conexionPDO.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $conexion = obtenerConexion();
    $sql = "SELECT * FROM tutor WHERE login = :usuario AND baja = 1 AND activar = 'activo'";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();
    $tutor = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($tutor && password_verify($password, $tutor['password'])) {
        $_SESSION['tutor_id'] = $tutor['id_tutor'];
        $_SESSION['tipo_usu'] = $tutor['tipo_usu'];
        header('Location: ../vista/dashboard.php');
        exit();
    } else {
        $_SESSION['bool'] = false;
        header('Location: ../vista/index.php');
        exit();
    }
}
?>