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
        <header class="d-flex flex-wrap justify-content-center pt-2 pb-3 mb-4 fixed-top bg-white border-bottom quitos-header">
              <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ml-1 text-dark text-decoration-none">
                <span class="fs-1">Monos Quitos</span></a>
              <?php if(!isset($_SESSION["id_sesion"])){ //Sin sesion iniciada
                echo "<ul class='nav nav-pills my-2'>
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
          <div class="container bg-body">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 d-flex justify-content-evenly flex-wrap">
          <?php 
                  $clase = $_GET['clase'];
                  $monoselect = $mysqli->query("SELECT * FROM productos WHERE clase = '$clase'"); // por ahora hay 4 clases asi que salen 4 columnas pero si metes mas salen mas columnas
                  
                  while($monos = $monoselect->fetch_assoc()){
                    //echo "monos/'.$clase.'/'.$monos.'.png";
                    echo '<div class="col border d-flex flex-column justify-content-between rounded mt-1 border-dark border-3 p mx-3">';
                    echo "<p class='lead'>".$monos['Nombre_producto']."</p>";
                    echo "<img class='foto-mono' src='";
                      $fotomono = "monos/".$monos['clase']."/".$monos['id_mono'].".png";
                      if(file_exists($fotomono)){
                            echo $fotomono;
                          }
                      else{
                            echo $fotomono;
                      }
                         //las fotos de los productos estan en monos/clasedemono/nombredemono asi que con esto se seleccionan
                    echo "'> <div style='margin-top:auto'>".$monos['descripcion_producto']."</div>";
                    echo "<div>Precio:".$monos['Precio']."€</div>";
                    echo "<form action='carritoengine.php' method=POST>
                          <input type='submit'";
                    if(!isset($_SESSION['id_sesion'])){
                      echo " disabled data-toggle='tooltip' data-placement='top' title='Necesitas iniciar sesion'"; // en vez de hacer tres echos se podria            Condición true o false?si true: si false
                    }                                                                                               // hacer un operador ternario pero no me funciona
                    echo " value='Añadir al carrito'>
                          <input class='float-start w-25' type='number' value='1' min='1' name='num_producto'>
                          <input type='hidden' name='id_producto' value='".$monos['id_producto']."'>
                          <input type='hidden' name='mono' value='".$monos['id_mono']."'>
                          <input type='hidden' name='clase' value='".$monos['clase']."'>
                          </form>";
                    echo '</div>';
                    
                  }?>
          </div>
        </main>
</body>
</html>