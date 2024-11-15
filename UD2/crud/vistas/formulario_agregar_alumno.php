<?php
    include('encabezado.php');
    ?>
<h2>Agregar alumno</h2>
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
    <input type="submit" value="Enviar">
</form>
<?php include('footer.php');?>