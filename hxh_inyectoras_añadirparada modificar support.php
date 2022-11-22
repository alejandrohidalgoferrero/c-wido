<?php

include("conexion.php");

session_start();
$fecha=$_SESSION['fecha'];
$iny=$_SESSION['iny'];
$inyectora=$_SESSION['inyectora'];
$tabla=$_SESSION['tabla'];
$tabla_problemas=$_SESSION['tabla_problemas'];

$turno=$_POST['turno'];
$nombre=$_POST['nombre'];
$parada=$_POST['parada'];
$id=$_POST['id'];

$hora=$_POST['hora'];
$tiempo= $_POST['tiempo'];
$sintoma=$_POST['sintoma'];
$causa= $_POST['causa'];
$resultado=$_POST['resultado'];
$tipo= $_POST['tipo'];

$parada=1;
$sql = "SELECT * FROM `$tabla_problemas` WHERE `fecha`='$fecha' AND `inyectora`='$iny' AND  `turno`='$turno' AND `hora`='$hora'";
$consulta = mysqli_query($conexion, $sql); 
while ($row = mysqli_fetch_array($consulta)) {
$parada++;
}



switch ($hora) {
    case "6h-7h":
        $hour="1";
        break;
    case "7h-8h":
        $hour="2";
        break;
    case "8h-9h":
        $hour="3";
        break;
    case "9h-10h":
        $hour="4";
        break;
    case "10h-11h":
        $hour="5";
        break;
    case "11h-12h":
        $hour="6";
        break;
    case "12h-13h":
        $hour="7";
        break;
    case "13h-14h":
        $hour="8";
        break;
    case "14h-15h":
        $hour="9";
        break;
    case "15h-16h":
        $hour="10";
        break;
    case "16h-17h":
        $hour="11";
        break;
    case "17h-18h":
        $hour="12";
        break;
    case "18h-19h":
        $hour="13";
        break;
    case "19h-20h":
        $hour="14";
        break;
    case "20h-21h":
        $hour="15";
        break;
    case "21h-22h":
        $hour="16";
        break;
    case "22h-23h":
        $hour="17";
        break;
    case "23h-0h":
        $hour="18";
        break;
    case "0-1h":
        $hour="19";
        break;
    case "1h-2h":
        $hour="20";
        break;
    case "2h-3h":
        $hour="21";
        break;
    case "3h-4h":
        $hour="22";
        break;
    case "4h-5h":
        $hour="23";
        break;
    case "5h-6h":
        $hour="24";
        break;
}

$sql ="UPDATE `$tabla_problemas` SET `operario`='$nombre',`numero`=$parada,`hora`='$hora',`hour`='$hour',`sintoma`='$sintoma',`causa`='$causa',`resultado`='$resultado',`tipo`='$tipo',`tiempo`='$tiempo' WHERE `id`=$id";

$consulta = mysqli_query($conexion, $sql);


header('Location: HxH INY fechas.php');

?>