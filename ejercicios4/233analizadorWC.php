<?php
    function analizar_frase(string $frase) : array {
        $array_tamannos = [];
        print_r(str_word_count($frase, 0));
        echo "<hr>";
        print_r(str_word_count($frase, 1));
        echo "<hr>";
        print_r(str_word_count($frase, 2));
        echo "<hr>"; 
        
        return [
            "palabras" => str_word_count($frase, 1),
            "analis_frase" => [
                "num_palabras" => str_word_count($frase),
                "letras_total" => array_key_last(str_word_count($frase, 2)),
            ],
            "tamanno_palabras" => $array_tamannos,
        ];
    }
    $frase = "Well, just 'cause you're a hallucination and I don't speak lizard don't mean I can't understand you!";
    $res = analizar_frase($frase);
    echo "<p><b>En la frase</b>: $frase</p>";
    echo "<p>Hay {$res['analis_frase']['num_palabras']} palabras,</p>";
    echo "<p>{$res['analis_frase']['letras_total']} letras</p>";
    echo "<p>Y los tamaños de las palabras son:</p>";
    echo "<table border='1' rules='all'><tr><th>palabra</th><th>tamaño</th></tr>";
    for($i = 0; $i < count($res['tamanno_palabras']); $i++){
        echo "<tr><td>{$res['palabras'][$i]}</td><td>{$res['tamanno_palabras'][$i]}</td></tr>";
    }
    echo "</table>";