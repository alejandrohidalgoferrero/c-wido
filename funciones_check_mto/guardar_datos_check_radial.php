<?php 

    include('./../conexion.php');

    $id_check=$_GET['id_check'];

    session_start();
    $nombre_completo = $_SESSION['nombrecompleto'];

    $sql="SELECT * FROM `checks_mto_seguridad_registro` WHERE `id_check`='$id_check'";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $tipo_check=$row['tipo_check'];
    }

    $nombre_tabla_registro='checks_mto_seguridad_'.$tipo_check.'_registro';

    $sql="SELECT `id` FROM `$nombre_tabla_registro` WHERE `id_check`='$id_check' ORDER BY `$nombre_tabla_registro`.`id` DESC LIMIT 1";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $num_filas=$row['id'];
    }


    $fecha=$_POST['fecha'];
    $turno=$_POST['turno'];
    $elemento=$_POST['elemento'];
    $comentarios=$_POST['comentarios'];


    $sql="UPDATE `checks_mto_seguridad_registro` SET`fecha_modificacion`=CURRENT_TIMESTAMP,`usuario_modificacion`='$nombre_completo',`fecha`='$fecha',`turno`='$turno',`elemento`='$elemento',`comentarios`='$comentarios',`estado_check`=1 WHERE `id_check`='$id_check'";
    $consulta = mysqli_query($conexion, $sql);


    $empresa=$_POST['empresa'];
    $fecha_revision=$_POST['fecha_revision'];
    $marca=$_POST['marca'];
    $auditor=$_POST['auditor'];
    $disco=$_POST['disco'];

    echo '<br>disco= '.$disco.'<br>';
    
    $sql="UPDATE `$nombre_tabla_registro` SET `empresa`='$empresa', `fecha_revision`='$fecha_revision', `marca`='$marca',`auditor`='$auditor' ,`disco`='$disco' WHERE `id_check`='$id_check' AND `id`=1";
    $consulta = mysqli_query($conexion, $sql);



    for ($i = 1; $i <= $num_filas; $i++) {
        if(is_null($_POST['antes_usar_'.$i]))
        {
            $antes_usar="";
        }
        else
        {
            $antes_usar=$_POST['antes_usar_'.$i];
        }

        $sql="UPDATE `$nombre_tabla_registro` SET `antes_usar`='$antes_usar'  WHERE `id_check`='$id_check' AND `id`='$i'";
        $consulta = mysqli_query($conexion, $sql);
        
    }
?>