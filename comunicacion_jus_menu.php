<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
    
          
</head>

<body style="background-color: #D8F5CA" class="text-muted">
<style>
.modal-lg {
    max-width: 80% !important;
}
</style>

<!-- Nav desde aqui -->
<?php
     $titulo_pagina= "Calidad";
     $subtitulo_pagina="Comunicación JUs";
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
    unset($_SESSION['id_com_jus']);

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


    $sql = "SELECT `fecha` FROM `comunicacion_jus_registro_dias` ORDER BY `comunicacion_jus_registro_dias`.`id` DESC LIMIT 1";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $ultima_fecha_registrada=date($row['fecha']);
    }
    $fecha_rellenar=date("Y-m-d",strtotime($ultima_fecha_registrada."+ 1 days"));

    while ($fecha_hoy >= $ultima_fecha_registrada) {

        $id_com_jus_base=date("Ymd",strtotime($fecha_rellenar));
        $semana=date("W",strtotime($fecha_rellenar));
        
        $id_com_jus=$id_com_jus_base.'1';
        $sql="INSERT INTO `comunicacion_jus_registro_dias`(`id_com_jus`, `estado_com_jus`, `fecha`, `turno`, `num_turno`, `semana`)VALUES ('$id_com_jus','0','$fecha_rellenar','Mañana','1','$semana')";
        $consulta = mysqli_query($conexion, $sql);
        
        $id_com_jus=$id_com_jus_base.'2';
        $sql="INSERT INTO `comunicacion_jus_registro_dias`(`id_com_jus`, `estado_com_jus`,  `fecha`, `turno`, `num_turno`, `semana`) VALUES ('$id_com_jus','0','$fecha_rellenar','Tarde','2','$semana')";
        $consulta = mysqli_query($conexion, $sql);

        $id_com_jus=$id_com_jus_base.'3';
        $sql="INSERT INTO `comunicacion_jus_registro_dias`(`id_com_jus`, `estado_com_jus`,  `fecha`, `turno`, `num_turno`, `semana`) VALUES ('$id_com_jus','0','$fecha_rellenar','Noche','3','$semana')";
        $consulta = mysqli_query($conexion, $sql);


        $sql = "SELECT `fecha` FROM `comunicacion_jus_registro_dias` ORDER BY `comunicacion_jus_registro_dias`.`id` DESC LIMIT 1";
        $consulta = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_array($consulta)) {
            $ultima_fecha_registrada=date($row['fecha']);
        }
        $fecha_rellenar=date("Y-m-d",strtotime($ultima_fecha_registrada."+ 1 days"));

    }
    ?>

    <!-- Nav hasta aqui -->

    
<h1 align="center">COMUNICACIÓN JUs</h1>

<!-- Auí introduciremos los contenidos que lleve la pagina -->

<div class="container-fluid">
    <div class="modal fade" id="dashboard_pasados" tabindex="-1" role="dialog" aria-labelledby="dashboard_pasados" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    TABLA DASHBOARD REALIZADOS:
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered " id="tabla_com_jus_menu" name="tabla_com_jus_menu">
                        <thead class="thead-dark">
                            <tr>
                                <th class="w-auto" style="vertical-align: middle" scope="col"></th>
                                <th style="vertical-align: middle" scope="col">Semana</th>
                                <th style="vertical-align: middle" scope="col">Fecha</th>
                                <th style="vertical-align: middle" scope="col">Turno</th>
                                <th style="vertical-align: middle" scope="col">JU Fabricación</th>
                                <th style="vertical-align: middle" scope="col">JU Matricería</th>

                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                    $fecha_limite_tabla=date("Y-m-d",strtotime($fecha_hoy."- 5 days"));
                                    $sql = "SELECT * FROM `comunicacion_jus_registro_dias` WHERE `fecha` BETWEEN '$fecha_limite_tabla' AND '$fecha_hoy' ORDER BY `id` DESC ";
                                    $consulta = mysqli_query($conexion, $sql);
                                    while ($row = mysqli_fetch_array($consulta)) {          
                                        switch (true) {
                                            case $fecha_hoy==$row['fecha'] AND $turno_hoy==$row['turno']:
                                                $tr_background="background-color:#FFF86E;";
                                                break;
                                            default:
                                                $tr_background="";
                                        }
                                        switch (true) {
                                            case $row['estado_com_jus']== 0:
                                                $btn_ldr_background="btn-danger";
                                                break;
                                            default:
                                                $btn_ldr_background="btn-success";
                                        }

                                    echo'
                                        <tr style="'.$tr_background.'">
                                            <td class="col-auto">
                                                <form action="comunicacion_jus_generar_turno.php" method="POST"> 
                                                    <button type="submit" class="btn '.$btn_ldr_background.'">Comunicación JUs</button>
                                                    <input type="hidden" name="id_com_jus" id="id_com_jus" value="'.$row['id_com_jus'].'">
                                                </form>
                                            </td>
                                            <td  style="vertical-align: middle">'.$row['semana'].'</td>
                                            <td  style="vertical-align: middle">'.date("d-m-Y", strtotime($row['fecha'])).'</td>
                                            <td  style="vertical-align: middle">'.$row['turno'].'</td>
                                            <td  style="vertical-align: middle">'.$row['ju_fabricacion'].'</td>
                                            <td  style="vertical-align: middle">'.$row['ju_matriceria'].'</td>
                                        </tr>
                                    ';
                                    } 
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>             


<div class="container-fluid  mt-2 mb-2 pt-1 pb-1">           
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dashboard_pasados">  
            TABLA DASHBOARD PASADOS
        </button>
    </div>   
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >

        <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border rounded text-dark text-center" style="background-color:#E4E4E4;">

            <table class="table table-striped table-bordered " id="tabla_com_jus_menu" name="tabla_com_jus_menu">
                <thead class="thead-dark">
                    <tr>
                        <th class="w-auto" style="vertical-align: middle" scope="col"></th>
                        <th style="vertical-align: middle" scope="col">Semana</th>
                        <th style="vertical-align: middle" scope="col">Fecha</th>
                        <th style="vertical-align: middle" scope="col">Turno</th>
                        <th style="vertical-align: middle" scope="col">JU Fabricación</th>
                        <th style="vertical-align: middle" scope="col">JU Matricería</th>

                    </tr>
                </thead>
                <tbody>
                        <?php 
                            $fecha_limite_tabla=date("Y-m-d",strtotime($fecha_hoy."- 5 days"));
                            $sql = "SELECT * FROM `comunicacion_jus_registro_dias` WHERE `fecha` = '$fecha_hoy' ORDER BY `id` DESC ";
                            $consulta = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_array($consulta)) {          
                                switch (true) {
                                    case $fecha_hoy==$row['fecha'] AND $turno_hoy==$row['turno']:
                                        $tr_background="background-color:#FFF86E;";
                                        break;
                                    default:
                                        $tr_background="";
                                }
                                switch (true) {
                                    case $row['estado_com_jus']== 0:
                                        $btn_ldr_background="btn-danger";
                                        break;
                                    default:
                                        $btn_ldr_background="btn-success";
                                }
                                
                            echo'
                                <tr style="'.$tr_background.'">
                                    <td class="col-auto">
                                        <form action="comunicacion_jus_generar_turno.php" method="POST"> 
                                            <button type="submit" class="btn '.$btn_ldr_background.'">Comunicación JUs</button>
                                            <input type="hidden" name="id_com_jus" id="id_com_jus" value="'.$row['id_com_jus'].'">
                                        </form>
                                    </td>
                                    <td  style="vertical-align: middle">'.$row['semana'].'</td>
                                    <td  style="vertical-align: middle">'.date("d-m-Y", strtotime($row['fecha'])).'</td>
                                    <td  style="vertical-align: middle">'.$row['turno'].'</td>
                                    <td  style="vertical-align: middle">'.$row['ju_fabricacion'].'</td>
                                    <td  style="vertical-align: middle">'.$row['ju_matriceria'].'</td>
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