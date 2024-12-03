<?php
    include('encabezado.php');
    ?>
<h2>Agregar alumno</h2>
<form method='POST' action="../controlador/agregar_alumno.php">
    <label>DNI:
        <input type="text" required name="dni"></label>
    <label>Nombre:
        <input type="text" required name="nombre"></label>
    <label>Apellidos:
        <input type="text" name="apellidos"></label>
    <label>Email:
        <input type="email" required name="email"></label>
    <label>Telefono:
        <input type="string" name="telefono"></label>
    <label>Curso:
        <input type="text" name="curso"></label>
    <input type="submit" value="Enviar">
</form>
<h2>Agregar Proyecto</h2>
<form method="post" action="../controlador/agregar_proyecto.php" enctype="multipart/form-data">
    <label>Titulo:
        <input type="text" name="titulo" id="titulo"></label>
    <label>Descripción:
        <input type="text" name="descripcion" id="descripcion"></label>
    <label>Periodo:
        <input type="text" name="periodo" id="periodo"></label>
    <label>Curso:
        <input type="text" name="curso" id="curso"></label>
    <label>Fecha presentación:
        <input type="date" name="fecha_presentacion" id="fecha_presentacion"></label>
    <label>Logotipo:
        <input type="file" name="logotipo" id="logotipo" accept="image/png, image/jpeg"></label>
    <label>PDF:
        <input type="file" name="pdf" id="pdf" accept="application/pdf"></label>
    <label for="id_alumno">Alumno:
        <select name="id_alumno" id="id_alumno">
            <?php
                $listaAlumnos = getListaAlumnos();
                foreach($listaAlumnos as $id => $nombre){
                    echo "<option value='$id'>$nombre</option>";
                }
            ?>
        </select>
    </label>
    <label>Nota:
        <input type="number" name="nota" id="nota"></label>
    <input type="submit" value="Enviar">
</form>
<?php 
    include('footer.php');

    function getListaAlumnos(){
        include('../config/conexion.php');
        $listaAlumnos = $mysqli->query("SELECT id_alumno, nombre FROM alumno");
        $arrayAlumnos = [];
        foreach($listaAlumnos as $alumno){
            $arrayAlumnos[$alumno["id_alumno"]] = $alumno["nombre"];
        }
        return $arrayAlumnos;
    }
?>