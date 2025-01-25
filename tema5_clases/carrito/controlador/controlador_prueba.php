<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require_once("../modelo/Producto.php");
    include '../global/conexion.php';

    // Inicializar el carrito si no existe
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Recuperar la cookie del carrito si existe
    if (isset($_COOKIE['carrito'])) {
        $_SESSION['carrito'] = unserialize($_COOKIE['carrito']);
    }

    // Obtener la conexión a la base de datos
    $pdo = conexion();

    // Obtener la lista de productos desde la base de datos
    $sql = "SELECT * FROM productos";
    $stmt = $pdo->query($sql);
    $productos = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $productos[] = new Producto($row['id'], $row['nombre'], $row['precio'], $row['descripcion'], $row['imagen']);
    }

    // Función para actualizar la cookie del carrito
    function actualizar_cookie_carrito() {
        setcookie('carrito', serialize($_SESSION['carrito']), time() + (24 * 60 * 60 * 30), "/");
    }

    // Manejar la acción de agregar al carrito
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agregar'])) {
        $indice = $_POST['indice'];
        if (isset($productos[$indice])) {
            $producto_serializado = serialize($productos[$indice]);
            if (isset($_SESSION['carrito'][$producto_serializado])) {
                $_SESSION['carrito'][$producto_serializado]++;
            } else {
                $_SESSION['carrito'][$producto_serializado] = 1;
            }
            actualizar_cookie_carrito();
        }
        header('Location: ../vista/productos.php');
        exit();
    }

    // Manejar la acción de eliminar un producto del carrito
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminar'])) {
        $indice = $_POST['indice'];
        $producto_serializado = array_keys($_SESSION['carrito'])[$indice];
        if (isset($_SESSION['carrito'][$producto_serializado])) {
            if ($_SESSION['carrito'][$producto_serializado] > 1) {
                $_SESSION['carrito'][$producto_serializado]--;
            } else {
                unset($_SESSION['carrito'][$producto_serializado]);
            }
            actualizar_cookie_carrito();
        }
        header('Location: ../vista/carrito.php');
        exit();
    }

    // Manejar la acción de vaciar el carrito
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['vaciar'])) {
        $_SESSION['carrito'] = [];
        actualizar_cookie_carrito();
        header('Location: ../vista/carrito.php');
        exit();
    }

    // Actualizar la cookie del carrito al cargar la página de productos
    actualizar_cookie_carrito();
?>
