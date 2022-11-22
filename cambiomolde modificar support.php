<?php

include("conexion.php");

$id=$_POST['id'];

$inyectora=$_POST['inyectora'];
$moldesaliente=$_POST['moldesaliente'];
$improntasaliente= $_POST['improntasaliente'];
$tipopiezasaliente=$_POST['tipopiezasaliente'];
$moldeentrante= $_POST['moldeentrante'];
$improntaentrante=$_POST['improntaentrante'];
$tipopiezaentrante= $_POST['tipopiezaentrante'];
$tipo_cambio= $_POST['tipo_cambio'];


$sql="UPDATE `cambio_molde_registro` SET `inyectora`='$inyectora',`tipo_cambio`='$tipo_cambio',`molde saliente`='$moldesaliente',`impronta saliente`='$improntasaliente',`tipo pieza saliente`='$tipopiezasaliente',`molde entrante`='$moldeentrante',`impronta entrante`='$improntaentrante',`tipo pieza entrante`='$tipopiezaentrante' WHERE id='$id'";
$consulta = mysqli_query($conexion, $sql);


header('Location: cambiomolde.php');

?>