<?php
    $titulo = "Listado de alumnos";
    include("encabezado.php");
?>
<h1>Agregar Alumnos</h1>
<form action="agregar_alumno.php" method="post">
    <label for="dni">DNI: </label>
    <input type="text" name="nombre" id="nombre">

    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre">

    <label for="apellido1">Primer Apellido: </label>
    <input type="text" name="apellido1" id="apellido1">

    <label for="apellido2">Segundo Apellido: </label>
    <input type="text" name="apellido2" id="apellido2">

    <label for="email">Email: </label>
    <input type="text" name="email" id="email">

    <label for="telefono">Teléfono: </label>
    <input type="text" name="telefono" id="telefono">

    <label for="curso">Curso: </label>
    <input type="text" name="curso" id="curso">

    <button type="submit">Agregar Alumno</button>
</form>
<?php
    include("pie.php");
?>