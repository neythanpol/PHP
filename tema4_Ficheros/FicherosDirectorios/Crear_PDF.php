<?php
// C:/Users/natan.blarod.1/Documents/xampp/htdocs/fpdf --> Ruta absoluta de clase

// Indico la ruta donde esta guardada la carpeta "fpdf" para referenciarla
// Añado al final el nombre del archivo que voy a crear
require('../../../../fpdf/fpdf.php');
// Ignorar este error
$pdf = new FPDF();

$pdf -> AddPage();
$pdf -> SetFont('Arial','B',16);
$pdf -> Cell(40,10,'PDF generado con php y fpdf');
// Nombre del fichero y opcion de descarga
$pdf -> Output('basico.pdf','D');

?>