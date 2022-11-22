<?php  
                
    include("conexion.php");
    include("ipserver.php");

    $fecha= $_POST['fecha'] ;
    $horno= $_POST['horno'] ;
    
    echo 'fecha='.$fecha.'<br>';
    echo 'horno='.$horno.'<br>';

   

    switch ($horno) {
        case 'Horno 1':
            $hor='1';
            break;
        case 'Horno 2':
            $hor='2';
            break;
        case 'Horno 3':
            $hor='3';
            break;
        case 'Horno 4':
            $hor='4';
            break;

    }

    $tabla='hxh_hornos_'.$hor;
    echo 'hor='.$hor.'<br>';
    echo 'tabla='.$tabla.'<br>';

    session_start();
    $_SESSION['fecha'] = $fecha;
    $_SESSION['hor']   = $hor;
    $_SESSION['horno']   = $horno;
    $_SESSION['tabla'] =$tabla;

    $consulta="SELECT*FROM hxh_hornos_registro where `fecha`='$fecha' AND `horno`='$hor'";
    $resultado = mysqli_query($conexion, $consulta); 
    $filas = mysqli_num_rows($resultado);

    echo 'filas='.$filas.'<br>';

    if ($filas > 0) {

    header ('Location: HxH hornos fechas.php');


    }
    else{
    $sql="UPDATE `hxh_hornos_plantilla` SET `hxh_hornos_plantilla`.`fecha` = '$fecha',`hxh_hornos_plantilla`.`horno` = $hor";
    $consulta=mysqli_query($conexion, $sql);

    $sql2 =  "INSERT INTO`hxh_hornos_registro` SELECT*FROM `hxh_hornos_plantilla`";
    $consulta2 = mysqli_query($conexion, $sql2);    
    header ('Location: HxH hornos fechas.php');

    }

    ?> 