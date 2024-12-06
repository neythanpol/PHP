<?php
// C:/Users/natan.blarod.1/Documents/xampp/htdocs/fpdf --> Ruta absoluta de clase

// Indico la ruta donde esta guardada la carpeta "fpdf" para referenciarla
// Añado al final el nombre del archivo que voy a crear
require('../../fpdf/fpdf.php');

class PDF extends FPDF {
    // Encabezado
    function Header() {
        // Fuente 
        $this -> SetFont('Arial', 'B', 12);

        // Título
        $this -> Cell(0, 10, 'Listado de Personas', 0, 1, 'C');
        $this -> Ln(10); // Salto de línea
    }

    // Pie de Página
    function Footer() {
        // Posición: a 1.5 cm del final
        $this -> SetY(-15);

        // Fuente
        $this -> SetFont('Arial', 'I', 8);

        // Texto del pie de página
        $this -> Cell(0, 10, 'Visitanos en nuestro sitio web: www.ejemplo.com', 0, 0, 'R');
    }
}

// Conexión a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'pruebas');
if ($mysqli -> connect_error) {
    die('Error de conexión: ' . $mysqli -> connect_error);
}

// Consulta a la base de datos
$query = "SELECT * FROM persona";
$resultado = $mysqli -> query($query);

$carpetaPersonas = '../../fpdf/personas';

if (!file_exists($carpetaPersonas)) {
    if (mkdir($carpetaPersonas, 0755, true)) {
        echo "Carpeta creada exitosamente en: " . $carpetaPersonas;
    } else {
        echo "Error al crear la carpeta en: " . $carpetaPersonas;
    }
} else {
    echo "La carpeta ya existe en: " . $carpetaPersonas;
}

if ($resultado -> num_rows > 0) {
    while ($row = $resultado -> fetch_assoc()) {
        // Crear instancia de PDF
        // Ignorar este error
        $pdf = new PDF();

        $pdf -> AliasNbPages();
        $pdf -> AddPage();
        $pdf -> SetFont('Arial','',12);

        // Convertir texto a ISO-8859-1
        $nombre = mb_convert_encoding($row['nombre'], 'ISO-8859-1', 'UTF-8');
        $apellidos = mb_convert_encoding($row['apellidos'], 'ISO-8859-1', 'UTF-8');
        $telefono = mb_convert_encoding($row['telefono'], 'ISO-8859-1', 'UTF-8');

        // Agregar datos al PDF
        $pdf -> Cell(0, 10, 'ID: ' . $row['id_persona'], 0, 1);
        $pdf -> Cell(0, 10, 'Nombre: ' . $row['nombre'] . ' ' . $row['apellidos'], 0, 1);
        $pdf -> Cell(0, 10, 'Teléfono: ' . $row['telefono'], 0, 1);

        // Generar el PDF con un nombre basado en el ID
        $filename = '../../fpdf/personas/alumno_' . $row['id_persona'] . '.pdf';
        $pdf -> Output('F', $filename);

        echo "PDF Generado para: " . $row['nombre'] . ' ' . $row['apellidos'] . " -> $filename<br>";
    }
} else {
    $pdf -> Cell(0, 10, 'No se encontraron personas.', 0, 1);
}

// Cierro la conexión
$mysqli -> close();
?>