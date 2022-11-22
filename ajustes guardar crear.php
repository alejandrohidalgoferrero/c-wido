<?php

include("conexion.php"); 
include("ipserver.php"); 
$ip="localhost";


$nombre = filtrado($_POST['nombre']);
$apellido1 = filtrado($_POST['apellido1']);
$apellido2 = filtrado($_POST['apellido2']);
$uet = filtrado($_POST['uet']);
$ju = filtrado($_POST['ju']);

$usuario = ($_POST['usuario']);
$password = filtrado($_POST['password']);
$tipo = filtrado($_POST['tipo']);

$sql="INSERT INTO `usuarios`( `nombre`, `apellido1`, `apellido2`, `uet`,`ju`, `numero empresa`, `tipo`, `password`) VALUES ('$nombre','$apellido1','$apellido2','$uet','$ju' ,'$usuario','$tipo' ,'$password')";
$consulta = mysqli_query($conexion, $sql);

header ('Location: ajustes.php');

?>