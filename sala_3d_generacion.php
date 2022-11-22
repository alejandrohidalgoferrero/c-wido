<?php 

include("conexion.php");

session_start();

$nombre_completo = $_SESSION['nombrecompleto'];

$sql = "INSERT INTO `comunicacion_sala_3d`(`usuario_creacion`, `fecha_creacion`,`usuario_modificacion`, `fecha_modificacion`, `archivo_adjunto`) VALUES ('$nombre_completo', CURRENT_TIMESTAMP,'$nombre_completo',CURRENT_TIMESTAMP,0)";
$consulta = mysqli_query($conexion, $sql);


$sql = "SELECT*FROM `comunicacion_sala_3d` ORDER BY `comunicacion_sala_3d`.`id` DESC LIMIT 1";
$consulta = mysqli_query($conexion, $sql);
while ($row = mysqli_fetch_array($consulta)) {
    $nuevo_id_sala_3d=$row['id'];
}

for ($i = 0; $i <= 20; $i++) {

    $estado_nc_columna='estado_no_conformidad_'.$i;

    $sql = "UPDATE `comunicacion_sala_3d` SET  `$estado_nc_columna`= 0 WHERE `id`='$nuevo_id_sala_3d'";
    $consulta = mysqli_query($conexion, $sql);
}


echo '<br>nuevo_id_sala_3d= '.$nuevo_id_sala_3d.'<br>';
session_start();
$_SESSION['id_sala_3d']=$nuevo_id_sala_3d;


header('Location: sala_3d_informe.php')

?>