<?php include_once('config/conexion.php');
      include_once('config/bibliotecas.php');?>
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
            <th>Precio Rebajado</th>
            <th>Total</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
        <img src="data:image/png;base64," alt="">
        <?php
            $sql = "SELECT * FROM rebajas_hombre";
            $sqlSelect = $conexionSQL->prepare($sql);
            $sqlSelect->setFetchMode(PDO::FETCH_ASSOC);
            $sqlSelect->execute();
            $selectRes = $sqlSelect->fetchAll();
            ordenarRes($selectRes);
            // print_r($selectRes);
            foreach($selectRes as $row){
                if($row['rebajada'] == TRUE){
                    $rebajada = "✓";
                } else {
                    $rebajada = "✕";
                }
                if(isset($_GET['modificar'])){
                    if($row['id_prenda'] == $_GET['modificar']){
                        echo "<form method='POST' action='controlador/modificarprenda.php'>
                              <input type='hidden' name='id_prenda' value='{$row['id_prenda']}>'";
                    }
                }
                echo "<tr>";
                echo "<td>{$row['prenda']}</td>";
                echo "<td><img src='data:image/png;base64,{$row['foto']}' style='height=100px; max-width:100px;'></td>";
                echo "<td>{$row['precio']}€</td>";
                if($row['rebaja'] == '') $row['rebaja'] = 0;
                if(isset($_GET['modificar'])){
                    if($row['id_prenda'] == $_GET['modificar']){
                        echo $row['rebaja'];
                        echo "<td><input type='number' min=0 max=100 name='rebaja' id='rebaja' value='{$row['rebaja']}'></td>";
                    } else {
                        echo "<td>{$row['rebaja']}%</td>";
                    }
                } else {
                    echo "<td>{$row['rebaja']}%</td>";
                }
                if(isset($_GET['modificar'])){
                    if($row['id_prenda'] == $_GET['modificar']){
                        echo "<td><input type='checkbox' name='rebajado' id='rebajado' "; if($rebajada == "✓") echo "checked";echo"></td>";
                    } else {
                        echo"<td>$rebajada</td>";
                    }
                } else {
                    echo"<td>$rebajada</td>";
                }
                //precio rebajado
                $precioFinal = $row['precio']-($row['precio']*$row['rebaja']/100);
                $precioRebajado = $row['precio'] - $precioFinal;
                echo "<td>{$precioRebajado}€</td>";
                echo "<td>{$precioFinal}€</td>";
                if(isset($_GET['modificar'])){
                    if($row['id_prenda'] == $_GET['modificar']){
                        echo "<td><input type='submit' value='Modificar'></td>";
                    } else {
                        echo "<td><a href='index.php?modificar={$row['id_prenda']}'>Modificar</a></td>";

                    }
                } else {
                    echo "<td><a href='index.php?modificar={$row['id_prenda']}'>Modificar</a></td>";
                }
                echo "<td><a href='controlador/eliminar_prenda.php?id={$row['id_prenda']}'>Eliminar</a></td>";
                if(isset($_GET['modificar'])){
                    if($row['id_prenda'] == $_GET['modificar']){
                        echo "</form>";
                    }
                }
                echo "</tr>";
            }
        ?>
    </table>
    <hr>
    <h2>Añadir</h2>
    
    <form method="POST" action="controlador/annadirprenda.php" enctype="multipart/form-data" style="display: flex; flex-direction:column">
        <label for="prenda">Prenda:
            <input type="text" name="prenda" id="prenda">
        </label>
        <label for="foto">Foto:
            <input type="file" accept="image/png, image/jpeg" name="foto" id="foto">
        </label>
        <label for="precio">Precio:
            <input type="number" min=0 step="0.1" value="0" name="precio" id="precio">
        </label>
        <label for="rebajado">Rebajado?:
            <input type="checkbox" name="rebajado" id="rebajado">
        </label>
        <label for="rebaja">rebaja %:
            <input type="number" min=0 max=100 value="0" name="rebaja" id="rebaja">
        </label>
        <input type="submit" value="Enviar" style="width: 100px;">
    </form>

</body>
</html>