<?php 

    include('./../conexion.php');

    $id_check_rechazo_estanqueidad=$_GET['id_check_rechazo_estanqueidad'];
    $orden=$_GET['orden'];
    $num_a_revisar=$_GET['num_a_revisar'];


    $fecha=$_POST['fecha'];
    $turno=$_POST['turno'];
    $inyectora=$_POST['inyectora'];
    $tipo_pieza=$_POST['tipo_pieza'];
    $molde=$_POST['molde'];

    session_start();
    $nombrecompleto=$_SESSION['nombrecompleto'];


    $sql5="UPDATE `check_rechazo_estanqueidades_registro` 
    SET `usuario_modificacion`='$nombrecompleto',`fecha_modificacion`=CURRENT_TIMESTAMP,`fecha`='$fecha',`turno`='$turno' ,`inyectora`='$inyectora',`tipo_pieza`='$tipo_pieza',`molde`='$molde'
    WHERE `id_check_rechazo_estanqueidad`='$id_check_rechazo_estanqueidad' AND  `orden`='$orden'";
    $consulta5 = mysqli_query($conexion, $sql5);

    for ($i = 1; $i <= $num_a_revisar; $i++) {

        if (!is_null($_POST['data_'.$i]))
        {
            $valor=$_POST['data_'.$i];
        
            $sql5="UPDATE `check_rechazo_estanqueidades_registro` SET `estado`='$valor' WHERE `id_check_rechazo_estanqueidad`='$id_check_rechazo_estanqueidad' AND  `orden`='$orden' AND `id`='$i'";
            $consulta5 = mysqli_query($conexion, $sql5);        
        }
    }

?>