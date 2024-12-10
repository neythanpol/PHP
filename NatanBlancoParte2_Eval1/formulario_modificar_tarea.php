<?php
$titulo = "Modificar Tarea"; // Título de la página
include('encabezado.php'); // Incluye el encabezado
include('conexion.php'); // Incluye la conexión a la base de datos

// Recoge el identificador del registro a modificar desde la URL
$id = $_GET['id_alumno'];

// Preparación SELECT para obtener los datos del registro
$consultaSelect = $conexion -> prepare("SELECT * FROM tareas");
$consultaSelect -> bind_param("i", $id);
$consultaSelect -> execute();
$resultado = $consultaSelect -> get_result();
$alumno = $resultado -> fetch_assoc();

// Comprobar si se encontró el registro
if (!$alumno) {
    echo "No se encontró el registro.";
    exit();
}
?>

<h1>Modificar Alumno</h1>
<form action="modificar_alumno.php" method="post">
    <input type="hidden" name="id_alumno" value="<?= $alumno['id_alumno'] ?>">

    <label for="dni">DNI: </label>
    <input type="text" id="dni" name="dni" value="<?= $alumno['dni'] ?>">

    <label for="nombre">Nombre: </label>
    <input type="text" id="nombre" name="nombre" value="<?= $alumno['nombre'] ?>" required><br><br>
    
    <label for="apellido1">Primer apellido: </label>
    <input type="text" id="apellido1" name="apellido1" value="<?= $alumno['apellido1'] ?>" required><br><br>

    <label for="apellido2">Segundo apellido: </label>
    <input type="text" id="apellido2" name="apellido2" value="<?= $alumno['apellido2'] ?>" required><br><br>

    <label for="email">Email: </label>
    <input type="email" id="email" name="email" value="<?= $alumno['email'] ?>" required><br><br>
    
    <label for="telefono">Teléfono: </label>
    <input type="text" id="telefono" name="telefono" value="<?= $alumno['telefono'] ?>" required><br><br>

    <label for="curso">Curso :</label>
    <input type="text" id="curso" name="curso" value="<?= $alumno['curso'] ?>" required><br><br>
    
    <input type="submit" value="Modificar">
</form>

<?php
include('pie.php');
$consultaSelect->close();
$conexion->close();
?>
