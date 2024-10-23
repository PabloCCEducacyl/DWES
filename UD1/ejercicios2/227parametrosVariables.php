<?php
    declare(strict_types = 1);
    
    function mayor() : int {
        $nums = func_get_args();
        $res = -PHP_INT_MAX;
        if(count($nums) == 0){
            return 0;
            
        } else {
            for($i = 0; $i < count($nums); $i++){
                if($nums[$i] > $res){
                    $res = $nums[$i];
                }
            }
            return $res;
        }
    }

    function concatenar(...$palabras) : string {
        $res = "";
        foreach($palabras as $palabra){
           $res = $res . " " . $palabra;
        }
        return $res;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 227</title>
</head>
<body>
    <h1>Ejercicio 227</h1>
    <h2>Función mayor</h2>
    <?php
        echo "El mayor es: " . mayor(132, 1215, 151517, 2123, 54515, 2312154,1211,1,0,-1,121,-99999999) . "<br>";
    ?>
    <h2>Función concatenar</h2>
    <?php
        echo concatenar("Buenos", "días", "me", "llamo", "Pablo") . "<br>";
    ?>
    <a href="ejercicios2.php">Volver</a>
</body>
</html>