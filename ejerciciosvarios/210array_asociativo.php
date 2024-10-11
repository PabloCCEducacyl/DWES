<?php
    $paises_capitales = array(
        "España" => "Madrid",
        "Francia" => "París",
        "Portugal" => "Lisboa",
        "Alemania" => "Berlín",
        "Italia" => "Roma",
    );

    $paises = array();
    $capitales = array();
    echo "<h1> Capitales </h1>";
    echo "<h2> Asociativo </h2>";
    foreach ($paises_capitales as $pais => $capital){
        echo "<p> La capital de $pais es $capital </p>";
        $paises[] = $pais;
        $capitales[] = $capital;
    }
    echo "<h2> Individual </h2>
          <h3> Paises </h3>
        <ul>";
    for($i = 0; $i < count($paises) ; $i++){
        echo "<li> $paises[$i] </li>";
    }
    echo "</ul>
        <h3> Capitales</h3>
        <ul>";
    for($i = 0; $i < count($capitales) ; $i++){
        echo "<li> $capitales[$i] </li>";
    }
    echo "</ul>"
?>