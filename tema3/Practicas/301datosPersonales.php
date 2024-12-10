<?php
// Función para filtrar la entrada de usuario
function filtrado($datos) {
    return htmlspecialchars(trim($datos), ENT_QUOTES, 'UTF-8');
}

// Recibir datos del formulario y aplicar filtrado
$nombre = filtrado($_POST['nombre']);
$apellido1 = filtrado($_POST['apellido1']);
$apellido2 = filtrado($_POST['apellido2']);
$dni = filtrado($_POST['dni']);
$email = filtrado($_POST['email']);
$fecha_nacimiento = filtrado($_POST['fecha']);
$telefono = filtrado($_POST['telefono']);
$sexo = filtrado($_POST['sexo']);
$estudios = filtrado($_POST['estudios']);
$idioma = filtrado($_POST['idioma']);

// Calcular la edad
$fecha_nacimiento_date = new DateTime($fecha_nacimiento);
$edad = $fecha_nacimiento_date->diff(new DateTime())->y;

// Procesar archivos subidos
$carpetaDestino = "datosPersonales/";
$fotoNombre = $dni . ".png";
$cvNombre = $dni . ".pdf";

if ($_FILES['foto']['type'] == "image/png" || $_FILES['foto']['type'] == "image/jpeg" || $_FILES['foto']['type'] == "image/jpg") {
    move_uploaded_file($_FILES['foto']['tmp_name'], $carpetaDestino . $fotoNombre);
}
if ($_FILES['cv']['type'] == "application/pdf") {
    move_uploaded_file($_FILES['cv']['tmp_name'], $carpetaDestino . $cvNombre);
}

// Mostrar los datos en formato adecuado
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos Personales</title>
    
</head>
<body>
    <h1><?php echo "$nombre $apellido1 $apellido2"; ?></h1>
    <div class="container">
        <div class="datos">
            <table border="1">
                <tr><th>Edad</th><td><?php echo $edad; ?> años</td></tr>
                <tr><th>DNI</th><td><?php echo $dni; ?></td></tr>
                <tr><th>Email</th><td><?php echo $email; ?></td></tr>
                <tr><th>Teléfono</th><td><?php echo $telefono; ?></td></tr>
                <tr><th>Sexo</th><td><?php echo $sexo; ?></td></tr>
                <tr><th>Estudios</th><td><?php echo $estudios; ?></td></tr>
                <tr><th>Idiomas</th><td><?php echo $idioma; ?></td></tr>
            </table>
        </div>
        <div class="foto">
            <h3>Foto</h3>
            <img src="<?php echo $carpetaDestino . $fotoNombre; ?>" alt="Foto de <?php echo $nombre; ?>" width="150">
        </div>
    </div>

    <div class="curriculum">
        <h3>Currículum</h3>
        <embed src="<?php echo $carpetaDestino . $cvNombre; ?>" width="100%" height="500px"></embed>
        <!-- <a href="<?php //echo $carpetaDestino . $cvNombre; ?>" target="_blank">Descargar Currículum</a>-->
    </div>
</body>
</html>