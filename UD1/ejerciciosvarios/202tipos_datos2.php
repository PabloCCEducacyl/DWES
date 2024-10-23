
<?php
    /* declaración de variables */
    $entero = 4; // tipo integer
    $numero = 4.5;   // tipo coma flotante
    $cadena = "cadena"; // tipo cadena de caracteres
    $bool = true; //tipo booleano
    echo gettype($entero) . ": " . $entero ;
    echo "<br>";
    echo gettype($numero) . ": " . $numero ;
    echo "<br>";
    echo gettype($cadena) . ": " . $cadena ;
    echo "<br>";
    echo gettype($bool) . ": "; var_export($bool) ;//en php false cambia directamente a 0 y true a 1
?>