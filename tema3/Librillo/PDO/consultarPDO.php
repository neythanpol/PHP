<?php
    // Incluimos el archivo donde se define la función de conexión
    include "conexionPDOFuncion.php";

    try {
        $conexion = obtenerConexion();

        // Seleccionar las personas cuyo id_persona sea 1
        $sql = "SELECT * FROM alumnos WHERE id_alumno = :id";

        // Preparo la consulta
        $sentencia = $conexion -> prepare($sql);
        
        // Recibir datos del formulario
        $id = $_POST['id'];

        // Vinculo el parámetro :id_persona
        $sentencia -> bindParam(':id', $id, PDO::PARAM_INT);

        // Ejecutar la consulta
        $sentencia -> execute();

        // Obtener los resultados
        $resultados = $sentencia -> fetchAll(PDO::FETCH_ASSOC);

        // Comprobamos si se eliminaron registros y mostramos un mensaje
        if (count($resultados) > 0) {
            echo "Se han consultado " . count($resultados) . " registro(s) con el id '$id'.";
            // Mostrar los resultados
            foreach ($resultados as $fila) {
                echo "ID: " . $fila['id_alumno'] . "<br />";
                echo "DNI: " . $fila['dni'] . "<br />";
                echo "Nombre: " . $fila["nombre"] . "<br />";
                echo "Primer Apellido: " . $fila["apellido1"] . "<br />";
                echo "Segundo Apellido: " . $fila["apellido2"] . "<br />";
                echo "Email: " . $fila["email"] . "<br />";
                echo "Teléfono: " . $fila["telefono"] . "<br />";
                echo "Curso: " . $fila["curso"] . "<br />";
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