<?php

    function analizar_frase(string $frase) : array {
        $palabras_frase = explode(" ", $frase);
        foreach($palabras_frase as $palabra){//quita puntos y comas antes de cada palabra
            $palabras[] = str_replace([".", ","], "", $palabra);
        }
        $num_palabras = count($palabras);
        $letras_total = mb_strlen(implode($palabras));
        $array_tamannos = [];
        foreach($palabras as $palabra){
            $array_tamannos[] = mb_strlen($palabra);
        }

        return [
            "palabras" => $palabras,
            "analis_frase" => [
                "num_palabras" => $num_palabras,
                "letras_total" => $letras_total,
            ],
            "tamanno_palabras" => $array_tamannos,
        ];
    }
    $frase2 = "El olor a pólvora me hierve la sangre";

    $frase = "A veces, la mejor forma de resolver un problema es no seguir pensando en él.";
    $res = analizar_frase($frase2);
    echo "<p><b>En la frase</b>: $frase2</p>";
    echo "<p>Hay {$res['analis_frase']['num_palabras']} palabras,</p>";
    echo "<p>{$res['analis_frase']['letras_total']} letras</p>";
    echo "<p>Y los tamaños de las palabras son:</p>";
    echo "<table border='1' rules='all'><tr><th>palabra</th><th>tamaño</th></tr>";
    for($i = 0; $i < count($res['tamanno_palabras']); $i++){
        echo "<tr><td>{$res['palabras'][$i]}</td><td>{$res['tamanno_palabras'][$i]}</td></tr>";
    }
    echo "</table>";