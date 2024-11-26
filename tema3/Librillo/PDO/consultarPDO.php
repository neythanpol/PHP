<?php
    // Incluimos el archivo donde se define la función de conexión
    include "conexionPDOFuncion.php";

    try {
        $conexion = obtenerConexion();

        // Seleccionar las personas cuyo id_persona sea 1
        $sql = "SELECT * FROM persona WHERE id_persona = :id";

        // Preparo la consulta
        $sentencia = $conexion -> prepare($sql);

        // Valor del ID a buscar
        $id_a_buscar = 1;

        // Vinculo el parámetro :id_persona
        $sentencia -> bindParam(':id', $id_a_buscar, PDO::PARAM_INT);

        // Ejecutar la consulta
        $sentencia -> execute();

        // Obtener los resultados
        $resultados = $sentencia -> fetchAll(PDO::FETCH_ASSOC);

        // Comprobamos si se eliminaron registros y mostramos un mensaje
        if (count($resultados) > 0) {
            echo "Se han consultado " . count($resultados) . " registro(s) con el id '$id_a_buscar'.";
            // Mostrar los resultados
            foreach ($resultados as $fila) {
                echo "ID: " . $fila['id_persona'] . "<br/>";
                echo "Nombre: " . $fila['nombre'] . "<br/>";
                echo "Apellidos: " . $fila['apellidos'] . "<br/>";
                echo "Teléfono: " . $fila['telefono'] . "<br/>";
                echo "<hr/>";
            }
        } else {
            echo "No se encontró ningún registro con el id '$id_a_buscar'.";
        }

    } catch (PDOException $e) {
        // Capturamos y mostramos cualquier error que ocurra durante la ejecución
        echo "Error al eliminar el registro: " . $e -> getMessage();
    } finally {
        // Cerramos la conexión
        $conexion = null;
    }
?>