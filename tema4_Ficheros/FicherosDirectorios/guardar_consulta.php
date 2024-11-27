<?php
// Datos de conexión a la base de datos
$host = 'localhost';
$db = 'pruebas';
$user = 'root';
$pass = '';

// Crear conexión
$conexion = new mysqli($host, $user, $pass, $db);

// Comprobar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Realizar la consulta
$sql = "SELECT * FROM persona";
$resultado = $conexion->query($sql);

// Comprobar si hay resultados
if ($resultado->num_rows > 0) {
    // Abrir archivo en modo escritura
    $archivo = fopen("resultado.txt", "w");

    // Escribir los datos en el archivo
    while($fila = $resultado->fetch_assoc()) {
        $linea = implode(", ", $fila) . "\n"; // Convertir la fila a una línea de texto
        fwrite($archivo, $linea);
    }

    // Cerrar el archivo
    fclose($archivo);

    echo "Datos guardados en resultado.txt<br>";
} else {
    echo "No se encontraron resultados";
}

$contenido = file_get_contents("resultado.txt");

if ($contenido !== false) {
    // Dividir el contenido en líneas
    $lineas = explode("\n", $contenido);

    // Procesar cada línea
    foreach ($lineas as $linea) {
        // Procesar la línea de alguna manera
        echo $linea . "<br>";
    }
} else {
    // Error al leer el archivo
    echo "No se pudo leer el archivo";
}

// Cerrar la conexión
$conexion->close();
?>
