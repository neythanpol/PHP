<?php
    session_start();

    foreach ($_SESSION as $value) {
        echo $value . "<br>";
    }
    echo session_id();
    echo "<br><a href='ejemplo_eliminar_sesion.php'>Eliminar la sesión</a>"
?> 