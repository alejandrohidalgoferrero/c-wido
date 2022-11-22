<?php

include("conexion.php");
include("ipserver.php");
$num_cambio_molde=$_POST['id'];
$tipo_cambio_molde=$_POST['tipo_cambio_molde'];
$tipo_check=$_POST['tipo_check'];

session_start();
$_SESSION["num_cambio_molde"]=$num_cambio_molde;
$_SESSION["tipo_cambio_molde"]=$tipo_cambio_molde;
$_SESSION["tipo_check"]=$tipo_check;
echo'<br>num_cambio_molde= '.$num_cambio_molde;
echo'<br>tipo_cambio_molde= '.$tipo_cambio_molde;
echo'<br>tipo_check= '.$tipo_check;


$sql = "SELECT * FROM `cambio_molde_check_registro` WHERE `tipo_cambio_molde` = '$tipo_cambio_molde' AND  `tipo_check` = '$tipo_check' AND `num_cambio_molde` = '$num_cambio_molde'";
$consulta = mysqli_query($conexion, $sql); 
while ($row = mysqli_fetch_array($consulta)) {
    $orden=$row['orden'];
}

$sql = "SELECT * FROM `cambio_molde_registro` WHERE `id` = '$num_cambio_molde' AND  `tipo_cambio_molde` = '$tipo_cambio_molde'";
$consulta = mysqli_query($conexion, $sql); 
while ($row = mysqli_fetch_array($consulta)) {
    $maquina=$row['inyectora'];
    $molde_holder_block=$row['molde entrante'];
    $molde_impronta=$row['impronta entrante'];
}

    echo'<br>orden_previo= '.$orden;
    $orden_previo=$orden;

if($orden=="")
{
    $orden=1;
}
else
{
    $orden++;
}

$_SESSION["orden"]=$orden;
  echo'<br>orden= '.$orden;

if($orden>"1"){

    $sql2 =  "CREATE TABLE `cambio_molde_check_temporal` SELECT * FROM `cambio_molde_check_registro` WHERE `tipo_cambio_molde` = '$tipo_cambio_molde' AND  `tipo_check` = '$tipo_check' AND `num_cambio_molde` = '$num_cambio_molde' AND `orden` = '$orden_previo'";
    $consulta2 = mysqli_query($conexion, $sql2);

    $sql="UPDATE  `cambio_molde_check_temporal` SET `orden` = '$orden', `maquina` = '$maquina',`molde_holder_block` = '$molde_holder_block' ,`molde_impronta` = '$molde_impronta'  ,`fecha_inicio_cambio` = current_timestamp()";
    $consulta=mysqli_query($conexion, $sql);

    $sql2 =  "INSERT INTO  `cambio_molde_check_registro` SELECT*FROM  `cambio_molde_check_temporal`";
    $consulta2 = mysqli_query($conexion, $sql2);

    $sql2 =  "DROP TABLE IF EXISTS `cambio_molde_check_temporal`";
    $consulta2 = mysqli_query($conexion, $sql2);

  echo'<br>  orden mayor que cero';
}
else{
    $sql2 =  "CREATE TABLE `cambio_molde_check_temporal` SELECT * FROM `cambio_molde_check_plantilla` WHERE `tipo_cambio_molde` = '$tipo_cambio_molde' AND  `tipo_check` = '$tipo_check'";
    $consulta2 = mysqli_query($conexion, $sql2);

    $sql="UPDATE  `cambio_molde_check_temporal` SET `orden` = '$orden',`num_cambio_molde` = '$num_cambio_molde', `maquina` = '$maquina',`molde_holder_block` = '$molde_holder_block' ,`molde_impronta` = '$molde_impronta'  ,`fecha_inicio_cambio` = current_timestamp() ";
    $consulta=mysqli_query($conexion, $sql);

    $sql2 =  "INSERT INTO  `cambio_molde_check_registro` SELECT*FROM  `cambio_molde_check_temporal`";
    $consulta2 = mysqli_query($conexion, $sql2);

    $sql2 =  "DROP TABLE IF EXISTS `cambio_molde_check_temporal`";
    $consulta2 = mysqli_query($conexion, $sql2);
    echo'<br> orden igual a cero';

}

header('Location: cambiomolde_check.php');

?>