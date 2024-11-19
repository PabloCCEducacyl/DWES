<html>
    <head>
        <link rel="stylesheet" href="css.css">
    </head>
    <header>
        <div>
            <img src="logo.avif" alt="logo">
            <h1><a href="index.php">CRUD GRAGAS</a></h1>
        </div>
        <?php
            if(basename($_SERVER['REQUEST_URI']) != 'index.php'){
              echo "<ul class='lista-header'>
                    <li><a href='formulario_agregar_proyecto.php'>Agregar</a></li>
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