<?php
    // Array de archivos y directorios
    // Indicamos la ruta que queremos listar con un array
    chdir('C:/Users/natan.blarod.1/Documents/xampp/htdocs/misPHP/PHP/tema4_Ficheros');

    $directorioNuevo = "prueba";
    mkdir($directorioNuevo);

    if (file_exists("prueba/")) {
        echo "El archivo existe.";
        $file = "../prueba/archivo.txt";
        $texto = "Hola, puedes leerme?";

        $fp = fopen($file, "w");

        fwrite($fp, $texto);
        fclose($fp);
        
    } else {
        echo "El archivo no existe.";
    }

    

    // Aqui indicas el nombre de la carpeta que quieres abrir dentro del directorio indicado
    $directorio = "prueba";
    $archivos = scandir($directorio, 1);
    print_r($archivos);

    //Contenido del directorio
    if ($gestor = opendir($directorio)) {
        echo "Gestor en directorio: $gestor\n<br />";
        echo "Entradas:\n<br />";
        //Iteramos sobre el directorio:
        while (false !== ($entrada = readdir($gestor))){
            echo "$entrada\n <br />";
        }
        closedir($gestor);
        
    }
?>