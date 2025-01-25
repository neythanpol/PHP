<?php
    function conexion () {
        $servidor = 'mysql:dbname=carrito;host=localhost;charset=utf8mb4';
        $usuario = 'root';
        $password = '';


        try {
            $conexion = new PDO($servidor, $usuario, $password);
            $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e -> getMessage();
        }
    }

    function filtrado ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>