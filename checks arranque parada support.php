<?php
    include("conexion.php");

$operacion=$_POST["operacion"];
$accion=$_POST["accion"];


$tabla_plantilla='check_'.$operacion.'_'.$accion.'_plantilla';
$tabla_registro='check_'.$operacion.'_'.$accion.'_registro';


session_start();
$_SESSION['operacion']=$operacion;
$_SESSION['accion']=$accion;
$_SESSION['tabla']=$tabla_registro;
header('Location: checks arranque parada registro.php');


?>