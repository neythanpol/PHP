<?php
    $titulo = "Listado de prendas";
    include("encabezado.php");
?>
<h1>Agregar Prendas</h1>
<form action="agregar_prenda.php" method="post">
    <label for="prenda">Prenda: </label>
    <input type="text" name="prenda" id="prenda">

    <label for="foto">Foto: </label>
    <input type="file" name="foto" id="foto" accept="image/png, image/jpeg, image/jpg">

    <label for="precio">Precio: </label>
    <input type="number" name="precio" id="precio">

    <label for="rebajada">Rebajada: </label>
    <input type="checkbox" name="rebajada" id="rebajada">

    <label for="rebaja">Rebaja: </label>
    <input type="number" name="rebaja" id="rebaja">

    <button type="submit">Agregar Prenda</button>
</form>
<?php
    include("pie.php");
?>