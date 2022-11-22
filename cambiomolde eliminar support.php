<?php

include("conexion.php");

$id=$_POST['id'];


$sql="DELETE FROM `cambio_molde_registro` WHERE id='$id'";
$consulta = mysqli_query($conexion, $sql);


header('Location: cambiomolde.php');

?>