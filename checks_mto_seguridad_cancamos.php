<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="js/icofont/icofont.min.css">
     <script src="js/jquery.min.js"></script>

     <title>App elementos elevación</title>
          
</head>

<body style="background-color: #D8F5CA" class="text-muted">
<style>
table.table-bordered{
    border:1px solid blue;
    margin-top:20px;
  }
table.table-bordered > thead > tr > th{
    border:1px solid blue;
}
table.table-bordered > tbody > tr > td{
    border:1px solid blue;
}
</style>
   <!-- Nav desde aqui -->
<?php

    $titulo_pagina= "Mantenimiento ";
    include("conexion.php");
    include('nav.php');
    session_start();
    $id_check=$_SESSION['id_check'];


    $consulta = "SELECT * FROM `checks_mto_seguridad_registro` WHERE `id_check`='$id_check'";
    $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));

    while ($row = mysqli_fetch_array($resultado)) {
    $fecha=$row['fecha'];
    $turno=$row['turno'];
    $tipo_check=$row['tipo_check'];
    $elemento=$row['elemento'];
    $comentarios=$row['comentarios'];
    $estado_check= $row['estado_check'];
    }


    $nombre_tabla_registro='checks_mto_seguridad_'.$tipo_check.'_registro';

    if($fecha!=""){}else{$fecha=date("Y-m-d");}
    if($turno!=""){}
    else
    {
      $hora=date("H:i:s");
      $turno="";
      if(strtotime($hora)>=strtotime('00:00:00') and strtotime($hora)<=strtotime('05:59:59') ) {$turno="NOCHE";} 
      if(strtotime($hora)>=strtotime('06:00:00') and strtotime($hora)<=strtotime('13:59:59') ) {$turno="MAÑANA";} 
      if(strtotime($hora)>=strtotime('14:00:00') and strtotime($hora)<=strtotime('21:59:59') ) {$turno="TARDE";} 
      if(strtotime($hora)>=strtotime('22:00:00') and strtotime($hora)<=strtotime('23:59:59') ) {$turno="NOCHE";} 
    }

    ?>
    
    <!-- Nav hasta aqui -->

<form action="app_elementos_elevacion_check_support.php" id="form_datos"></form>

    <h1 align="center">CHECK <?php echo strtoupper($tipo_check)?></h1>

    <div class="container-fluid justify-content-center">
        <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border border-dark rounded text-dark" style="background-color:#E4E4E4;">
            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    <button class="btn font-weight-bold border border-dark btn-lg" name="btn_guardar" id="btn_guardar"  style="background-color:#28a745;" onclick="guardar_datos()"><i class='icofont-ui-check'></i></button>
                </div>
            </div>
            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
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
                                    <strong>ELEMENTO:</strong>
                                </div>
                            </div>
                            <input type="text" form="form_datos" name="elemento" id="elemento" class="form-control" value="<?php echo $elemento?>" onkeydown="btn_guardar_rojo()">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around ">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                        <div class="input-group border border-dark rounded">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <strong>Comentarios:</strong>
                                </div>
                            </div>
                            <textarea form="form_datos" name="comentarios" id="comentarios" rows="1" class="form-control" onkeydown="btn_guardar_rojo()"><?php echo $comentarios?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <table border="1" class="table table-bordered border-dark table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" style="width: 50%" colspan="2">Realizar antes y despues de su uso</th>
                            <th class="text-center">Antes de usar</th>
                            <th class="text-center">Despues de usar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador=1;  
                        $consulta = "SELECT * FROM $nombre_tabla_registro WHERE `id_check`='$id_check'";
                        $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));
                        while ($row = mysqli_fetch_array($resultado)) {
                            switch ($row['antes_usar']) {
                                case "OK":
                                  $antes_usar_ok="checked";
                                  $antes_usar_ko="";
                                  break;
                        
                                case "NOK":
                                  $antes_usar_ok="";
                                  $antes_usar_ko="checked";
                                  break;
                                case "":
                                  $antes_usar_ok="";
                                  $antes_usar_ko="";
                                  break;
                              }

                              switch ($row['despues_usar']) {
                                case "OK":
                                  $despues_usar_ok="checked";
                                  $despues_usar_ko="";
                                  break;
                        
                                case "NOK":
                                  $despues_usar_ok="";
                                  $despues_usar_ko="checked";
                                  break;
                                case "":
                                  $despues_usar_ok="";
                                  $despues_usar_ko="";
                                  break;
                              }
                        ?>
                        <tr>
                            <td class="text-left" style="vertical-align: middle;">
                                <label>
                                    <strong><?php echo $row['pregunta']?></strong>
                                </label>
                            </td>
                            <?php
                                if($row['colspan_img']!="0")
                                {
                                echo'
                                <td rowspan="'.$row['colspan_img'].'" style="vertical-align: middle;">';
                                
                                    if($row['nombre_imagen']!="")
                                    {
                                    echo'
                                    <img src="app_medios_elevacion_archivos/'.$row['nombre_imagen'].'.jpg" class="img-fluid" alt="Falta imagen '.$row['nombre_imagen'].'">';
                                    }
                                echo'
                                </td>';
                                }
                            ?>
                            <td style="vertical-align: middle;">
                                <div class="d-flex justify-content-center">
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" form="form_datos" type="radio" id="antes_usar_1_<?php echo $row['id']?>" name="antes_usar_<?php echo $row['id']?>" value="OK" <?php echo $antes_usar_ok?> onchange="btn_guardar_rojo()">
                                      <label class="form-check-label" for="antes_usar_1_<?php echo $row['id']?>">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" form="form_datos" type="radio" id="antes_usar_2_<?php echo $row['id']?>" name="antes_usar_<?php echo $row['id']?>" value="NOK" <?php echo $antes_usar_ko?> onchange="btn_guardar_rojo()">
                                      <label class="form-check-label" for="antes_usar_2_<?php echo $row['id']?>">No OK</label>
                                    </div>
                                </div>
                            </td>
                            <td style="vertical-align: middle;">
                                <div class="d-flex justify-content-center">
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" form="form_datos" type="radio" id="despues_usar_1_<?php echo $row['id']?>" name="despues_usar_<?php echo $row['id']?>" value="OK" <?php echo $despues_usar_ok?> onchange="btn_guardar_rojo()">
                                      <label class="form-check-label" for="despues_usar_1_<?php echo $row['id']?>">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" form="form_datos" type="radio" id="despues_usar_2_<?php echo $row['id']?>" name="despues_usar_<?php echo $row['id']?>" value="NOK" <?php echo $despues_usar_ko?> onchange="btn_guardar_rojo()">
                                      <label class="form-check-label" for="despues_usar_2_<?php echo $row['id']?>">No OK</label>
                                    </div>
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


    <script>

        var id_check = <?php echo $id_check?>;
        var tipo_check = '<?php echo $tipo_check?>';

        function guardar_datos()
            {
                btn_guardar_verde();
                var form = new FormData(document.getElementById("form_datos"));
            
                $.ajax({
                    url: 'funciones_check_mto/guardar_datos_check_'+tipo_check+'.php?id_check='+id_check,
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
    </script>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="js/bootstrap.js"></script> -->

</body>
</html>