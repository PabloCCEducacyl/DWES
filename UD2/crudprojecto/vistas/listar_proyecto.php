<?php include 'encabezado.php'?>
<table>
    <tr>
        <th>Título</th>
        <th>Descripción</th>
        <th>Periodo</th>
        <th>Curso</th>
        <th>Fecha presentación</th>
        <th>Logotipo</th>
        <th>PDF</th>
        <th>Nota</th>
    </tr>
    <?php
    include_once("../config/conexion.php");
    $selectProyectos = $conexion->prepare("SELECT * FROM proyecto");
    $selectProyectos->setFetchMode(PDO::FETCH_ASSOC);    
    $selectProyectos->execute();
    $resProyectos = $selectProyectos->fetchAll();
    foreach($resProyectos as $proyecto);
        echo "<tr>";
        echo "<td>{$proyecto['titulo']}</td>";
        echo "<td>{$proyecto['descripcion']}</td>";
        echo "<td>{$proyecto['periodo']}</td>";
        echo "<td>{$proyecto['curso']}</td>";
        echo "<td>{$proyecto['fecha_presentacion']}</td>";
        echo "<td><img src='data:image/png;base64,{$proyecto['logotipo']}'</td>";
        echo "<td><a href='../archivos/{$proyecto['pdf_proyecto']}'>Ver</a></td>";
        echo "<td>{$proyecto['nota']}</td>";

        echo "</tr>";
    ?>


</table>
<?php include 'footer.php'?>