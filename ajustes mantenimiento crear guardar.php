<?php

include("conexion.php"); 
include("ipserver.php"); 
$ip="localhost";


$marca = filtrado($_POST['marca']);
$nombre = filtrado($_POST['nombre']);
$familia = filtrado($_POST['familia']);
$mabec = filtrado($_POST['mabec']);
$cajonera = filtrado($_POST['cajonera']);

$unidades_stock = ($_POST['unidades_stock']);
$stock_minimo = filtrado($_POST['stock_minimo']);
$stock_nominal = filtrado($_POST['stock_nominal']);
$stock_pedido = filtrado($_POST['stock_pedido']);
$observaciones = filtrado($_POST['observaciones']);



$sql="INSERT INTO `kitting_elementos_estado`( `marca`, `nombre`, `familia`, `mabec`, `cajonera`, `unidades en stock`, `stock minimo`, `stock nominal`, `stock pedido`, `observaciones`) VALUES ('$marca','$nombre','$familia','$mabec','$cajonera' ,'$unidades_stock','$stock_minimo' ,'$stock_nominal','$stock_pedido' ,'$observaciones')";
$consulta = mysqli_query($conexion, $sql);

header ('Location: ajustes.php');

?>