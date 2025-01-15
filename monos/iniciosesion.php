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
            </header>
          </div>
        <main class="main-padding" style="background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%)">
                <?php if(isset($_SESSION["id_sesion"])){
                echo "<script>window.location.replace='index.php'</script>";}
                ?>
          <div class="container">
            <div class="d-flex justify-content-center">
                <div class="p-5 mt-2 mb-2 bg-light rounded">
                    <form action="inicioengine.php" method="post">
                      <h3 class="mt-0 mb-0">Iniciar Sesión</h3>
                      <a href="registro.php" class="my-5">¿No tienes cuenta?</a><br>
                        <label for="email"> Email: </label>
                            <input type="email" class="form-control" name="email" id="email" required/> <br/>
                        <label for="Contraseña"> Contraseña: </label>
                            <input type="password" class="form-control" name="contrasena" id="contrasena" required /> <br/>
                            <input type="submit" class="btn btn-info mt-2" value="Iniciar Sesión" name="iniciosesion" />
                    </form>
                </div>
            </div>
          </div>
        </main>
</body>
</html>