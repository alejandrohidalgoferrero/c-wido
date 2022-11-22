<?php
include("conexion.php");

session_start();
$operacion= $_SESSION['operacion'];
$accion= $_SESSION['accion'];
$tabla_plantilla='check_'.$operacion.'_'.$accion.'_plantilla';
$tabla_registro='check_'.$operacion.'_'.$accion.'_registro';


$sql2 =  "SELECT*FROM $tabla_registro";
    $consulta2 = mysqli_query($conexion, $sql2);
    while($row = mysqli_fetch_array($consulta2)) {
     $num_test=intval($row['num_test']);
    }

    echo '<br>num_test= '.$num_test;

    $num_test++;
    echo '<br>num_test++= '.$num_test;

if($num_test!=""){}else{$num_test=1;}


$_SESSION['num_test']=$num_test;

$sql2 =  " UPDATE `$tabla_plantilla` SET `num_test`='$num_test'";
$consulta2 = mysqli_query($conexion, $sql2);

$sql2 =  "INSERT INTO $tabla_registro SELECT*FROM $tabla_plantilla";
$consulta2 = mysqli_query($conexion, $sql2);

header('Location: checks arranque parada test.php');

?>