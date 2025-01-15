<?php  
    /*
    include("comun.php");
    $user = $_SESSION["id_sesion"];

    //se cicla por todos los productos en el carrito y despues se borran
    $carritoactualsql = "SELECT * FROM carrito WHERE id_user_carrito_fk = $user";
    $carritoactual = $mysqli->query($carritoactual_assoc);
    while($carritoactual_assoc = $carritoactual->fetch_assoc()){
        $comprasql = 'INSERT INTO compras (id_producto_compra_fk, id_user_compra_fk, fecha_compra, cantidad, id_carrito)
                            VALUES ($carritoactual_assoc["id_producto_carrito_fk"], id_user_carrito_fk, fecha_compra)';
    }
               
    
    CODIGO TIENDA ANTIGUO
    REDIRIGE A INDEX
    
    
    */ 


    echo "<html><script>window.location.replace('index.php')</script></html>"


    ?>