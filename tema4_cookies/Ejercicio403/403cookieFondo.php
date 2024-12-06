<?php
// Configurar la cookie si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['theme'])) {
    $theme = $_POST['theme']; // Obtener el tema seleccionado
    setcookie('theme', $theme, time() + (86400 * 30), "/"); // Guardar la cookie por 30 días
}

// Recuperar el tema actual de la cookie o establecer un valor predeterminado
$currentTheme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light-mode';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modo Claro y Oscuro</title>
    <style>
        body.light-mode {
            background-color: #ffffff;
            color: #000000;
        }
        body.dark-mode {
            background-color: #000000;
            color: #ffffff;
        }
        .theme-form {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
</head>
<body class="<?php echo $currentTheme; ?>">
    <form method="POST" class="theme-form">
        <label>
            <input type="radio" name="theme" value="light-mode" 
                <?php echo $currentTheme === 'light-mode' ? 'checked' : ''; ?>>
            Modo Claro
        </label>
        <label>
            <input type="radio" name="theme" value="dark-mode" 
                <?php echo $currentTheme === 'dark-mode' ? 'checked' : ''; ?>>
            Modo Oscuro
        </label>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
