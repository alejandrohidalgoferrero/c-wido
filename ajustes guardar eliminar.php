<?php

include("conexion.php"); 
include("ipserver.php"); 
$ip="localhost";

$id=$_POST['id2'];

$sql2="DELETE FROM `usuarios` WHERE `usuarios`.`id` ='$id' ";

$consulta2 = mysqli_query($conexion, $sql2);

header ('Location: ajustes.php');

?>