<?php
    session_start();
    include 'global/config.php';
    include 'global/conexion.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        // Verificar las credenciales
        if ($usuario === 'admin' && $password === 'admin') {
            $_SESSION['admin'] = true;
            header('Location: admin.php');
            exit();
        } else {
            $error = "Credenciales incorrectas";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" name="usuario" id="usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>