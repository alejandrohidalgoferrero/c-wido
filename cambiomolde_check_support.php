<?php 

    include("conexion.php");
    session_start();
    $orden=$_SESSION['orden'];
    $num_cambio_molde=$_SESSION['num_cambio_molde'];
    $tipo_cambio_molde=$_SESSION['tipo_cambio_molde'];
    $tipo_check=$_SESSION['tipo_check'];

    $fecha_matriceria = $_POST["fecha_matriceria"] ;
    $turno_matriceria=$_POST["turno_matriceria"];
    $operario_matriceria=$_POST["operario_matriceria"];
    $ju_matriceria=$_POST["ju_matriceria"];

    $fecha_fabricacion = $_POST["fecha_fabricacion"] ;
    $turno_fabricacion=$_POST["turno_fabricacion"];
    $operario_fabricacion=$_POST["operario_fabricacion"];
    $ju_fabricacion=$_POST["ju_fabricacion"];

    $validacion=$_POST["validacion"];

    $num_variables=$_POST["num_variables"];
    $nombrecompleto=$_POST["nombrecompleto"];


    for ($i = 1; $i <= $num_variables; $i++) {
        
        $resultado = $_POST["resultado_".$i] ;
        $incidencias = $_POST["incidencias_".$i] ;

        $sql1="UPDATE `cambio_molde_check_registro` 
        SET `operario`='$nombrecompleto',`ju_matriceria`='$ju_matriceria',`ju_fabricacion`='$ju_fabricacion',`operario_matriceria`='$operario_matriceria',`operario_fabricacion`='$operario_fabricacion',`fecha_matriceria`='$fecha_matriceria',`turno_matriceria`='$turno_matriceria',`fecha_fabricacion`='$fecha_fabricacion',`turno_fabricacion`='$turno_fabricacion',`resultado`='$resultado',`incidencias`='$incidencias' ,`validacion`='$validacion'  
        WHERE `orden`='$orden' AND  `num_cambio_molde`='$num_cambio_molde' AND `id`='$i' AND  `tipo_cambio_molde`='$tipo_cambio_molde'  AND  `tipo_check`='$tipo_check' ";
        $consulta1 = mysqli_query($conexion, $sql1);
    }

    $check_validacion='check_'.$tipo_check;
    
    switch ($validacion) {
        case "":
            $sql1="UPDATE `cambio_molde_registro` SET  $check_validacion='0'WHERE `id`= '$num_cambio_molde' ";
            $consulta1 = mysqli_query($conexion, $sql1);
            break;
        case "OK":
            $sql1="UPDATE `cambio_molde_registro` SET  $check_validacion='1'WHERE `id`= '$num_cambio_molde' ";
            $consulta1 = mysqli_query($conexion, $sql1);            break;
        case "NOK":
            $sql1="UPDATE `cambio_molde_registro` SET  $check_validacion='2'WHERE `id`= '$num_cambio_molde' ";
            $consulta1 = mysqli_query($conexion, $sql1);            break;
        default:
            $sql1="UPDATE `cambio_molde_registro` SET  $check_validacion='0'WHERE `id`= '$num_cambio_molde' ";
            $consulta1 = mysqli_query($conexion, $sql1);    
        }

    header('Location: cambiomolde.php');
    ?>