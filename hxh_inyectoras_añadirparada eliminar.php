<?php

include("conexion.php"); 
include("ipserver.php"); 
$ip="localhost";

$id=$_POST['id'];

session_start();

$tabla_problemas=$_SESSION['tabla_problemas'];

$sql2="DELETE FROM `$tabla_problemas` WHERE `hxh_inyectora_problemas`.`id` ='$id' ";

$consulta2 = mysqli_query($conexion, $sql2);

header ('Location: HxH INY fechas.php');

?>