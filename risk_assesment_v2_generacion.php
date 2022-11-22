<?php 

include("conexion.php");

session_start();

$nombre_completo = $_SESSION['nombrecompleto'];

$tipo_generacion=$_POST['tipo_generacion'];

echo '<br>tipo_generacion= '.$tipo_generacion.'<br>';
echo '<br>nombre_completo= '.$nombre_completo.'<br>';

switch ($tipo_generacion) {
    case "nuevo":
        $sql = "SELECT*FROM `risk_assesment_registro` ORDER BY `risk_assesment_registro`.`id` DESC LIMIT 1";
        $consulta = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_array($consulta)) {
            $nuevo_id=$row['id']+1;
        }
        echo '<br>nuevo_id= '.$nuevo_id.'<br>';
        session_start();
        $_SESSION['id_risk_assement']=$nuevo_id;

        $sql = "INSERT INTO `risk_assesment_registro`(`id`, `ultimo_orden`, `fecha_creacion`, `usuario_creacion`, `fecha_modificacion`, `usuario_moficacion`) VALUES ($nuevo_id,0,CURRENT_TIMESTAMP,'$nombre_completo', CURRENT_TIMESTAMP,'$nombre_completo')";
        $consulta = mysqli_query($conexion, $sql);

        $sql = "UPDATE `risk_assesments_support` SET `id_risk_assesment`='$nuevo_id',`orden`=0";
        $consulta = mysqli_query($conexion, $sql);

        $sql2 =  "INSERT INTO `risk_assesments_datos` SELECT*FROM `risk_assesments_support`";
        $consulta2 = mysqli_query($conexion, $sql2);

        session_start();
        $_SESSION['id_risk_assement']=$nuevo_id;
        $_SESSION['orden']=0;

    break;
    case "modificar":
        $id_risk_assesment=$_POST['id_risk_assesment'];

        $sql = "SELECT*FROM `risk_assesment_registro` WHERE `id`='$id_risk_assesment'";
        $consulta = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_array($consulta)) {
            $orden=$row['ultimo_orden'];
        }
            $orden_nuevo=$orden+1;

        $sql2 =  "CREATE TABLE `risk_assesments_datos_temporal` SELECT * FROM `risk_assesments_datos` WHERE `id_risk_assesment`='$id_risk_assesment' AND `orden`='$orden' ";
        $consulta2 = mysqli_query($conexion, $sql2);
    
        $sql="UPDATE `risk_assesments_datos_temporal` SET `orden` = '$orden_nuevo'";
        $consulta=mysqli_query($conexion, $sql);

        $sql="UPDATE `risk_assesment_registro` SET `ultimo_orden` = '$orden_nuevo', `fecha_modificacion`= CURRENT_TIMESTAMP, `usuario_moficacion`='$nombre_completo'  WHERE `id`='$id_risk_assesment'";
        $consulta=mysqli_query($conexion, $sql);

        $sql2 =  "INSERT INTO `risk_assesments_datos` SELECT*FROM `risk_assesments_datos_temporal`";
        $consulta2 = mysqli_query($conexion, $sql2);
    
        $sql2 =  "DROP TABLE IF EXISTS `risk_assesments_datos_temporal`";
        $consulta2 = mysqli_query($conexion, $sql2);


        session_start();
        $_SESSION['id_risk_assement']=$id_risk_assesment;
        $_SESSION['orden']=$orden_nuevo;

        echo '<br>tipo_generacion= '.$tipo_generacion.'<br>';
        echo '<br>id_risk_assesment= '.$id_risk_assesment.'<br>';
        echo '<br>orden= '.$orden.'<br>';
        echo '<br>orden_nuevo= '.$orden_nuevo.'<br>';


    break;
}


header('Location: risk_assesment_v2.php')

?>