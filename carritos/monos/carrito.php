<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monos Quitos</title>
    <?php include("comun.php") ?>
</head>
<body style="overflow-x:hidden">
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center pt-2 pb-3 mb-4 fixed-top bg-white border-bottom quitos-header">
              <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ml-1 text-dark text-decoration-none">
                <span class="fs-1">Monos Quitos</span>
              </a>
              <?php if(!isset($_SESSION["id_sesion"])){ //Sin sesion iniciada
                echo "<ul class='nav nav-pills'>
                <a href='iniciosesion.php' class='btn btn-outline-primary me-2' role='button'>Iniciar Sesión</a>
                <a href='registro.php' class='btn btn-warning me-2' role='button'>Crear Cuenta</a>
              </ul>";} // crear e iniciar sesion
                    else{//Con sesion iniciada
                      $id_session = $_SESSION["id_sesion"];
                        $carritoselect = $mysqli->query("SELECT * FROM carrito
                                                         INNER JOIN usuarios ON id_user_carrito_fk = id_user
                                                         WHERE id_user_carrito_fk = $id_session");
                        $carritocuenta = $carritoselect->num_rows;
                        if($carritocuenta>=1){
                          echo '<a href="carrito.php" type="button" class="btn btn-primary position-relative mt-3 me-3" style="height:38px">Carrito
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">'.$carritocuenta.'<span class="visually-hidden">
                        carrito</span></span></a>';
                        }
                      echo "<a href='perfil.php' class='btn btn-default mt-0' role='button'> 
                      <img src='img/perfil.png' width='50'/> Perfil</a>";}//Entrar a perfil
                ?>
            </header>
          </div>
        <main class="main-padding" style="background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);">
            
            <div class="row">
              <div class="col-2 pe-0"><!--para echar el contenido a la derecha --></div>
              <div class="px-0 bg-body border-top rounded-top col row row-cols-1">
                <?php
                $id_user = $_SESSION['id_sesion'];                                                    //CONVERT(DATETIME, fecha_compra, 3)) as fecha_compra <- de intentar sacar la fecha como dia-mes-año pero no funciona
                $carroselect = $mysqli->query("SELECT id_item_carrito,Nombre_producto,id_producto_carrito_fk, id_mono, cantidad_carrito, precio, clase FROM carrito 
                                                INNER JOIN productos ON id_producto_carrito_fk = id_producto 
                                                WHERE id_user_carrito_fk = $id_user" ); // por ahora hay 4 clases asi que salen 4 columnas pero si metes mas salen mas columnas
                  
                while($vistacarro = $carroselect->fetch_assoc()){
                  //echo "monos/'.$clase.'/'.$monos.'.png";
                  echo '<div style="width:98.6%" class="col border rounded m-2 border-dark border-4 px-3 clearfix">';
                  echo "<img class='m-2 me-4 float-start' src=monos/".$vistacarro['clase']."/".$vistacarro['id_mono'].".png>"; //las fotos de los productos estan en monos/clasedemono/nombredemono asi que con esto se seleccionan
                  echo "<h4 class='mt-2'> " . $vistacarro['Nombre_producto']."</h4>";
                  echo "<div>Precio Unitario: ".$vistacarro['precio'] ."€</div>";
                  echo "<div class='mb-1'>Cantidad: ".$vistacarro['cantidad_carrito']."</div>";
                  echo "<div>Precio Total: ". $vistacarro['cantidad_carrito']*$vistacarro['precio'] ."€</div>";
                  echo "<form class='float-end mb-2' action='borrarcarro.php' method=POST>
                        <input type='hidden' name='id_carrito'value=".$vistacarro['id_item_carrito'].">
                        <input type='submit' value='Eliminar del carro'>
                        </form>";
                  echo '</div>';
                }
                if ($carroselect->num_rows == 0) {
                  echo "<div>No tienes productos en el carrito</div>";
                  echo "<a href='index.php'>Volver</a>";
                }
                ?>
                
          </div>
          <?php
          if ($carroselect->num_rows > 0){
      echo  '<nav class="col-sm-2">
              <div class="mx-2 bg-body d-flex flex-column align-items-center justify-content-around">
                <h3>Resumen</h3>
                <p>
                  Total a pagar:';
                  $totalpago = $mysqli->query("SELECT SUM(precio * cantidad_carrito) FROM carrito 
                                                     INNER JOIN productos ON id_producto_carrito_fk = id_producto
                                                     WHERE id_user_carrito_fk = $id_user"); //solo saca 1 valor pero sigue contando como si fuese un mysql_result
                                                                                            // he visto algo llamado convert en sql pero no se como funciona asi que hago
                                                                                            // un fetch_row y lo llamo una vez
                                        
                        $totalpagorow = $totalpago->fetch_row();
                        echo $totalpagorow[0];
                  echo '€</p> <a class="btn btn-success h3" role="button" href="compracarrito.php">Comprar Carrito</a>
                  <hr>        
                  <h4>Borrar todo el carro</h4>
                  <a class="btn btn-danger h3" role="button" href="borrartodocarrito.php">Borrar Carrito</a>
                </div>
              </nav>';}
                ?>
          
          <div class="col-1 pe-0"><!--para echar el contenido a la izquierda --></div>
            </div>
        </main>
</body>
</html>