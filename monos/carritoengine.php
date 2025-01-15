<?php
include('comun.php');
$id_producto = $_REQUEST["id_producto"];
echo "id_producto: ".$id_producto."<br>";
$cantidad = $_REQUEST["num_producto"];
$user = $_SESSION["id_sesion"];
$clase = $_REQUEST['clase']; //clase aquí solo es para redirigir a la pagina de compras de la clase que sea
$checkexistesql = "SELECT * FROM carrito WHERE id_user_carrito_fk = $user";
$checkexiste = $mysqli->query($checkexistesql);
$cambio = 0; //es para comprobar si se cambia una entrada o se introduce una nueva con el if
echo "antes: ". $cambio . "<br>";
while ($checkexisteassoc = $checkexiste->fetch_assoc()){
    if ($checkexisteassoc["id_producto_carrito_fk"] == $id_producto ){
        $cambio = 1;
        $id_producto_update = $checkexisteassoc["id_producto_carrito_fk"];
        $cantidadvieja = $checkexisteassoc["cantidad_carrito"];
        $cantidadnueva = $cantidadvieja + $cantidad;
        $sql = "UPDATE carrito SET cantidad_carrito = $cantidadnueva WHERE id_producto_carrito_fk = $id_producto ";
        $mysqli->query($sql);
    }
}
if ($cambio == 0){
    $sql = "INSERT INTO carrito (id_producto_carrito_fk,id_user_carrito_fk,cantidad_carrito)
    VALUES ('$id_producto',$user,$cantidad)";
$mysqli->query($sql);   
}
echo "<html><script>window.location.replace('tienda.php?clase=".$clase."')</script></html>";
?>