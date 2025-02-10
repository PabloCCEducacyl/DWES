<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <?php include("comun.php") ?>
</head>
<body style="height: 100%">
<div class="container">
            <header class="d-flex flex-wrap justify-content-center pt-2 pb-3 mb-4 fixed-top bg-white border-bottom quitos-header">
                <a href="index.php" class="d-flex align-items-center mb-3 ms-2 mb-md-0 me-md-auto ml-1 text-dark text-decoration-none">
                    <span class="fs-1">Monos Quitos</span>
                </a>
              <?php if(isset($_SESSION["id_sesion"])){
                echo "<script>window.location.replace='index.php'</script>";}
                ?>
            </header>
          </div>
        <main class="main-padding py-5" style="height: 100% ;background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);">
          <div class="container">
            <div class="d-flex justify-content-center">
                <div class="p-5 mt-2 mb-2 bg-light rounded">
                    <form action="registroengine.php" method="post">
                        <h3 class="mt-0 mb-0">Crear Cuenta</h3>
                        <a href="iniciosesion.php" class="my-5">¿Ya tienes una cuenta?</a><br>
                        <label for="nombre"> Nombre: </label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required /> <br/>
                        <label for="Contraseña"> Contraseña: </label>
                            <input type="password" class="form-control" name="contrasena" id="contrasena" required /> <br/>
                        <label for="Nombre"> Email: </label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="email@ejemplo.net" required/> <br/>
                        <label for="fecha_nacimiento">Fecha de nacimiento: </label>
                            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" min="1900-01-01"required/> <br/>
                        <label for="sexo">Género: </label>
                        <div class="ps-0 form-check">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" id="genero1" onclick="otrotrotro()" value="hombre" required>
                                <label class="form-check-label" for="genero1">Hombre</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" id="genero2" onclick="otrotrotro()" value="mujer" required>
                                <label class="form-check-label" for="genero2">Mujer</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" id="genero3" onclick="otrotro()" value="otro" required>
                                <label class="form-check-label" for="genero3">Otro</label>
                                <input class="form-control" type="text" name="otrogenero" id="otrogenero" value="" disabled>
                            </div>
                                <input type="submit" class="btn btn-info mt-4" value="Registrar" name="registrar" />
                    </form>
                </div>
          </div>
          </div>
        </main>
</body>
</html>