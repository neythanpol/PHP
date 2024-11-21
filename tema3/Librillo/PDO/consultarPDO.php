<?php
// Incluimos el archivo donde se define la función de conexión
include "conexionPDOFuncion.php";

try {
    // Establecemos conexión con la base de datos usando la función conexion()
    $conexion = obtenerConexion();

    // Sentencia SQL para borrar registros donde el nombre coincida con el valor dado
    $sql = "SELECT * FROM persona WHERE id_persona = :id";

    // Preparamos la consulta SQL
    $sentencia = $conexion->prepare($sql);

    // Definimos el id a buscar
    $id_a_buscar = 1;

    // Vinculamos el marcador de posición :id con la variable $id_a_buscar
    $sentencia->bindParam(':id', $id_a_buscar, PDO::PARAM_INT);

    // Ejecutamos la consulta
    $sentencia->execute();

    // Obtenemos el número de filas afectadas (registros eliminados)
    $registrosConsultados = $sentencia->rowCount();

    // Comprobamos si se eliminaron registros y mostramos un mensaje
    if ($registrosConsultados > 0) {
        echo "Se han consultado $registrosConsultados registro(s) con el id '$id_a_buscar'.";
    } else {
        echo "No se encontró ningún registro con el id '$id_a_buscar'.";
    }

} catch (PDOException $e) {
    // Capturamos y mostramos cualquier error que ocurra durante la ejecución
    echo "Error al eliminar el registro: " . $e->getMessage();
} finally {
    // Cerramos la conexión
    $conexion = null;
}
?>