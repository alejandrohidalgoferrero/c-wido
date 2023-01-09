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
    $titulo_pagina= "Check rechazo estanqueidad";
    include("conexion.php");
     ?>
     
     <title><?php echo $titulo_pagina?></title>

    <?php 
    include('nav.php');
    $id_check_rechazo_estanqueidad=$_SESSION['id_check_rechazo_estanqueidad'];
    $orden=$_SESSION['orden'];

    ?>
<style>
.modal-lg {
    max-width: 80% !important;
}
</style>

<h1 align="center"><?php echo $titulo_pagina?></h1>

<!-- Auí introduciremos los contenidos que lleve la pagina -->
<?php 
    $consulta = "SELECT * FROM `check_rechazo_estanqueidades_registro` WHERE `id_check_rechazo_estanqueidad`='$id_check_rechazo_estanqueidad' AND `orden`='$orden' AND `id`=1";
    $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
    while ($row = mysqli_fetch_array($resultado)) {
        $fecha=$row['fecha'];
        $turno=$row['turno'];
        $inyectora=$row['inyectora'];
        $molde=$row['molde'];
        $tipo_pieza=$row['tipo_pieza'];
    }

    if (is_null($fecha)) {
        $fecha=date("Y-m-d");
        $hora=date("H:i:s");

        if(strtotime($hora)>=strtotime('00:00:00') and strtotime($hora)<=strtotime('05:59:59') ) 
        {
            $turno="Noche";
        } 
        if(strtotime($hora)>=strtotime('06:00:00') and strtotime($hora)<=strtotime('13:59:59') ) 
        {
            $turno="Mañana";
        } 
        if(strtotime($hora)>=strtotime('14:00:00') and strtotime($hora)<=strtotime('21:59:59') ) 
        {
            $turno="Tarde";
        } 
        if(strtotime($hora)>=strtotime('22:00:00') and strtotime($hora)<=strtotime('23:59:59') ) 
        {
            $turno="Noche";
        } 

    }
    $array_inyectoras=array(""=>"","Inyectora 1"=>"Inyectora 1","Inyectora 2"=>"Inyectora 2","Inyectora 3"=>"Inyectora 3","Inyectora 4"=>"Inyectora 4","Inyectora 5"=>"Inyectora 5","Inyectora 6"=>"Inyectora 6","Inyectora 7"=>"Inyectora 7","Inyectora 8"=>"Inyectora 8");
    $array_tipo_pieza=array(""=>"","HR13"=>"HR13","HR10"=>"HR10","HR12"=>"HR12");


    $array_moldes=array(""=>"");
    $con = mysqli_connect("10.217.144.35","dwido","d-widoMatriceria1","informe_buhler");
    $sql="SELECT  `molde` FROM `tabla_heavy_maintenance`";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)) {
        $array_moldes[$row['molde']]=$row['molde'];
    }
    mysqli_close($con);  

?>

<form id="form_datos" method="POST"></form>

<div class="container-fluid  mt-2 mb-2 pt-1 pb-1">
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <button class="btn font-weight-bold border border-dark btn-lg" name="btn_guardar" id="btn_guardar" value="" style="background-color:#28a745;" onclick="guardar_datos()"><i class='icofont-ui-check'></i></button>
    </div>
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="col justify-content-center mr-1 ml-1 mt-1 mb-1" >
            <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border border-dark rounded text-dark justify-content-center text-center" style="background-color:#E4E4E4;">
                <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >

                    <div class="col mr-1 ml-1">
                        <div class="d-inline-block mr-1 ml-1">
                            <label>
                                <strong>FECHA:</strong>
                            </label>
                        </div>
                        <div class="d-inline-block mr-1 ml-1">
                            <input type="date" class="form-control text-center" required form="form_datos"  id="fecha" name="fecha" value="<?php echo $fecha?>" oninput="btn_guardar_rojo();">
                        </div>
                    </div>
                    <div class="col mr-1 ml-1">
                        <div class="d-inline-block mr-1 ml-1">
                            <span>
                                <strong>TURNO:</strong>
                            </span>
                        </div>
                        <div class="d-inline-block mr-1 ml-1">
                            <select form="form_datos" class="form-control" required name="turno" id="turno" onchange="btn_guardar_rojo()">
                                <?php
                                    $default ="$turno";
                                    $states =array(""=>"","Mañana"=>"Mañana","Tarde"=>"Tarde","Noche"=>"Noche");
                                    foreach($states as $key=>$val) {
                                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                    }
                                ?>
                            </select>                        
                        </div>
                    </div>
                    <div class="col mr-1 ml-1">
                        <div class="d-inline-block mr-1 ml-1">
                            <span>
                                <strong>INYECTORA:</strong>
                            </span>
                        </div>
                        <div class="d-inline-block mr-1 ml-1">
                            <select form="form_datos" class="form-control" required name="inyectora" id="inyectora" onchange="btn_guardar_rojo()">
                                <?php
                                    $default ="$inyectora";
                                    $states =$array_inyectoras;
                                    foreach($states as $key=>$val) {
                                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col mr-1 ml-1">
                        <div class="d-inline-block mr-1 ml-1">
                            <span>
                                <strong>TIPO PIEZA:</strong>
                            </span>
                        </div>
                        <div class="d-inline-block mr-1 ml-1">
                            <select form="form_datos" class="form-control" required name="tipo_pieza" id="tipo_pieza" onchange="btn_guardar_rojo()">
                                <?php
                                    $default ="$tipo_pieza";
                                    $states =$array_tipo_pieza;
                                    foreach($states as $key=>$val) {
                                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                    }
                                ?>
                            </select>                              
                        </div>
                    </div>
                    <div class="col mr-1 ml-1">
                        <div class="d-inline-block mr-1 ml-1">
                            <span>
                                <strong>MOLDE:</strong>
                            </span>
                        </div>
                        <div class="d-inline-block mr-1 ml-1">
                            <select form="form_datos" class="form-control" required name="molde" id="molde" onchange="btn_guardar_rojo()">
                                <?php
                                    $default ="$molde";
                                    $states =$array_moldes;
                                    foreach($states as $key=>$val) {
                                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                    }
                                ?>
                            </select>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 


    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="col justify-content-center mr-1 ml-1 mt-1 mb-1" >
            <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border border-dark rounded text-dark justify-content-center text-center" style="background-color:#E4E4E4;">
                <div class="row align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center ">    
                    <h4><strong>CHECK INYECTORA (COOLING - VACÍO - SPRAY - PISTÓN)</strong></h4>
                </div>
                <div class="row align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center ">   
                    por ALTO % DE RECHAZO EN ESTANQUEIDAD (para cualquier tipo de circuito HP - BP - AGUA)
                </div>
                <div class="row d-flex  mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">                    
                    <div class="col justify-content-center mr-1 ml-1 mt-1 mb-1" >
                        <div class="row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">        
                            <table class="table table-striped" >
                                <tbody>

                        <?php
                                $contador=0;
                                $sql3 = "SELECT*FROM `check_rechazo_estanqueidades_registro` WHERE `id_check_rechazo_estanqueidad`='$id_check_rechazo_estanqueidad' AND `orden`='$orden'";
                                $consulta3 = mysqli_query($conexion, $sql3);
                                while ($row = mysqli_fetch_array($consulta3)) {
                                    $contador++;
                                    $estado[$contador]=$row['estado'];
                                    $texto_ko[$contador]=$row['texto_ko'];   
                                    $estado_individual=$row['estado'];

                                    switch ($estado_individual) {
                                        case "0":
                                            $checked_ok="";
                                            $checked_ko="checked";
                                            $texto_ko_individual=$texto_ko[$contador];
                                            break;
                                        case "1":
                                            $checked_ok="checked";
                                            $checked_ko="";  
                                            $texto_ko_individual="";                                          
                                            break;
                                        default:
                                            $checked_ok="";
                                            $checked_ko="";    
                                            $texto_ko_individual="";                                                                           
                                    }

                        ?>
                                    <tr>
                                        <td style="border: 1px solid black; vertical-align: middle;" >
                                            <?php echo $row['texto']?>
                                        </td>
                                        <td style="border: 1px solid black; vertical-align: middle;" >
                                            <?php
                                            if($row['estado_imagen']==0)
                                            {
                                                echo $row['subtexto'].'_imagen_'.$row['estado_imagen'];
                                            }
                                            else
                                            {
                                                echo '
                                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal_imagen_'.$row['estado_imagen'].'">'.$row['subtexto'].'</button>
                                                <div class="modal fade modal-task" id="modal_imagen_'.$row['estado_imagen'].'" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">
                                                                    <label id="titulo_modal_"></label>
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container-fluid  mt-2 mb-2 pt-1 pb-1">
                                                                    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
                                                                        <div class="col justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 text-dark text-center "> 
                                                                            <img src="imagenes/check_estanqueidad_'.$row['estado_imagen'].'.jpg" class="img-fluid" alt="Falta imagen">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ';
                                            }
                                            ?>
                                        </td> 
                                        <td style="border: 1px solid black; vertical-align: middle;" >
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" form="form_datos" type="radio" name="data_<?php echo $contador?>" id="radio_ok_<?php echo $contador?>" <?php echo $checked_ok?> value="1" onchange="mostrar_texto_ko(<?php echo $contador?>)">
                                                <label class="form-check-label text-success" for="radio_ok_<?php echo $contador?>">
                                                    <i class="icofont-verification-check"></i>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" form="form_datos" type="radio" name="data_<?php echo $contador?>" id="radio_ko_<?php echo $contador?>" <?php echo $checked_ko?> value="0" onchange="mostrar_texto_ko(<?php echo $contador?>)">
                                                <label class="form-check-label text-danger" for="radio_ko_<?php echo $contador?>">
                                                    <i class="icofont-close"></i>
                                                </label>
                                            </div>
                                        </td>
                                        <td style="border: 1px solid black; vertical-align: middle;" id="celda_texto_ko_<?php echo $contador?>" class="text-left">
                                            <?php echo $texto_ko_individual?>
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
</div>


<input type="hidden" form="form_datos"  id="contador" name="contador" value="<?php echo $contador?>">
<?php 
echo '<br>contador= '.$contador.'<br>';

?>
<script>

    var id_check_rechazo_estanqueidad = <?php echo $id_check_rechazo_estanqueidad?>;
    var orden = <?php echo $orden?>;


    var array_texto_ko = <?php echo json_encode($texto_ko) ?>;

    function guardar_datos()
    {
        btn_guardar_verde();

        var form = new FormData(document.getElementById("form_datos"));
        var contador = document.getElementById("contador").value;
        var num_a_revisar=0;

        $.ajax({
            url: 'funciones_check_rechazo_estanqueidad/guardar_datos_check_estanqueidad.php?id_check_rechazo_estanqueidad='+id_check_rechazo_estanqueidad+'&num_a_revisar='+contador+'&orden='+orden,
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
        boton_guardar.innerHTML  = "<i class='icofont-ui-check'></i>";   
    }

    function mostrar_texto_ko(contador) {
        btn_guardar_rojo();
        var celda_texto_ko = document.getElementById("celda_texto_ko_"+ contador);
        var valor_radio_ko = document.getElementById("radio_ko_"+ contador).checked;

        if(valor_radio_ko== true)
        {
            celda_texto_ko.innerHTML=array_texto_ko[contador];
        }
        else
        {
            celda_texto_ko.innerHTML="";

        }
    }
</script>
    <!-- Footer -->
    <?php echo file_get_contents('footer.php');?>
    <!-- Footer -->

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

</body>
</html>