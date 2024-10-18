<?php
//ucwords
$frase1 = "No hay nada como quedarse en casa para un verdadero descanso.";
echo "<p>Para frase '$frase1':</p><p>". ucwords($frase1)."</p>";
//strrev
$frase2 = "La paciencia es una virtud, especialmente cuando se trata de esperar la hora del almuerzo."; 
echo "<p>Para frase '$frase2':</p><p>". strrev($frase2)."</p>";
//str_repeat
$frase3 = "Siempre es mejor estar despierto y soñar que dormir y soñar.";
echo "<p>Para frase '$frase3':</p><p>". str_repeat($frase3, 2) . "</p>";
//md5
$frase4 = "Una vez hayas probado el vuelo siempre caminarás por la tierra con la vista mirando al cielo, porque ya habrás estado allí y siempre querrás volver.";
echo "<p>Para frase '$frase4':</p><p>". md5($frase4) ."</p>";