<?php  
                
    include("conexion.php");
    include("ipserver.php");

    $fecha= $_POST['fecha'] ;
    $inyectora= $_POST['inyectora'] ;
    
    echo 'fecha='.$fecha.'<br>';
    echo 'inyectora='.$inyectora.'<br>';

   

    switch ($inyectora) {
        case 'Inyectora 1':
            $iny='1';
            break;
        case 'Inyectora 2':
            $iny='2';
            break;
        case 'Inyectora 3':
            $iny='3';
            break;
        case 'Inyectora 4':
            $iny='4';
            break;
        case 'Inyectora 5':
            $iny='5';
            break;
        case 'Inyectora 6':
            $iny='6';
            break;
        case 'Inyectora 7':
            $iny='7';
            break;
    }

    $tabla='hxh_inyectora_registro_'.$iny;
    $tabla_problemas='hxh_inyectora_problemas_'.$iny;

    echo 'iny='.$iny.'<br>';
    echo 'tabla='.$tabla.'<br>';

    session_start();
    $_SESSION['fecha'] = $fecha;
    $_SESSION['iny']   = $iny;
    $_SESSION['inyectora']   = $inyectora;
    $_SESSION['tabla'] =$tabla;
    $_SESSION['tabla_problemas'] =$tabla_problemas;


    $consulta="SELECT*FROM $tabla where `fecha`='$fecha' AND `inyectora`='$iny'";
    $resultado = mysqli_query($conexion, $consulta); 
    $filas = mysqli_num_rows($resultado);

    echo 'filas='.$filas.'<br>';

    if ($filas > 0) {

    header ('Location: HxH INY fechas.php');


    }
    else{
    $sql="UPDATE `hxh_inyectora_plantilla` SET `hxh_inyectora_plantilla`.`fecha` = '$fecha',`hxh_inyectora_plantilla`.`inyectora` = $iny";
    $consulta=mysqli_query($conexion, $sql);

    $sql2 =  "INSERT INTO`$tabla` SELECT*FROM `hxh_inyectora_plantilla`";
    $consulta2 = mysqli_query($conexion, $sql2);    
    header ('Location: HxH INY fechas.php');

    }

    ?> 