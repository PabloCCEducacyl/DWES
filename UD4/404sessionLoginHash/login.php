<?php
    // echo password_hash("admin", PASSWORD_DEFAULT);
    $contrasenaHash = "$2y$10$33qbHCPre6cFVwrlCsO0aedmyJP8OxemsSTngsgCQmtoltoaeho1i";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];

        if(empty($usuario) || empty($contrasena)) {
            header("Location: index.php?error=Debes introduir un usuario y contraseña");
        } else {
            if ($usuario == "admin" && password_verify($contrasena, $contrasenaHash)) {
                session_start();
                $_SESSION['usuario'] = $usuario;

                header("Location: index.php");
            } else {
                $error = "Usuario o contraseña no válidos!";
                // header("Location: index.php?error=$error");
            }
        }
    } else {
        header("Location: index.php");
    }
