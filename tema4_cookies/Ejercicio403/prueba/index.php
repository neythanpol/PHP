<?php
// Iniciar la sesión y definir la cookie para el fondo
if (isset($_GET['fondo'])) {
    setcookie('fondo', $_GET['fondo'], time() + (2 * 24 * 60 * 60), '/'); // Expira en 2 días
    header('Location: index.php');
    exit;
}

// Eliminar la cookie si se solicita
if (isset($_GET['eliminar_cookie'])) {
    setcookie('fondo', '', time() - 3600, '/'); // Eliminar cookie
    header('Location: index.php');
    exit;
}

// Obtener el valor de la cookie
$fondo = isset($_COOKIE['fondo']) ? $_COOKIE['fondo'] : 'claro'; // Por defecto, claro
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fondo Claro/Oscuro</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: <?php echo $fondo == 'oscuro' ? '#121212' : '#fff'; ?>;
            color: <?php echo $fondo == 'oscuro' ? '#fff' : '#000'; ?>;
            font-family: Arial, sans-serif;
            transition: background-color 0.3s, color 0.3s;
            margin: 0;
            padding: 0;
            height: 100vh;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            text-align: center;
        }
        button {
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Elige el fondo de la página</h1>
        <div class="contenido">
            <a href="index.php?fondo=claro"><button>Fondo Claro</button></a>
            <a href="index.php?fondo=oscuro"><button>Fondo Oscuro</button></a>
            <a href="index.php?eliminar_cookie=true"><button>Eliminar Cookie</button></a>
        </div>
    </div>

</body>
</html>
