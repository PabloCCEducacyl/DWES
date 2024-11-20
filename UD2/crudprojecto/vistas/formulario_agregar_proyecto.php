<?php include('encabezado.php')?>
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
    <input type="submit" value="Enviar">
</form>
<?php include('footer.php')?>