<?php
// Incluimos el archivo donde se define la función de conexión
include "conexionPDOFuncion.php";

try {
    // Establecemos conexión con la base de datos usando la función conexion()
    $conexion = obtenerConexion();

    // Sentencia SQL para borrar registros donde el nombre coincida con el valor dado
    $sql = "DELETE FROM persona WHERE nombre = :nombre";

    // Preparamos la consulta SQL
    $sentencia = $conexion->prepare($sql);

    // Definimos el valor de la variable $nombre para eliminar registros con ese nombre
    $nombre = "Juan"; // Cambiar este valor según el nombre que desees eliminar

    // Vinculamos el marcador de posición :nombre con la variable $nombre
    $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);

    // Ejecutamos la consulta
    $sentencia->execute();

    // Obtenemos el número de filas afectadas (registros eliminados)
    $registrosEliminados = $sentencia->rowCount();

    // Comprobamos si se eliminaron registros y mostramos un mensaje
    if ($registrosEliminados > 0) {
        echo "Se han eliminado $registrosEliminados registro(s) con el nombre '$nombre'.";
    } else {
        echo "No se encontró ningún registro con el nombre '$nombre'.";
    }

} catch (PDOException $e) {
    // Capturamos y mostramos cualquier error que ocurra durante la ejecución
    echo "Error al eliminar el registro: " . $e->getMessage();
} finally {
    // Cerramos la conexión
    $conexion = null;
}
?>