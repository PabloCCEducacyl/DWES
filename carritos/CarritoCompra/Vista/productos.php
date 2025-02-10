<?php
require_once '../Controlador/controlador.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author"   content="Javier Garcia">
    <link rel="stylesheet" href="style.css">
    <title>Tienda de Mangas</title>
</head>
<body>
    <header>
       <a href="carrito.php" class="boton-volver">Carrito</a>
        <h1>Manga Shop</h1>
        <h2>Catálogo de Productos</h2>
    </header>
    <section class="catalogo">
        <div class="product-list">
            <?php foreach ($productos as $indice => $producto){ ?>
                <div class="product-item">
                    <img src="<?= $producto->getImageUrl() ?>">
                    <div class="product-info">
                        <h3><?= $producto->getName()?></h3>
                        <p><?= $producto->getPrice()?>€</p>
                    </div>
                    <form action="../Controlador/controlador.php" method="post">
                        <input type="hidden" name="indice" value="<?= $indice ?>">
                        <input type="submit" name="agregar" value="Añadir al carrito">
                    </form>
                </div>
            <?php } ?>
        </div>
    </section>

    <footer>
        
    </footer>
</body>
</html>
