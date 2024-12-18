<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Fecha</title>
</head>
<body>
    <form action="procesar_formulario.php" method="post">
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required>
        <input type="submit" value="Enviar">
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validar la entrada
        $fecha = $_POST['fecha'];

        // Comprobar si la fecha es válida
        $date = DateTime::createFromFormat('Y-m-d', $fecha);
        if ($date && $date->format('Y-m-d') === $fecha) {
            // La fecha es válida, proceder con la inserción en la base de datos
            $sql = "INSERT INTO tu_tabla (fecha) VALUES (:fecha)";
            $stmt = $pdo->prepare($sql);

            // Vincular el parámetro y ejecutar la consulta
            $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $stmt->execute();

            echo "Fecha insertada correctamente.";
        } else {
            echo "Fecha no válida.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
