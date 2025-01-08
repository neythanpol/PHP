<?php
$logotipo = null;
    if (isset($_FILES['logotipo']) && $_FILES['logotipo']['error'] === UPLOAD_ERR_OK) {
        // Verificar tamaño del archivo (64MB máximo en este ejemplo)
        if ($_FILES['logotipo']['size'] > 64 * 1024 * 1024) {
            echo "El archivo de imagen es demasiado grande.";
            exit;
        }
        // Leer contenido del archivo en formato BLOB
        $logotipo = file_get_contents($_FILES['logotipo']['tmp_name']);
    } else {
        echo "Por favor, sube un logotipo válido.";
        exit;
    }


    // Manejo del archivo PDF
    $archivoPDF = null;
    if (isset($_FILES['pdf_proyecto']) && $_FILES['pdf_proyecto']['error'] === UPLOAD_ERR_OK) {
        // Verificar tamaño del archivo (64MB máximo en este ejemplo)
        if ($_FILES['pdf_proyecto']['size'] > 64 * 1024 * 1024) { //maximo 64 bytes
            echo "El archivo PDF es demasiado grande.";
            exit;
        }
        // Leer contenido del archivo en formato BLOB
        $archivoPDF = file_get_contents($_FILES['pdf_proyecto']['tmp_name']);
    } else {
        echo "Por favor, sube un archivo PDF válido.";
        exit;
    }


    if ($_FILES['logotipo']['size'] > 10 * 1024 * 1024){} //maximo 10 bytes
    if ($_FILES['logotipo']['size'] > 500 * 1024) {} //maximo 500 kb
    if ($_FILES['archivo']['size'] > 1 * 1024 * 1024 * 1024) {} //maximo 1 GB