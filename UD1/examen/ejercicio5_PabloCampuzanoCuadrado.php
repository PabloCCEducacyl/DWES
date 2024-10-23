<?php
    //$palabrausuario = $_GET["palabra"] ? "hola";
    if(isset($_GET["palabra"])){
       $palabrausuario = $_GET["palabra"]; 
    } else {
        $palabrausuario = "hola";
    }

    
    function crearPalabra4letras() : string{
        $palabra = "";
        for($i = 0; $i < 4; $i++){
            $palabra .= chr(rand(97,122));
        }
        return $palabra;
    }
    

    function compruebaAnagrama(string $palabra, $palabra_comprobar) : bool {
        if(strlen($palabra) != 4){
            return false;
        }
        
        for($i = 0; $i < strlen($palabra); $i++){
            if(ord($palabra[$i] <= 90)){
                $palabra[$i] = chr(ord($palabra[$i])+32);
            }
        }
        $letras_palabra = str_split($palabra);
        $letras_palabra_comprobar = str_split($palabra_comprobar);

        sort($letras_palabra);
        sort($letras_palabra_comprobar);
        
        for($i = 0; $i < strlen($palabra); $i++){
            if($letras_palabra[$i] != $letras_palabra_comprobar[$i]){
                return false;
            }
        }
        return true;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="author" content="Pablo Campuzano Cuadrado">
</head>
<body>
    <h1>Ejercicio 5</h1>
    <form>
            <p>por defecto: hola</p>
            <label>Palabra 4 letras:<input type="text" name="palabra"></label>
            <input type="submit" value="Enviar">
    </form>
    <?php
        $palabra_aleatoria = crearPalabra4letras();
        echo "<p>Para $palabrausuario y $palabra_aleatoria:</p>";
        if(compruebaAnagrama($palabrausuario, $palabra_aleatoria)){
            echo "<p>La palabra $palabrausuario es un anagrama de de $palabra_aleatoria</p>";
        } else {
            echo "<p>No son anagramas</p>";
        }
        echo "<hr><p>caso palabra fija</p>";
        $palabra_fija = "adio";
        echo "<p>Para $palabrausuario y $palabra_fija (palabra fija):</p>";
        if(compruebaAnagrama($palabrausuario, $palabra_fija)){
            echo "<p>La palabra $palabrausuario es un anagrama de de $palabra_fija</p>";
        } else {
            echo "<p>No son anagramas</p>";
        }
    ?>
</body>
</html>