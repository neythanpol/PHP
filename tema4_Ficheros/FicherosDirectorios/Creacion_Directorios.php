<?php
    //Creamos un directorio
    chdir('C:/Users/natan.blarod.1/Documents/xampp/htdocs/misPHP/PHP/tema4_Ficheros/FicherosDirectorios');
    
    $directorio = "nuevo";
    mkdir($directorio);

    if (file_exists("nuevo/")) {
        echo "El archivo existe.";
    } else {
        echo "El archivo no existe.";
    }
?>