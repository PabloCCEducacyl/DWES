<?php
    include('encabezado.php');
    include('../config/conexion.php');
?>
    <h2>Lista de alumnos</h2>
    <table rules='all' style='border: solid 1px black'>
    <tr>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Telefono</th>
        <th>Curso</th>
    </tr>
<?php
    foreach($mysqli->query('SELECT * FROM alumnos') as $fila){
        echo "<tr>";
        echo "<td>{$fila['dni']}</td>";
        echo "<td>{$fila['nombre']}</td>";
        echo "<td>{$fila['apellidos']}</td>";
        echo "<td>{$fila['email']}</td>";
        echo "<td>{$fila['telefono']}</td>";
        echo "<td>{$fila['curso']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    include('footer.php');
    ?>