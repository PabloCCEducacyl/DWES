<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_GET['error'])){
            echo "<div>Error: " . $_GET['error'] . "<div>";
        }
    ?>
    <form action="panelcontrol.php" method="POST">
        <label>usuario:
            <input type="text" name="usuario" required></label>
        <label>contraseña:
            <input type="password" name="contra" required></label>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>