<?php
require_once '../Modelo/Producto.php';
require_once '../Controlador/controlador.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Realizar Pago de Productos</title>
</head>
<body>

<div class="container">
    <?php
    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        unset($_SESSION['carrito']); 
        echo "
        <div class='exito'>
            <h2>¡Pago Completado!</h2>
            <p>Tu pago ha sido exitoso. El carrito ha sido vaciado.</p>
            <div class='icono'>
                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='48' height='48' fill='#2ecc71'>
                    <path d='M10 15l5-5-1.41-1.41L10 12.17l-2.59-2.58L6 10l4 4z'/>
                    <path d='M12 21C6.48 21 2 16.52 2 12s4.48-9 10-9 10 4.48 10 9-4.48 9-10 9zm0-16c-3.32 0-6 2.68-6 6s2.68 6 6 6 6-2.68 6-6-2.68-6-6-6z'/>
                </svg>
            </div>
            <p>Gracias por tu compra. Te hemos enviado un recibo a tu correo electrónico.</p>
        </div>";
    } else {
        echo "
        <div class='error'>
            <h2>No hay productos en el carrito</h2>
            <p>No se puede realizar el pago porque el carrito está vacío.</p>
        </div>";
    }
    ?>

    <div class="acciones">
        <a href="productos.php" class="boton-volver">Volver a la lista de productos</a>
    </div>
</div>

</body>
</html>
