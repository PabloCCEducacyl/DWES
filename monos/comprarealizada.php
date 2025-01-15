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
              <a href="index.php" class="d-flex align-items-center mb-3 ms-2 mb-md-0 me-md-auto ml-1 text-dark text-decoration-none">
                <span class="fs-1">Monos Quitos</span>
              </a>
              <?php if(!isset($_SESSION["id_sesion"])){
                echo "<ul class='nav nav-pills'>
                <a href='iniciosesion.php' class='btn btn-outline-primary me-2' role='button'>Iniciar Sesión</a>
                <a href='registro.php' class='btn btn-outline-primary me-2' role='button'>Crear Cuenta</a>
              </ul>";}
                    else{
                        $id_session = $_SESSION["id_sesion"];
                        $carritoselect = $mysqli->query("SELECT * FROM carrito
                                                         INNER JOIN usuarios ON id_user_carrito_fk = id_user
                                                         WHERE id_user_carrito_fk = $id_session");
                        $carritocuenta = $carritoselect->num_rows;
                        if($carritocuenta>=1){
                          echo '<a href="carrito" type="button" class="btn btn-primary position-relative mt-3 me-3" style="height:38px">Carrito
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
                <h1>Compra realizada</h1>
                <p class="lead">Muchas gracias por comprar en nuestra tienda</p>
                <a href='index.php' class='btn btn-outline-primary me-2' role='button'>Volver a Inicio</a>
          </div>
        </main>
</body>
</html>