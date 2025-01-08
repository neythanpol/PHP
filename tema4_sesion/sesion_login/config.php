<?php
    // Usamos password_hash para generar el hash de la contraseña de admin
    $adminPasswordHash = password_hash('admin', PASSWORD_DEFAULT);
?>