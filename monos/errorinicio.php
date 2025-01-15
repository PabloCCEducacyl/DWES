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
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 fixed-top bg-white border-bottom">
              <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ml-1 text-dark text-decoration-none">
                <span class="fs-4">Dominio Quitos</span>
              </a>
              <?php if(!isset($_SESSION["id_sesion"])){
                echo "<ul class='nav nav-pills'>
                <a href='iniciosesion.php' class='btn btn-outline-primary me-2' role='button'>Iniciar Sesión</a>
                <a href='registro.php' class='btn btn-outline-primary me-2' role='button'>Crear Cuenta</a>
              </ul>";}
                    else{
                    }
                ?>
            </header>
          </div>
        <main style="padding-top: 70px">
          <div class="container bg-body">
                <h1>Algo ha fallado</h1>
                <p class="lead">Asegurate de escribir correctamente el email y la contraseña</p>
                <a href='iniciosesion.php' class='btn btn-outline-primary me-2' role='button'>Iniciar Sesión</a>
          </div>
        </main>
</body>
</html>