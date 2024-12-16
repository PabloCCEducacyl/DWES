<?php
    session_start();
    unset($_SESSION['usuario']);
    unset($_SESSION['tipo_usu']);
    session_destroy();
    header('Location: ../index.php');