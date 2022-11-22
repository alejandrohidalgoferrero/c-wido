<?php 

$id="localhost"; 
include("conexion.php");

$numerofilas =0;
$sql = "SELECT * FROM `check_balancines_registro`";
$consulta = mysqli_query($conexion, $sql); 
while ($row = mysqli_fetch_array($consulta)) {
$orden=$row['orden'];
}


$ordennuevo =$orden +1;

echo '<br>orden= '.$orden;
echo '<br>ordennuevo= '.$ordennuevo;

session_start();
$_SESSION['orden']=$ordennuevo;


    $sql="UPDATE `check_balancines_plantilla` SET `check_balancines_plantilla`.`orden` = $ordennuevo";
    $consulta=mysqli_query($conexion, $sql);

    $sql2 =  "INSERT INTO `check_balancines_registro` SELECT*FROM `check_balancines_plantilla`";
    $consulta2 = mysqli_query($conexion, $sql2);


    $sql="UPDATE `check_balancines_plantilla` SET `check_balancines_plantilla`.`orden` = 0";
    $consulta=mysqli_query($conexion, $sql);


    header ('Location: app_elementos_elevacion_check_balancines.php');
?>