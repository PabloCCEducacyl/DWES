<?php 
    session_start();
    session_destroy();
    echo "<html><script>window.location.replace('index.php')</script></html>";

?>