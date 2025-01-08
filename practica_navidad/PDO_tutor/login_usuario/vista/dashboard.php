<?php
session_start();
if (!isset($_SESSION['tutor_id'])) {
    header('Location: index.php');
    exit();
}

$tipo_usu = $_SESSION['tipo_usu'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Dashboard</h1>
    <nav>
        <ul>
            <?php if ($tipo_usu == 1): // Administrador ?>
                <li><a href="../../CRUD/read/lista_tutores.php">Gestionar Tutores</a></li>
                <li><a href="../../../PDO_proyectos/CRUD/read/lista_proyectos.php">CRUD Proyectos</a></li>
                <li><a href="../../../PDO_alumnos/CRUD/read/listar_alumnos.php">CRUD Alumnos</a></li>
            <?php else: // Tutor ?>
                <li><a href="../../CRUD/read/ver_tutor.php">Ver y Modificar Mis Datos</a></li>
                <li><a href="../../../PDO_proyectos/CRUD/read/ver_proyectos_tutor.php">Ver Mis Proyectos</a></li>
            <?php endif; ?>
            <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
</body>
</html>