<?php  
                $ip="localhost";
                include("conexion.php");
                include("ipserver.php");
                $id=$_POST['id'];

                $fecha=$_POST['fecha'];
                $inyectora=$_POST['inyectora'];
                $tabla=$_POST['tabla'];
                $iny=$_POST['iny'];
                $operario=$_POST['operario'];
                $turno=$_POST['turno'];
                $uet=$_POST['uet'];
                $ju=$_POST['ju'];
                echo '<br>id= '.$id;
                echo '<br>tabla= '.$tabla;

                echo '<br>inyectora= '.$iny;
                echo '<br>nombre = '.$operario;
                echo '<br>turno = '.$turno;

                for ($i = 1; $i <=24; $i++) {
                    $piezas_buenas=$_POST["piezas_buenas_".$i];
                    $molde=$_POST["molde_".$i];
                    $piezas_malas=$_POST["piezas_malas_".$i];
                    $comentarios=$_POST["comentarios_".$i];
                echo '<br>piezas buenas='.$piezas_buenas;
                echo '<br>piezas malas='.$piezas_malas;
                echo '<br>molde='.$molde;

                $sql="UPDATE $tabla SET `operario` = '$operario',`uet` = '$uet',`ju` = '$ju', `molde` = '$molde', `piezas_buenas` = $piezas_buenas,`piezas_malas` = '$piezas_malas',`comentarios` = '$comentarios' WHERE `id` = '$i' AND `fecha` = '$fecha' AND `inyectora` = '$iny'";
                $resultado = mysqli_query($conexion, $sql );
                }
                
        
                header ('Location: HxH INY fechas.php');

                ?> 