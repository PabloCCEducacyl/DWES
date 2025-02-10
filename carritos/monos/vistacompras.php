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
                        echo "<a href='perfil.php' class='btn btn-default' role='button'> 
                        <img src='img/mesi.png' width='50' /> Perfil</a>";}//Entrar a perfil
                ?>
            </header>
          </div>
        <main class="main-padding" style="height: 100vh; background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);">
          <div class="container bg-body">
              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                <?php
                $id_user = $_SESSION['id_sesion'];                                                    //CONVERT(DATETIME, fecha_compra, 3)) as fecha_compra <- de intentar sacar la fecha como dia-mes-año pero no funciona
                $compraselect = $mysqli->query("SELECT id_compra,Nombre_producto, id_producto_compra_fk, fecha_compra, id_mono, id_user_compra_fk, cantidad, clase, id_carrito FROM compras 
                                                INNER JOIN productos ON compras.id_producto_compra_fk = productos.id_producto 
                                                WHERE id_user_compra_fk = $id_user
                                                ORDER BY fecha_compra ASC" ); // por ahora hay 4 clases asi que salen 4 columnas pero si metes mas salen mas columnas
                  
                while($vistacompra = $compraselect->fetch_assoc()){
                  //echo "monos/'.$clase.'/'.$monos.'.png";
                  echo '<div class="col border rounded mt-5 border-dark border-3 p mx-3 w-25">';
                  echo "<img src=monos/".$vistacompra['clase']."/".$vistacompra['id_mono'].".png> <br>"; //las fotos de los productos estan en monos/clasedemono/nombredemono asi que con esto se seleccionan
                  echo $vistacompra['Nombre_producto']."<br>";
                  echo "Cantidad: ".$vistacompra['cantidad']."<br>";
                  echo "Fecha Compra: ".$vistacompra['fecha_compra'];
                  echo "<form action='borrarcompra.php' method=POST>
                        <input type='submit' value='Borrar Compra'>
                        <input type='hidden' name='id_compra' value='".$vistacompra['id_compra']."'>
                        </form>";
                  echo '</div>';
                }?>
          </div>
        </main>
</body>
</html>