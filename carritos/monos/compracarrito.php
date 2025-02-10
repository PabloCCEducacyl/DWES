<?php
include('comun.php');
    $id_user = $_SESSION['id_sesion'];
    $selectcarrito = $mysqli->query("SELECT * FROM carrito 
                                     INNER JOIN productos ON id_producto_carrito_fk = id_producto
                                     WHERE id_user_carrito_fk = $id_user");

    date_default_timezone_set('Europe/Madrid');
    $fecha_compra = date("Y-m-d H:m:s"); //la hora sale con unos 21 minutos de retraso. no entiendo muy bien por que
                                         //Da igual si cambio la zona horaria o lo que haga

    //Crea id de carrito (para agrupar compras)
    $numerocarrito = $mysqli->query("SELECT MAX(id_carrito) FROM compras"); //Ver como se calcula el precio total del carrito
    if ($numerocarrito->num_rows == 0){                                     //Probablemente haya una forma mejor de hacer esto
        $nuevonumcarrito = 1; //si no hay ninguna compra (ningun id_carrito) se pone le introduce el numero 1
    }                                                                        
    else{
        $numerocarritorow = $numerocarrito->fetch_row();                        
        $viejonumcarrito = $numerocarritorow[0];                                                             
        $nuevonumcarrito = $viejonumcarrito + 1;
    }
    echo "Nuevo num carrito: " . $nuevonumcarrito . "<br>";

    while ($selectcarritoassoc = $selectcarrito->fetch_assoc()){
//        echo "id user: " . $id_user . "<br>";
//        echo "fecha compra: " . $fecha_compra . "<br>";
//        echo "Nombre: " . $selectcarritoassoc['Nombre_producto']. "<br>";
//        echo "Precio: " . $selectcarritoassoc['Precio']. "<br>";
//        echo "Cantidad " . $selectcarritoassoc['cantidad_carrito']. "<br>";
        $cantidad = $selectcarritoassoc['cantidad_carrito'];
//        echo "id producto " . $selectcarritoassoc['id_producto']. "<br><br>";
        $id_producto = $selectcarritoassoc['id_producto'];


        
        $comprasql = "INSERT INTO compras (id_producto_compra_fk, id_user_compra_fk, fecha_compra, cantidad, id_carrito)
                            VALUES ($id_producto, $id_user, '$fecha_compra', $cantidad, $nuevonumcarrito)"; //claramente 2022-01-12 es un string
                                     //$id_producto  $id_user  $fecha_compra $cantidad $nuevonumcarrito
        $mysqli->query($comprasql);
//        echo $comprasql . "<br><br>";
    }

        $borradocarritosql = "DELETE  FROM carrito WHERE id_user_carrito_fk=$id_user";
//        echo $borradocarritosql . "<br>";
        $mysqli->query($borradocarritosql);
        echo "<html><script>window.location.replace('comprarealizada.php')</script></html>";

?>