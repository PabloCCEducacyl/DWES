<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <meta name="author" content="Pablo Campuzano Cuadrado">
</head>
<body>
    <h1>Ejercicio 2</h1>
    <h4>Pablo Campuzano Cuadrado</h4>
    <?php 
        $num_alumnos = 90;
        $datos_notas = [];
        for($i = 0; $i < $num_alumnos; $i++){
            $datos_notas[$i] = rand(0,10);
        }
        $datos_clase_a = [
            "media" => 0,
            "aprobados" => 0,
            "suspensos" => 0,
        ];
        $datos_clase_b = [
            "media" => 0,
            "aprobados" => 0,
            "suspensos" => 0,
        ];
        $datos_clase_c = [
            "media" => 0,
            "aprobados" => 0,
            "suspensos" => 0,
        ];
        
        for($i = 0; $i < count($datos_notas); $i++){
            $nota = $datos_notas[$i];
            if($i < 30){
                $array_clase_a[$i] = $nota;
                procesarNota($nota, $datos_clase_a);
            } else if($i < 60){
                procesarNota($nota, $datos_clase_b);
            } else {
                procesarNota($nota, $datos_clase_c);
            }
        }

        $datos_clase_a["media"] /= 30;
        $datos_clase_b["media"] /= 30;
        $datos_clase_c["media"] /= 30;

        $media_total = ($datos_clase_a["media"] + $datos_clase_b["media"] + $datos_clase_c["media"]) / 3;
        $aprobados_total = ($datos_clase_a["aprobados"] + $datos_clase_b["aprobados"] + $datos_clase_c["aprobados"]);
        $suspensos_total = ($datos_clase_a["suspensos"] + $datos_clase_b["suspensos"] + $datos_clase_c["suspensos"]);
        
        function procesarNota($nota, &$clase){
            if($nota > 4){
                $clase["aprobados"]++;
            } else {
                $clase["suspensos"]++;
            }
            $clase["media"] += $nota;
        }
    ?>
    <table rules='all' style="border: black solid 1px;">
        <tr>
            <td></td>
            <th>A</th>
            <th>B</th>
            <th>C</th>
            <th>Total</th>
        </tr>
        <tr>
            <th>Media</th>
            <?php 
            if($datos_clase_a['media'] > $datos_clase_b['media'] && $datos_clase_a['media']> $datos_clase_c['media']){
                echo "<td style='color:green'>{$datos_clase_a['media']}</td>";
            } else {
                echo "<td>{$datos_clase_a['media']}</td>";
            }
            if($datos_clase_b['media'] > $datos_clase_a['media'] && $datos_clase_b['media']> $datos_clase_c['media']){
                echo "<td style='color:green'>{$datos_clase_b['media']}</td>";
            } else {
                echo "<td>{$datos_clase_b['media']}</td>";
            }
            if($datos_clase_c['media'] > $datos_clase_a['media'] && $datos_clase_c['media']> $datos_clase_b['media']){
                echo "<td style='color:green'>{$datos_clase_c['media']}</td>";
            } else {
                echo "<td>{$datos_clase_c['media']}</td>";
            }
            echo "<td>{$media_total}</td>";
            ?>
        </tr>
        <tr>
            <th>Aprobados</th>
            <?php 
            echo "<td>{$datos_clase_a['aprobados']}</td>";
            echo "<td>{$datos_clase_b['aprobados']}</td>";
            echo "<td>{$datos_clase_c['aprobados']}</td>";
            echo "<td>{$aprobados_total}</td>";
            ?>
        </tr>
        <tr>
            <th>Suspensos</th>
            <?php 
            echo "<td>{$datos_clase_a['suspensos']}</td>";
            echo "<td>{$datos_clase_b['suspensos']}</td>";
            echo "<td>{$datos_clase_c['suspensos']}</td>";
            echo "<td>{$suspensos_total}</td>";
            ?>
        </tr>
    </table>
</body>