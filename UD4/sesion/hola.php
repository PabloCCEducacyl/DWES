<br>
<?php
    session_start();
    if(!isset($_SESSION['count'])){
        $_SESSION['count'] = 0;
    } else {
        $_SESSION['count']++;
    }
    echo "hola " . $_SESSION['count'];
?>
<a href="sesion2.php">a</a>