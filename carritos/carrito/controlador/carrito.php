<?php
    session_start();
    if(!isset($_GET['operacion'])){
        header('Location: ../index.php');
    }
    switch($_GET['operacion']){
        case "annadir":
            $cantidad = $_GET['cantidad'];
            annadirCarrito($_GET['id'], $cantidad);
            $vuelta = "";
            break;
        case "eliminar":
            $id = $_GET['id'];
            eliminarCarrito($id);
            $vuelta = "carrito";
            break;
        case "modificar":
            $id = $_GET['id'];
            $cantidad = $_GET['cantidad'];
            modificarCarrito($id, $cantidad);
            $vuelta = "carrito";
            break;
        }
        
        
        setcookie("carrito" , json_encode($_SESSION['carrito']), time()+60*60*24*30, "../");
        
        header('Location: ../index.php?' . $vuelta);
        
    
    function modificarCarrito($id_producto, $cantidad) {
        $root = "../";
        if(!isset($_SESSION['carrito'])) {
            header('Location: ../index.php');
        } else {
            $carrito = unserialize($_SESSION['carrito']);
            if (isset($carrito[$id_producto])) {
                $carrito[$id_producto]['cantidad'] = $cantidad;
            }
            $_SESSION['carrito'] = serialize($carrito);
        }
    
    }

    function eliminarCarrito($id_producto) {
        $root = "../";
        require_once __DIR__ . '/productos.php';
        $producto = obtenerProducto($id_producto);
        if(!isset($_SESSION['carrito'])) {
            header('Location: ../index.php');
        } else {
            $carrito = unserialize($_SESSION['carrito']);
            if (isset($carrito[$id_producto])) {
                unset($carrito[$id_producto]);
            }
            $_SESSION['carrito'] = serialize($carrito);
        }
    
    }

    function annadirCarrito($id_producto, $cantidad) {
        $root = "../";
        require_once __DIR__ . '/productos.php';
        $producto = obtenerProducto($id_producto);
        if(!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
            $carrito = $_SESSION['carrito'];
        } else {
            $carrito = unserialize($_SESSION['carrito']);
        }
        
        if (isset($carrito[$id_producto])) {
            $carrito[$id_producto]['cantidad'] += $cantidad;

            if($carrito[$id_producto]['cantidad'] < 1) {
                unset($carrito[$id_producto]);
            }
        } else {
            $carrito[$id_producto] = [
                //print_r($producto),
                'id' => $producto->getID(),
                'nombre' => $producto->getNombre(),
                'precio' => $producto->getPrecio(),
                'cantidad' => $cantidad,
            ];
        }
        $_SESSION['carrito'] = serialize($carrito);
        
    }
    