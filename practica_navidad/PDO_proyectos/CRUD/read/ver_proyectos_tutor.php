<?php
session_start();
if (!isset($_SESSION['tutor_id'])) {
    header('Location: ../../../PDO_tutor/login_usuario/vista/dashboard.php');
    exit();
}

include '../../../conexion/conexionPDO.php';
$conexion = obtenerConexion();
$tutor_id = $_SESSION['tutor_id'];

$sql = "SELECT p.*, a.nombre AS alumno_nombre, a.apellido1 AS alumno_apellido, t.nombre AS tutor_nombre, t.apellidos AS tutor_apellidos
        FROM proyecto p
        JOIN alumnos a ON p.alumno = a.id_alumno
        JOIN tutor t ON p.tutor = t.id_tutor
        WHERE p.tutor = :tutor_id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':tutor_id', $tutor_id);
$stmt->execute();
$proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Mis Proyectos</title>
    <link rel="stylesheet" type="text/css" href="../../../css/styles.css">
</head>
<body>
    <h1>Ver Mis Proyectos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Periodo</th>
                <th>Curso</th>
                <th>Fecha de Presentación</th>
                <th>Nota</th>
                <th>Logotipo</th>
                <th>PDF del Proyecto</th>
                <th>Alumno</th>
                <th>Tutor</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proyectos as $proyecto): ?>
                <tr>
                    <td><?= htmlspecialchars($proyecto['id_proyecto']) ?></td>
                    <td><?= htmlspecialchars($proyecto['titulo']) ?></td>
                    <td><?= htmlspecialchars($proyecto['descripcion']) ?></td>
                    <td><?= htmlspecialchars($proyecto['periodo']) ?></td>
                    <td><?= htmlspecialchars($proyecto['curso']) ?></td>
                    <td><?= htmlspecialchars($proyecto['fecha_presentacion']) ?></td>
                    <td><?= htmlspecialchars($proyecto['nota']) ?></td>
                    <td><img src="data:image/jpeg;base64,<?= base64_encode($proyecto['logotipo']) ?>" alt="Logotipo" width="50" height="50"></td>
                    <td><a href="../../../uploads/<?= htmlspecialchars($proyecto['pdf_proyecto']) ?>" target="_blank">Ver PDF</a></td>
                    <td><?= htmlspecialchars($proyecto['alumno_nombre']) . ' ' . htmlspecialchars($proyecto['alumno_apellido']) ?></td>
                    <td><?= htmlspecialchars($proyecto['tutor_nombre']) . ' ' . htmlspecialchars($proyecto['tutor_apellidos']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="../../../PDO_tutor/login_usuario/vista/dashboard.php" class="btn">Volver al Dashboard</a>
</body>
</html>