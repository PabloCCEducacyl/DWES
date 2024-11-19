<html>
    <head>
        <link rel="stylesheet" href="css.css">
    </head>
    <header>
        <div>
            <img src="logo.avif" alt="logo">
            <h1><a href="index.php">CRUD</a></h1>
        </div>
        <?php
            if(basename($_SERVER['REQUEST_URI']) != 'index.php'){
              echo "<ul class='lista-header'>
                    <li><a href='formulario_agregar_alumno.php'>Agregar</a></li>
                    <li><a href='listar_alumno.php'>Listar</a></li>
                    <li><a href='formulario_modificar_alumno.php'>Modificar</a></li>
                    <li><a href='eliminar_alumno.php'>Eliminar</a></li>
                    </ul>";
            }
        ?>
    </header>
    <?php
        if(isset($_GET['error'])){
            echo "<p class='error'>{$_GET['error']}</p>";
        }
        if(isset($_GET['info'])){
            echo "<p class='info'>{$_GET['info']}</p>";
        }
    ?>
    <body>
    <main>