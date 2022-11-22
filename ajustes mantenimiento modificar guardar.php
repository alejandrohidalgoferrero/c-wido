<?php

include("conexion.php"); 
include("ipserver.php"); 
$ip="localhost";

$id=$_POST['id2'];
$marca=$_POST["marca"];
$nombre=$_POST["nombre"];
$familia=$_POST["familia"];
$mabec=$_POST["mabec"];
$cajonera=$_POST["cajonera"];
$unidades_stock=$_POST["unidades_stock"];
$stock_minimo=$_POST["stock_minimo"];
$stock_nominal=$_POST["stock_nominal"];
$stock_pedido=$_POST["stock_pedido"];
$observaciones=$_POST["observaciones"];
echo 'cajonera  nº: '.$cajonera;
$plano=$_POST["plano"];

if ($plano!="1" ) {$valor_plano="";}else{$valor_plano="1";}

$sql1="UPDATE `kitting_elementos_estado` SET `marca` = '$marca',`nombre` = '$nombre',`familia` = '$familia' ,`mabec` = '$mabec',`plano` = '$valor_plano',`cajonera` = '$cajonera' ,`unidades en stock` = '$unidades_stock',`stock minimo` = '$stock_minimo' ,`stock nominal` = '$stock_nominal',`stock pedido` = '$stock_pedido' ,`observaciones` = '$observaciones' WHERE `kitting_elementos_estado`.`id` ='$id' ";
$consulta2 = mysqli_query($conexion, $sql1);
header ('Location: ajustes.php');

?>