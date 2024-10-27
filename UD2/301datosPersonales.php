<?php
    mkdir("datosPersonales");
    foreach ($_POST as $clave => $valor) {
        $$clave = htmlspecialchars($valor);
    }
    foreach ($_FILES as $file => $datosFile) {
        $$file = $datosFile["name"];
        $extension = pathinfo($datosFile["name"], PATHINFO_EXTENSION);
        move_uploaded_file($datosFile["tmp_name"], "datosPersonales/" . "dni.". pathinfo($datosFile["name"], PATHINFO_EXTENSION));
        
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Personales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            color: #555;
        }
        iframe {
            width: 100%;
            height: 500px;
            border: none;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1><?="$nombre $prim_apellido $secu_apellido"?></h1>
        <img src="datosPersonales/dni.<?=pathinfo($foto, PATHINFO_EXTENSION)?>" alt="Foto de <?= $nombre ?>" style="width: 100%; max-width: 300px;">
        <p><strong>DNI:</strong> <?= $dni ?></p>
        <p><strong>Email:</strong> <?= $email ?></p>
        <p><strong>Fecha de Nacimiento:</strong> <?= date('j \d\e F \d\e Y', strtotime($fecha_nac)) ?></p>
        <p><strong>Teléfono:</strong> <?= $telefono ?></p>
        <p><strong>Sexo:</strong> <?= $sexo ?></p>
        <p><strong>Estudios:</strong> <?= $estudios ?> <?= !empty($estudios_texto) ? "($estudios_texto)" : "" ?></p>
        <p><strong>Idiomas:</strong> <?= $idiomas ?></p>
        
        <p><strong>Curriculum:</strong></p>
        <iframe src="datosPersonales/dni.pdf"></iframe>
    </div>
</body>