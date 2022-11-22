<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
     <script src="js/plotly.min.js"></script>

     <title>HxH HORNOS</title>
          
</head>

<body style="background-color: #D8F5CA" class="text-muted">

    <!-- Nav desde aqui -->
    <?php
     $titulo_pagina= "HORNOS";
     include("conexion.php");
    $sql="UPDATE tabla_navegador SET uso = '0'";
    $consulta = mysqli_query($conexion, $sql);

     $sql="UPDATE tabla_navegador SET uso = '1' WHERE tabla_navegador.titulo = '$titulo_pagina'";
     $consulta = mysqli_query($conexion, $sql);
     ?>
     
     <title><?php echo $titulo_pagina?></title>

    <?php 
    $ip="LOCALHOST";

    include('nav.php');
    
    session_start();
    $fecha=$_SESSION['fecha'];
    $hor=$_SESSION['hor'];
    $horno=$_SESSION['horno'];
    $tabla=$_SESSION['tabla'];

    $date=strtotime($fecha);
    $dia = date("d",$date);
    $mes = date("m",$date);
    $año = date("Y",$date);

    ?>

    <!-- Nav hasta aqui -->



<h1 align="center">HxH hornos <?php echo $hor?></h1>
<br>



<h3 align="center"><?php echo $dia.'/'.$mes.'/'.$año?> </h3>
<form action="HxH hornos registrar.php" method="POST">

<div class="align-items-center mr-auto ml-auto mt-1 mb-3 pt-2 pb-2 pl-2 pr-2" style="width: 100%" >  
    <button type="submit" class="btn btn-primary btn-lg ">REGISTRAR</button>    
</div>



        <div class="align-items-center mr-auto ml-auto mt-1 mb-3 pt-2 pb-2 pl-2 pr-2 border border-dark" style="width: 100%; background-color:#ECECEC" >            

        <table style="text-align: center; font-size:11px" align="center" border="1"class="table table-striped table-sm align-middle w-auto">
        <thead class="thead-dark">
            <tr>
                <th class="align-middle" scope="col">Turno<br></td>
                <th class="align-middle" scope="col">Hora<br></td>
                <th class="align-middle" scope="col">Nº empresa<br></td>
                <th class="align-middle" scope="col">LIMPIEZA CAMARA DE MTO<br></td>
                <th class="align-middle" scope="col">CARGA DE TORRE LINGOTE (KG)<br></td>
                <th class="align-middle" scope="col">CARGA DE TORRE SCRAP (KG)<br></td>
                <th class="align-middle" scope="col">LIMPIEZA DE TORRE FUSORA <br></td>
                <th class="align-middle" scope="col">DESCARGA DE CUCHARAS<br></td>
                <th class="align-middle" scope="col">PMA HORNOS MTO INYECTORAS<br></td>
                <th class="align-middle" scope="col">PMP HORNOS MTO INYECTORAS<br></td>
                <th class="align-middle" scope="col">STOCK LINGOTES FIN DE TURNO<br></td>
                <th class="align-middle" scope="col">DENSIDAD<br></td>
                <th class="align-middle" scope="col">DENSIDAD AIRE<br></td>
                <th class="align-middle" scope="col">DENSIDAD VACÍO<br></td>
                <th class="align-middle" scope="col">INDEX<br></td>
                <th class="align-middle" scope="col">MAGNESIO<br></td>
                <th class="align-middle" scope="col">CARGA CUCHARA EN INYECTORA Nº<br></td>
                <th class="align-middle" scope="col">INCIDENCIAS / OBSERVACIONES<br></td>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php


            $contador=1;
            $consulta = "SELECT * FROM  `hxh_hornos_registro` WHERE `fecha`='$fecha' AND `horno`='$hor'";
            $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
            while ($row = mysqli_fetch_array($resultado)) {





        ?>    

                <?php echo '
                <td class="col-xs-2" style="vertical-align: middle;">
                    '. $row['turno'].'
                </td>
                <td class="col-xs-2" style="vertical-align: middle;">
                    '. $row['hora'].'
                </td>
                <td   style="vertical-align: middle;">
                    <div><input class="w-100" type="text" maxlength="7" name="operario_'.$contador.'" id="operario_'.$contador.'"  value="'. $row['operario'].'"> </div>        
                </td>
                <td style="vertical-align: middle;">';


                $checked="";
                if ($row['check_limpieza']!="1") {
                    $checked="";
                  }else{
                    $checked="checked";
                  }

                echo'
                    <div class="form-check-inline">
                        <input type="checkbox" class="form-check-input" id="1" '.$checked.' name="check_limpieza_'.$contador.'" id="check_limpieza_'.$contador.'" value="1">
                    </div>                
                </td>
                <td style="vertical-align: middle;">
                    <div><input class="w-100" type="text"  name="carga_lingotes_'.$contador.'" id="carga_lingotes_'.$contador.'"  value="'. $row['carga_lingotes'].'">  </div>       
                </td>
                <td style="vertical-align: middle;">
                    <div><input class="w-100" type="text"  name="carga_scrap_'.$contador.'" id="carga_scrap_'.$contador.'"  value="'. $row['carga_scrap'].'">   </div>      
                </td>      
                <td style="vertical-align: middle;">';


                $checked="";
                if ($row['limpieza_torre']!="1") {
                    $checked="";
                  }else{
                    $checked="checked";
                  }

                echo'
                    <div class="form-check-inline">
                    
                        <input type="checkbox" class="form-check-input" id="1" '.$checked.' name="limpieza_torre_'.$contador.'" value="1">
                    </div>                     
                </td>
                <td style="vertical-align: middle;">
                    <div><input class="w-100" type="text"  name="descarga_cucharas_'.$contador.'" id="descarga_cucharas_'.$contador.'"  value="'. $row['descarga_cucharas'].'">   </div>
                </td>
                <td style="vertical-align: middle;">
                    <div><input class="w-100" type="text"  name="pma_hornos_'.$contador.'" id="pma_hornos_'.$contador.'"  value="'. $row['pma_hornos'].'">   </div>
                </td>
                <td style="vertical-align: middle;">
                    <div><input class="w-100" type="text"  name="pmp_hornos_'.$contador.'" id="pmp_hornos_'.$contador.'"  value="'. $row['pmp_hornos'].'">   </div>
                </td>
                <td style="vertical-align: middle;">
                    <div><input class="w-100" type="text"  name="lingotes_fin_'.$contador.'" id="lingotes_fin_'.$contador.'"  value="'. $row['lingotes_fin'].'">  </div> 
                </td>
                <td style="vertical-align: middle;">
                    <div><input class="w-100" type="text"  name="densidad_'.$contador.'" id="densidad_'.$contador.'"  value="'. $row['densidad'].'">   </div>
                    
                </td>
                <td style="vertical-align: middle;">
                <div><input class="w-100" type="number"  step="0.01" name="densidad_aire_'.$contador.'" id="densidad_aire_'.$contador.'"  value="'. $row['densidad_aire'].'">   </div>
                </td>
                <td style="vertical-align: middle;">
                    <div><input class="w-100" type="number" step=".01"  name="densidad_vacio_'.$contador.'" id="densidad_vacio_'.$contador.'"  value="'. $row['densidad_vacio'].'">   </div>
                </td>
                <td style="vertical-align: middle;">';
                    // echo '<div><input class="w-100" type="text"  name="index_'.$contador.'" id="index_'.$contador.'"  value="'. $row['index'].'">   </div>';
                    echo '<div>'. $row['index'].'</div>';

                echo'  
                </td>
                <td style="vertical-align: middle;">
                    <div><input class="w-100" type="text"  name="magnesio_'.$contador.'" id="magnesio_'.$contador.'"  value="'. $row['magnesio'].'">  </div> 
                </td>
                <td style="vertical-align: middle;">
                    <div><input class="w-100" type="text"  name="carga_cuchara_'.$contador.'" id="carga_cuchara_'.$contador.'"  value="'. $row['carga_cuchara'].'">   </div>
                </td>
                <td style="vertical-align: middle;">
                    <div><textarea class="form-control" name="incidencias_'.$contador.'" id="incidencias_'.$contador.'ta_25" rows="1" cols="50">'. $row['incidencias'].'</textarea></div>
                </td>
     
         

               ' ;?>



        
            </tr>
            <?php
            $contador++;
                }
        ?>
        </tbody>
            </table>    


</div>


</form>


    <!-- Footer -->
    <?php echo file_get_contents('http://'.$ip.'/C-WIDO/footer.php');?>
    <!-- Footer -->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

</body>
</html>