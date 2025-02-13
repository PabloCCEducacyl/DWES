<?php
require_once('Libro.php');
session_start();
//Genera una Lista de libros (simulando una base de datos)

$libros = [
    new Libro(0, "principito", 10, 20),
    new Libro(1, "mafalda", 20, 10),
    new Libro(2, "starwars", 5, 12),
    new Libro(3, "asterix", 8, 1),
    new Libro(4, "Pablo Campuzano Cuadrado", 30.4, 20),
    new Libro(5, "obelix", 3, 0),
    new Libro(6, "mortadelo", 4, 4),
    new Libro(7, "filemon", 15, 12),
    new Libro(8, "piratas", 33, 4),
    new Libro(9, "hadas", 1, 35),
    new Libro(10, "spiderman", 2.3, 15),
];

//Contiene la lógiga de negocio del manejo del carrito
if(!isset($_SESSION['carrito'])){
    $_SESSION['carrito'] = [];
}

if(isset($_GET['operacion'])){
    switch($_GET['operacion']){
        case "annadir":
            //$cantidad = 1;
            annadirCarrito($_GET['id'], $_GET['cantidad']);
            header('Location: libros.php');
            break;
        case "editar":
            annadirCarrito($_GET['id'], $_GET['cantidad']);
            header('Location: carrito_libro.php');
            break;
        case "borrar":
            unset($_SESSION['carrito'][$_GET['id']]);
            header('Location: carrito_libro.php');
            break;
    }
}

function annadirCarrito($id, $cantidad){
    //echo $id . "   " . $cantidad . "<br>";
    if(isset($_SESSION['carrito'][$id])){
        $_SESSION['carrito'][$id] += $cantidad;
    } else {
        $_SESSION['carrito'][$id] = 0;
        $_SESSION['carrito'][$id] = $cantidad;
    }
    $libro = getByID($id);
    //maximo de libros
    if($_SESSION['carrito'][$id] > $libro->getCantidad()){
        //echo "aaaaaaaaaaa - {$_SESSION['carrito'][$id]} --- {$libro->getCantidad()}";
        $_SESSION['carrito'][$id] = $libro->getCantidad();
    }
    //si es 0 o menos borra
    if($_SESSION['carrito'][$id] <= 0){
        unset($_SESSION['carrito'][$id]);
    }

};

function getByID($id){
    global $libros;
    foreach($libros as $libro){
        if($libro->getID() == $id){
            return $libro;
        }
    }
}
?>
