<?php
$fp = fopen("archivo.txt", "r");
if ($fp === FALSE) {
echo "No existe el fichero o no se pudo leer<br>";
}else{
 while(!feof($fp) ){
$car=fgetc($fp);
echo $car;
}
}
fclose($fp);

   
?>