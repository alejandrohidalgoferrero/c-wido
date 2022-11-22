<?php

include("conexion.php");

$id=$_POST['id'];



$fecha1=$_POST['fecha1'];
$comentarios1=$_POST['comentarios1'];

$fecha2=$_POST['fecha2'];
$comentarios2=$_POST['comentarios2'];

$fecha3=$_POST['fecha3'];
$comentarios3=$_POST['comentarios3'];

$fecha4=$_POST['fecha4'];
$comentarios4=$_POST['comentarios4'];

// $fecha5=$_POST['fecha5'];
// $comentarios5=$_POST['comentarios5'];



// $medio1 = str_replace('T', ' ', $fecha1);
// $fecha1=$medio1.':00';
// // $fecha1 = new DateTime($fecha1);


// $medio2 = str_replace('T', ' ', $fecha2);
// $fecha2=$medio2.':00';
// // $fecha2 = new DateTime($fecha2);


// $medio3 = str_replace('T', ' ', $fecha3);
// $fecha3=$medio3.':00';
// // $fecha3 = new DateTime($fecha3);


// $medio4 = str_replace('T', ' ', $fecha4);
// $fecha4=$medio4.':00';
// // $fecha4 = new DateTime($fecha4);


// $medio5 = str_replace('T', ' ', $fecha5);
// $fecha5=$medio5.':00';
// // $fecha5 = new DateTime($fecha5);


$sql1="UPDATE `cambio_molde_registro` SET `fecha1` = '$fecha1',`comentarios1` = '$comentarios1',`fecha2` = '$fecha2',`comentarios2` = '$comentarios2',`fecha3` = '$fecha3',`comentarios3` = '$comentarios3',`fecha4` = '$fecha4',`comentarios4` = '$comentarios4' WHERE `cambio_molde_registro`.`id` ='$id' ";
$consulta2 = mysqli_query($conexion, $sql1);


header('Location: cambiomolde.php');

?>