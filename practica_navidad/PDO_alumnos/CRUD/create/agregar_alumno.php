<?php
session_start();
$titulo = "Agregar Alumno";
include('../../../includes/encabezado.php');
include('../../../conexion/conexionPDO.php');

function validarDNI($dni) {
    $letra = substr($dni, -1);
    $numeros = substr($dni, 0, -1);
    if (strlen($numeros) != 8 || !is_numeric($numeros)) {
        return false;
    }
    $letras_validas = "TRWAGMYFPDXBNJZSQVHLCKE";
    $indice = intval($numeros) % 23;
    return $letras_validas[$indice] == strtoupper($letra);
}

function formatearNombre($nombre) {
    $nombre = trim($nombre); // Eliminar espacios en blanco al principio y al final
    $nombre = ucwords(strtolower($nombre)); // Convertir a minúsculas y poner la primera letra en mayúsculas
    return $nombre;
}

function validarTelefono($telefono) {
    return preg_match('/^\+?\d{9,15}$/', $telefono);
}

function validarCurso($curso) {
    return preg_match('/^[1-4][a-zA-Z]{2,4}\d{2}$/', $curso);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario de creación
    $dni = strtoupper(filtrado($_POST['dni']));
    $nombre = formatearNombre(filtrado($_POST['nombre']));
    $apellido1 = formatearNombre(filtrado($_POST['apellido1']));
    $apellido2 = formatearNombre(filtrado($_POST['apellido2']));
    $email = filtrado($_POST['email']);
    $telefono = filtrado($_POST['telefono']);
    $curso = strtoupper(filtrado($_POST['curso']));

    // Validar el DNI
    if (!validarDNI($dni)) {
        $_SESSION['error'] = "El DNI no es válido.";
        header("Location: agregar_alumno.php");
        exit();
    }

    // Validar el email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "El email no es válido.";
        header("Location: agregar_alumno.php");
        exit();
    }

    // Validar el teléfono
    if (!validarTelefono($telefono)) {
        $_SESSION['error'] = "El teléfono no es válido.";
        header("Location: agregar_alumno.php");
        exit();
    }

    // Validar el curso
    if (!validarCurso($curso)) {
        $_SESSION['error'] = "El curso no es válido.";
        header("Location: agregar_alumno.php");
        exit();
    }

    $conexion = obtenerConexion();

    if ($conexion) {
        try {
            // Insertar el nuevo alumno
            $sql = "INSERT INTO alumnos (dni, nombre, apellido1, apellido2, email, telefono, curso) VALUES (:dni, :nombre, :apellido1, :apellido2, :email, :telefono, :curso)";
            $stmt = $conexion -> prepare($sql);
            $stmt -> bindParam(':dni', $dni);
            $stmt -> bindParam(':nombre', $nombre);
            $stmt -> bindParam(':apellido1', $apellido1);
            $stmt -> bindParam(':apellido2', $apellido2);
            $stmt -> bindParam(':email', $email);
            $stmt -> bindParam(':telefono', $telefono);
            $stmt -> bindParam(':curso', $curso);

            $stmt -> execute();

            // Redirigir a listar_alumnos.php después de la creación
            header("Location: ../read/listar_alumnos.php");
            exit();
        } catch (PDOException $e) {
            echo "Error al agregar el alumno: " . $e -> getMessage();
        }
    } else {
        echo "Error en la conexión a la base de datos.";
    }
} else {
    // Mostrar el formulario de creación
    ?>
    <h2>Agregar Alumno</h2>
    <?php
        if (isset($_SESSION['error'])) {
            echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']);
        }
    ?>
    <form action="agregar_alumno.php" method="post" class="formulario">
        <label for="dni">DNI: </label>
        <input type="text" name="dni" id="dni" class="input-text" pattern="\d{8}[A-Za-z]" title="El DNI debe tener 8 números seguidos de una letra" required><br>

        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" class="input-text" required><br>

        <label for="apellido1">Primer Apellido: </label>
        <input type="text" name="apellido1" id="apellido1" required><br>

        <label for="apellido2">Segundo Apellido: </label>
        <input type="text" name="apellido2" id="apellido2" class="input-text"><br>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" class="input-text" required><br>

        <label for="telefono">Teléfono: </label>
        <input type="text" name="telefono" id="telefono" class="input-text" pattern="^\+?\d{9,15}$" title="El teléfono debe tener entre 9 y 15 dígitos y puede incluir un prefijo internacional opcional"><br>

        <label for="curso">Curso: </label>
        <input type="text" name="curso" id="curso" class="input-text" pattern="^[1-4][a-zA-Z]{2-4}\d{2}$" title="El curso debe tener el formato correcto, por ejemplo: 2DAW25" required><br>

        <button type="submit" class="btn-submit">Agregar Alumno</button>
    </form>
    <?php
}

include('../../../includes/pie.php');
?>