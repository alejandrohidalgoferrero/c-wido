<?php
            include("conexion.php");
            include("ipserver.php");
            $ip="10.217.144.35";

            $consulta = "SELECT num_ra FROM ra_registro WHERE id=1";
            $Resultado = mysqli_query($conexion, $consulta);
            $num_ra=1;
            if (mysqli_num_rows($Resultado) > 0){
                while($row = mysqli_fetch_assoc($Resultado)) {
                    $num_ra= $num_ra+1;
                }
            }
            $fecha=date("Y-m-d H:i:s");
            session_start();

            $_SESSION['num_ra']=$num_ra;


            $sql="UPDATE ra_plantilla SET `num_ra` = $num_ra, `fecha` = '$fecha' WHERE ra_plantilla.`id` > 0";
            $consulta=mysqli_query($conexion, $sql);

            $sql2 =  "INSERT INTO ra_registro SELECT*FROM ra_plantilla";
            $consulta2 = mysqli_query($conexion, $sql2);

            $sql3="UPDATE ra_plantilla SET `num_ra` = '',`fecha` = '' WHERE ra_plantilla.`id` > 0";
            $consulta3=mysqli_query($conexion, $sql3);



            
            header ('Location: RA.php');
?>