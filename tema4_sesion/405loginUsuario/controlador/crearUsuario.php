<?php
    session_start();
    include "../conexion/conexion.php";
    $conexion = conexion();

    $usuario = [
        ['usuario' => 'admin1',
        'password' => 'admin1',
        'tipo_usu' => 1], 

        ['usuario' => 'usuario1',
        'password' => 'usuario1', 
        'tipo_usu' => 2], 
    ];
    try {
        $sql = "INSERT INTO users (usuario, password, tipo_usu) VALUES (:usuario, :password, :tipo_usu)";
        $sentencia = $conexion -> prepare($sql);
        foreach ($usuario as $usuarios) {
            $sentencia -> bindParam(':usuario', $usuarios['usuario']);
            $sentencia -> bindValue(':password', password_hash($usuarios['password'], PASSWORD_DEFAULT));
            $sentencia -> bindParam(':tipo_usu', $usuarios['tipo_usu']);
            $sentencia -> execute();
        }
        $_SESSION['bool'] = true;
        header('Location:../vista/index.php');
        $conexion = null;
    } catch (PDOException $e) {
        $_SESSION['bool'] = null;
        echo    '<!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta name="author" content="Natán Blanco Rodríguez>
                    <link rel="stylesheet" href="../vista/styles.css">
                    <title>ERROR</title>
                </head>
                <body>
                    <h1>Error al insertar usuarios</h1>
                    <a href="../vista/index.php">Volver</a>
                </body>
                </html>';
    }
?>