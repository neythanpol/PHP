<?php
// Incluimos el archivo donde se define la función de conexión
include "conexionPDOFuncion.php";

try {
    // Establecemos conexión con la base de datos usando la función conexion()
    $conexion = obtenerConexion();

    $nombre_old = "Marcus";
    $nombre_new = "Leon";

    // Sentencia SQL para actualizar un registros donde el nombre coincida con el valor dado
    $sql = "UPDATE persona SET nombre = :nombre_new where nombre = :nombre_old";

    // Preparamos la consulta SQL
    $sentencia = $conexion->prepare($sql);

    // Vinculamos el marcador de posición :nombre con la variable $nombre
    $sentencia->bindParam(':nombre_old', $nombre_old, PDO::PARAM_STR);
    $sentencia->bindParam(':nombre_new', $nombre_new, PDO::PARAM_STR);

    // Ejecutamos la consulta
    $sentencia->execute();

    // Obtenemos el número de filas afectadas (registros eliminados)
    $registrosModificados = $sentencia->rowCount();

    // Comprobamos si se eliminaron registros y mostramos un mensaje
    if ($registrosModificados > 0) {
        echo "Se han modificado $registrosModificados registro(s) con el nombre '$nombre_old'.";
    } else {
        echo "No se encontró ningún registro con el nombre '$nombre_old'.";
    }

} catch (PDOException $e) {
    // Capturamos y mostramos cualquier error que ocurra durante la ejecución
    echo "Error al eliminar el registro: " . $e->getMessage();
} finally {
    // Cerramos la conexión
    $conexion = null;
}
?>