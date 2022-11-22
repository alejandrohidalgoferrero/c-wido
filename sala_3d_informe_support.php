<?php

include("conexion.php");
include("nav.php");

session_start();
$id_sala_3d=$_SESSION['id_sala_3d'];

$nombre_completo=$_POST['operario'];

$fecha=$_POST['fecha_realizacion'];
$turno=$_POST['turno_realizacion'];

$tipo_molde=$_POST['tipo_molde'];
$molde=$_POST['molde'];
echo'<br>id_sala_3d= '.$id_sala_3d.'<br>';

echo'<br>nombre_completo= '.$nombre_completo.'<br>';

echo'<br>fecha= '.$fecha.'<br>';
echo'<br>turno= '.$turno.'<br>';


$sql = "UPDATE `comunicacion_sala_3d` SET  `usuario_modificacion`='$nombre_completo', `fecha_modificacion`=CURRENT_TIMESTAMP, `fecha`='$fecha', `turno`='$turno', `tipo_impronta`='$tipo_molde' , `molde`='$molde'WHERE `id`='$id_sala_3d'";
$consulta = mysqli_query($conexion, $sql);

$num_no_conformidades=0;

for ($i = 0; $i <= 20; $i++) {
    echo'<br>i= '.$i.'<br>';

    $nc_dato=$_POST['nc_'.$i];
    $reparable_dato=$_POST['reparable_'.$i];

    echo'<br>nc_dato= '.$nc_dato.'<br>';

    $nc_columna='no_conformidad_'.$i;
    $reparable_columna='reparable_'.$i;

    $sql = "UPDATE `comunicacion_sala_3d` SET  `$nc_columna`='$nc_dato',`$reparable_columna`='$reparable_dato' WHERE `id`='$id_sala_3d'";
    $consulta = mysqli_query($conexion, $sql);

    if(!empty($nc_dato))
    {
        $num_no_conformidades++;
        echo'<br>num_no_conformidades= '.$num_no_conformidades.'<br>'; 
    }
}

$sql = "UPDATE `comunicacion_sala_3d` SET  `num_no_conformidades`='$num_no_conformidades'WHERE `id`='$id_sala_3d'";
$consulta = mysqli_query($conexion, $sql);


header('Location: sala_3d_menu.php');

?>