<?php
   require_once('controlador_libro.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <title>Carrito de libros</title>
</head>

<body>
   <h1>Carrito de Libros</h1>
   <a href="libros.php">Libros</a>
   <?php
   //print_r($_SESSION['carrito']);
   if($_SESSION['carrito'] == []){
      echo "<p>No hay nada en el carrito</p>";
   } else {
      echo "<table>";
      echo "<tr><th>Nombre</th><th>Precio</th><th>Cantidad</th><th>Editar</th><th>Borrar</th></tr>";
      $carrito = $_SESSION['carrito'];
      foreach($carrito as $id => $cantidad){
         $libro = getByID($id);
         echo "<tr><td>{$libro->getNombre()}</td><td>{$libro->getPrecio()}</td><td>{$cantidad}</td><td><form action='controlador_libro.php' method='GET'><input type='hidden' name='operacion' value='editar'><input type='hidden' name='id' value='{$libro->getID()}'><input type='number' name='cantidad' value='0'><input type='submit' value='Editar'></form></td><td><form action='controlador_libro.php' method='GET'><input type='hidden' name='operacion' value='borrar'><input type='hidden' name='id' value='{$libro->getID()}'><input type='submit' value='Borrar'></form></td></tr>";}
      }
      echo "</table>";
   //Muestra el carrito con los libros añadidos si no está vacío
   //Da posibilidad de:
   //- Ir al detalle del pago
   //- Vaciar el carrito
   //- Volver al listado de los libros para seguir comprando en todo caso
   
   ?>
   <br>
   <a href="detalle_pago_libro.php">Comprar Libros</a>
   <br>
   <a href="vaciar_carrito.php">Vaciar carrito</a>

</body>

</html>