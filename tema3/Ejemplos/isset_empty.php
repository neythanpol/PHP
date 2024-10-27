<?php
if (isset($_GET["nombre"])) {
    echo "Hola ".$_GET["nombre"];
}else{
    echo "Error, falta el nombre";
}
?>

<?php
if (empty($_POST["nombre"])) {
    echo "Error, falta el nombre";
}else{
    echo "Hola ".$_POST["nombre"];
}
?>

<?php
if (isset($_POST["nombre"], $_POST["edad"])) {// Deben existir ambos
    echo "Hola ".$_POST["nombre"]." tienes ".$_POST["edad"]." edad";
}else{
    echo "Falta el nombre y/o la edad";
}
?>