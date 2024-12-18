<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivo</title>
</head>
<body>
    <form action="subir_archivo.php" method="post" enctype="multipart/form-data">
        <label for="archivo">Elige un archivo:</label>
        <input type="file" name="archivo" id="archivo" required>
        <input type="submit" value="Subir">
    </form>
</body>
</html>


<?php
// Configuración de la conexión a la base de datos
$dsn = 'mysql:host=tu_host;dbname=tu_base_de_datos;charset=utf8';
$usuario = 'tu_usuario';
$contraseña = 'tu_contraseña';

try {
    $pdo = new PDO($dsn, $usuario, $contraseña);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
        $nombreArchivo = $_FILES["archivo"]["name"];
        $tipoArchivo = $_FILES["archivo"]["type"];
        $tamañoArchivo = $_FILES["archivo"]["size"];
        $datosArchivo = file_get_contents($_FILES["archivo"]["tmp_name"]);

        // Preparar la consulta SQL
        $sql = "INSERT INTO archivos (nombre, datos) VALUES (:nombre, :datos)";
        $stmt = $pdo->prepare($sql);

        // Vincular los parámetros y ejecutar la consulta
        $stmt->bindParam(':nombre', $nombreArchivo, PDO::PARAM_STR);
        $stmt->bindParam(':datos', $datosArchivo, PDO::PARAM_LOB);
        $stmt->execute();

        echo "Archivo subido correctamente.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>


<?php
// Configuración de la conexión a la base de datos
$dsn = 'mysql:host=tu_host;dbname=tu_base_de_datos;charset=utf8';
$usuario = 'tu_usuario';
$contraseña = 'tu_contraseña';

try {
    $pdo = new PDO($dsn, $usuario, $contraseña);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparar la consulta SQL para recuperar el archivo
    $sql = "SELECT nombre, datos FROM archivos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    $archivo = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($archivo) {
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"" . $archivo['nombre'] . "\"");
        echo $archivo['datos'];
    } else {
        echo "Archivo no encontrado.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
