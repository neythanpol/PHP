<?php
$titulo = "Listado de Plantas"; // Título de la página
include('encabezado.php'); // Incluye el encabezado
include('conexion.php'); // Incluye la conexión a la base de datos
?>
<header>
    <h1>Listado de Plantas</h1>
</header>
<main>
    <div id="cont_agregar">
        <a href="">
            <button id="boton">Agregar</button>
        </a>
    </div>
    <div id="contenedor">
        <table>
            <thead>
                <tr>
                    <th>Nombre Común</th>
                    <th>Nombre Científico</th>
                    <th>Origen</th>
                    <th>Tipo</th>
                    <th>Cuidados</th>
                    <th>Curiosidades</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $conexion = obtenerConexion();

                    // Consulta a la base de datos
                    $sql = "SELECT * FROM `plantas`";

                    // Guarda los registros en un array
                    $query = $conexion -> query($sql);

                    while ($fila = $query -> fetch()) {
                        echo "<tr>";
                        echo "<td>" . $fila['nombre_comun'] . "</td>";
                        echo "<td>" . $fila['nombre_cientifico'] . "</td>";
                        echo "<td>" . $fila['origen'] . "</td>";
                        echo "<td>" . $fila['tipo'] . "</td>";
                        echo "<td>" . $fila['cuidados'] . "</td>";
                        echo "<td>" . $fila['curiosidades'] . "</td>";
                        echo "<td><a href='formulario_modificar_planta.php?id_planta=" . $fila['id_planta'] . "'><button type='button'>Modificar</a></td>";
                        echo "<td><a href='eliminar_planta.php?id_planta=" . $fila['id_planta'] . "'><button type='button'>Eliminar</a></td>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    echo $e -> getMessage();
                } finally {
                    $conexion = null;
                }
                    
                ?>
            </tbody>
        </table>
    </div>
</main>

<?php
    include('pie.php'); // Incluye el pie de página
?>