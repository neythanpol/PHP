<?php
//Seleccionamos un archivo a leer
$contenido = file_get_contents("fichero_ejemplo.txt");
echo "Contenido del fichero: $contenido<br>";

//Insertamos ese comentario en el fichero indicado
$res=file_put_contents("fichero_salida.txt", "Fichero creado con file put_contents");
if($res){
echo "Fichero creado con éxito";
}else{
echo "Error al crear el fichero";
}

echo "Directorio actual: " . __DIR__."<br>";
 
echo "Línea actual :" .__LINE__."<br>";
 
echo "Ruta del archivo actual: " .__FILE__;


   
?>