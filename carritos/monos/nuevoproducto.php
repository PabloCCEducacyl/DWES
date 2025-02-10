    <?php
    include("comun.php");
    $nombreproducto = $_REQUEST["Nombre_producto"];
    $precio = $_REQUEST["precio"];
    $descripcion = $_REQUEST["descripcion"];
    $clase = $_REQUEST["clase"];
    $id_mono = $_REQUEST["id_mono"];
    if($_SESSION["admin"] == 1){
    $sql = "INSERT INTO productos (Nombre_producto, precio, clase, id_mono, descripcion_producto)
                          VALUES ('$nombreproducto',$precio,'$clase','$id_mono','$descripcion');";
    $mysqli->query($sql);
    echo "<html><head><script>window.location.replace('administrador.php')</script></head></html>";}
    else{
        echo "<html><head><script>window.location.replace('index.php')</script></head></html>";
    }
?>