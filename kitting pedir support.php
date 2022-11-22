<?php

include("conexion.php");

$mabec=$_POST['mabec'];
$cantidad= $_POST['cantidad'];

$estado="3";

$sql ="SELECT*FROM `kitting_elementos_estado` WHERE `kitting_elementos_estado`.`mabec` ='$mabec'";
$consulta = mysqli_query($conexion, $sql);
  while ($row = mysqli_fetch_array($consulta)) {
    $nombre=$row['nombre'];
    $familia=$row['familia'];
    $cajonera=$row['cajonera'];
    $elementos=$row['unidades en stock'];
    $stockminimo=$row['stock minimo'];
    $stockpedido=$row['stock pedido'];

  }

  $fecha = date("Y-m-d H:i:s");  
  $funcion="Pedir";
  $total =$elementos;
  
$sql1="UPDATE `kitting_elementos_estado` SET `stock pedido` = '$cantidad',`estado` = '$estado' WHERE `kitting_elementos_estado`.`mabec` ='$mabec' ";
$consulta2 = mysqli_query($conexion, $sql1);


$sql="INSERT INTO `kitting_registro_uso`(`fecha`, `funcion`, `nombre`, `familia`, `mabec`, `cajonera`, `stock previo`, `cantidad`, `stock posterior`) VALUES ('$fecha','$funcion','$nombre','$familia','$cajonera','$mabec','$elementos','$cantidad','$total')";
$consulta = mysqli_query($conexion, $sql);

header('Location: Kitting.php');
    


?>