<?php
    setlocale(LC_TIME, 'es_ES');
    foreach ($_POST as $clave => $valor) {
        $$clave = $valor;
    }
    //$res = move_uploaded_file($_FILES["fichero"]["tmp_name"],"subidos/" . $_FILES["fichero"]["name"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mecago</title>
</head>
<body>
    <div class="cosa">
        <h1><?=$nombre. " " .$prim_apellido. " " .$secu_apellido?></h1>
        <p><?="Fecha de nacimiento: " .date('j \d\e F \d\e Y')?></p>
    </div>
</body>
</html>
