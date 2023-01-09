<?php 

include("conexion.php");

session_start();

$nombre_completo = $_SESSION['nombrecompleto'];
$tipo_generacion=$_POST['tipo_generacion'];


switch ($tipo_generacion) {
    case "nuevo":
        $sql = "SELECT*FROM `check_rechazo_estanqueidades_registro` ORDER BY `id_check_rechazo_estanqueidad` DESC LIMIT 1";
        $consulta = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_array($consulta)) {
            $nuevo_id=$row['id_check_rechazo_estanqueidad']+1;
        }
        if(is_null($nuevo_id))
        {
            $nuevo_id=1;
        }

        $_SESSION['id_check_rechazo_estanqueidad']=$nuevo_id;

        $sql = "UPDATE `check_rechazo_estanqueidades_plantilla` SET `id_check_rechazo_estanqueidad`='$nuevo_id',`orden`=1,`fecha_creacion`=CURRENT_TIMESTAMP,`usuario_creacion`='$nombre_completo',`fecha_modificacion`=CURRENT_TIMESTAMP,`usuario_modificacion`='$nombre_completo'";
        $consulta = mysqli_query($conexion, $sql);

        $sql2 =  "INSERT INTO `check_rechazo_estanqueidades_registro` SELECT*FROM `check_rechazo_estanqueidades_plantilla`";
        $consulta2 = mysqli_query($conexion, $sql2);

        $_SESSION['orden']=1; 

    break;
    case "modificar":

        $id_check_rechazo_estanqueidad=$_POST['id_check_rechazo_estanqueidad'];
        $_SESSION['id_check_rechazo_estanqueidad']=$id_check_rechazo_estanqueidad; 

        $sql = "SELECT*FROM `check_rechazo_estanqueidades_registro` WHERE `id_check_rechazo_estanqueidad`='$id_check_rechazo_estanqueidad'  ORDER BY `orden` DESC LIMIT 1 ";
        $consulta = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_array($consulta)) {
            $orden=$row['orden'];
        }
        if(is_null($orden))
        {
            $nuevo_orden=1;
        }
        else
        {
            $nuevo_orden=$orden+1;
        }

        $sql2 =  "CREATE TABLE `check_rechazo_estanqueidades_temporal` SELECT * FROM `check_rechazo_estanqueidades_registro` WHERE `id_check_rechazo_estanqueidad`='$id_check_rechazo_estanqueidad' AND `orden`='$orden' ";
        $consulta2 = mysqli_query($conexion, $sql2);

        $sql="UPDATE `check_rechazo_estanqueidades_temporal` SET `orden` = '$nuevo_orden',`fecha_modificacion`=CURRENT_TIMESTAMP,`usuario_modificacion`='$nombre_completo'";
        $consulta=mysqli_query($conexion, $sql);

        $sql2 =  "INSERT INTO `check_rechazo_estanqueidades_registro` SELECT*FROM `check_rechazo_estanqueidades_temporal`";
        $consulta2 = mysqli_query($conexion, $sql2);

        $sql2 =  "DROP TABLE IF EXISTS `check_rechazo_estanqueidades_temporal`";
        $consulta2 = mysqli_query($conexion, $sql2);

        $_SESSION['orden']=$nuevo_orden; 

    break;
}

header('Location: check_rechazo_estanqueidad.php')

?>