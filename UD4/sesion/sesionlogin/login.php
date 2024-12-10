<?php

    if(isset($_POST['enviar'])){
        $usuario = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];

        if(empty($usuario) || empty($contrasena)) {
            $error = "Debes introduir un usuario y contraseña";
            include "index.php";
        } else {
            if ($usuario == "admin" && $password == "admin") {
                session_start();
                $_SESSION['usuario'] = $usuario;

                include "main.php";
            } else {
                $error = "Usuario o contraseña no válidos!";
                include "index.php";
            }
        }
    }
    print_r($_POST);