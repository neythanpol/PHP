<?php
$titulo = "Modificar Prenda"; // Título de la página
include('encabezado.php'); // Incluye el encabezado
include('conexion.php'); // Incluye la conexión a la base de datos

// Recoge el identificador del registro a modificar desde la URL
$id = $_GET['id_prenda'];

// Preparación SELECT para obtener los datos del registro
$consultaSelect = $conexion -> prepare("SELECT * FROM rebajas_natan WHERE id_prenda = ?");
$consultaSelect -> bind_param("i", $id);
$consultaSelect -> execute();
$resultado = $consultaSelect -> get_result();
$prenda = $resultado -> fetch_assoc();

// Comprobar si se encontró el registro
if (!$prenda) {
    echo "No se encontró el registro.";
    exit();
}
?>

<h1>Modificar prenda</h1>
<form action="modificar_prenda.php" method="post">
    <input type="hidden" name="id_prenda" value="<?= $prenda['id_prenda'] ?>">

    <label for="prenda">Prenda: </label>
    <span id="prenda"><?= htmlspecialchars($prenda['prenda']) ?></span><br><br>

    <label for="foto">Foto: </label>
    <span id="foto"><?= htmlspecialchars($prenda['foto']) ?></span><br><br>
    
    <label for="precio">Precio: </label>
    <span id="precio"><?= htmlspecialchars($prenda['precio']) ?></span><br><br>

    <label for="rebajada">Rebajada: </label>
    <input type="radio" id="rebajada_si" name="rebajada" value="0" <?= $prenda['rebajada'] == 'Sí' ? 'checked' : '' ?>>
    <label for="rebajada_si">Sí</label>

    <input type="radio" id="rebajada_no" name="rebajada" value="1" <?= $prenda['rebajada'] == 'No' ? 'checked' : '' ?>>
    <label for="rebajada_no">No</label><br><br>


    <label for="rebaja">Rebaja: </label>
    <input type="number" id="rebaja" name="rebaja" value="<?= $prenda['rebaja'] ?>" required><br><br>
    
    <input type="submit" value="Modificar">
</form>

<?php
include('pie.php');
$consultaSelect->close();
$conexion->close();
?>
