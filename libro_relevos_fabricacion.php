<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="js/icofont/icofont.min.css">

     <script src="js/jquery.min.js"></script>

          
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
    $id_libro=$_SESSION['id_libro'];
    $orden=$_SESSION['orden'];
    ?>


<h1 align="center">LIBRO DE RELEVOS FABRICACIÓN</h1>

<!-- Auí introduciremos los contenidos que lleve la pagina -->
<?php 
$consulta = "SELECT*FROM `libro_relevos_fabricacion_registro_dias` WHERE `id_libro`='$id_libro'";
$resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
while ($row = mysqli_fetch_array($resultado)) {
    $fecha=$row['fecha'];
    $turno=$row['turno'];
    $valor_color_estado_iny_1=$row['iny_1_estado'];
    $valor_color_estado_iny_2=$row['iny_2_estado'];
    $valor_color_estado_iny_3=$row['iny_3_estado'];
    $valor_color_estado_iny_4=$row['iny_4_estado'];
    $valor_color_estado_iny_5=$row['iny_5_estado'];
    $valor_color_estado_iny_6=$row['iny_6_estado'];
    $valor_color_estado_iny_7=$row['iny_7_estado'];
    $valor_color_estado_iny_8=$row['iny_8_estado'];
}

$consulta = "SELECT*FROM `libro_relevos_fabricacion_registro_datos` WHERE `id_libro`='$id_libro' AND `id`=1 ";
$resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
while ($row = mysqli_fetch_array($resultado)) {
    $creador=$row['autor'];
}


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

$consulta = "SELECT*FROM `libro_relevos_fabricacion_asistente`" ;
$resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
while ($row = mysqli_fetch_array($resultado)) {
    $array_iny_warning[$row['id']]=$row['warning'];
    $array_iny_danger[$row['id']]=$row['danger'];

}


$conexion2 = mysqli_connect($servername, $username, $password, "informe_buhler");
$array_moldes=array(""=>"");
$consulta = "SELECT DISTINCT `molde` FROM `iny_total` ORDER BY `iny_total`.`molde` ASC";
$resultado = mysqli_query($conexion2, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
while ($row = mysqli_fetch_array($resultado)) {
    $array_moldes[$row['molde']]=$row['molde'];
}

?>

<?php

foreach ($array_iny_warning as $key => $iny_warning)
{
    echo'
        <input type="hidden" name="iny_'.$key.'_warning" id="iny_'.$key.'_warning" value="'.$array_iny_warning[$key].'">
        <input type="hidden" name="iny_'.$key.'_danger" id="iny_'.$key.'_danger" value="'.$array_iny_danger[$key].'">
    ';
}

?>

<div class="modal" id="valores_iny">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title">Valores aviso en cada inyectora</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table" >
                    <thead>
                        <tr>
                            <th class="text-light bg-dark" style="border: 1px solid black; vertical-align: middle;" scope="col">Inyectora</th>
                            <th class="text-light bg-warning" style="border: 1px solid black; vertical-align: middle;" scope="col">WARNING</th>
                            <th class="text-light bg-danger" style="border: 1px solid black; vertical-align: middle;" scope="col">DANGER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $consulta = "SELECT*FROM `libro_relevos_fabricacion_asistente` WHERE `id`<='8'";
                        $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
                        while ($row = mysqli_fetch_array($resultado)) {
                        
                        ?>

                        <tr>
                            <td style="border: 1px solid black; vertical-align: middle;" >
                                <strong>INY <?php echo $row['id']?></strong>
                            </td>
                            <td style="border: 1px solid black; vertical-align: middle;" >
                                <input type="number" class="form-control text-center" min="0" id="valor_warning_<?php echo $row['id']?>" name="valor_warning_<?php echo $row['id']?>" value="<?php echo $row['warning']?>" oninput="btn_modificar_valores_rojo(<?php echo $row['id']?>) ">
                            </td>
                            <td style="border: 1px solid black; vertical-align: middle;" >
                                <input type="number" class="form-control text-center" min="0" id="valor_danger_<?php echo $row['id']?>" name="valor_danger_<?php echo $row['id']?>" value="<?php echo $row['danger']?>"  oninput="btn_modificar_valores_rojo(<?php echo $row['id']?>) ">
                            </td>
                            <td style="border: 1px solid black; vertical-align: middle;" >
                                <button type="button" class="btn btn-success" name="btn_modificar_valores_<?php echo $row['id']?>" id="btn_modificar_valores_<?php echo $row['id']?>" onclick="update_valores_limite_inyectoras(<?php echo $row['id']?>) "><i class='icofont-save'></i></button>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form id="form_datos" method="POST"></form>

<div class="container-fluid  mt-2 mb-2 pt-1 pb-1">
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <button class="btn font-weight-bold border border-dark btn-lg" name="btn_guardar" id="btn_guardar" value="" style="background-color:#28a745;" onclick="guardar_datos()"><i class='icofont-ui-check'></i></button>
    </div>
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="col justify-content-center mr-1 ml-1 mt-1 mb-1" >
            <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border border-dark rounded text-dark justify-content-center text-center" style="background-color:#E4E4E4;">
                <div class="row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center ">                    
                    <div class="col-auto mr-1 ml-1">
                        <span>
                            <strong>FECHA:</strong>
                        </span>
                    </div>
                    <div class="col-auto mr-1 ml-1">
                        <input type="date" class="form-control text-center" readonly id="fecha" name="fecha" value="<?php echo $fecha?>" >
                    </div>
                </div>
                <div class="row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center ">                    
                    <div class="col-auto mr-1 ml-1">
                        <span>
                            <strong>TURNO:</strong>
                        </span>
                    </div>
                    <div class="col-auto mr-1 ml-1">
                        <input type="text" class="form-control text-center" readonly id="fecha" name="fecha" value="<?php echo $turno?>" >
                    </div>
                </div>
                <div class="row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center ">                    
                    <div class="col-auto mr-1 ml-1">
                        <span>
                            <strong>JU:</strong>
                        </span>
                    </div>
                    <div class="col-auto mr-1 ml-1">
                        <input type="text" class="form-control text-center" form="form_datos" id="creador" name="creador" value="<?php echo $creador?>" oninput="btn_guardar_rojo();">
                    </div>
                </div>
            </div>
        </div>
        <div class="col justify-content-center mr-1 ml-1 mt-1 mb-1" >
            <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border border-dark rounded text-dark justify-content-center text-center" style="background-color:#E4E4E4;">
                <div class="row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center ">                    
                    <span>
                        <button class="btn btn-primary" id="" name="" data-toggle="modal" data-target="#valores_iny"><strong>RESUMEN INYECTORAS:</strong></button>
                    </span>

                </div>                
                <div class="row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center ">                    
                    <table class="table" > 
                        <tbody>
                            <?php 
                            $consulta = "SELECT*FROM `libro_relevos_fabricacion_registro_datos` WHERE `id_libro`='$id_libro' AND `id`='1' ";
                            $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
                            while ($row = mysqli_fetch_array($resultado)) {

                            ?>
                            <tr>
                                <td id="celda_estado_iny_1" style="border: 1px solid black; vertical-align: middle; background-color:<?php echo $color_estado_iny_1?>" >
                                    <a href="#anchor_iny_1" class="btn"><strong>INY 1</strong></a>
                                </td>
                                <td id="celda_estado_iny_2" style="border: 1px solid black; vertical-align: middle; background-color:<?php echo $color_estado_iny_2?>" >
                                    <a href="#anchor_iny_2" class="btn"><strong>INY 2</strong></a>
                                </td>
                                <td id="celda_estado_iny_3" style="border: 1px solid black; vertical-align: middle; background-color:<?php echo $color_estado_iny_3?>" >
                                    <a href="#anchor_iny_3" class="btn"><strong>INY 3</strong></a>
                                </td>
                                <td id="celda_estado_iny_4" style="border: 1px solid black; vertical-align: middle; background-color:<?php echo $color_estado_iny_4?>" >
                                    <a href="#anchor_iny_4" class="btn"><strong>INY 4</strong></a>
                                </td>
                                <td id="celda_estado_iny_5" style="border: 1px solid black; vertical-align: middle; background-color:<?php echo $color_estado_iny_5?>" >
                                    <a href="#anchor_iny_5" class="btn"><strong>INY 5</strong></a>
                                </td>
                                <td id="celda_estado_iny_6" style="border: 1px solid black; vertical-align: middle; background-color:<?php echo $color_estado_iny_6?>" >
                                    <a href="#anchor_iny_6" class="btn"><strong>INY 6</strong></a>
                                </td>
                                <td id="celda_estado_iny_7" style="border: 1px solid black; vertical-align: middle; background-color:<?php echo $color_estado_iny_7?>" >
                                    <a href="#anchor_iny_7" class="btn"><strong>INY 7</strong></a>
                                </td>
                                <td id="celda_estado_iny_8" style="border: 1px solid black; vertical-align: middle; background-color:<?php echo $color_estado_iny_8?>" >
                                    <a href="#anchor_iny_8" class="btn"><strong>INY 8</strong></a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="col justify-content-center mr-1 ml-1 mt-1 mb-1" >
            <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border border-dark rounded text-dark justify-content-center text-center" style="background-color:#E4E4E4;">
                <div cla ss="row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center ">                    
                    <table class="table" >
                        <thead>
                            <tr>
                                <th class="text-light bg-dark" style="border: 1px solid black; vertical-align: middle;" scope="col" colspan="3">TOP 3 FABRICACIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $consulta = "SELECT*FROM `libro_relevos_fabricacion_registro_datos` WHERE `id_libro`='$id_libro' AND `id`<='3' ";
                            $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
                            while ($row = mysqli_fetch_array($resultado)) {

                            ?>

                            <tr>
                                <td style="border: 1px solid black; vertical-align: middle;" >
                                    <strong><?php echo $row['id']?>º</strong>
                                </td>

                                <td style="border: 1px solid black; vertical-align: middle;" >
                                    <input type="text" class="form-control" placeholder="" form="form_datos" id="top_3_fab_<?php echo $row['id']?>" name="top_3_fab_<?php echo $row['id']?>" value="<?php echo $row['top_3_fabricacion']?>" oninput="btn_guardar_rojo();">
                                </td>
                                <td class="w-25" style="border: 1px solid black; vertical-align: middle;" > 
                                    <div class="form-check form-check-inline">
                                        <input type="number" class="form-control form-check-input mr-1 ml-1 text-center" placeholder="" form="form_datos" id="tiempo_top_3_fab_<?php echo $row['id']?>" name="tiempo_top_3_fab_<?php echo $row['id']?>" value="<?php echo $row['time_top_3_fabricacion']?>" oninput="btn_guardar_rojo();" >
                                        <label class="form-check-label mr-1 ml-1"> min.</label>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col justify-content-center mr-1 ml-1 mt-1 mb-1" >
            <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border border-dark rounded text-dark justify-content-center text-center" style="background-color:#E4E4E4;">
                <div cla ss="row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center ">                    
                    <table class="table" >
                        <thead>
                            <tr>
                                <th class="text-light bg-dark" style="border: 1px solid black; vertical-align: middle;" scope="col" colspan="3">TOP 3 CALIDAD</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $consulta = "SELECT*FROM `libro_relevos_fabricacion_registro_datos` WHERE `id_libro`='$id_libro' AND `id`<='3' ";
                            $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
                            while ($row = mysqli_fetch_array($resultado)) {

                            ?>

                            <tr>
                                <td style="border: 1px solid black; vertical-align: middle;" >
                                    <strong><?php echo $row['id']?>º</strong>
                                </td>

                                <td style="border: 1px solid black; vertical-align: middle;" >
                                    <input type="text" class="form-control" placeholder="" form="form_datos" id="top_3_cal_<?php echo $row['id']?>" name="top_3_cal_<?php echo $row['id']?>" value="<?php echo $row['top_3_calidad']?>" oninput="btn_guardar_rojo();">
                                </td>
                                <td class="w-25" style="border: 1px solid black; vertical-align: middle;" > 
                                    <div class="form-check form-check-inline">
                                        <input type="number" class="form-control form-check-input mr-1 ml-1 text-center" placeholder="" form="form_datos" id="tiempo_top_3_cal_<?php echo $row['id']?>" name="tiempo_top_3_cal_<?php echo $row['id']?>" value="<?php echo $row['time_top_3_calidad']?>" oninput="btn_guardar_rojo();" >
                                        <label class="form-check-label mr-1 ml-1"> min.</label>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php

    for ($inyectora = 1; $inyectora <= 8; $inyectora++) {

    ?>
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="col justify-content-center mr-1 ml-1 mt-1 mb-1" >
            <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border border-dark rounded text-dark justify-content-center text-center" style="background-color:#E4E4E4;">
                <div class=" row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center ">                    
                    <span id="anchor_iny_<?php echo $inyectora?>">
                        <h4><strong>INYECTORA <?php echo $inyectora?>:</strong></h4>
                    </span>
                </div>
                <div class="row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">                    
                    <div class="col justify-content-center mr-1 ml-1 mt-1 mb-1" >
                        <div class="row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center"> 
                            <?php
                                $columna_estado_iny='iny_'.$inyectora.'_estado';
                                $consulta = "SELECT*FROM `libro_relevos_fabricacion_registro_dias` WHERE `id_libro`='$id_libro'";
                                $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
                                while ($row = mysqli_fetch_array($resultado)) {
                                    if($row[$columna_estado_iny]==4)
                                    {
                                        $estado_check_pmp="checked";
                                    }
                                    else
                                    {
                                        $estado_check_pmp="";
                                    }
                                }
                            ?>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" id="pmp_iny_<?php echo $inyectora?>" <?php echo $estado_check_pmp?> name="pmp_iny_<?php echo $inyectora?>" class="form-check-input" value="4" onclick="estado_inyectoras_modificar('<?php echo $inyectora?>')"><strong>¿PMP REALIZADO?</strong>
                                </label>
                            </div>                        
                        </div>
                        <div class="row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center"> 
                            <?php
                                $columna_inyectadas_iny='iny_'.$inyectora.'_inyectadas';;
                                $columna_chatarra_iny='iny_'.$inyectora.'_chatarra';

                                $consulta = "SELECT*FROM `libro_relevos_fabricacion_registro_datos` WHERE `id_libro`='$id_libro' AND `id`=1 ";
                                $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
                                while ($row = mysqli_fetch_array($resultado)) {
                                    $inyectadas=$row[$columna_inyectadas_iny];
                                    $chatarra=$row[$columna_chatarra_iny];
                                }
                            ?>
                            <table class="table" >
                                <tbody>
                                    <tr>
                                        <td class="text-light bg-dark" style="border: 1px solid black; vertical-align: middle;" rowspan="2">
                                            <strong>PIEZAS:</strong>
                                        </td>
                                        <td style="border: 1px solid black; vertical-align: middle;" >
                                            <strong>INYECTADAS:</strong>
                                        </td>
                                        <td style="border: 1px solid black; vertical-align: middle;" >
                                            <div class="input-group">
                                                <input type="number" class="form-control" form="form_datos" id="inyectadas_iny_<?php echo $inyectora?>" name="inyectadas_iny_<?php echo $inyectora?>" min="0" value="<?php echo $inyectadas?>" oninput="estado_inyectoras_modificar('<?php echo $inyectora?>')">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary">AUTO</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid black; vertical-align: middle;">
                                            <strong>CHATARRA:</strong>
                                        </td>
                                        <td style="border: 1px solid black; vertical-align: middle;">
                                            <div class="input-group">
                                                <input type="number" class="form-control" form="form_datos" id="chatarra_iny_<?php echo $inyectora?>" name="chatarra_iny_<?php echo $inyectora?>" min="0" value="<?php echo $chatarra?>" oninput="estado_inyectoras_modificar('<?php echo $inyectora?>')">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary">AUTO</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center"> 
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th class="text-light bg-dark" style="border: 1px solid black; vertical-align: middle;" scope="col" colspan="3">MOLDE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $consulta = "SELECT*FROM `libro_relevos_fabricacion_registro_datos` WHERE `id_libro`='$id_libro' ";
                                    $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
                                    while ($row = mysqli_fetch_array($resultado)) {
                                        if($row['id']<=2 OR $row['molde']!="")
                                        {
                                            $estado_fila_molde_iny="";
                                        }
                                        else
                                        {
                                            $estado_fila_molde_iny="none";
                                        }
                                    $columna_molde_motivos='iny_'.$inyectora.'_molde_motivos';
                                    ?>
                                    
                                    <tr id="fila_molde_<?php echo $row['id']?>_<?php echo $inyectora?>" style="display:<?php echo $estado_fila_molde_iny?>">
                                        <td style="border: 1px solid black; vertical-align: middle;">
                                            <strong><?php echo $row['id']?>º</strong>
                                        </td>
                                        <td style="border: 1px solid black; vertical-align: middle;" >
                                            <select class="form-control" name="iny_<?php echo $inyectora?>_molde_<?php echo $row['id']?>" form="form_datos" id="iny_<?php echo $inyectora?>_molde_<?php echo $row['id']?>" onchange="mostar_molde_siguiente(<?php echo $row['id']?>, <?php echo $inyectora?>) ">
                                            <?php
                                            $columna_default='iny_'.$inyectora.'_molde';
                                                $default =$row[$columna_default];
                                                $states =$array_moldes;
                                                foreach($states as $key=>$val) {
                                                    echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                                }
                                            ?>
                                            </select>
                                        </td>
                                        <td style="border: 1px solid black; vertical-align: middle;" > 
                                            <textarea class="form-control" form="form_datos" id="motivos_iny_<?php echo $inyectora?>_<?php echo $row['id']?>" placeholder="Motivos cambio molde <?php echo $row['id']?>º" name="motivos_iny_<?php echo $inyectora?>_<?php echo $row['id']?>" rows="1" oninput="btn_guardar_rojo();"><?php echo $row[$columna_molde_motivos]?></textarea>
                                        </td>
                                    </tr>

                                    <?php
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col justify-content-center mr-1 ml-1 mt-1 mb-1" >
                        <div class="row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center"> 
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th class="text-light bg-dark" style="border: 1px solid black; vertical-align: middle;" scope="col" colspan="3">TOP 3 FABRICACIÓN INY <?php echo $inyectora?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $columna_iny_top_3_fabricacion='iny_'.$inyectora.'_top_3_fabricacion';
                                    $columna_iny_time_top_3_fabricacion='iny_'.$inyectora.'_time_top_3_fabricacion';

                                    $consulta = "SELECT*FROM `libro_relevos_fabricacion_registro_datos` WHERE `id_libro`='$id_libro' AND `id`<='3' ";
                                    $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
                                    while ($row = mysqli_fetch_array($resultado)) {
 
                                    ?>
                    
                                    <tr>
                                        <td style="border: 1px solid black; vertical-align: middle;" >
                                            <strong><?php echo $row['id']?>º</strong>
                                        </td>

                                        <td style="border: 1px solid black; vertical-align: middle;" >
                                            <input type="text" class="form-control" placeholder="" form="form_datos" id="top_3_iny_<?php echo $inyectora?>_fab_<?php echo $row['id']?>" name="top_3_iny_<?php echo $inyectora?>_fab_<?php echo $row['id']?>" value="<?php echo $row[$columna_iny_top_3_fabricacion]?>" oninput="btn_guardar_rojo();">
                                        </td>
                                        <td class="w-25" style="border: 1px solid black; vertical-align: middle;" > 
                                            <div class="form-check form-check-inline">
                                                <input type="number" class="form-control form-check-input mr-1 ml-1 text-center" placeholder="" form="form_datos" id="tiempo_top_3_iny_<?php echo $inyectora?>_fab_<?php echo $row['id']?>" name="tiempo_top_3_iny_<?php echo $inyectora?>_fab_<?php echo $row['id']?>" value="<?php echo $row[$columna_iny_time_top_3_fabricacion]?>" oninput="btn_guardar_rojo();" >
                                                <label class="form-check-label mr-1 ml-1"> min.</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center"> 
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th class="text-light bg-dark" style="border: 1px solid black; vertical-align: middle;" scope="col" colspan="3">TOP 3 CALIDAD INY <?php echo $inyectora?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $columna_iny_top_3_calidad='iny_'.$inyectora.'_top_3_calidad';
                                    $columna_iny_time_top_3_calidad='iny_'.$inyectora.'_time_top_3_calidad';
                                    $consulta = "SELECT*FROM `libro_relevos_fabricacion_registro_datos` WHERE `id_libro`='$id_libro' AND `id`<='3' ";
                                    $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
                                    while ($row = mysqli_fetch_array($resultado)) {
 
                                    ?>
                    
                                    <tr>
                                        <td class="" style="border: 1px solid black; vertical-align: middle;">
                                            <strong><?php echo $row['id']?>º</strong>
                                        </td>
                                        <td  class="" style="border: 1px solid black; vertical-align: middle;" >
                                            <input type="text" class="form-control" placeholder="" form="form_datos" id="top_3_iny_<?php echo $inyectora?>_cal_<?php echo $row['id']?>" name="top_3_iny_<?php echo $inyectora?>_cal_<?php echo $row['id']?>" value="<?php echo $row[$columna_iny_top_3_calidad]?>" oninput="btn_guardar_rojo();">
                                        </td>
                                        <td  class="w-25" style="border: 1px solid black; vertical-align: middle;" > 
                                            <div class="form-check form-check-inline">
                                                <input type="number" class="form-control" placeholder="" form="form_datos" id="tiempo_top_3_iny_<?php echo $inyectora?>_cal_<?php echo $row['id']?>" name="tiempo_top_3_iny_<?php echo $inyectora?>_cal_<?php echo $row['id']?>" value="<?php echo $row[$columna_iny_time_top_3_calidad]?>" oninput="btn_guardar_rojo();" >
                                                <label class="form-check-label mr-1 ml-1"> min.</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
<script>

    var id_libro = <?php echo $id_libro?>;

    function guardar_datos()
    {
        btn_guardar_verde();

        var form = new FormData(document.getElementById("form_datos"));

        $.ajax({
            url: 'funciones_libro_relevos_fabricacion/guardar_datos.php?id_libro='+id_libro,
            type: 'POST',
            dataType: "json",
            data: form,
            cache: false,
            contentType: false,
            processData: false
        });
    }

    function mostar_molde_siguiente(id, inyectora) {
        var siguiente = id+1;
        if(siguiente<=5)
        {
            document.getElementById("fila_molde_"+siguiente+"_"+inyectora).style.display=null;
        }
        btn_guardar_rojo();
    }

    function btn_guardar_rojo() {
        var boton_guardar = document.getElementById("btn_guardar");
        boton_guardar.style.background = "#dc3545";   
        boton_guardar.innerHTML  = "<i class='icofont-save'></i>";   
    }
    function btn_guardar_verde() {
        var boton_guardar = document.getElementById("btn_guardar");
        boton_guardar.style.background = "#28a745";   
        boton_guardar.innerHTML  = "<i class='icofont-check'></i>";   
    }

    function btn_modificar_valores_rojo(id) {
        var boton_modificar = document.getElementById("btn_modificar_valores_"+id);
        boton_modificar.style.background = "#dc3545";   
    }
    function btn_modificar_valores_verde(id) {
        var boton_modificar = document.getElementById("btn_modificar_valores_"+id);
        boton_modificar.style.background = "#28a745";   
    }
    function update_valores_limite_inyectoras(id)
    {
        var valor_warning = document.getElementById("valor_warning_"+id).value;
        var valor_danger = document.getElementById("valor_danger_"+id).value;
        $.ajax({
            url: 'funciones_libro_relevos_fabricacion/update_valores_limite_inyectoras.php?valor_warning='+valor_warning+'&valor_danger='+valor_danger+'&id='+id,
            type: 'POST',
            dataType: "json",
            data: id,
            cache: false,
            contentType: false,
            processData: false
        });
        btn_modificar_valores_verde(id);
    }

    function estado_inyectoras_modificar(iny)
    {
        btn_guardar_rojo();

        var dato_pmp = document.getElementById("pmp_iny_"+iny).checked;
        var dato_inyectadas = document.getElementById("inyectadas_iny_"+iny).value;
        var dato_chatarra = document.getElementById("chatarra_iny_"+iny).value;
        var value_warning = document.getElementById("iny_"+iny+"_warning").value;
        var value_danger = document.getElementById("iny_"+iny+"_danger").value;
        var estado_nuevo_celda;


        if(dato_pmp==false)
        {
            switch (true) {
            case parseInt(dato_inyectadas)>=parseInt(value_warning):
                document.getElementById("celda_estado_iny_"+iny).style.background = "#28a745";   
                estado_nuevo_celda=3;
              break;
            case parseInt(dato_inyectadas)<=parseInt(value_danger):
                document.getElementById("celda_estado_iny_"+iny).style.background = "#dc3545";   
                estado_nuevo_celda=1;
              break;
            default:
                document.getElementById("celda_estado_iny_"+iny).style.background = "#ffc107";   
                estado_nuevo_celda=2;
            }
        }
        else
        {
            document.getElementById("celda_estado_iny_"+iny).style.background = "#007bff";   
            estado_nuevo_celda=4;
        }


        $.ajax({
            url: 'funciones_libro_relevos_fabricacion/update_celdas_estado_inyectoras.php?id_libro='+id_libro+'&estado_nuevo_celda='+estado_nuevo_celda+'&iny='+iny,
            type: 'POST',
            dataType: "json",
            data: iny,
            cache: false,
            contentType: false,
            processData: false
        });
    }



</script>
    <!-- Footer -->
    <?php echo file_get_contents('http://'.$ip.'/D-WIDO/footer.php');?>
    <!-- Footer -->

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

</body>
</html>