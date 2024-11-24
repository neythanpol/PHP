<?php
// Incluimos el archivo donde se define la función de conexión
include "conexionPDOFuncion.php";

try {
    $conexion = obtenerConexion();

    // Sentencia SQL para borrar registro
    $sql = "DELETE FROM persona WHERE nombre = :nombre";

    // Preparo la consulta 
    $sentencia = $conexion -> prepare($sql);

    $nombre = "Alex"; 

    // Vinculo el parámetro :nombre 
    $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);

    // Ejecuto la consulta
    $sentencia->execute();

    // Obtenemos el número de filas
    $result = $sentencia -> rowCount();

    // Comprobamos si se eliminaron registros y mostramos un mensaje
    if ($result > 0) {
        echo "Se han eliminado $result registro(s) con el nombre '$nombre'.";
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