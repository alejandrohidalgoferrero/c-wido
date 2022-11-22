<?php

include("conexion.php");

$id=$_POST['id'];
$estado_previo=$_POST['estado'];

switch ($estado_previo) {
    case 0:
        $estado=1;
        break;
    case 1:
        $estado=0;
        break;
}

$sql="UPDATE `cambio_molde_registro` SET `estado`='$estado' WHERE id='$id'";
$consulta = mysqli_query($conexion, $sql);


header('Location: cambiomolde.php');

?>