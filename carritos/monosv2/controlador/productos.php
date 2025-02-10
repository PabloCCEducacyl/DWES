<?php
    require_once($root."modelo/Producto.php");

    $productos = [
        new Producto(3, 'Mono Dardo', 170.00, 'Lanza dardos a Bloons cercanos.', 'primario', 'dardo'),
        new Producto(4, 'Mono Bumerán', 275.00, 'Lanza un bumerán en una direcion curva.', 'primario', 'bumeran'),
        new Producto(5, 'Lanza Bombas', 445.00, 'Lanza una poderosa bomba a los Bloons.', 'primario', 'bomba'),
        new Producto(6, 'Lanza Chinchetas', 240.00, 'Lanza chinchetas en 8 direcciones.', 'primario', 'tack'),
        new Producto(7, 'Mono de Hielo', 450.00, 'Explota y congela globos cercanos.', 'primario', 'hielo'),
        new Producto(8, 'Mono de Pegamento', 235.00, 'Dispara una bola de pegamento que ralentiza Bloons.', 'primario', 'pegamento'),
        new Producto(9, 'Mono Francotirador', 300.00, 'Puede disparar a cualquier Bloon que este en pantalla con su rifle.', 'militar', 'sniper'),
        new Producto(10, 'Mono Submarino', 275.00, 'Dispara torpedos teledirigidos a Bloons cercanos. Debe estar en el agua.', 'militar', 'submarino'),
        new Producto(11, 'Mono Bucanero', 425.00, 'Dispara un dardo pesado a cada lado de su barco. Debe estar en el agua.', 'militar', 'bucanero'),
        new Producto(12, 'Mono As', 680.00, 'Vuela por la pantalla disparando oleadas de dardos.', 'militar', 'avion'),
        new Producto(13, 'Mono Mortero', 640.00, 'Lanza un proyectil explosivo a una zona del mapa.', 'militar', 'mortero'),
        new Producto(14, 'Mono Gatling', 720.00, 'Usa una ametralladora de dardos.', 'militar', 'gatling'),
        new Producto(15, 'Mono Brujo', 320.00, 'Lanza bolas de energía a los Bloons.', 'magia', 'brujo'),
        new Producto(16, 'Super Mono', 2125.00, 'Lanza cientos de dardos a velocidades hipersónicas con un gran alcance. ', 'magia', 'super'),
        new Producto(17, 'Mono Ninja', 425.00, 'Lanza shurikens a los Bloons cercanos. Puede alcanzar a Bloons camuflados.', 'magia', 'ninja'),
        new Producto(18, 'Alquimista', 470.00, 'Mancha a los Bloons cercanos con acido. También puede mejorar a monos cercanos con sus pociones.', 'magia', 'alquimia'),
        new Producto(19, 'Druida', 340.00, 'Crea una explosión de espinos en cada ataque.', 'magia', 'druida'),
        new Producto(20, 'Granja de Bananas', 1060.00, 'Genera bananas cada ronda para convertirlas en dinero.', 'apoyo', 'granja'),
        new Producto(21, 'Fábrica de chinchetas', 850.00, 'Genera chinchetas y las deja en el suelo cercano para pinchar los Bloons que pasen.', 'apoyo', 'fabrica'),
        new Producto(22, 'Pueblo Mono', 1020.00, 'Centro de la sociedad Mono. Mejora a los monos cercanos.', 'apoyo', 'pueblo'),
        new Producto(23, 'Mono Ingeniero', 380.00, 'Pone torretas y puede mejorar a aliados.', 'apoyo', 'ingeniero')
    ];