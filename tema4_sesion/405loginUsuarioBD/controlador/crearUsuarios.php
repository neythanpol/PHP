
<?php
    session_start();
    require_once'../biblioteca/biblioteca.php'; 
    $conexion = conexion();

    $usuarios = [
        ['usuario' => 'admin',
        'password' => 'admin123',
        'tipo_usu' => 1], 

        ['usuario' => 'usuario_normal',
        'password' => 'usuario123', 
        'tipo_usu' => 2], 
    ];
    try {
        $sql = "INSERT INTO users (usuario, password, tipo_usu) VALUES (:usuario, :password, :tipo_usu)";
        $insert = $conexion->prepare($sql);
        foreach ($usuarios as $usuario) {
            $insert->bindParam(':usuario', $usuario['usuario']);
            $insert->bindParam(':password', password_hash($usuario['password'], PASSWORD_DEFAULT));
            $insert->bindParam(':tipo_usu', $usuario['tipo_usu']);
            $insert->execute();
            
        }
        $_SESSION['bool'] = true;
        header('Location:../vista/index.php');
        $conexion = null;
    } catch (PDOException $e) {
        $_SESSION['bool'] = null;
        echo '<!DOCTYPE html><html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="../vista/styles.css">
                    <title>ERROR</title>
                </head>
                <body>
                    <h1>Error al insertar los usuarios, ¿ya los habías insertado, verdad? ( ͡° ͜ʖ ͡°)</h1>
                    <a href="../vista/index.php">REGRESAR</a>
                </body>
                </html>';
        
    }

    
    

?>