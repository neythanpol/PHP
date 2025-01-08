<?php
    include '../conexion/conexion.php';
    session_start();
    $conexion = conexion();
    $usuario = $password = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = filtrado($_POST['usuario']) ?? '';
        $password = filtrado($_POST['password']) ?? '';
    }
    $sql = "SELECT * FROM users WHERE usuario = :usuario";

    try  {
        $sentencia = $conexion -> prepare($sql);
        $sentencia -> bindParam(':usuario', $usuario, PDO::PARAM_STR);

        $sentencia -> execute();
        $resultado = $sentencia -> fetch(PDO::FETCH_ASSOC);

        if ($resultado && password_verify($password, $resultado['password'] )) {
            session_start();
            $_SESSION['usuario'] = $resultado['usuario'];
            $_SESSION['tipo_usu'] = $resultado['tipo_usu'];
            $conexion =  null;
            $_SESSION['bool'] = true;
            if (intval($_SESSION['tipo_usu']) == 1) {
                header("Location:../vista/index_admin.php");
            } else if (intval($_SESSION['tipo_usu']) == 2) {
                header('Location:../vista/index_usu.php');
            }
        } else {
            $_SESSION['bool'] = false;
            header("Location:../vista/index.php");
        }
    } catch (PDOException $e) {
        die ("Error: " . $e -> getMessage());
    }
?>