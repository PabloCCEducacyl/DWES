<?php
    function palindromo(string $palabra_s) : bool {
        $palabra = iconv('UTF-8', 'ASCII//TRANSLIT', $palabra_s); //quita tildes
        $palabra = strtolower(str_replace([".",","," ","'"], "", $palabra));

        for($i = 0; $i < strlen($palabra); $i++){
            if($palabra[$i] != $palabra[strlen($palabra)-1-$i]){
                return false;
            }
        }
        return true;
    }
    $palabra = "A mamá Roma le aviva el amor a papá y a papá Roma le aviva el amor a mamá";
    if(palindromo($palabra)){
        echo "<p>$palabra es palindromo</p>";
    } else {
        echo "<p>$palabra no es palindromo</p>";
    }
