<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
</head>
<body>
    <?php
    include("comun.php");
    $id_session = $_SESSION["id_sesion"];
    $checkadmin = "SELECT administrador FROM usuarios WHERE id_user = $id_session";
    $checkadminconsulta = $mysqli->query($checkadmin);
    while($admin = $checkadminconsulta->fetch_row()){
        if($admin == 0){
            echo "<html><head><script>window.location.replace('index.php')</script></head></html>";
        }}
    ?>
    <h1>Panel de administrador</h1>
    <a href="index.php">Volver a Inicio</a>
    <hr>
    <h3>Dar de alta producto</h3>

        <form action="nuevoproducto.php">
            <p>Nombre del producto (Nombre completo)</p>
            <input type="text" name="Nombre_producto">
            <p>Precio</p>
            <input type="number" min="0" name="precio">
            <p>Descripcion</p>
            <input type="text" name="descripcion">
            <p>Clase</p>
            <input type="text" name="clase">
            <p>id mono (identifica al producto dentro de la clase)</p>
            <input name="id_mono">
            <p>La ruta de la imagen debe ser /monos/(clase)/(id mono).png</p>
            <input type="submit" value="Nuevo Producto">
        </form>
        <hr>

    <h3>Dar de baja producto</h3>
        <iframe src="listarproductos.php" frameborder="0"></iframe>
        <form action="bajaproducto.php">
            <p>id de producto</p>
            <input type="number" min="0" name="id_producto">
            <input type="submit" value="Dar de baja">
        </form>
        
    <hr>
    <h3>Dar de baja usuario</h3>
        <iframe src="listarusuarios.php" frameborder="0"></iframe>
        <form action="bajausuario.php">
            <p>id de usuario</p>
            <input type="number" min="0" name="id_usuario">
            <input type="submit" value="Dar de baja">
        </form>
</body>
</html>