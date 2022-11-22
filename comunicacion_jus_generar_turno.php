<?php 
$id="localhost";
include("conexion.php");

$id_com_jus= $_POST["id_com_jus"] ;

session_start();
$_SESSION['id_com_jus']=$id_com_jus;
$nombrecompleto=$_SESSION['nombrecompleto'];
$numero_empresa=$_SESSION['usuario'];



$consulta = "SELECT `estado_com_jus`,`fecha` FROM `comunicacion_jus_registro_dias` WHERE `id_com_jus`='$id_com_jus'";
$resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
while ($row = mysqli_fetch_array($resultado)) {
    $estado=$row['estado_com_jus'];
    $fecha=$row['fecha'];
}

echo '<br>id_com_jus= '.$id_com_jus.'<br>';
echo '<br>estado= '.$estado.'<br>';
echo '<br>fecha= '.$fecha.'<br>';


switch ($estado) {
    case 0:

        $sql2 = "SELECT DISTINCT(`molde`) FROM `comunicacion_sala_3d`";
        $consulta2 = mysqli_query($conexion, $sql2);
        while ($row = mysqli_fetch_array($consulta2)) {
            $moldes_sala_3D[]=$row['molde'];
        }        

        foreach ($moldes_sala_3D as $molde_sala_3D) {
            for($i=1; $i<=20;$i++)
            {
                $columna_nc='no_conformidad_'.$i;
                $columna_comentarios='comentario_'.$i;
                $columna_estado='estado_no_conformidad_'.$i;

                $sql2 = "SELECT * FROM `comunicacion_sala_3d` WHERE `molde`='$molde_sala_3D'  ORDER BY `comunicacion_sala_3d`.`id` DESC LIMIT 1";
                $consulta2 = mysqli_query($conexion, $sql2);
                while ($row = mysqli_fetch_array($consulta2)) {
                    if(!empty($row[$columna_nc]))
                    {
                        $array_molde_nc[]=$molde_sala_3D;
                        $array_nc[]=$row[$columna_nc];
                        $array_nc_estado[]=$row[$columna_estado];
                        $array_comentarios[]=$row[$columna_comentarios];
                        $array_fecha[]=$row['fecha'];
                        $array_turno[]=$row['turno'];
                    }
                }
            }
        }
        foreach ($array_molde_nc as $key => $molde_nc) {
            $no_conformidad=$array_nc[$key];
            $estado_nc=$array_nc_estado[$key];
            $comentarios_nc=$array_comentarios[$key];
            $fecha_nc=$array_fecha[$key];
            $turno_nc=$array_turno[$key];
            $num_nc=$key+1;

            echo '<br>num_nc= '.$num_nc.'<br>';


            $sql="INSERT INTO `comunicacion_jus_registro_datos`(`id_com_jus`, `fecha`, `turno`, `molde`, `num_conformidad`, `estado_no_conformidad`, `no_conformidad`, `comentario_no_conformidad`) 
            VALUES ('$id_com_jus','$fecha_nc','$turno_nc','$molde_nc','$num_nc','$estado_nc','$no_conformidad','$comentario_nc') ";
            $consulta=mysqli_query($conexion, $sql);
        }

        $sql="UPDATE `comunicacion_jus_registro_dias` SET `estado_com_jus`='1',`creador`='$nombrecompleto',`fecha_creacion`=CURRENT_TIMESTAMP ,`ultimo_modificador`='$nombrecompleto',`fecha_ultima_modificacion`=CURRENT_TIMESTAMP WHERE `id_com_jus`='$id_com_jus' ";
        $consulta=mysqli_query($conexion, $sql);

        break;
    case 1:

        $sql="UPDATE `comunicacion_jus_registro_dias` SET `ultimo_modificador`='$nombrecompleto',`fecha_ultima_modificacion`=CURRENT_TIMESTAMP WHERE `id_com_jus`='$id_com_jus' ";
        $consulta=mysqli_query($conexion, $sql);


        break;

}

    header('Location: comunicacion_jus.php')

?>