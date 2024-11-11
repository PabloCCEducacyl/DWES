<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Personas</h1>
    <table rules='all' style="border: 1px black solid">
    <tr>
        <th>id</th>
        <th>nombre</th>
        <th>apellidos</th>
        <th>telefono</th>
    </tr>
    <?php
        $mysqli = new mysqli('localhost', 'root', '', 'prueba');
        $personas = $mysqli->query("SELECT * FROM persona");
        $num_filas = $personas->num_rows;
        if($num_filas > 0){
            while($fila = $personas->fetch_assoc()){
                $persona = $fila;
                echo "<tr>";
                echo "<td>".$persona["id_persona"]."</td>";
                echo "<td>".$persona["nombre"]."</td>";
                echo "<td>".$persona["apellidos"]."</td>";
                echo "<td>".$persona["telefono"]."</td>";
                echo "</tr>";
            }
        }
    
    ?>    
    </table>
</body>
</html>
