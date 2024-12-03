<?php
    $mysqli = new mysqli('localhost', 'root', '', 'tareas_pablo');

    print_r($_POST);
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $prioridad = $_POST['prioridad'];
    $realizada = $_POST['realizada'];
    $fecha = $_POST['fecha'];
    //$imagen = $_POST['imagen'];

    if(comprobarTitulo($titulo)){
        retorno("error", "titulo en uso");
    }

    $insertTarea =$mysqli->prepare("INSERT INTO `tareas`(`titulo`,`descripcion`,`prioridad`,`realizada`,`fecha`)
                                   VALUES (?,?,?,?,?)");
    $insertTarea->bind_param('ssiis', $titulo, $descripcion, $prioridad, $realizada, $fecha);
    $insertTarea->execute();

    $insertTareaResult = $insertTarea->get_result();
    retorno("info", "Tarea insertada correctamente");





    function comprobarTitulo($titulo){
        $mysqli = new mysqli('localhost', 'root', '', 'tareas_pablo');
        $selectTitulo = $mysqli->prepare('SELECT titulo from tareas where titulo = ?');
        $selectTitulo->bind_param('s', $titulo);
        $selectTitulo->execute();
        $selectResult = $selectTitulo->get_result();
        $mysqli->close();
        if($selectResult->num_rows >= 1){
            return true;
        } else {
            return false;
        }
    }

    function retorno($tipo, $mensaje){
        header("Location:panelcontrol.php?$tipo=$mensaje");
    }