<?php  
                $ip="localhost";
                include("conexion.php");
                include("ipserver.php");

                session_start();
                $fecha=$_SESSION['fecha'];
                $hor=$_SESSION['hor'];
                $horno=$_SESSION['horno'];

                echo '<br>fecha='.$fecha;
                echo '<br>hor='.$hor;
                echo '<br>horno='.$horno;




                for ($i = 1; $i <=24; $i++) {
                    $check_limpieza="";
                    $operario=$_POST["operario_".$i];
                    $check_limpieza=$_POST["check_limpieza_".$i];
                    $carga_lingotes=$_POST["carga_lingotes_".$i];
                    $carga_scrap=$_POST["carga_scrap_".$i];
                    $limpieza_torre=$_POST["limpieza_torre_".$i];
                    $descarga_cucharas=$_POST["descarga_cucharas_".$i];
                    $pma_hornos=$_POST["pma_hornos_".$i];
                    $pmp_hornos=$_POST["pmp_hornos_".$i];
                    $lingotes_fin=$_POST["lingotes_fin_".$i];
                    $densidad=$_POST["densidad_".$i];
                    $densidad_aire=$_POST["densidad_aire_".$i];
                    $densidad_vacio=$_POST["densidad_vacio_".$i];
                    // $index=$_POST["index_".$i];
                    $magnesio=$_POST["magnesio_".$i];
                    $carga_cuchara=$_POST["carga_cuchara_".$i];
                    $incidencias=$_POST["incidencias_".$i];
                


                    $densidad_aire_float = floatval($densidad_aire);
                    $densidad_vacio_float = floatval($densidad_vacio);
                    $index= number_format(($densidad_aire_float-$densidad_vacio_float)*100/$densidad_vacio_float, 2, ',', '');


                    if($densidad_aire_float=="" or $densidad_vacio_float==""){
                        $index="";
                        echo 'index1= '.$index.'<br>';

                        }
                        else
                        {
                        $index=number_format(($densidad_aire_float-$densidad_vacio_float)*100/$densidad_vacio_float, 2, ',', '');
                        $index=strval($index);
                        echo 'index2= '.$index.'<br>';

                        }

                        


                $sql="UPDATE hxh_hornos_registro SET `operario` = '$operario',`check_limpieza` = '$check_limpieza',`carga_lingotes` = '$carga_lingotes' 
                ,`carga_scrap` = '$carga_scrap',`limpieza_torre` = '$limpieza_torre',`descarga_cucharas` = '$descarga_cucharas',`pma_hornos` = '$pma_hornos',
                `pmp_hornos` = '$pmp_hornos',`lingotes_fin` = '$lingotes_fin',`densidad` = '$densidad',`densidad_aire` = '$densidad_aire',`densidad_vacio` = '$densidad_vacio',`index` = '$index',
                `magnesio` = '$magnesio',`carga_cuchara` = '$carga_cuchara' ,`incidencias` = '$incidencias' WHERE `id` = $i AND `fecha` = '$fecha' AND `horno` = '$hor'";
                $resultado = mysqli_query($conexion, $sql );

                }
                

                
                
                header ('Location: HxH hornos.php');

                ?> 