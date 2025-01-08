<?php

require_once'../biblioteca/biblioteca.php';
session_start();
$conexion = conexion();
$usuario = $password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = filtrado($_POST['usuario']) ?? '';
    $password = filtrado($_POST['password']) ?? '';
}

$sql = "SELECT * FROM users WHERE usuario = :usuario";

try  {
    $select = $conexion->prepare($sql);
    $select->bindParam(':usuario', $usuario, PDO::PARAM_STR);

    $select->execute();
    $result = $select->fetch(PDO::FETCH_ASSOC);
    

    // PRUEBAS

    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";
    // echo "Usuario : $usuario<br>";
    // echo "Contraseña : $password<br>";
    // echo "Hash : $result[password]<br>";
    // echo password_verify($password, $result['password'])? "Contraseña coincide" : "Contraseña no coincide";

    if ($result && password_verify($password, $result['password'] )) {
        session_start();
        $_SESSION['usuario'] = $result['usuario'];
        $_SESSION['tipo_usu'] = $result['tipo_usu'];
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
    die ("Error: ".$e->getMessage());
}



?>