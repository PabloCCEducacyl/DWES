<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("comun.php"); ?>
    <title>Monos Quitos</title>
</head>
<body>
          <div class="container">
            <header class="d-flex flex-wrap justify-content-center pt-2 pb-3 mb-4 fixed-top bg-white border-bottom quitos-header">
              <a href="index.php" class="d-flex align-items-center mb-3 ms-2 mb-md-0 me-md-auto ml-1 text-dark text-decoration-none">
                <span class="fs-1">Monos Quitos</span>
              </a>
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
                <div class="d-flex justify-content-center">
                  <form action="busqueda.php" method="GET" class="my-5">
                    <h2><u>Buscar Productos</u></h2>
                    <select name="clase">
                      <?php
                      $clases = $mysqli->query("SELECT DISTINCT clase FROM productos");
                      //$numclases = $clases->num_rows;
                        echo "<option value='' name='clase'> </option>";
                      while($clasesassoc = $clases->fetch_row()){
                        echo "<option value='".$clasesassoc[0]."'>".$clasesassoc[0]."</option>";
                      } ?>
                    </select>
                    <input type="text" placeholder="Nombre Producto" name="nombre">
                    <input type="submit" value="Buscar">
                  </form>
                </div>
                <h2><u>Todos los productos</u></h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                  <?php
                  $clases = $mysqli->query("SELECT DISTINCT clase FROM productos");
                  //$numclases = $clases->num_rows;
                  
                  while($clasesassoc = $clases->fetch_row()){
                    echo '<div class="col">
                          <a href="tienda.php?clase='.$clasesassoc[0].'" class="card shadow-sm">
                            <div class="card-body" style="height:256px">
                              <div class="d-flex justify-content-between align-items-center">
                                <img class="img-fluid foto-mono" style="padding-bottom:calc(200px-height)" src="monos/'.$clasesassoc[0].'.png"> </img>
                              </div>
                              <h1>'. $clasesassoc[0].'</h1>
                            </div>
                          </a>
                    </div>';
                  }
                  ?>
              </div>
        </main>
        
</body>
</html>