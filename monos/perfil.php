<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Perfil</title>
    <?php   include('comun.php');
            $sesion = $_SESSION['id_sesion'];
            $resultado = $mysqli->query("SELECT * FROM usuarios WHERE id_user = $sesion ");
            $resultadoassoc = $resultado->fetch_assoc();
              $nombre = $resultadoassoc['Nombre_user'];
              $correo = $resultadoassoc['email'];
              $contrasena = $resultadoassoc['contrasena'];
              $fecha_nacimiento = $resultadoassoc['fecha_nacimiento'];
              $genero = $resultadoassoc['genero'];
              $administrador = $resultadoassoc['administrador'];
            ?>
</head>
<body>
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center pt-2 pb-3 mb-4 fixed-top bg-white border-bottom quitos-header">
              <a href="index.php" class="d-flex align-items-center mb-3 ms-2 mb-md-0 me-md-auto ml-1 text-dark text-decoration-none">
                <span class="fs-1">Monos Quitos</span>
              </a>
              <?php if(!isset($_SESSION["id_sesion"])){ //Sin sesion iniciada
                echo "
                <script> setTimeout(() => { location.href='index.php'}, 0}";} // Te devuelve a 
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
        <main class="main-padding" style="height: 120vh; background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);">
          <div class="container bg-body"> 
                <?php echo " <h1>Perfil</h1>
                        <p class='form-perfil'>Nombre: ".$nombre ."                       <form class='form-perfil' action='cambiar.php' method='post'> <input type='submit' class='ms-2' value='cambiar'> <input type='hidden' name='tipo' value='nombre'>  </form> </p>
                        <p class='form-perfil'>Correo: ".$correo ."                       <form class='form-perfil' action='cambiar.php' method='post'> <input type='submit' class='ms-2' value='cambiar'> <input type='hidden' name='tipo' value='correo'>  </form> </p>
                        <p class='form-perfil'>Contraseña: ••••••••••                     <form class='form-perfil' action='cambiar.php' method='post'> <input type='submit' class='ms-2' value='cambiar'> <input type='hidden' name='tipo' value='contrasena'>  </form> </p>
                        <p class='form-perfil'>Fecha Nacimiento: ".$fecha_nacimiento ."   <form class='form-perfil' action='cambiar.php' method='post'> <input type='submit' class='ms-2' value='cambiar'> <input type='hidden' name='tipo' value='fecha_nacimiento'>  </form> </p>
                        <p class='form-perfil'>Genero: ".$genero ."                       <form class='form-perfil' action='cambiar.php' method='post'> <input type='submit' class='ms-2' value='cambiar'> <input type='hidden' name='tipo' value='genero'>  </form> </p>" ?>
                <a class="btn btn-success mb-5" role="button" href="vistacompras.php">Ver Compras </a>
                <?php
                if($administrador == 1) {
                  echo '<a class="btn btn-info mb-5" role="button" href="administrador.php">Panel de Administrador</a>';
                }
                ?>
                <br>
                <a class='btn btn-warning mb-5' role='button' href="cerrarsesion.php">Cerrar Sesión</a>
                <button type="button" class="btn btn-danger mb-5" data-bs-toggle="modal" data-bs-target="#borrarcuentamodal">Borrar Cuenta</button>
                
          </div>
          <div class="modal fade" id="borrarcuentamodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">  <!-- Modal para confirmar el borrar cuenta-->
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Confirmación</h5>
                </div>
                <div class="modal-body">
                  <p>¿Estas seguro?</p>
                </div>
                <div class="modal-footer">
                  
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">No</button>
                <a class='btn btn-danger' role='button' href="borrarcuenta.php">Borrar Cuenta</a>
                </div>
              </div>
            </div>
          </div>

        </main>
</body>
</html>