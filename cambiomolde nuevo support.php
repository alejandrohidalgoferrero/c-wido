<?php

include("conexion.php");
$inyectora=$_POST['inyectora'];
$moldesaliente=$_POST['moldesaliente'];
$improntasaliente= $_POST['improntasaliente'];
$tipopiezasaliente=$_POST['tipopiezasaliente'];
$moldeentrante= $_POST['moldeentrante'];
$improntaentrante=$_POST['improntaentrante'];
$tipopiezaentrante= $_POST['tipopiezaentrante'];
$tipo_cambio= $_POST['tipo_cambio'];

$estado=0;
$fechacreacion=date("Y-m-d H:i:s");

$sql ="INSERT INTO `cambio_molde_registro`( `estado`,`inyectora`,`fechacreacion` ,`tipo_cambio`, `molde saliente`, `impronta saliente`, `tipo pieza saliente`, `molde entrante`, `impronta entrante`, `tipo pieza entrante`) VALUES ('$estado','$inyectora','$fechacreacion','$tipo_cambio','$moldesaliente','$improntasaliente','$tipopiezasaliente','$moldeentrante','$improntaentrante','$tipopiezaentrante')";
$consulta = mysqli_query($conexion, $sql);


header('Location: cambiomolde.php');

?>