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
     $titulo_pagina= "Hoja de intervención";
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
    $id_hoja_intervencion=$_SESSION['id_hoja_intervencion'];

    $sql = "SELECT*FROM `hoja_intervencion_registro` WHERE `id_hoja_intervencion`='$id_hoja_intervencion'";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $fecha=$row['fecha'];
        $turno=$row['turno'];
        $ju_fabricacion=$row['ju_fabricacion'];
        $ju_matriceria=$row['ju_matriceria'];
        $rango_a =$row['rango_a'];
        $rango_b =$row['rango_b'];
        $modelo =$row['modelo'];
        $molde =$row['molde'];
        $impronta =$row['impronta'];
        $comentarios_fabricacion =$row['comentarios_fabricacion'];
        $comentarios_matriceria =$row['comentarios_matriceria'];
        $fecha_inicio_reparacion =$row['fecha_inicio_reparacion'];
        $fecha_estimada_reparacion =$row['fecha_estimada_reparacion'];
        $fecha_real_reparacion =$row['fecha_real_reparacion'];
        $bdl_realizado =$row['bdl_realizado'];
        $bdl_comentario =$row['bdl_comentario'];
        $nombre_img_1=$row['img_1'];
        $nombre_img_2=$row['img_2'];
        $nombre_img_3=$row['img_3'];
        $nombre_img_4=$row['img_4'];
        $nombre_img_5=$row['img_5'];
        $nombre_img_6=$row['img_6'];

    }

    if(is_null($nombre_img_1)){$nombre_img_1='imagenes/imagen_hoja_intervencion_'.$modelo.'_f100.jpg';}
    if(is_null($nombre_img_2)){$nombre_img_2='imagenes/imagen_hoja_intervencion_'.$modelo.'_f200.jpg';}
    if(is_null($nombre_img_3)){$nombre_img_3='imagenes/imagen_hoja_intervencion_'.$modelo.'_f300.jpg';}
    if(is_null($nombre_img_4)){$nombre_img_4='imagenes/imagen_hoja_intervencion_'.$modelo.'_f400.jpg';}
    if(is_null($nombre_img_5)){$nombre_img_5='imagenes/imagen_hoja_intervencion_'.$modelo.'_f500.jpg';}
    if(is_null($nombre_img_6)){$nombre_img_6='imagenes/imagen_hoja_intervencion_'.$modelo.'_f600.jpg';}

    $sql = "SELECT*FROM `hoja_intervencion_datos` WHERE `id_hoja_intervencion`='$id_hoja_intervencion' AND `id`='1'";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $pin_roto=$row['pin_roto'];
        $expulsor=$row['expulsor'];
        $fuga=$row['fuga'];
        $inserto=$row['inserto'];
        $arrastre=$row['arrastre'];
        $rotura_molde=$row['rotura_molde'];

    }

    if($rango_a==1){$checked_rango_a="checked";}else{$checked_rango_a="";}
    if($rango_b==1){$checked_rango_b="checked";}else{$checked_rango_b="";}
    if($bdl_realizado==1){$checked_bdl_realizado="checked";}else{$checked_bdl_realizado="";}


    $conexion2 = mysqli_connect($servername, $username, $password, "informe_buhler");
    $array_moldes=array(""=>"");
    $consulta = "SELECT DISTINCT `molde` FROM `tabla_heavy_maintenance` ORDER BY `tabla_heavy_maintenance`.`molde` ASC";
    $resultado = mysqli_query($conexion2, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
    while ($row = mysqli_fetch_array($resultado)) {
    $array_moldes[$row['molde']]=$row['molde'];
    }

    $fecha_actual=date("Y-m-d");
    $hora=date("H:i:s");

    if(is_null($fecha))
    {
        $fecha=date("Y-m-d");
    };
    if(is_null($turno)){
        if(strtotime($hora)>=strtotime('00:00:00') and strtotime($hora)<=strtotime('05:59:59') ) 
        {
            $turno="NOCHE";
            $fecha=date("Y-m-d",strtotime($fecha_actual."- 1 days")); 
        } 
        if(strtotime($hora)>=strtotime('06:00:00') and strtotime($hora)<=strtotime('13:59:59') ) 
        {
            $turno="MAÑANA";
        } 
        if(strtotime($hora)>=strtotime('14:00:00') and strtotime($hora)<=strtotime('21:59:59') ) 
        {
            $turno="TARDE";
        } 
        if(strtotime($hora)>=strtotime('22:00:00') and strtotime($hora)<=strtotime('23:59:59') ) 
        {
            $turno="NOCHE";
        } 
    };


    ?>

    <!-- Nav hasta aqui -->

    
<h1 align="center">HOJA DE INTERVENCIÓN</h1>

<form id="form_datos"></form>

    <div class="container-fluid justify-content-center">
        <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border border-dark rounded text-dark" style="background-color:#E4E4E4;">
            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    <button class="btn font-weight-bold border border-dark btn-lg" name="btn_guardar" id="btn_guardar"  style="background-color:#28a745;" onclick="guardar_datos()"><i class='icofont-ui-check'></i></button>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1 " >
                <div class="d-flex justify-content-around ">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                        <div class="input-group border border-dark rounded">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>FECHA:</strong>
                                </div>
                            </div>
                            <input type="date" form="form_datos" name="fecha" id="fecha" class="form-control" value="<?php echo $fecha?>" onchange="btn_guardar_rojo()">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around ">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                        <div class="input-group border border-dark rounded">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>TURNO:</strong>
                                </div>
                            </div>
                            <select form="form_datos" class="form-control" name="turno" id="turno" onchange="btn_guardar_rojo()">
                                <?php
                                    $default ="$turno";
                                    $states =array(""=>"","MAÑANA"=>"MAÑANA","TARDE"=>"TARDE","NOCHE"=>"NOCHE");
                                    foreach($states as $key=>$val) {
                                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around ">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                        <div class="input-group border border-dark rounded">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>JU Fabricación:</strong>
                                </div>
                            </div>
                            <input type="text" form="form_datos" name="ju_fabricacion" id="ju_fabricacion" class="form-control" value="<?php echo $ju_fabricacion?>" onkeyup="btn_guardar_rojo()">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around ">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                        <div class="input-group border border-dark rounded">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>JU Matricería:</strong>
                                </div>
                            </div>
                            <input type="text" form="form_datos" name="ju_matriceria" id="ju_matriceria" class="form-control" value="<?php echo $ju_matriceria?>" onkeyup="btn_guardar_rojo()">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1 " >
                <div class="d-flex justify-content-around ">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                        <div class="input-group border border-dark rounded">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <label class="my-auto" for="rango_a"><strong>RANGO A*</strong></label>
                                </div>
                            </div>
                            <input type="checkbox" <?php echo $checked_rango_a?> form="form_datos" name="rango_a" id="rango_a" class="form-control" value="1" oninput="btn_guardar_rojo()">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around ">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                        <div class="input-group border border-dark rounded">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <label class="my-auto" for="rango_b"><strong>RANGO B*:</strong></label>
                                </div>
                            </div>
                            <input type="checkbox" form="form_datos" <?php echo $checked_rango_b?> name="rango_b" id="rango_b" class="form-control " value="1" oninput="btn_guardar_rojo()">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around ">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                        <div class="input-group border border-dark rounded">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>MODELO:</strong>
                                </div>
                            </div>
                            <select class="form-control"  form="form_datos" name="modelo" id="modelo" onchange="tipo_de_imagen(this.value),btn_guardar_rojo()">
                                <?php
                                    $default ="$modelo";
                                    $states =array(""=>"","HR13"=>"HR13","HR10"=>"HR10","HR12"=>"HR12");
                                    foreach($states as $key=>$val) {
                                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around ">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                        <div class="input-group border border-dark rounded">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>MOLDE:</strong>
                                </div>
                            </div>
                            <select class="form-control" form="form_datos" name="molde" id="molde" onchange="btn_guardar_rojo()">
                                <?php
                                    $default =$molde;
                                    $states =$array_moldes;
                                    foreach($states as $key=>$val) {
                                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around ">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                        <div class="input-group border border-dark rounded">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>IMPRONTA:</strong>
                                </div>
                            </div>
                            <input type="number" name="impronta" form="form_datos" id="impronta" class="form-control" value="<?php echo $impronta?>" onkeyup="btn_guardar_rojo()">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-around" >
                <div class="col" >
                    <div class="d-flex flex-row justify-content-around" >
                        <?php
                            $sql = "SELECT*FROM `hoja_intervencion_datos` WHERE `id`=1 AND  `id_hoja_intervencion`='$id_hoja_intervencion'";
                            $consulta = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_array($consulta)) {
                            $i=$row['id'];
                            $descripcion_problema=$row['descripcion_problema'];
                            $conductor=$row['conductor'];
                            $realizado=$row['realizado'];
                            }
                            if($realizado==1)
                            {
                                $checked='checked';
                            }
                            else
                            {
                                $checked='';
                            }
                        ?>
                        <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                            <strong>1º</strong> 
                        </div>
                        <div class="col d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                            <textarea name="descripcion_problema_1" form="form_datos" id="descripcion_problema_1" placeholder="Descripción del problema" class="form-control" rows="1" maxlength="500" onkeydown="mostar_descripcion_problema_siguiente(1)"><?php echo $descripcion_problema?></textarea>
                        </div>
                        <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                            <input type="text" placeholder="Conductor" form="form_datos" name="conductor_1" id="conductor_1" class="form-control" onkeyup="btn_guardar_rojo()" value="<?php echo $conductor?>">
                        </div>
                        <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                            <div class="input-group border border-dark rounded">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <label class="my-auto" for="realizado_1"><strong>Realizado:</strong></label>
                                    </div>
                                </div>
                                <input type="checkbox" <?php echo $checked?> form="form_datos"  name="realizado_1" id="realizado_1" onchange="btn_guardar_rojo()" class="form-control " value="1">
                            </div>                
                        </div>
                    </div>
                        <?php
                            $sql = "SELECT*FROM `hoja_intervencion_datos` WHERE `id`>1 AND  `id_hoja_intervencion`='$id_hoja_intervencion'";
                            $consulta = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_array($consulta)) {
                                $i=$row['id'];
                                $i_siguiente=$i+1;
                                $descripcion_problema_anterior=$descripcion_problema;
                                $descripcion_problema=$row['descripcion_problema'];
                                $conductor=$row['conductor'];
                                $realizado=$row['realizado'];
                            
                                if($realizado==1){$checked='checked';}else{$checked='';}
                            
                                if(($descripcion_problema_anterior=="" or is_null($descripcion_problema_anterior)) AND $descripcion_problema=="")
                                {
                                    $ocultar_linea_descripcion_problema="none";
                                }
                                else
                                {
                                    $ocultar_linea_descripcion_problema="null";
                                }
                                $funcion_ocultar='mostrar_siguiente_descripcion_problema_'.$i.'()';
                                    echo'
                                        <div name="div_descripcion_problema_'.$i.'" id="div_descripcion_problema_'.$i.'" style="display:'.$ocultar_linea_descripcion_problema.'">
                                            <div class="d-flex flex-row justify-content-around"  >
                                                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                                                    <strong>'.$i.'º</strong>
                                                </div>
                                                <div class="col d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                                                    <textarea form="form_datos" name="descripcion_problema_'.$i.'" id="descripcion_problema_'.$i.'" placeholder="Descripción del problema" onkeyup="btn_guardar_rojo()" class="form-control" rows="1" maxlength="500" onkeydown="mostar_descripcion_problema_siguiente('.$i.')">'.$descripcion_problema.'</textarea>
                                                </div>
                                                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                                                    <input type="text" form="form_datos" placeholder="Conductor" name="conductor_'.$i.'" id="conductor_'.$i.'" class="form-control" onkeyup="btn_guardar_rojo()" value="'.$conductor.'">
                                                </div>
                                                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                                                    <div class="input-group border border-dark rounded">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <label class="my-auto" for="realizado_'.$i.'"><strong>Realizado:</strong></label>
                                                            </div>
                                                        </div>
                                                        <input type="checkbox" form="form_datos" '.$checked.' onchange="btn_guardar_rojo()" name="realizado_'.$i.'" id="realizado_'.$i.'" class="form-control " value="1">
                                                    </div>  
                                                </div>  
                                            </div>  
                                        </div>
                                    ';
                            }      
                        ?>
                </div>
                <div class="col" >
                    <div class="mt-1 mb-1 pt-1 pb-1 border border-dark rounded" >
                        <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1  " >
                            <strong>COMENTARIOS FABRICACIÓN</strong>         
                        </div>
                        <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1  " >
                            <textarea name="comentarios_fabricacion" form="form_datos" id="comentarios_fabricacion" onkeyup="btn_guardar_rojo()" placeholder="Comentarios..." class="form-control" rows="2" maxlength="2500"><?php echo $comentarios_fabricacion?></textarea>
                        </div>
                    </div>
                    <div class="mt-1 mb-1 pt-1 pb-1 border border-dark rounded" >
                        <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1  " >
                            <strong>COMENTARIOS MATRICERÍA</strong>       
                        </div>
                        <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1  " >
                            <textarea name="comentarios_matriceria" form="form_datos" id="comentarios_matriceria" onkeyup="btn_guardar_rojo()" placeholder="Comentarios..." class="form-control" rows="2" maxlength="2500"><?php echo $comentarios_matriceria?></textarea>
                        </div>
                    </div>
                    <div class="mt-1 mb-1 pt-1 pb-1 border border-dark rounded" >
                        <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1  " >
                            <table class="table table-sm table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" scope="col">
                                            Fecha inicio reparación
                                        </th>
                                        <th class="text-center" scope="col">
                                            Fecha estimada
                                        </th>
                                        <th class="text-center" scope="col">
                                            Fecha real reparación
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="date" onchange="btn_guardar_rojo()" form="form_datos" name="fecha_inicio_reparacion" id="fecha_inicio_reparacion" class="form-control" value="<?php echo $fecha_inicio_reparacion?>">
                                        </td>
                                        <td>
                                            <input type="date" onchange="btn_guardar_rojo()" form="form_datos" name="fecha_estimada_reparacion" id="fecha_estimada_reparacion" class="form-control" value="<?php echo $fecha_estimada_reparacion?>">
                                        </td>
                                        <td>
                                            <input type="date" onchange="btn_guardar_rojo()" form="form_datos" name="fecha_real_reparacion" id="fecha_real_reparacion" class="form-control" value="<?php echo $fecha_real_reparacion?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-1 mb-1 pt-1 pb-1 border border-dark rounded" >
                        <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1  " >
                            <div class="input-group border border-dark rounded">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <label class="my-auto" for="bdl_realizado"><strong>Borde de línea realizado:</strong></label>
                                    </div>
                                </div>
                                <input type="checkbox" form="form_datos" onchange="btn_guardar_rojo()" <?php echo $checked_bdl_realizado?> name="bdl_realizado" id="bdl_realizado" class="form-control" value="1">
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1  " >
                            <textarea name="bdl_comentario" form="form_datos" id="bdl_comentario" onkeyup="btn_guardar_rojo()" placeholder="Comentarios..." class="form-control" rows="1" maxlength="2500"><?php echo $bdl_comentario?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1 " >
                <div class="col align-items-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_canvas_1">
                        CARA 100
                    </button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_canvas_2">  
                        CARA 200
                    </button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_canvas_3">
                        CARA 300
                    </button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_canvas_4">
                        CARA 400
                    </button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_canvas_5">
                        CARA 500
                    </button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_canvas_6">
                        CARA 600
                    </button>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1 " >
                <table class="table table-sm table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" scope="col" colspan="4">
                                Identificación
                            </th>
                            <th class="text-center" scope="col" colspan="2">
                                Cara de la pieza
                            </th>
                        </tr>
                    </thead>
                    <thead class="bg-secondary">
                        <tr>
                            <th class="text-center" scope="col">
                                Pin roto
                            </th>
                            <th class="text-center" scope="col">
                                Expulsor
                            </th>
                            <th class="text-center" scope="col">
                                Fuga
                            </th>
                            <th class="text-center" scope="col">
                                Inserto (W/J, etc)
                            </th>
                            <th class="text-center" scope="col">
                                Arrastre
                            </th>
                            <th class="text-center" scope="col">
                                Rotura molde
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <textarea form="form_datos" onkeyup="btn_guardar_rojo()" name="pin_roto" id="pin_roto" class="form-control" rows="1" maxlength="500"><?php echo $pin_roto?></textarea>
                            </td>
                            <td>
                                <textarea form="form_datos" onkeyup="btn_guardar_rojo()" name="expulsor" id="expulsor" class="form-control" rows="1" maxlength="500"><?php echo $expulsor?></textarea>
                            </td>
                            <td>
                                <textarea form="form_datos" onkeyup="btn_guardar_rojo()" name="fuga" id="fuga" class="form-control" rows="1" maxlength="500"><?php echo $fuga?></textarea>
                            </td>
                            <td>
                                <textarea form="form_datos" onkeyup="btn_guardar_rojo()" name="inserto" id="inserto" class="form-control" rows="1" maxlength="500"><?php echo $inserto?></textarea>
                            </td>
                            <td>
                                <textarea form="form_datos" onkeyup="btn_guardar_rojo()" name="arrastre" id="arrastre" class="form-control" rows="1" maxlength="500"><?php echo $arrastre?></textarea>
                            </td>
                            <td>
                                <textarea form="form_datos" onkeyup="btn_guardar_rojo()" name="rotura_molde" id="rotura_molde" class="form-control" rows="1" maxlength="500"><?php echo $rotura_molde?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>            
            </div>
        </div>
    </div>

    <?php
    for ($i = 1; $i <= 10; $i++) {
    ?>

    <div class="modal fade modal-task" id="modal_canvas_<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="modal_canvas_<?php echo $i?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <label id="titulo_modal_<?php echo $i?>"></label>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid  mt-2 mb-2 pt-1 pb-1">
                        <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
                            <div class="col justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border rounded text-dark text-center border border-danger"> 
                                <canvas id="imagen_<?php echo $i?>" class="" >
                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_guardar_<?php echo $i?>" name="btn_guardar_<?php echo $i?>" class="btn btn-success">Guardar</button>
                    <button type="button" id="btn_danger_<?php echo $i?>" name="btn_reset_<?php echo $i?>" class="btn btn-danger" onclick="reset_imagen('<?php echo $i?>')">RESET IMG</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar sin guardar</button>
                </div>
            </div>
        </div>
    </div>

    <?php 
    }
    ?>

<script>

var id_hoja_intervencion = <?php echo $id_hoja_intervencion?>;

function mostar_descripcion_problema_siguiente(fila) {
    btn_guardar_rojo();
    var fila_siguiente=fila+1;
    if(fila<=14)
    {
        document.getElementById("div_descripcion_problema_"+fila_siguiente).style.display="";
    }
}

function guardar_datos()
    {
        btn_guardar_verde();

        var form = new FormData(document.getElementById("form_datos"));

        $.ajax({
            url: 'funciones_hoja_intervencion/guardar_datos_hoja_intervencion.php?id_hoja_intervencion='+id_hoja_intervencion,
            type: 'POST',
            dataType: "json",
            data: form,
            cache: false,
            contentType: false,
            processData: false
        });
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

function tipo_de_imagen(valor) {
    console.log("valor="+valor);
    <?php
    for ($i = 1; $i <= 6; $i++) {
        
    echo'
    var canvas_'.$i.' = document.getElementById("imagen_'.$i.'");
    var ctx_'.$i.' = canvas_'.$i.'.getContext("2d");
    var img_'.$i.' = new Image();
    img_'.$i.'.src = "imagenes/imagen_hoja_intervencion_"+valor+"_f'.$i.'00.jpg";
    ctx_'.$i.'.drawImage(img_'.$i.', 0, 0);
    img_'.$i.'.onload = function(){
        ctx_'.$i.'.drawImage(img_'.$i.', 0, 0);
    }
    ';
    }
    ?>
}

// CANVAS 1
var btn_guardar_1=document.getElementById("btn_guardar_1");
var canvas_1 = document.getElementById("imagen_1");
var ctx_1 = canvas_1.getContext("2d");
var img_1 = new Image();
img_1.src = "<?php echo $nombre_img_1?>";
ctx_1.drawImage(img_1, 0, 0);
img_1.onload = function(){
    ctx_1.drawImage(img_1, 0, 0);
}

var miCanvas_1 = document.querySelector('#imagen_1');
var lineas_1 = [];
var correccionX_1 = 0;
var correccionY_1 = 0;
var pintarLinea_1 = false;
// Marca el nuevo punto
var nuevaPosicionX_1 = 0;
var nuevaPosicionY_1 = 0;

var posicion_1 = canvas_1.getBoundingClientRect()
correccionX_1 = posicion_1.x;
correccionY_1 = posicion_1.y;

canvas_1.width = 750;
canvas_1.height = 400;



function empezarDibujo_1 () {
    pintarLinea_1 = true;
lineas_1.push([]);
};

function guardarLinea_1() {
    lineas_1[lineas_1.length - 1].push({
        x: nuevaPosicionX_1,
        y: nuevaPosicionY_1
    });
}



function dibujarLinea_1 (event) {
    event.preventDefault();
    if (pintarLinea_1) {
        var ctx_1 = miCanvas_1.getContext('2d')
        // Estilos de linea
        ctx_1.lineJoin = ctx_1.lineCap = 'round';
        ctx_1.lineWidth = 2;
        // Color de la linea
        ctx_1.strokeStyle = '#FF0000';
        // Marca el nuevo punto
        if (event.changedTouches == undefined) {
            // Versión ratón
            nuevaPosicionX_1 = event.layerX;
            nuevaPosicionY_1 = event.layerY;
        } else {
            // Versión touch, pantalla tactil
            nuevaPosicionX_1 = event.changedTouches[0].pageX - correccionX_1;
            nuevaPosicionY_1 = event.changedTouches[0].pageY - correccionY_1;
        }
        // Guarda la linea
        guardarLinea_1();
        // Redibuja todas las lineas guardadas
        ctx_1.beginPath();
        lineas_1.forEach(function (segmento_1) {
            ctx_1.moveTo(segmento_1[0].x, segmento_1[0].y);
            segmento_1.forEach(function (punto_1, index_1) {
                ctx_1.lineTo(punto_1.x, punto_1.y);
            });
        });
        ctx_1.stroke();
    }
}


function pararDibujar_1 () {
    pintarLinea_1 = false;
    guardarLinea_1();
}
// Eventos raton
miCanvas_1.addEventListener('mousedown', empezarDibujo_1, false);
miCanvas_1.addEventListener('mousemove', dibujarLinea_1, false);
miCanvas_1.addEventListener('mouseup', pararDibujar_1, false);

// Eventos pantallas táctiles
miCanvas_1.addEventListener('touchstart', empezarDibujo_1, false);
miCanvas_1.addEventListener('touchmove', dibujarLinea_1, false);


btn_guardar_1.onclick = async () => {
    // Convertir la imagen a Base64 y ponerlo en el enlace
    var tipo_molde =document.getElementById("modelo").value;
    const data = miCanvas_1.toDataURL("image/png");
    const fd_1 = new FormData();
    fd_1.append("imagen_1", data); // Se llama "imagen", en PHP lo recuperamos con $_POST["imagen"]
    const respuestaHttp = await fetch("funciones_hoja_intervencion/imagen_1.php?id_hoja_intervencion="+<?php echo $id_hoja_intervencion?>+"&tipo_molde="+tipo_molde, {
        method: "POST",
        body: fd_1,
    });
    const nombreImagenSubida = await respuestaHttp.json();
    console.log("La imagen ha sido enviada y tiene el nombre de: " + nombreImagenSubida);
};


function reset_imagen(i) {
    console.log("i="+i);
    modelo=document.getElementById("modelo").value;
    console.log("modelo="+modelo);
    var canvas = document.getElementById("imagen_"+i);
    var ctx = canvas.getContext("2d");
    var img = new Image();
    img.src = "imagenes/imagen_hoja_intervencion_"+modelo+"_f"+i+"00.jpg";
    ctx.drawImage(img, 0, 0);
    img.onload = function(){
        ctx_1.drawImage(img, 0, 0);
    }
}


// CANVAS 2

var btn_guardar_2=document.getElementById("btn_guardar_2");
var canvas_2 = document.getElementById("imagen_2");
var ctx_2 = canvas_2.getContext("2d");
var img_2 = new Image();
img_2.src = "<?php echo $nombre_img_2?>";
ctx_2.drawImage(img_2, 0, 0);
img_2.onload = function(){
    ctx_2.drawImage(img_2, 0, 0);
}

var miCanvas_2 = document.querySelector('#imagen_2');
var lineas_2 = [];
var correccionX_2 = 0;
var correccionY_2 = 0;
var pintarLinea_2 = false;
// Marca el nuevo punto
var nuevaPosicionX_2 = 0;
var nuevaPosicionY_2 = 0;

var posicion_2 = canvas_2.getBoundingClientRect()
correccionX_2 = posicion_2.x;
correccionY_2 = posicion_2.y;

canvas_2.width = 750;
canvas_2.height = 400;



function empezarDibujo_2 () {
    pintarLinea_2 = true;
lineas_2.push([]);
};

function guardarLinea_2() {
    lineas_2[lineas_2.length - 1].push({
        x: nuevaPosicionX_2,
        y: nuevaPosicionY_2
    });
}


function dibujarLinea_2 (event) {
    event.preventDefault();
    if (pintarLinea_2) {
        var ctx_2 = miCanvas_2.getContext('2d')
        // Estilos de linea
        ctx_2.lineJoin = ctx_2.lineCap = 'round';
        ctx_2.lineWidth = 2;
        // Color de la linea
        ctx_2.strokeStyle = '#FF0000';
        // Marca el nuevo punto
        if (event.changedTouches == undefined) {
            // Versión ratón
            nuevaPosicionX_2 = event.layerX;
            nuevaPosicionY_2 = event.layerY;
        } else {
            // Versión touch, pantalla tactil
            nuevaPosicionX_2 = event.changedTouches[0].pageX - correccionX_2;
            nuevaPosicionY_2 = event.changedTouches[0].pageY - correccionY_2;
        }
        // Guarda la linea
        guardarLinea_2();
        // Redibuja todas las lineas guardadas
        ctx_2.beginPath();
        lineas_2.forEach(function (segmento_2) {
            ctx_2.moveTo(segmento_2[0].x, segmento_2[0].y);
            segmento_2.forEach(function (punto_2, index_2) {
                ctx_2.lineTo(punto_2.x, punto_2.y);
            });
        });
        ctx_2.stroke();
    }
}


function pararDibujar_2 () {
    pintarLinea_2 = false;
    guardarLinea_2();
}
// Eventos raton
miCanvas_2.addEventListener('mousedown', empezarDibujo_2, false);
miCanvas_2.addEventListener('mousemove', dibujarLinea_2, false);
miCanvas_2.addEventListener('mouseup', pararDibujar_2, false);

// Eventos pantallas táctiles
miCanvas_2.addEventListener('touchstart', empezarDibujo_2, false);
miCanvas_2.addEventListener('touchmove', dibujarLinea_2, false);


btn_guardar_2.onclick = async () => {
    // Convertir la imagen a Base64 y ponerlo en el enlace
    var tipo_molde =document.getElementById("modelo").value;
    const data = miCanvas_2.toDataURL("image/png");
    const fd_2 = new FormData();
    fd_2.append("imagen_2", data); // Se llama "imagen", en PHP lo recuperamos con $_POST["imagen"]
    const respuestaHttp = await fetch("funciones_hoja_intervencion/imagen_2.php?id_hoja_intervencion="+<?php echo $id_hoja_intervencion?>+"&tipo_molde="+tipo_molde, {
        method: "POST",
        body: fd_2,
    });
    const nombreImagenSubida = await respuestaHttp.json();
    console.log("La imagen ha sido enviada y tiene el nombre de: " + nombreImagenSubida);
};

// CANVAS 3

var btn_guardar_3=document.getElementById("btn_guardar_3");
var canvas_3 = document.getElementById("imagen_3");
var ctx_3 = canvas_3.getContext("2d");
var img_3 = new Image();
img_3.src = "<?php echo $nombre_img_3?>";
ctx_3.drawImage(img_3, 0, 0);
img_3.onload = function(){
    ctx_3.drawImage(img_3, 0, 0);
}

var miCanvas_3 = document.querySelector('#imagen_3');
var lineas_3 = [];
var correccionX_3 = 0;
var correccionY_3 = 0;
var pintarLinea_3 = false;
// Marca el nuevo punto
var nuevaPosicionX_3 = 0;
var nuevaPosicionY_3 = 0;

var posicion_3 = canvas_3.getBoundingClientRect()
correccionX_3 = posicion_3.x;
correccionY_3 = posicion_3.y;

canvas_3.width = 750;
canvas_3.height = 400;



function empezarDibujo_3 () {
    pintarLinea_3 = true;
lineas_3.push([]);
};

function guardarLinea_3() {
    lineas_3[lineas_3.length - 1].push({
        x: nuevaPosicionX_3,
        y: nuevaPosicionY_3
    });
}


function dibujarLinea_3 (event) {
    event.preventDefault();
    if (pintarLinea_3) {
        var ctx_3 = miCanvas_3.getContext('2d')
        // Estilos de linea
        ctx_3.lineJoin = ctx_3.lineCap = 'round';
        ctx_3.lineWidth = 2;
        // Color de la linea
        ctx_3.strokeStyle = '#FF0000';
        // Marca el nuevo punto
        if (event.changedTouches == undefined) {
            // Versión ratón
            nuevaPosicionX_3 = event.layerX;
            nuevaPosicionY_3 = event.layerY;
        } else {
            // Versión touch, pantalla tactil
            nuevaPosicionX_3 = event.changedTouches[0].pageX - correccionX_3;
            nuevaPosicionY_3 = event.changedTouches[0].pageY - correccionY_3;
        }
        // Guarda la linea
        guardarLinea_3();
        // Redibuja todas las lineas guardadas
        ctx_3.beginPath();
        lineas_3.forEach(function (segmento_3) {
            ctx_3.moveTo(segmento_3[0].x, segmento_3[0].y);
            segmento_3.forEach(function (punto_3, index_3) {
                ctx_3.lineTo(punto_3.x, punto_3.y);
            });
        });
        ctx_3.stroke();
    }
}


function pararDibujar_3 () {
    pintarLinea_3 = false;
    guardarLinea_3();
}
// Eventos raton
miCanvas_3.addEventListener('mousedown', empezarDibujo_3, false);
miCanvas_3.addEventListener('mousemove', dibujarLinea_3, false);
miCanvas_3.addEventListener('mouseup', pararDibujar_3, false);

// Eventos pantallas táctiles
miCanvas_3.addEventListener('touchstart', empezarDibujo_3, false);
miCanvas_3.addEventListener('touchmove', dibujarLinea_3, false);


btn_guardar_3.onclick = async () => {
    // Convertir la imagen a Base64 y ponerlo en el enlace
    var tipo_molde =document.getElementById("modelo").value;
    const data = miCanvas_3.toDataURL("image/png");
    const fd_3 = new FormData();
    fd_3.append("imagen_3", data); // Se llama "imagen", en PHP lo recuperamos con $_POST["imagen"]
    const respuestaHttp = await fetch("funciones_hoja_intervencion/imagen_3.php?id_hoja_intervencion="+<?php echo $id_hoja_intervencion?>+"&tipo_molde="+tipo_molde, {
        method: "POST",
        body: fd_3,
    });
    const nombreImagenSubida = await respuestaHttp.json();
    console.log("La imagen ha sido enviada y tiene el nombre de: " + nombreImagenSubida);
};


// CANVAS 4

var btn_guardar_4=document.getElementById("btn_guardar_4");
var canvas_4 = document.getElementById("imagen_4");
var ctx_4 = canvas_4.getContext("2d");
var img_4 = new Image();
img_4.src = "<?php echo $nombre_img_4?>";
ctx_4.drawImage(img_4, 0, 0);
img_4.onload = function(){
    ctx_4.drawImage(img_4, 0, 0);
}

var miCanvas_4 = document.querySelector('#imagen_4');
var lineas_4 = [];
var correccionX_4 = 0;
var correccionY_4 = 0;
var pintarLinea_4 = false;
// Marca el nuevo punto
var nuevaPosicionX_4 = 0;
var nuevaPosicionY_4 = 0;

var posicion_4 = canvas_4.getBoundingClientRect()
correccionX_4 = posicion_4.x;
correccionY_4 = posicion_4.y;

canvas_4.width = 750;
canvas_4.height = 400;



function empezarDibujo_4 () {
    pintarLinea_4 = true;
lineas_4.push([]);
};

function guardarLinea_4() {
    lineas_4[lineas_4.length - 1].push({
        x: nuevaPosicionX_4,
        y: nuevaPosicionY_4
    });
}


function dibujarLinea_4 (event) {
    event.preventDefault();
    if (pintarLinea_4) {
        var ctx_4 = miCanvas_4.getContext('2d')
        // Estilos de linea
        ctx_4.lineJoin = ctx_4.lineCap = 'round';
        ctx_4.lineWidth = 2;
        // Color de la linea
        ctx_4.strokeStyle = '#FF0000';
        // Marca el nuevo punto
        if (event.changedTouches == undefined) {
            // Versión ratón
            nuevaPosicionX_4 = event.layerX;
            nuevaPosicionY_4 = event.layerY;
        } else {
            // Versión touch, pantalla tactil
            nuevaPosicionX_4 = event.changedTouches[0].pageX - correccionX_4;
            nuevaPosicionY_4 = event.changedTouches[0].pageY - correccionY_4;
        }
        // Guarda la linea
        guardarLinea_4();
        // Redibuja todas las lineas guardadas
        ctx_4.beginPath();
        lineas_4.forEach(function (segmento_4) {
            ctx_4.moveTo(segmento_4[0].x, segmento_4[0].y);
            segmento_4.forEach(function (punto_4, index_4) {
                ctx_4.lineTo(punto_4.x, punto_4.y);
            });
        });
        ctx_4.stroke();
    }
}


function pararDibujar_4 () {
    pintarLinea_4 = false;
    guardarLinea_4();
}
// Eventos raton
miCanvas_4.addEventListener('mousedown', empezarDibujo_4, false);
miCanvas_4.addEventListener('mousemove', dibujarLinea_4, false);
miCanvas_4.addEventListener('mouseup', pararDibujar_4, false);

// Eventos pantallas táctiles
miCanvas_4.addEventListener('touchstart', empezarDibujo_4, false);
miCanvas_4.addEventListener('touchmove', dibujarLinea_4, false);


btn_guardar_4.onclick = async () => {
    // Convertir la imagen a Base64 y ponerlo en el enlace
    var tipo_molde =document.getElementById("modelo").value;
    const data = miCanvas_4.toDataURL("image/png");
    const fd_4 = new FormData();
    fd_4.append("imagen_4", data); // Se llama "imagen", en PHP lo recuperamos con $_POST["imagen"]
    const respuestaHttp = await fetch("funciones_hoja_intervencion/imagen_4.php?id_hoja_intervencion="+<?php echo $id_hoja_intervencion?>+"&tipo_molde="+tipo_molde, {
        method: "POST",
        body: fd_4,
    });
    const nombreImagenSubida = await respuestaHttp.json();
    console.log("La imagen ha sido enviada y tiene el nombre de: " + nombreImagenSubida);
};


// CANVAS 5

var btn_guardar_5=document.getElementById("btn_guardar_5");
var canvas_5 = document.getElementById("imagen_5");
var ctx_5 = canvas_5.getContext("2d");
var img_5 = new Image();
img_5.src = "<?php echo $nombre_img_5?>";
ctx_5.drawImage(img_5, 0, 0);
img_5.onload = function(){
    ctx_5.drawImage(img_5, 0, 0);
}

var miCanvas_5 = document.querySelector('#imagen_5');
var lineas_5 = [];
var correccionX_5 = 0;
var correccionY_5 = 0;
var pintarLinea_5 = false;
// Marca el nuevo punto
var nuevaPosicionX_5 = 0;
var nuevaPosicionY_5 = 0;

var posicion_5 = canvas_5.getBoundingClientRect()
correccionX_5 = posicion_5.x;
correccionY_5 = posicion_5.y;

canvas_5.width = 750;
canvas_5.height = 400;



function empezarDibujo_5 () {
    pintarLinea_5 = true;
lineas_5.push([]);
};

function guardarLinea_5() {
    lineas_5[lineas_5.length - 1].push({
        x: nuevaPosicionX_5,
        y: nuevaPosicionY_5
    });
}


function dibujarLinea_5 (event) {
    event.preventDefault();
    if (pintarLinea_5) {
        var ctx_5 = miCanvas_5.getContext('2d')
        // Estilos de linea
        ctx_5.lineJoin = ctx_5.lineCap = 'round';
        ctx_5.lineWidth = 2;
        // Color de la linea
        ctx_5.strokeStyle = '#FF0000';
        // Marca el nuevo punto
        if (event.changedTouches == undefined) {
            // Versión ratón
            nuevaPosicionX_5 = event.layerX;
            nuevaPosicionY_5 = event.layerY;
        } else {
            // Versión touch, pantalla tactil
            nuevaPosicionX_5 = event.changedTouches[0].pageX - correccionX_5;
            nuevaPosicionY_5 = event.changedTouches[0].pageY - correccionY_5;
        }
        // Guarda la linea
        guardarLinea_5();
        // Redibuja todas las lineas guardadas
        ctx_5.beginPath();
        lineas_5.forEach(function (segmento_5) {
            ctx_5.moveTo(segmento_5[0].x, segmento_5[0].y);
            segmento_5.forEach(function (punto_5, index_5) {
                ctx_5.lineTo(punto_5.x, punto_5.y);
            });
        });
        ctx_5.stroke();
    }
}


function pararDibujar_5 () {
    pintarLinea_5 = false;
    guardarLinea_5();
}
// Eventos raton
miCanvas_5.addEventListener('mousedown', empezarDibujo_5, false);
miCanvas_5.addEventListener('mousemove', dibujarLinea_5, false);
miCanvas_5.addEventListener('mouseup', pararDibujar_5, false);

// Eventos pantallas táctiles
miCanvas_5.addEventListener('touchstart', empezarDibujo_5, false);
miCanvas_5.addEventListener('touchmove', dibujarLinea_5, false);


btn_guardar_5.onclick = async () => {
    // Convertir la imagen a Base64 y ponerlo en el enlace
    var tipo_molde =document.getElementById("modelo").value;
    const data = miCanvas_5.toDataURL("image/png");
    const fd_5 = new FormData();
    fd_5.append("imagen_5", data); // Se llama "imagen", en PHP lo recuperamos con $_POST["imagen"]
    const respuestaHttp = await fetch("funciones_hoja_intervencion/imagen_5.php?id_hoja_intervencion="+<?php echo $id_hoja_intervencion?>+"&tipo_molde="+tipo_molde, {
        method: "POST",
        body: fd_5,
    });
    const nombreImagenSubida = await respuestaHttp.json();
    console.log("La imagen ha sido enviada y tiene el nombre de: " + nombreImagenSubida);
};


// CANVAS 6

var btn_guardar_6=document.getElementById("btn_guardar_6");
var canvas_6 = document.getElementById("imagen_6");
var ctx_6 = canvas_6.getContext("2d");
var img_6 = new Image();
img_6.src = "<?php echo $nombre_img_6?>";
ctx_6.drawImage(img_6, 0, 0);
img_6.onload = function(){
    ctx_6.drawImage(img_6, 0, 0);
}

var miCanvas_6 = document.querySelector('#imagen_6');
var lineas_6 = [];
var correccionX_6 = 0;
var correccionY_6 = 0;
var pintarLinea_6 = false;
// Marca el nuevo punto
var nuevaPosicionX_6 = 0;
var nuevaPosicionY_6 = 0;

var posicion_6 = canvas_6.getBoundingClientRect()
correccionX_6 = posicion_6.x;
correccionY_6 = posicion_6.y;

canvas_6.width = 750;
canvas_6.height = 400;



function empezarDibujo_6 () {
    pintarLinea_6 = true;
lineas_6.push([]);
};

function guardarLinea_6() {
    lineas_6[lineas_6.length - 1].push({
        x: nuevaPosicionX_6,
        y: nuevaPosicionY_6
    });
}


function dibujarLinea_6 (event) {
    event.preventDefault();
    if (pintarLinea_6) {
        var ctx_6 = miCanvas_6.getContext('2d')
        // Estilos de linea
        ctx_6.lineJoin = ctx_6.lineCap = 'round';
        ctx_6.lineWidth = 2;
        // Color de la linea
        ctx_6.strokeStyle = '#FF0000';
        // Marca el nuevo punto
        if (event.changedTouches == undefined) {
            // Versión ratón
            nuevaPosicionX_6 = event.layerX;
            nuevaPosicionY_6 = event.layerY;
        } else {
            // Versión touch, pantalla tactil
            nuevaPosicionX_6 = event.changedTouches[0].pageX - correccionX_6;
            nuevaPosicionY_6 = event.changedTouches[0].pageY - correccionY_6;
        }
        // Guarda la linea
        guardarLinea_6();
        // Redibuja todas las lineas guardadas
        ctx_6.beginPath();
        lineas_6.forEach(function (segmento_6) {
            ctx_6.moveTo(segmento_6[0].x, segmento_6[0].y);
            segmento_6.forEach(function (punto_6, index_6) {
                ctx_6.lineTo(punto_6.x, punto_6.y);
            });
        });
        ctx_6.stroke();
    }
}


function pararDibujar_6 () {
    pintarLinea_6 = false;
    guardarLinea_6();
}
// Eventos raton
miCanvas_6.addEventListener('mousedown', empezarDibujo_6, false);
miCanvas_6.addEventListener('mousemove', dibujarLinea_6, false);
miCanvas_6.addEventListener('mouseup', pararDibujar_6, false);

// Eventos pantallas táctiles
miCanvas_6.addEventListener('touchstart', empezarDibujo_6, false);
miCanvas_6.addEventListener('touchmove', dibujarLinea_6, false);


btn_guardar_6.onclick = async () => {
    // Convertir la imagen a Base64 y ponerlo en el enlace
    var tipo_molde =document.getElementById("modelo").value;
    const data = miCanvas_6.toDataURL("image/png");
    const fd_6 = new FormData();
    fd_6.append("imagen_6", data); // Se llama "imagen", en PHP lo recuperamos con $_POST["imagen"]
    const respuestaHttp = await fetch("funciones_hoja_intervencion/imagen_6.php?id_hoja_intervencion="+<?php echo $id_hoja_intervencion?>+"&tipo_molde="+tipo_molde, {
        method: "POST",
        body: fd_6,
    });
    const nombreImagenSubida = await respuestaHttp.json();
    console.log("La imagen ha sido enviada y tiene el nombre de: " + nombreImagenSubida);
};



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