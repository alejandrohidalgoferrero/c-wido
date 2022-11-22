<?php

include("conexion.php"); 
include("ipserver.php"); 
$ip="localhost";


$fecha = $_POST['fecha'];
$turno = $_POST['turno'];
$datamatrix = $_POST['datamatrix'];
$origen = $_POST['origen'];
$operario = $_POST['operario'];

$sql="INSERT INTO `piezas_refundidas_registro`( `datamatrix`, `fecha`, `turno`, `operario`,`origen`) VALUES ('$datamatrix','$fecha','$turno','$operario','$origen')";
$consulta = mysqli_query($conexion, $sql);

header ('Location: piezas refundidas.php');

?>