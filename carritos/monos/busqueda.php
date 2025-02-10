<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monos Quitos</title>
    <?php include("comun.php") ?>
</head>
<body>
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 fixed-top bg-white border-bottom quitos-header">
              <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ml-1 text-dark text-decoration-none">
                <span class="fs-4">Monos Quitos</span>
              </a>
              <?php if(!isset($_SESSION["id_sesion"])){ //Sin sesion iniciada
                echo "<ul class='nav nav-pills'>
                <a href='iniciosesion.php' class='btn btn-outline-primary me-2' role='button'>Iniciar Sesión</a>
                <a href='registro.php' class='btn btn-warning me-2' role='button'>Crear Cuenta</a>
              </ul>";} // crear e iniciar sesion
                    else{//Con sesion iniciada
                        echo "<a href='perfil.php' class='btn btn-default' role='button'> 
                        <img src='img/mesi.png' width='50' /> Perfil</a>";}//Entrar a perfil
                ?>
            </header>
          </div>
        <main class="main-padding" style="background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);">
          <div class="container bg-body">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 d-flex justify-content-evenly flex-wrap">
                <?php
                $nombre = $mysqli->real_escape_string($_GET['nombre']);
                $clase = $mysqli->real_escape_string($_GET['clase']);
                if($clase == ''){
                  $monoselect = $mysqli->query("SELECT * FROM productos WHERE Nombre_producto LIKE '%$nombre%'"); //es el mismo codigo que lo de mostrar productos por clase pero con algun cambio
                }else{
                  $monoselect = $mysqli->query("SELECT * FROM productos WHERE Nombre_producto LIKE '%$nombre%' AND clase='$clase'"); //es el mismo codigo que lo de mostrar productos por clase pero con algun cambio
                }
                
                while($monos = $monoselect->fetch_assoc()){
                  //echo "monos/'.$clase.'/'.$monos.'.png";
                  echo '<div class="col border rounded mt-5 border-dark border-3 p mx-3 w-25">';
                  echo $monos['Nombre_producto']. "<br>";
                  echo "<img src=monos/".$monos['clase']."/".$monos['id_mono'].".png> <br>"; //las fotos de los productos estan en monos/clasedemono/nombredemono asi que con esto se seleccionan
                  echo "Precio:".$monos['Precio']."€ <br>";
                  echo "<form action='tiendaengine.php' method=POST>
                        <input type='submit'";
                  if(!isset($_SESSION['id_sesion'])){
                    echo " disabled data-toggle='tooltip' data-placement='top' title='Necesitas iniciar sesion'"; // en vez de hacer tres echos se podria            Condición true o false?si true: si false
                  }                                                                                               // hacer un operador ternario pero no me funciona
                  echo " value='comprar'>
                        <input class='float-start w-25' type='number' value='1' min='1' name='num_producto'>
                        <input type='hidden' name='id_producto' value='".$monos['id_producto']."'>
                        <input type='hidden' name='mono' value='".$monos['id_mono']."'>
                        <input type='hidden' name='clase' value='".$monos['clase']."'>
                        </form>";
                  echo '</div>';
                }?>
          </div>
          </div>
        </main>
</body>
</html>