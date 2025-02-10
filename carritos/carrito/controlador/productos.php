<?php
    require_once($root."modelo/Producto.php");

    $productos = [
        new Producto(1, "Gorbino's Quest", 2.99),
        new Producto(2, "G-Force", 5.99),
        new Producto(3, "Metin 2", 1.99),
        new Producto(4, "Honkai: Star Rail", 19.99),
        new Producto(5, "Donkey Kong Country", 5.99),
        new Producto(6, "Stardew Valley", 4.00),
        new Producto(7, "Mario Kart Wii", 3.99),
        new Producto(8, "The Binding of Isaac", 7.99),
        new Producto(9, "Cyberpuk 2077", 9.99),
        new Producto(10, "Horizon: Forbidden West", 7.99)
    ];
    
    function obtenerProducto($id) {
        $productos = [
            new Producto(1, "Gorbino's Quest", 2.99),
            new Producto(2, "G-Force", 5.99),
            new Producto(3, "Metin 2", 1.99),
            new Producto(4, "Honkai: Star Rail", 19.99),
            new Producto(5, "Donkey Kong Country", 5.99),
            new Producto(6, "Stardew Valley", 4.00),
            new Producto(7, "Mario Kart Wii", 3.99),
            new Producto(8, "The Binding of Isaac", 7.99),
            new Producto(9, "Cyberpuk 2077", 9.99),
            new Producto(10, "Horizon: Forbidden West", 7.99)
        ];


        foreach($productos as $producto) {
            if($producto->getId() == $id) {
                return $producto;
            }
        }
        return null;
    }