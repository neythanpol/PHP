<?php
    //$num es la variable que recoge el valor de la URL
    //http://localhost/.../desdeURL.php?num=5
    //http://localhost/...ruta.../nombre_script.php?vble=valor

    //http://localhost/misPHP/desdeURL.php?num1=5&num2=7
    $numero1 = $_GET["num1"];
    $numero2 = $_GET["num2"];
    echo "$numero1,$numero2";

?>