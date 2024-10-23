<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>225-2</title>
</head>
<body>
    <h1>Ejercicio 225-2 array multi</h1>
    <?php
    $empleados = [
        [
            "nombre" => "Pepe",
            "edad" => 22,
            "nomina" => 1000,
        ],
        [
            "nombre" => "Carla",
            "edad" => 23,
            "nomina" => 1100,
        ],
        [
            "nombre" => "Sandra",
            "edad" => 21,
            "nomina" => 900,
        ],
    ];

    echo "<table rules='all' border='1' ><tr><th>Nombre</th><th>Edad</th><th>Nómina</th></tr>";
    foreach($empleados as $empleado){
        echo "<tr>";
        $empleado["nomina"] = rand(700,1500);
        foreach($empleado as $clave => $valor){
            echo "<td>$valor</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>