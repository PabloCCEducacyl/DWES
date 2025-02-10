<?php
require_once '../Modelo/Producto.php';
require_once '../Controlador/controlador.php';


if (isset($_POST['vaciar_carrito'])) {
    unset($_SESSION['carrito']);
}


if (isset($_POST['borrar_producto'])) {
    $indice = $_POST['indice'];
    unset($_SESSION['carrito'][$indice]); 
    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Carrito de la compra</title>
</head>
<body>

<div class="container">
    <header>
        <h1>Carrito de la Compra</h1>
    </header>

    <?php
    if (empty($_SESSION['carrito'])) {
        echo "<p>Todavia no hay productos T-T </p>";
    } else {
        echo "<h2>Productos en el carrito:</h2>";
        
        // Calculo total de todo el carrito
        $total = 0;

        foreach ($_SESSION['carrito'] as $indice => $producto) {
            $total+=$producto->getPrice();  
            echo "
            <div class='producto'>
                <img src='{$producto->getImageUrl()}' alt='{$producto->getName()}'>
                <div class='info'>
                    <p><strong>{$producto->getName()}</strong></p>
                    <p>Precio: {$producto->getPrice()}€</p>
                </div>
                <form method='post' action=''>
                    <input type='hidden' name='indice' value='{$indice}'>
                    <input type='submit' name='borrar_producto' value='Sacar del carro' class='borrar-btn'>
                </form>
            </div>";
        }
        
        echo "<hr>";
        echo "<div class='total'>
                <h3>Total: {$total}€</h3>
              </div>";

        echo '
        <form method="post" action="" class="vaciar-form">
            <input type="submit" name="vaciar_carrito" value="Vaciar carro" class="vaciar-btn">
        </form>';
    }
    ?>

    <div class="actions">
        <p><a href="productos.php" class="boton-volver">Volver al catalogo</a></p>
        <p><a href="realizar_pago.php" class="boton-comprar">Comprar</a></p>
    </div>
</div>

</body>
</html>
