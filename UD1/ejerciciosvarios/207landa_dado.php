<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dado</title>
</head>
<body>
  <h1>Buscando 5</h1>
<?php
    $salir = false;
    $intentos = 0;
    for ($i = 1; !$salir; $i++) {
      $dado = random_int(1, 6);
      echo "<div style='outline: 1px solid black; margin: 4px; width:300px; border-radius: 2pt;'>";
      echo "<p style='margin: 8px;'>Tirando el dado... ha salido un {$dado}</p>";
      switch($dado){
        case 1:
          $img = "dice-one";
          break;
        case 2:
          $img = "dice-two";
          break;
        case 3:
          $img = "dice-three";
          break;
        case 4:
          $img = "dice-four";
          break;
        case 5:
          $img = "dice-five";
          break;
        case 6:
          $img = "dice-six";
          break;
      }
      echo "<img src='{$img}.png' style='width: 100px; margin-left:8px; margin-bottom:4px; border-radius:10pt'>" . "</div>";
      if($dado == 5 || $intentos == 9){
        $salir = true;
      }
      $intentos++;
    }
?>
<p>
<?php
    if($intentos == 10){
      echo "Se alcanzo el número de intentos y no se consiguió";
    } else {
      echo "Salió en el intento numero {$intentos}";
    }
?>
</p>
</body>
</html>
