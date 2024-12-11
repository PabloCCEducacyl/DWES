<?php include_once('config/conexion.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda ropa</title>
</head>
<body>
    <h1>PDO</h1>
    <?php if(isset($_GET['info'])) echo "<p>{$_GET['info']}";?>
    <h2>Listado</h2>
    <table rules='all'>
        <tr>
            <th>Prenda</th>
            <th>Foto</th>
            <th>Precio</th>
            <th>Rebaja</th>
            <th>Rebajada</th>
            <th>Eliminar</th>
        </tr>
        <img src="data:image/png;base64," alt="">
        <?php
            $sql = "SELECT * FROM rebajas_hombre";
            $sqlSelect = $conexionSQL->prepare($sql);
            $sqlSelect->setFetchMode(PDO::FETCH_ASSOC);
            $sqlSelect->execute();
            $selectRes = $sqlSelect->fetchAll();
            // print_r($selectRes);
            foreach($selectRes as $row){
                echo "<tr>";
                echo "<td>{$row['prenda']}</td>";
                echo "<td><img src='data:image/png;base64,{$row['foto']}' style='height=100px; max-width:100px;'></td>";
                echo "<td>{$row['precio']}</td>";
                if($row['rebaja'] == '') $row['rebaja'] = 0;
                echo "<td>{$row['rebaja']}%</td>";
                echo"<td>";if($row['rebajada'] == TRUE) { echo "✓";} else { echo "✕";} echo "</td>";
                // echo "<td>{$row['rebajada']}</td>";
                echo "<td><a href='controlador/eliminar_prenda.php?id={$row['id_prenda']}'>Eliminar</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
    <hr>
    <h2>Añadir</h2>
    
    <form method="POST" action="controlador/annadirproducto.php" enctype="multipart/form-data" style="display: flex; flex-direction:column">
        <label for="prenda">Prenda:
            <input type="text" name="prenda" id="prenda">
        </label>
        <label for="foto">Foto:
            <input type="file" accept="image/png, image/jpeg" name="foto" id="foto">
        </label>
        <label for="precio">Precio:
            <input type="number" min=0 value="0" name="precio" id="precio">
        </label>
        <label for="rebaja">rebaja %:
            <input type="number" min=0 max=100 value="0" name="rebaja" id="rebaja">
        </label>
        <input type="submit" value="Enviar" style="width: 100px;">
    </form>

</body>
</html>