<?php
session_start();
if (!isset($_SESSION['tutor_id']) || $_SESSION['tipo_usu'] != 1) {
    header('Location: ../vista/index.php');
    exit();
}

include '../../../conexion/conexionPDO.php';
$conexion = obtenerConexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_tutor = $_POST['id_tutor'];
    if (isset($_POST['activar'])) {
        $activar = $_POST['activar'] == 'activo' ? 'inactivo' : 'activo';
        $sql = "UPDATE tutor SET activar = :activar WHERE id_tutor = :id_tutor";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':activar', $activar);
        $stmt->bindParam(':id_tutor', $id_tutor);
        $stmt->execute();
    } elseif (isset($_POST['baja'])) {
        $baja = $_POST['baja'] == 1 ? 2 : 1;
        $sql = "UPDATE tutor SET baja = :baja WHERE id_tutor = :id_tutor";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':baja', $baja);
        $stmt->bindParam(':id_tutor', $id_tutor);
        $stmt->execute();
    }
}

$sql = "SELECT * FROM tutor WHERE tipo_usu != 1";
$stmt = $conexion->query($sql);
$tutores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Tutores</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <h1>Gestionar Tutores</h1>
    <a href="../../login_usuario/vista/dashboard.php" class="btn">Volver al Dashboard</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Activo</th>
                <th>Modificar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tutores as $tutor): ?>
                <tr>
                    <td><?= htmlspecialchars($tutor['id_tutor']) ?></td>
                    <td><?= htmlspecialchars($tutor['login']) ?></td>
                    <td><?= htmlspecialchars($tutor['nombre']) ?></td>
                    <td><?= htmlspecialchars($tutor['apellidos']) ?></td>
                    <td><?= htmlspecialchars($tutor['correo']) ?></td>
                    <td><?= $tutor['tipo_usu'] == 1 ? 'Administrador' : 'Tutor' ?></td>
                    <td><?= $tutor['baja'] == 1 ? 'Activo' : 'Inactivo' ?></td>
                    <td><?= htmlspecialchars($tutor['activar']) ?></td>
                    <td>
                        <form action="lista_tutores.php" method="post" style="display:inline;">
                            <input type="hidden" name="id_tutor" value="<?= $tutor['id_tutor'] ?>">
                            <input type="hidden" name="activar" value="<?= $tutor['activar'] ?>">
                            <button type="submit"><?= $tutor['activar'] == 'activo' ? 'Desactivar' : 'Activar' ?></button>
                        </form>
                        <form action="lista_tutores.php" method="post" style="display:inline;">
                            <input type="hidden" name="id_tutor" value="<?= $tutor['id_tutor'] ?>">
                            <input type="hidden" name="baja" value="<?= $tutor['baja'] ?>">
                            <button type="submit"><?= $tutor['baja'] == 1 ? 'Dar de Baja' : 'Reactivar' ?></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="../../login_usuario/vista/dashboard.php" class="btn">Volver al Dashboard</a>
</body>
</html>