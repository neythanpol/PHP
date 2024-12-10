<?php
    // Crea la sesión (session_start()) y si no existe una variable de sesión 'count', la crea con valor 0. Si existe, le suma 1.
    session_start();
    if (!isset($_SESSION['count'])) {
        $_SESSION['count'] = 0;
    } else {
        $_SESSION['count']++;
    }
    echo "Hola " . $_SESSION['count'];
    echo "<br><a href='sesiones_unirse_2.php'>Me uno a la sesión</a>"
?>