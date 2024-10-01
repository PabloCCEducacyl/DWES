<?php
 $arr1 = array(
    1 => "3000",
    2 => "4000",
);
$arr2 = array(
    1 => 3000,
    2 => 4000,
);
$arr3 = array(
    2 => "4000",
    1 => "3000",
);
if($arr1 == $arr2){
    echo "arr1 y arr2 son iguales <br>";
}else{
    echo "arr1 y arr2 no son iguales <br>";
}
if($arr1 == $arr3){
    echo "arr1 y arr3 son iguales <br>";
}else{
    echo "arr1 y arr3 no son iguales <br>";
}
if($arr1 === $arr2){
    echo "arr1 y arr2 son idénticos <br>";
}else{
    echo "arr1 y arr2 no son idénticos <br>";
}
if($arr1 === $arr3){
    echo "arr1 y arr3 son idénticos <br>";
}else{
    echo "arr1 y arr3 no son idénticos <br>";
}

$frutas = ["naranja", "pera", "manzana"];

array_push($frutas, "piña");
print_r($frutas);

$ultFruta = array_pop($frutas);
if (in_array("piña", $frutas)) {
 echo "<p>Queda piña</p>";
} else {
echo "<p>No queda piña</p>";
}
print_r($frutas);


$capitales = array(
    "Italia" => "Roma",
    "Francia" => "Paris",
    "Portugal" => "Lisboa"
);

$paises = array_keys($capitales);
print_r($paises);
sort($paises);
print_r($paises);
unset($capitales["Francia"]);
print_r($capitales);

?>
