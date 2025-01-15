<?php
    include('comun.php');
    if (!isset($_REQUEST['tipo'])){
        echo "<html><script>window.location.replace('index.php')</script></html>";
    }
    $tipo = $_REQUEST['tipo'];
    switch ($tipo) {
        case 'nombre':
            echo "<form action='cambiarengine.php' method='post'>
                    <h2> Cambiar Nombre </h2>
                    <label for='cambio'> Nuevo Nombre:
                    <input type='text' name='cambio'>
                    <input type='hidden' name='tipo' value='Nombre_user'>
                    <input type='submit' value='Enviar'> </form>";
        break;
        case 'correo':
            echo "<form action='cambiarengine.php' method='post'>
                    <h2> Cambiar Correo </h2>
                    <label for='cambio'> Nuevo correo:
                    <input type='email' name='cambio'>
                    <input type='hidden' name='tipo' value='email'>
                    <input type='submit' value='Enviar'> </form>";
        break;
        case 'contrasena':
            echo "<form action='cambiarengine.php' method='post'>
                    <h2> Cambiar Contrasena </h2>
                    <label for='cambio'> Nuevo Contrasena:
                    <input type='password' name='cambio'>
                    <input type='hidden' name='tipo' value='contrasena'>
                    <input type='submit' value='Enviar'> </form>";
        break;
        case 'fecha_nacimiento':
            echo "<form action='cambiarengine.php' method='post'>
                    <h2> Cambiar Fecha de nacimiento </h2>
                    <label for='cambio'> Nueva Fecha de nacimiento:
                    <input type='date' min='1900-01-01' max='2020-01-01' name='cambio'>
                    <input type='hidden' name='tipo' value='fecha_nacimiento'>
                    <input type='submit' value='Enviar'> </form>";
        break;
        case 'genero':
            echo "<form action='cambiarengine.php' method='post'>
                    <p> Nuevo Genero:
                    <input type='radio' name='genero' id='genero1' onclick='otrotrotro()' value='hombre' required>
                    <label for='genero1'>Hombre</label>
                    <input type='radio' name='genero' id='genero2' onclick='otrotrotro()' value='mujer' required>
                    <label for='genero2'>Mujer</label>
                    <input type='radio' name='genero' id='genero3' onclick='otrotro()' value='otro' required>
                    <label for='genero3'>Otro</label>
                    <input type='text' name='otrogenero' id='otrogenero' value='' disabled>
                    <input type='hidden' name='tipo' value='genero'>
                    <input type='submit' value='Enviar'>
                    </form>";
        break;
        
    }
    ?>