<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="js/icofont/icofont.min.css">

          
</head>

<body style="background-color: #D8F5CA" class="text-muted">

<!-- Nav desde aqui -->
<?php
     $titulo_pagina= "Libro de Relevos Fabricación";
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
    unset($_SESSION['id_libro']);
    unset($_SESSION['orden']);

    date_default_timezone_set('Europe/Madrid');


    $fecha_hoy=date("Y-m-d");
    $hora_hoy=date("H:i:s");
    
    if(strtotime($hora_hoy)>=strtotime('00:00:00') and strtotime($hora_hoy)<=strtotime('05:59:59') ) 
    {
        $turno_hoy="Noche";
    } 
    if(strtotime($hora_hoy)>=strtotime('06:00:00') and strtotime($hora_hoy)<=strtotime('13:59:59') ) 
    {
        $turno_hoy="Mañana";
    } 
    if(strtotime($hora_hoy)>=strtotime('14:00:00') and strtotime($hora_hoy)<=strtotime('21:59:59') ) 
    {
        $turno_hoy="Tarde";
    } 
    if(strtotime($hora_hoy)>=strtotime('22:00:00') and strtotime($hora_hoy)<=strtotime('23:59:59') ) 
    {
        $turno_hoy="Noche";
    } 


    $sql = "SELECT `fecha` FROM `libro_relevos_fabricacion_registro_dias` ORDER BY `libro_relevos_fabricacion_registro_dias`.`id` DESC LIMIT 1";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $ultima_fecha_registrada=date($row['fecha']);
    }
    $fecha_rellenar=date("Y-m-d",strtotime($ultima_fecha_registrada."+ 1 days"));

    while ($fecha_hoy >= $ultima_fecha_registrada) {



        $id_libro_base=date("Ymd",strtotime($fecha_rellenar));
        $semana=date("W",strtotime($fecha_rellenar));

        $id_libro=$id_libro_base.'1';
        $sql="INSERT INTO `libro_relevos_fabricacion_registro_dias`(`id_libro`, `estado_ldr`, `estado_estanqueidad`, `fecha`, `turno`, `num_turno`, `semana`)VALUES ('$id_libro','0','0','$fecha_rellenar','Mañana','1','$semana')";
        $consulta = mysqli_query($conexion, $sql);
        
        $id_libro=$id_libro_base.'2';
        $sql="INSERT INTO `libro_relevos_fabricacion_registro_dias`(`id_libro`, `estado_ldr`, `estado_estanqueidad`,  `fecha`, `turno`, `num_turno`, `semana`) VALUES ('$id_libro','0','0','$fecha_rellenar','Tarde','2','$semana')";
        $consulta = mysqli_query($conexion, $sql);

        $id_libro=$id_libro_base.'3';
        $sql="INSERT INTO `libro_relevos_fabricacion_registro_dias`(`id_libro`, `estado_ldr`, `estado_estanqueidad`,  `fecha`, `turno`, `num_turno`, `semana`) VALUES ('$id_libro','0','0','$fecha_rellenar','Noche','3','$semana')";
        $consulta = mysqli_query($conexion, $sql);


        $sql = "SELECT `fecha` FROM `libro_relevos_fabricacion_registro_dias` ORDER BY `libro_relevos_fabricacion_registro_dias`.`id` DESC LIMIT 1";
        $consulta = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_array($consulta)) {
            $ultima_fecha_registrada=date($row['fecha']);
        }
        $fecha_rellenar=date("Y-m-d",strtotime($ultima_fecha_registrada."+ 1 days"));

    }

    ?>

    <!-- Nav hasta aqui -->

    
<h1 align="center">LIBRO DE RELEVOS FABRICACIÓN</h1>

<!-- Auí introduciremos los contenidos que lleve la pagina -->


<div class="container-fluid  mt-2 mb-2 pt-1 pb-1">
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border rounded text-dark text-center" style="background-color:#E4E4E4;">

            <table class="table table-striped table-bordered " id="tabla_libro_relevo_fabricacion_menu" name="tabla_libro_relevo_fabricacion_menu">
                <thead class="thead-dark">
                    <tr>
                        <th class="w-auto" style="vertical-align: middle" colspan="2" scope="col"></th>
                        <th style="vertical-align: middle" scope="col">Semana</th>
                        <th style="vertical-align: middle" scope="col">Fecha</th>
                        <th style="vertical-align: middle" scope="col">Turno</th>
                        <th style="vertical-align: middle" scope="col">INY 1</th>
                        <th style="vertical-align: middle" scope="col">INY 2</th>
                        <th style="vertical-align: middle" scope="col">INY 3</th>
                        <th style="vertical-align: middle" scope="col">INY 4</th>
                        <th style="vertical-align: middle" scope="col">INY 5</th>
                        <th style="vertical-align: middle" scope="col">INY 6</th>
                        <th style="vertical-align: middle" scope="col">INY 7</th>
                        <th style="vertical-align: middle" scope="col">INY 8</th>

                    </tr>
                </thead>
                <tbody>
                        <?php 
                            $fecha_limite_tabla=date("Y-m-d",strtotime($fecha_hoy."- 2 days"));
                            $sql = "SELECT * FROM `libro_relevos_fabricacion_registro_dias` WHERE `fecha`>'$fecha_limite_tabla' ORDER BY `id` DESC ";
                            $consulta = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_array($consulta)) {

                                $valor_color_estado_iny_1=$row['iny_1_estado'];
                                $valor_color_estado_iny_2=$row['iny_2_estado'];
                                $valor_color_estado_iny_3=$row['iny_3_estado'];
                                $valor_color_estado_iny_4=$row['iny_4_estado'];
                                $valor_color_estado_iny_5=$row['iny_5_estado'];
                                $valor_color_estado_iny_6=$row['iny_6_estado'];
                                $valor_color_estado_iny_7=$row['iny_7_estado'];
                                $valor_color_estado_iny_8=$row['iny_8_estado'];

                                switch ($valor_color_estado_iny_1) {
                                    case 1:$color_estado_iny_1="#dc3545";break;
                                    case 2:$color_estado_iny_1="#ffc107";break;
                                    case 3:$color_estado_iny_1="#28a745";break;
                                    case 4:$color_estado_iny_1="#007bff";break;
                                    default:$color_estado_iny_1="";
                                }
                                switch ($valor_color_estado_iny_2) {
                                    case 1:$color_estado_iny_2="#dc3545";break;
                                    case 2:$color_estado_iny_2="#ffc107";break;
                                    case 3:$color_estado_iny_2="#28a745";break;
                                    case 4:$color_estado_iny_2="#007bff";break;
                                    default:$color_estado_iny_2="";
                                }
                                switch ($valor_color_estado_iny_3) {
                                    case 1:$color_estado_iny_3="#dc3545";break;
                                    case 2:$color_estado_iny_3="#ffc107";break;
                                    case 3:$color_estado_iny_3="#28a745";break;
                                    case 4:$color_estado_iny_3="#007bff";break;
                                    default:$color_estado_iny_3="";
                                }
                                switch ($valor_color_estado_iny_4) {
                                    case 1:$color_estado_iny_4="#dc3545";break;
                                    case 2:$color_estado_iny_4="#ffc107";break;
                                    case 3:$color_estado_iny_4="#28a745";break;
                                    case 4:$color_estado_iny_4="#007bff";break;
                                    default:$color_estado_iny_4="";
                                }
                                switch ($valor_color_estado_iny_5) {
                                    case 1:$color_estado_iny_5="#dc3545";break;
                                    case 2:$color_estado_iny_5="#ffc107";break;
                                    case 3:$color_estado_iny_5="#28a745";break;
                                    case 4:$color_estado_iny_5="#007bff";break;
                                    default:$color_estado_iny_5="";
                                }
                                switch ($valor_color_estado_iny_6) {
                                    case 1:$color_estado_iny_6="#dc3545";break;
                                    case 2:$color_estado_iny_6="#ffc107";break;
                                    case 3:$color_estado_iny_6="#28a745";break;
                                    case 4:$color_estado_iny_6="#007bff";break;
                                    default:$color_estado_iny_6="";
                                }
                                switch ($valor_color_estado_iny_7) {
                                    case 1:$color_estado_iny_7="#dc3545";break;
                                    case 2:$color_estado_iny_7="#ffc107";break;
                                    case 3:$color_estado_iny_7="#28a745";break;
                                    case 4:$color_estado_iny_7="#007bff";break;
                                    default:$color_estado_iny_7="";
                                }
                                switch ($valor_color_estado_iny_8) {
                                    case 1:$color_estado_iny_8="#dc3545";break;
                                    case 2:$color_estado_iny_8="#ffc107";break;
                                    case 3:$color_estado_iny_8="#28a745";break;
                                    case 4:$color_estado_iny_8="#007bff";break;
                                    default:$color_estado_iny_8="";
                                }
                                
                                switch (true) {
                                    case $fecha_hoy==$row['fecha'] AND $turno_hoy==$row['turno']:
                                        $tr_background="background-color:#FFF86E;";
                                        break;
                                    default:
                                        $tr_background="";
                                }
                                switch (true) {
                                    case $row['estado_ldr']== 0:
                                        $btn_ldr_background="btn-danger";
                                        break;
                                    default:
                                        $btn_ldr_background="btn-success";
                                }
                                switch (true) {
                                    case $row['estado_estanqueidad']== 0:
                                        $btn_estanqueidad_background="btn-danger";
                                        break;
                                    default:
                                        $btn_estanqueidad_background="btn-success";
                                }

                                
                            echo'
                                <tr style="'.$tr_background.'">
                                    <td class="col-auto">
                                        <form action="libro_relevos_fabricacion_generar_turno.php" method="POST"> 
                                            <button type="submit" class="btn '.$btn_ldr_background.'">Libro de relevos</button>
                                            <input type="hidden" name="id_libro" id="id_libro" value="'.$row['id_libro'].'">
                                        </form>
                                    </td>
                                    <td class="col-auto">
                                        <form action="libro_relevos_estanqueidad_generar_turno.php" method="POST"> 
                                            <button type="submit" class="btn '.$btn_estanqueidad_background.'">Estanqueidad</button>
                                            <input type="hidden" name="id_libro" id="id_libro" value="'.$row['id_libro'].'">
                                        </form>
                                    </td>
                                    <td  style="vertical-align: middle">'.$row['semana'].'</td>
                                    <td  style="vertical-align: middle">'.date("d-m-Y", strtotime($row['fecha'])).'</td>
                                    <td  style="vertical-align: middle">'.$row['turno'].'</td>
                                    <td  style="vertical-align: middle; background-color:'.$color_estado_iny_1.'"></td>
                                    <td  style="vertical-align: middle; background-color:'.$color_estado_iny_2.'"></td>
                                    <td  style="vertical-align: middle; background-color:'.$color_estado_iny_3.'"></td>
                                    <td  style="vertical-align: middle; background-color:'.$color_estado_iny_4.'"></td>
                                    <td  style="vertical-align: middle; background-color:'.$color_estado_iny_5.'"></td>
                                    <td  style="vertical-align: middle; background-color:'.$color_estado_iny_6.'"></td>
                                    <td  style="vertical-align: middle; background-color:'.$color_estado_iny_7.'"></td>
                                    <td  style="vertical-align: middle; background-color:'.$color_estado_iny_8.'"></td>
                                </tr>
                            ';
                            } 
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- Footer -->
    <?php echo file_get_contents('http://'.$ip.'/D-WIDO/footer.php');?>
    <!-- Footer -->

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

</body>
</html>