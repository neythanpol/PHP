<?php
    // Crea un ejemplo donde variables $nombre y $edad se almacenen en la variable de sesión. Enlaza a otra página donde muestre el valor del array $_SESSION y el id.
    session_start();

    $_SESSION['nombre'] = "Natán";
    $_SESSION['edad'] = 29;

    echo "Hola " . $_SESSION['nombre'];
    echo "<br><a href='ejemplo_nombre_edad_2.php'>Me uno a la sesión</a>"
?>