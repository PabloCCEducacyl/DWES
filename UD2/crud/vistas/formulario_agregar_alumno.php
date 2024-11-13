<?php
    include('encabezado.php');
    if(isset($_GET['error'])){
        echo "<p class='error'>{$_GET['error']}</p>";
    }
    if(isset($_GET['info'])){
        echo "<p class='info'>{$_GET['info']}</p>";
    }
    ?>
<form method='POST' action="../controlador/agregar_alumno.php">
    <label>DNI:
        <input type="text" name="dni"></label>
    <label>Nombre:
        <input type="text" name="nombre"></label>
    <label>Apellidos:
        <input type="text" name="apellidos"></label>
    <label>Email:
        <input type="email" name="email"></label>
    <label>Telefono:
        <input type="string" name="telefono"></label>
    <label>Curso:
        <input type="text" name="curso"></label>
    <input type="submit" name="Enviar">
</form>
<?php include('footer.php');?>