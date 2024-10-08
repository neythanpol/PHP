<?php
$titulo = "Página con includes";//Declarada antes de usar
include("encabezado.php");
?>
<h1><?= $titulo ?></h1>
<?php
include("pie.html");
?>