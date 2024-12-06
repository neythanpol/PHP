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

// Crear instancia de PDF
// Ignorar este error
$pdf = new PDF();

$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> SetFont('Arial','',12);

// Conexión a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'pruebas');
if ($mysqli -> connect_error) {
    die('Error de conexión: ' . $mysqli -> connect_error);
}

// Consulta a la base de datos
$query = "SELECT nombre, apellidos, telefono FROM persona";
$resultado = $mysqli -> query($query);

if ($resultado -> num_rows > 0) {
    while ($row = $resultado -> fetch_assoc()) {
        // Agregar datos al PDF
        $pdf -> Cell(0, 10, 'Nombre: ' . $row['nombre'] . ' ' . $row['apellidos'] . ' - Teléfono: ' . $row['telefono'], 0, 1);
    }
} else {
    $pdf -> Cell(0, 10, 'No se encontraron personas.', 0, 1);
}

// Cierro la conexión
$mysqli -> close();

// Nombre del fichero y opcion de descarga
$pdf -> Output('I', 'listado_personas.pdf');

?>