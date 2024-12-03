<?php
    if(isset($_POST['usuario'])){
        $usuario = $_POST['usuario'];
        $contra = $_POST['contra'];
        if($usuario != 'james_bon'){
            header('Location:iniciarsesion.php?error=usuario no encontrado');
        } else if($contra != '007'){
            header('Location:iniciarsesion.php?error=contraseña incorrecta');
        }
        if(!file_exists('pablo')){
            mkdir('pablo');
        }
    } elseif(isset($_GET['sesion_ya_iniciada'])){
    }
    include('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Panel de Control</h1>
    <h2>Sesión iniciada como: <?=$usuario?></h2>
    <?php
        if(isset($_GET['error'])){
            echo "<div>Error: " . $_GET['error'] . "<div>";
        }
        if(isset($_GET['info'])){
            echo "<div>Info: " . $_GET['info'] . "<div>";
        }    
    ?>
    <h3>Lista de Tareas sin completar</h3>
    <table rules='all' style="border: 1px solid black">
    <tr>
        <th>titulo</th>
        <th>descripcion</th>
        <th>prioridad</th>
        <th>realizada</th>
        <th>fecha</th>
        <th>imagen</th>
        <th>eliminar</th>
    </tr>
    <?php 
    if(isset($_POST['veryarealizadas'])){
        if($_POST['veryarealizadas'] == 1){
            $listaTareas = $mysqli->query("SELECT * FROM tareas");
        } elseif($_POST['veryarealizadas'] == 0){
            $listaTareas = $mysqli->query("SELECT * FROM tareas WHERE realizada = FALSE");
        }

    }
        $listaTareas = $mysqli->query("SELECT * FROM tareas WHERE realizada = FALSE");
        //$listaTareasOrdenada = ordenarTareas($listaTareas);
        foreach($listaTareas as $tarea){
            echo "<tr>  <td>{$tarea['titulo']}</td>
                        <td>{$tarea['descripcion']}</td>
                        <td>{$tarea['prioridad']}</td>
                        <td>{$tarea['realizada']}</td>
                        <td>{$tarea['fecha']}</td>
                        <td>{$tarea['img_tarea']}</td>
                        <td><a href='eliminartarea.php?titulo={$tarea['titulo']}'>Eliminar</a></td>
                  </tr>";
        }
    ?>
    </table>
    <?php if(isset($_POST['veryarealizadas'])){
        if($_POST['veryarealizadas'] == 0){
            echo "<form method='POST'>
            <input type='hidden' value='james_bon' name='usuario'>
            <input type='hidden' value='007' name='contra'>
            <input type='hidden' value='1' name='veryarealizadas'>
            <input type='submit' value='Ver ya realizadas'>
            </form>";
        } else {
            echo "<form method='POST'>
            <input type='hidden' value='james_bon' name='usuario'>
            <input type='hidden' value='007' name='contra'>
            <input type='hidden' value='0' name='veryarealizadas'>
            <input type='submit' value='Ver ya realizadas'>
            </form>";
        }
}
        else {
            echo "<form method='POST'>
            <input type='hidden' value='james_bon' name='usuario'>
            <input type='hidden' value='007' name='contra'>
            <input type='hidden' value='0' name='veryarealizadas'>
            <input type='submit' value='Ver ya realizadas'>
            </form>";
        }
    ?>
    <hr>
    <h3>Añadir tarea</h3>
    <form action="annadirtarea.php" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; width: 300px;">
        <label>titulo:
            <input type="text" name='titulo' required></label>
        <label>descripcion:
            <input type="text" name='descripcion' required></label>
        <label>prioridad:
            <input type="number" name='prioridad' required></label>
        <label>realizada:
            <input type="checkbox" name='realizada' required></label>
        <label>fecha:
                <input type="date" name='fecha' required></label>
        <label>imagen:
            <input type="file" name='imagen' accept="image/png image/jpeg" required></label>
        <input type="submit" value="Enviar">
    </form>
    <hr>
    <h3>Guardar en txt</h3>
    <a href="guardartxt.php">Guardar</a>
</body>
</html>

<?php
    function ordenarTareas($tareas){

        $ordenado = false;

        while(!$ordenado){
            $ordenado = true;
            $tareasArrayAssoc = 0;
            for($i = 0; $i < -1; $i++){
                if($tareasArrayAssoc[$i]['prioridad'] < $tareasArrayAssoc[$i+1]['prioridad']){
                    $temp = $tareasArrayAssoc[$i];
                    $tareasArrayAssoc[$i] = $tareasArrayAssoc[$i+1];
                    $tareasArrayAssoc[$i+1] = $temp;
                    $ordenado = false;
                }
            }
        }
    }