<?php
    $frutas = array("naranja", "pera", "manzana");
    $frutas2 = ["naranja", "pera", "manzana"];
    $frutas3 = [];
    $frutas3[0] = "naranja";
    $frutas3[1] = "pera";
    $frutas3[] = "manzana"; // lo añade al final

    foreach ($frutas as $fruta) {
        echo $fruta;
    }