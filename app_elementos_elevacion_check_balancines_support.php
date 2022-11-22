<?php 
    $id="localhost";
    include("conexion.php");

    session_start();
    $orden = $_SESSION['orden']; 

    $fecha=$_POST['fecha'];
    $turno=$_POST['turno'];
    $operario=$_POST['operario'];
    $uet=$_POST['uet'];
    $linea=$_POST['linea'];
    $operacion=$_POST['operacion'];
    $puente_grua=$_POST['puente_grua'];
    $carga_maxima=$_POST['carga_maxima'];


    echo '<br>fecha= '.$fecha;
    echo '<br>turno= '.$turno;
    echo '<br>operario= '.$operario;
    echo '<br>uet= '.$uet;
    echo '<br>linea= '.$linea;
    echo '<br>operacion= '.$operacion;
    echo '<br>puente_grua= '.$puente_grua;
    echo '<br>carga_maxima= '.$carga_maxima;



    for ($i = 1; $i <= 15; $i++) {

        $fecha = $_POST["fecha"];
        $turno = $_POST["turno"];
        $operario = $_POST["operario"];
        $uet = $_POST["uet"];
        $linea = $_POST["linea"];
        $operacion = $_POST["operacion"];
        $puente_grua = $_POST["puente_grua"];
        $carga_maxima = $_POST["carga_maxima"];

        $conformidad = $_POST["conformidad_".$i] ;

        echo '<br>conformidad_'.$i.'= '.$conformidad;

        $sql1="UPDATE `check_balancines_registro` SET `fecha`='$fecha',`turno`='$turno',`operario`='$operario',`uet`='$uet',`linea`='$linea',`operacion`='$operacion',`puente_grua`='$puente_grua',`carga_maxima`='$carga_maxima' ,`conformidad`='$conformidad' WHERE `check_balancines_registro`.`id` =$i  AND `check_balancines_registro`.`orden` = '$orden'";

        $consulta2 = mysqli_query($conexion, $sql1);
    }
    

    header('Location: app_elementos_elevacion_check_balancines_menu.php')
?>