<?php 
function tiradita($chance) {
  return mt_rand(0, 10000) < ($chance * 100);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dado</title>
</head>
<body>
  <h1>Pulleando Yanqings ....</h1>
<?php
    $salir = false;
    $intentos = 0;
    for ($i = 1; !$salir; $i++) {
      if($i<=75){
        $tiradita = tiradita(0.6);
      } else {
        $tiradita = tiradita(0.6 + 6 * ($i - 74));
      }
      if($tiradita){
        $salir = true;
      }
      $intentos++;
    }
?>
<p>
<?php
    echo "<p>Salio en la tirada $intentos </p>";
    echo "<img style='width:600px' src='welt.png'></img>"
?>
</p>
</body>
</html>
