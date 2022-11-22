<?php  
                $ip="localhost";
                include("conexion.php");
                include("ipserver.php");

                $id=$_POST['id'];
                $programa=$_POST['programa'];
                $horno=$_POST['horno'];
                $desgasificadora=$_POST['desgasificadora'];
                $inyectora=$_POST['inyectora'];
                $operario=$_POST['operario'];
                $comentarios=$_POST['comentarios'];

                $fecha=$_POST['fecha'];
                $turno=$_POST['turno'];


                
                $sql="UPDATE hornos_desgasificado SET `programa` = '$programa',`fecha` = '$fecha',`turno` = '$turno', `horno origen` = '$horno', `desgasificado` = '$desgasificadora', `operario` = '$operario', `inyectora destino` = '$inyectora', `comentarios` = '$comentarios' WHERE hornos_desgasificado.`id` = '$id'";
                $resultado = mysqli_query($conexion, $sql );
                
                
                header ('Location: desgasificado.php');

                ?> 