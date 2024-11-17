<?php
    // Incluye el archivo de conexión
    include "conexion.php";

    // Consulta a la base de datos
    $consulta = "SELECT * FROM `persona`";
    // Guarda los registros en un array
    $listarPersonas = mysqli_query($conexion, $consulta);

    // Comprobamos si el servidor nos ha devuelto resultados
    if ($listarPersonas) {
        // Recorremos cada resultado que nos devuelve el servidor
        foreach ($listarPersonas as $persona){
            // Recorremos el array asociativo
            echo "
                $persona[id_persona]
                $persona[nombre]
                $persona[apellidos]
                $persona[telefono]
                <br>
            ";
        }
    }
?>