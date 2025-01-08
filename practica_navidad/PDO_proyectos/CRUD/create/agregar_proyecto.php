<?php
session_start();
$titulo = "Agregar Proyecto";
include('../../../includes/encabezado.php');
include('../../../conexion/conexionPDO.php');

function validarPeriodo($periodo) {
    return in_array($periodo, ['mayo', 'diciembre']);
}

function validarCurso($curso) {
    return preg_match('/^[1-4][a-zA-Z]{2,4}\d{4}$/', $curso);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario de creación
    $titulo = filtrado($_POST['titulo']);
    $descripcion = filtrado($_POST['descripcion']);
    $periodo = filtrado($_POST['periodo']);
    $curso = strtoupper(filtrado($_POST['curso']));
    $fecha = filtrado($_POST['fecha']);
    $nota = filtrado($_POST['nota']);
    $logotipo = file_get_contents($_FILES['logotipo']['tmp_name']);
    $pdf_proyecto = filtrado($_FILES['pdf_proyecto']['name']);
    $alumno = filtrado($_POST['alumno']);
    $tutor = filtrado($_POST['tutor']);

    // Validar el periodo
    if (!validarPeriodo($periodo)) {
        $_SESSION['error'] = "El periodo no es válido.";
        header("Location: agregar_proyecto.php");
        exit();
    }

    // Validar el curso
    if (!validarCurso($curso)) {
        $_SESSION['error'] = "El curso no es válido.";
        header("Location: agregar_proyecto.php");
        exit();
    }

    // Validar la fecha de presentación
    if (!strtotime($fecha)) {
        $_SESSION['error'] = "La fecha de presentación no es válida.";
        header("Location: agregar_proyecto.php");
        exit();
    }

    $conexion = obtenerConexion();

    if ($conexion) {
        try {
            // Insertar el nuevo proyecto
            $sql = "INSERT INTO proyecto (titulo, descripcion, periodo, curso, fecha, nota, logotipo, pdf_proyecto, alumno, tutor) VALUES (:titulo, :descripcion, :periodo, :curso, :fecha, :nota, :logotipo, :pdf_proyecto, :alumno, :tutor)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':periodo', $periodo);
            $stmt->bindParam(':curso', $curso);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':nota', $nota);
            $stmt->bindParam(':logotipo', $logotipo, PDO::PARAM_LOB);
            $stmt->bindParam(':pdf_proyecto', $pdf_proyecto);
            $stmt->bindParam(':alumno', $alumno);
            $stmt->bindParam(':tutor', $tutor);

            $stmt->execute();

            // Redirigir a listar_proyectos.php después de la creación
            header("Location: ../read/listar_proyectos.php");
            exit();
        } catch (PDOException $e) {
            echo "Error al agregar el proyecto: " . $e->getMessage();
        }
    } else {
        echo "Error en la conexión a la base de datos.";
    }
} else {
    // Mostrar el formulario de creación
    ?>
    <h2>Agregar Proyecto</h2>
    <?php
    if (isset($_SESSION['error'])) {
        echo "<p style='color:red;'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }
    ?>
    <form action="agregar_proyecto.php" method="post" enctype="multipart/form-data">
        <label for="titulo">Título: </label>
        <input type="text" name="titulo" id="titulo" required><br>

        <label for="descripcion">Descripción: </label>
        <textarea name="descripcion" id="descripcion" rows="4" cols="50" placeholder="Escribe una descripción del proyecto aquí.."></textarea><br>

        <label for="periodo">Periodo: </label>
        <select name="periodo" id="periodo" required>
            <option value="mayo">Mayo</option>
            <option value="diciembre">Diciembre</option>
        </select><br>

        <label for="curso">Curso: </label>
        <input type="text" name="curso" id="curso" pattern="^[1-4][a-zA-Z]{2,4}\d{4}$" title="El curso debe tener el formato correcto, por ejemplo: 2DAW2025" required><br>

        <label for="fecha">Fecha de Presentación: </label>
        <input type="date" name="fecha" id="fecha" pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD"><br>

        <label for="nota">Nota: </label>
        <input type="number" step="0.01" name="nota" id="nota"><br>

        <label for="logotipo">Logotipo: </label>
        <input type="file" name="logotipo" id="logotipo" accept="image/*"><br>

        <label for="pdf_proyecto">PDF del Proyecto: </label>
        <input type="file" name="pdf_proyecto" id="pdf_proyecto" accept="application/pdf"><br>

        <label for="alumno">Alumno: </label>
        <input type="number" name="alumno" id="alumno" required><br>

        <label for="tutor">Tutor: </label>
        <input type="number" name="tutor" id="tutor" required><br>

        <button type="submit">Agregar Proyecto</button>
    </form>
    <?php
}

include('../../../includes/pie.php');
?>