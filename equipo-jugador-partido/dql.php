<?php
    require_once('bootstrap.php');
    require_once './src/Entity/Equipo.php';
    require_once './src/Entity/Jugador.php';
    $consulta = $entityManager->createQuery("SELECT j.nombre, j.apellidos, j.edad FROM jugador j
    WHERE j.edad > :edad");
    $edad = 30;
    $consulta->setParameter('edad', $edad);

    $arrayCollection = $consulta->getResult();

    if (!empty($arrayCollection)) {
        echo "Jugadores con mas de 30 años:<br>";
        foreach ($arrayCollection as $jugador) {
            echo "- " . $jugador['nombre'] . " " . $jugador['apellidos'] . "<br>";
            echo "edad :". $jugador['edad']. "<br>";
            echo "---<br>";
        }
    } else {
        echo "No hay jugadores mayores de 20 años.\n";
    }

    $consulta = $entityManager->createQuery("SELECT j FROM jugador j");

    $arrayCollection = $consulta->getResult();

    echo "---------------<br>";

    if (!empty($arrayCollection)) {
        echo "Jugadores:<br>";
        foreach ($arrayCollection as $jugador) {
            echo "ID: " .$jugador->getIdJugador() . "<br>";
            echo "Nombre: " .$jugador->getNombre() . "<br>";
            echo "Apellidos: " .$jugador->getApellidos() . "<br>";
            echo "Edad: ".$jugador->getEdad() . "<br>";
            echo "-----------------<br>";
        }
    } else {
        echo "No hay jugadores mayores de 20 años.\n";
    }

    $consulta = $entityManager->createQuery("SELECT j.nombre as nombreJugador, j.apellidos, e.nombre as nombreEquipo FROM Jugador j join equipo e WHERE e.ciudad = :ciudad");
    $ciudad = "madrid";
    $consulta->setParameter('ciudad', $ciudad);

    $arrayCollection = $consulta->getResult();

    echo "Jugadores de ". $ciudad."<br>";
    echo "---------------<br>";
    if (!empty($arrayCollection)) {
        echo "Jugadores:<br>";
        foreach ($arrayCollection as $jugador) {
            echo "Nombre: " .$jugador['nombreJugador'] . "<br>";
            echo "Apellidos: " .$jugador['apellidos'] . "<br>";
            echo "Equipo: ".$jugador['nombreEquipo']."<br>";
            echo "-----------------<br>";
        }
    } else {
        echo "No hay jugadores mayores de 20 años.\n";
    }