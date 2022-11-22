<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="http://localhost/D-WIDO/css/bootstrap.min.css" rel="stylesheet">
     <title>App elementos elevación</title>
          
</head>

<body style="background-color: #D8F5CA" class="text-muted">

   <!-- Nav desde aqui -->
<?php
    $titulo_pagina= "App elementos elevación";
    include("conexion.php");
    $sql="UPDATE tabla_navegador SET uso = '0'";
    $consulta = mysqli_query($conexion, $sql);

     $sql="UPDATE tabla_navegador SET uso = '1' WHERE tabla_navegador.titulo = '$titulo_pagina'";
     $consulta = mysqli_query($conexion, $sql);

    $ip="LOCALHOST";

    include('nav.php');


    if(isset($_POST['orden']))
    {
    $orden=$_POST['orden'];
    session_start();
    $_SESSION['orden']=$orden;
    }
    else
    {
    session_start();
    $orden=$_SESSION['orden'];
    }
    

    $consulta = "SELECT * FROM `check_balancines_registro` WHERE `orden`='$orden' AND  `id`='1'";
    $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));

    while ($row = mysqli_fetch_array($resultado)) {
    $fecha=$row['fecha'];
    $turno=$row['turno'];
    $operacion=$row['operacion'];
    $operario=$row['operario'];
    $puente_grua=$row['puente_grua'];
    $linea=$row['linea'];
    $carga_maxima= $row['carga_maxima'];
    $uet_= $row['uet'];
    $comentarios= $row['comentarios'];
    }

    $row['id']=1;
    $consulta = "SELECT * FROM `check_balancines_registro` WHERE `orden`='$orden'";
    $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));

    while ($row = mysqli_fetch_array($resultado)) {

      switch ($row['conformidad']) {
        case "OK":
          $check_conformidad_1[$row['id']]="checked";
          $check_conformidad_2[$row['id']]="";
          break;

        case "NOK":
          $check_conformidad_1[$row['id']]="";
          $check_conformidad_2[$row['id']]="checked";
          break;
        case "":
          $check_conformidad_1[$row['id']]="";
          $check_conformidad_2[$row['id']]="";
          break;
      }


    }

    if($fecha!=""){}else{$fecha=date("Y-m-d");}
    if($turno!=""){}
    else
    {
      $hora=date("H:i:s");
      $turno="";
      if(strtotime($hora)>=strtotime('00:00:00') and strtotime($hora)<=strtotime('05:59:59') ) {$turno="Noche";} 
      if(strtotime($hora)>=strtotime('06:00:00') and strtotime($hora)<=strtotime('13:59:59') ) {$turno="Mañana";} 
      if(strtotime($hora)>=strtotime('14:00:00') and strtotime($hora)<=strtotime('21:59:59') ) {$turno="Tarde";} 
      if(strtotime($hora)>=strtotime('22:00:00') and strtotime($hora)<=strtotime('23:59:59') ) {$turno="Noche";} 
    }

    if($operario!=""){}else{$operario=$nombrecompleto;}
    if($uet_!=""){}else{$uet_=$uet;}



    ?>
    
    <!-- Nav hasta aqui -->

<form action="app_elementos_elevacion_check_balancines_support.php" method="POST" id="formulario">
  <h1 align="center">CHECK BALANCINES</h1>
  <br>

  <font size="3" face="Arial">  
  <div align="center" style="position:relative; top:0px;">               <!-- en este contenedor iran los botones de añadir cerrar modificar una OT-->
    <button type="submit" class="btn btn-primary">Guardar</button>           
  </div>  
  <br>
  <br>          

<div class="col">
<font size="2" face="Arial">
    <div class="m-auto pt-3 pb-3 pl-3 pr-3 " style="background-color:#ECECEC; color: black">
      <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 ">
        <div class="col">
          <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 ">
            <div align="center" class="col col-md-auto mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark ">
                <input class="form-control" style="width: 100%;"type="date" required name="fecha" id="fecha" value="<?php echo $fecha?>">
            </div>
            <div align="center" class="col col-md-auto mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark">
                <select class="form-control" placeholder="Turno" required style="width: 100%;" type="text" name="turno" id="turno">
                  <?php 
                  $default = "$turno";
                  $states = array(""=>"", "Mañana"=>"Mañana", "Tarde"=>"Tarde","Noche"=>"Noche");
                  foreach($states as $key=>$val) {
                      echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                  }
                  ?>
                </select>  
            </div>
            <div align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark">
              <input class="form-control" style="width: 100%;"type="text" name="operario" required id="operario" value="<?php echo $operario?>">
            </div>
            <div align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark">
            <input class="form-control" style="width: 100%;"type="text" name="uet" id="uet" value="<?php echo $uet_?>">
            </div>
          </div>
          <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 ">
            <div align="center" class="col col-md-auto mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark ">
              <input class="form-control" style="width: 100%;"type="text" placeholder="Linea" name="linea" id="linea" value="<?php echo $linea?>">
            </div>
            <div align="center" class="col col-md-auto mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark">
              <input class="form-control" style="width: 100%;"type="text" placeholder="Operación" name="operacion" id="operacion" value="<?php echo $operacion?>">
            </div>
            <div align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark">
              <select class="form-control" style="width: 100%;" required type="text" name="puente_grua" id="puente_grua">
                  <?php 
                  $default = "$puente_grua";
                  $states = array("Puente grua"=>"Puente grua", "Puente grua 1"=>"Puente grua 1", "Puente grua 2"=>"Puente grua 2","Puente grua 3"=>"Puente grua 3","Puente grua 4"=>"Puente grua 4","Puente grua 5"=>"Puente grua 5");
                  foreach($states as $key=>$val) {
                      echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                  }
                  ?>
                </select>  
            </div>
            <div align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark">
              <input class="form-control" style="width: 100%;"type="text" placeholder="Carga máxima" name="carga_maxima" id="carga_maxima" value="<?php echo $carga_maxima?>">
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 ">
        <div class="col">
          <div class="row justify-content-center mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 ">
            <img src="imagenes/balancines_1.jpg" class="img-fluid">
          </div>
        </div>
      </div>
      <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 ">
        <div class="col">
          <div class="row justify-content-center mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 ">
            <font size="2" face="Arial">
            <table style="text-align: center;" align="center" border="1"class="table  table-bordered ">
                <thead class="thead-dark">
                  <tr>
                    <th colspan="4">REALIZAR CHECK UNA VEZ AL DÍA ANTES DE SU USO</td>
                    <th>CONFORMIDAD </td>
                  </tr>
                </thead>
                <tbody>
                  <tr> 
                    <td  style="vertical-align: middle;"><label><strong>1. Identificación</strong></label></td>
                    <td  style="vertical-align: middle;"><label>Placa del fabricante legible</label></td>
                    <td  class="bg-success" style="vertical-align: middle;"><img src="imagenes/balancines_1_ok.jpg" alt="falta balancines_1_ok.jpg " class="img-fluid"></td>
                    <td  class="bg-danger" style="vertical-align: middle;"><img src="imagenes/balancines_1_1_nok.jpg" alt="falta balancines_1_1_nok.jpg " class="img-fluid"></td>
                    <td  style="vertical-align: middle;">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox1_1" name="conformidad_1" value="OK"  <?php echo $check_conformidad_1[1]?>>
                        <label class="form-check-label" for="inlineCheckbox1_1">OK</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox2_1" name="conformidad_1" value="NOK" <?php echo $check_conformidad_2[1]?>>
                        <label class="form-check-label" for="inlineCheckbox2_1">No OK</label>
                      </div>
                    </td>
                  </tr>
                  <tr> 
                    <td  rowspan="2" style="vertical-align: middle;"><label><strong>2. Estado general</strong></label></td>
                    <td  style="vertical-align: middle;"><label>Todos los tornillos están colocados</label></td>
                    <td  rowspan="2" class="bg-success" style="vertical-align: middle;"><img src="imagenes/balancines_2_ok.jpg" alt="falta balancines_2_ok.jpg " class="img-fluid"></td>
                    <td  class="bg-danger" style="vertical-align: middle;"><img src="imagenes/balancines_2_1_nok.jpg" alt="falta balancines_2_1_nok.jpg " class="img-fluid">K</td>
                    <td  style="vertical-align: middle;">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox1_2" name="conformidad_2" value="OK" <?php echo $check_conformidad_1[2]?>>
                        <label class="form-check-label" for="inlineCheckbox1_2">OK</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox2_2" name="conformidad_2" value="NOK" <?php echo $check_conformidad_2[2]?>>
                        <label class="form-check-label" for="inlineCheckbox2_2">No OK </label>
                      </div>
                    </td>
                  </tr>
                  <tr> 
                    <td  style="vertical-align: middle;"><label>Bastidor sin deformaciones, golpes, corrosión, fisuras ni grietas</label></td>

                    <td  class="bg-danger" style="vertical-align: middle;"><img src="imagenes/balancines_2_2_nok.jpg" alt="falta balancines_2_2_nok.jpg " class="img-fluid"></td>
                    <td  style="vertical-align: middle;">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox1_3" name="conformidad_3" value="OK"  <?php echo $check_conformidad_1[3]?>>
                        <label class="form-check-label" for="inlineCheckbox1_3">OK</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox2_3" name="conformidad_3" value="NOK" <?php echo $check_conformidad_2[3]?>>
                        <label class="form-check-label" for="inlineCheckbox2_3">No OK</label>
                      </div>
                    </td>
                  </tr>
                  <tr> 
                    <td  style="vertical-align: middle;"><label><strong>3. Orejeta de tiro</strong></label></td>
                    <td  style="vertical-align: middle;"><label>Sin desgaste aparente, deformaciones o golpes</label></td>
                    <td  class="bg-success" style="vertical-align: middle;"><img src="imagenes/balancines_3_ok.jpg" alt="falta balancines_3_ok.jpg " class="img-fluid"></td>
                    <td  class="bg-danger" style="vertical-align: middle;"><img src="imagenes/balancines_3_1_nok.jpg" alt="falta balancines_3_1_nok.jpg " class="img-fluid"></td>
                    <td  style="vertical-align: middle;">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox1_4" name="conformidad_4" value="OK"  <?php echo $check_conformidad_1[4]?>>
                        <label class="form-check-label" for="inlineCheckbox1_4">OK</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox2_4" name="conformidad_4" value="NOK" <?php echo $check_conformidad_2[4]?>>
                        <label class="form-check-label" for="inlineCheckbox2_4">No OK</label>
                      </div>
                    </td>
                  </tr>
                  <tr> 
                    <td  rowspan="2" style="vertical-align: middle;"><label><strong>4. Carro</strong></label></td>
                    <td  style="vertical-align: middle;"><label>Funciona y desliza correctamente</label></td>
                    <td  rowspan="2"  class="bg-success" style="vertical-align: middle;"><img src="imagenes/balancines_4_ok.jpg" alt="falta balancines_4_ok.jpg " class="img-fluid"></td>
                    <td  class="bg-danger" style="vertical-align: middle;"><img src="imagenes/balancines_4_1_nok.jpg" alt="falta balancines_4_1_nok.jpg " class="img-fluid"></td>
                    <td  style="vertical-align: middle;">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox1_5" name="conformidad_5" value="OK"  <?php echo $check_conformidad_1[5]?>>
                        <label class="form-check-label" for="inlineCheckbox1_5">OK</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox2_5" name="conformidad_5" value="NOK" <?php echo $check_conformidad_2[5]?>>
                        <label class="form-check-label" for="inlineCheckbox2_5">No OK</label>
                      </div>
                    </td>
                  </tr>
                  <tr> 
                    <td  style="vertical-align: middle;"><label>Sin desgaste aparente, deformaciones o golpes</label></td>
                    <td  class="bg-danger" style="vertical-align: middle;"><img src="imagenes/balancines_4_2_nok.jpg" alt="falta balancines_4_2_nok.jpg " class="img-fluid"></td>
                    <td  style="vertical-align: middle;">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox1_6" name="conformidad_6" value="OK"  <?php echo $check_conformidad_1[6]?>>
                        <label class="form-check-label" for="inlineCheckbox1_6">OK</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox2_6" name="conformidad_6" value="NOK" <?php echo $check_conformidad_2[6]?>>
                        <label class="form-check-label" for="inlineCheckbox2_6">No OK</label>
                      </div>
                    </td>
                  </tr>
                  <tr> 
                    <td  rowspan="4" style="vertical-align: middle;"><label><strong>5. Cancamo giratorio</strong></label></td>
                    <td  style="vertical-align: middle;"><label>Sin desgaste aparente, deformacion, fisuras, grietas ni corrosión</label></td>
                    <td  rowspan="4" class="bg-success" style="vertical-align: middle;"><img src="imagenes/balancines_5_ok.jpg" alt="falta balancines_5_ok.jpg " class="img-fluid"></td>
                    <td  class="bg-danger" style="vertical-align: middle;"><img src="imagenes/balancines_5_1_nok.jpg" alt="falta balancines_5_1_nok.jpg " class="img-fluid"></td>
                    <td  style="vertical-align: middle;">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox1_7" name="conformidad_7" value="OK"  <?php echo $check_conformidad_1[7]?>>
                        <label class="form-check-label" for="inlineCheckbox1_7">OK</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox2_7" name="conformidad_7" value="NOK" <?php echo $check_conformidad_2[7]?>>
                        <label class="form-check-label" for="inlineCheckbox2_7">No OK</label>
                      </div>
                    </td>
                  </tr>
                  <tr> 
                    <td  style="vertical-align: middle;"><label>Alfiler de seguridad colocado</label></td>
                    <td  class="bg-danger" style="vertical-align: middle;"><img src="imagenes/balancines_5_2_nok.jpg" alt="falta balancines_5_2_nok.jpg " class="img-fluid"></td>
                    <td  style="vertical-align: middle;">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox1_8" name="conformidad_8" value="OK" <?php echo $check_conformidad_1[8]?>>
                        <label class="form-check-label" for="inlineCheckbox1_8">OK</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox2_8" name="conformidad_8" value="NOK" <?php echo $check_conformidad_2[8]?>>
                        <label class="form-check-label" for="inlineCheckbox2_8">No OK</label>
                      </div>
                    </td>
                  </tr>
                  <tr> 
                    <td  style="vertical-align: middle;"><label>La base del cáncamo apoya completamente</label></td>
                    <td  class="bg-danger" style="vertical-align: middle;"><img src="imagenes/balancines_5_3_nok.jpg" alt="falta balancines_5_3_nok.jpg " class="img-fluid">K</td>
                    <td  style="vertical-align: middle;">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox1_9" name="conformidad_9" value="OK"  <?php echo $check_conformidad_1[9]?>>
                        <label class="form-check-label" for="inlineCheckbox1_9">OK</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox2_9" name="conformidad_9" value="NOK" <?php echo $check_conformidad_2[9]?>>
                        <label class="form-check-label" for="inlineCheckbox2_9">No OK</label>
                      </div>
                    </td>
                  </tr>
                  <tr> 
                    <td  style="vertical-align: middle;"><label>Suavidad de giro del cáncamo y anilla</label></td>
                    <td  class="bg-danger" style="vertical-align: middle;"><img src="imagenes/balancines_5_4_nok.jpg" alt="falta balancines_5_4_nok.jpg " class="img-fluid"></td>
                    <td  style="vertical-align: middle;">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox1_10" name="conformidad_10" value="OK"  <?php echo $check_conformidad_1[10]?>>
                        <label class="form-check-label" for="inlineCheckbox1_10">OK</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox2_10" name="conformidad_10" value="NOK" <?php echo $check_conformidad_2[10]?>>
                        <label class="form-check-label" for="inlineCheckbox2_10">No OK</label>
                      </div>
                    </td>
                  </tr>
                  <tr> 
                    <td  rowspan="2" style="vertical-align: middle;"><label><strong>6. Terminal del cáncamo</strong></label></td>
                    <td  style="vertical-align: middle;"><label>Sin desgaste aparente, deformacion, fisuras, grietas ni corrosión</label></td>
                    <td  rowspan="2" class="bg-success" style="vertical-align: middle;"><img src="imagenes/balancines_6_ok.jpg" alt="falta balancines_6_ok.jpg " class="img-fluid"></td>
                    <td  class="bg-danger" style="vertical-align: middle;"><img src="imagenes/balancines_6_1_nok.jpg" alt="falta balancines_6_1_nok.jpg " class="img-fluid"></td>
                    <td  style="vertical-align: middle;">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox1_11" name="conformidad_11" value="OK"  <?php echo $check_conformidad_1[11]?>>
                        <label class="form-check-label" for="inlineCheckbox1_11">OK</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox2_11" name="conformidad_11" value="NOK" <?php echo $check_conformidad_2[11]?>>
                        <label class="form-check-label" for="inlineCheckbox2_11">No OK</label>
                      </div>
                    </td>
                  </tr>
                  <tr> 
                    <td  style="vertical-align: middle;"><label>Eje de sujección con tuerca y pasador de seguridad</label></td>
                    <td  class="bg-danger" style="vertical-align: middle;"><img src="imagenes/balancines_6_2_nok.jpg" alt="falta balancines_6_2_nok.jpg " class="img-fluid"></td>

                    <td  style="vertical-align: middle;">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox1_12" name="conformidad_12" value="OK"  <?php echo $check_conformidad_1[12]?>>
                        <label class="form-check-label" for="inlineCheckbox1_12">OK</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox2_12" name="conformidad_12" value="NOK" <?php echo $check_conformidad_2[12]?>>
                        <label class="form-check-label" for="inlineCheckbox2_12">No OK</label>
                      </div>
                    </td>
                  </tr>
                  <tr> 
                    <td  style="vertical-align: middle;"><label><strong>7. Cadena</strong></label></td>
                    <td  style="vertical-align: middle;"><label>Eslabones no doblados, sin mellas, ni corrosión, ni disminución del diámetro aparente</label></td>
                    <td  class="bg-success" style="vertical-align: middle;"><img src="imagenes/balancines_7_ok.jpg" alt="falta balancines_7_ok.jpg " class="img-fluid"></td>
                    <td  class="bg-danger" style="vertical-align: middle;"><img src="imagenes/balancines_7_1_nok.jpg" alt="falta balancines_7_1_nok.jpg " class="img-fluid"></td>
                    <td  style="vertical-align: middle;">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox1_13" name="conformidad_13" value="OK"  <?php echo $check_conformidad_1[13]?>>
                        <label class="form-check-label" for="inlineCheckbox1_13">OK</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox2_13" name="conformidad_13" value="NOK" <?php echo $check_conformidad_2[13]?>>
                        <label class="form-check-label" for="inlineCheckbox2_13">No OK</label>
                      </div>
                    </td>
                  </tr>
                  <tr> 
                    <td  rowspan="2" style="vertical-align: middle;"><label><strong>8. Gancho</strong></label></td>
                    <td  style="vertical-align: middle;"><label>Sin desgaste aparente, deformacion, fisuras, grietas ni corrosión</label></td>
                    <td rowspan="2" class="bg-success" style="vertical-align: middle;"><img src="imagenes/balancines_8_ok.jpg" alt="falta balancines_8_ok.jpg " class="img-fluid"></td>
                    <td  class="bg-danger" style="vertical-align: middle;"><img src="imagenes/balancines_8_1_nok.jpg" alt="falta balancines_8_1_nok.jpg " class="img-fluid"></td>

                    <td  style="vertical-align: middle;">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox1_14" name="conformidad_14" value="OK"  <?php echo $check_conformidad_1[14]?>>
                        <label class="form-check-label" for="inlineCheckbox1_14">OK</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox2_14" name="conformidad_14" value="NOK" <?php echo $check_conformidad_2[14]?>>
                        <label class="form-check-label" for="inlineCheckbox2_14">No OK</label>
                      </div>
                    </td>
                  </tr>
                  <tr> 
                    <td  style="vertical-align: middle;"><label>Pestillo de seguridad en correcto estado</label></td>
                    <td  class="bg-danger" style="vertical-align: middle;"><img src="imagenes/balancines_8_2_nok.jpg" alt="falta balancines_8_2_nok.jpg " class="img-fluid"></td>

                    <td  style="vertical-align: middle;">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox1_15" name="conformidad_15" value="OK"  <?php echo $check_conformidad_1[15]?>>
                        <label class="form-check-label" for="inlineCheckbox1_15">OK</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox2_15" name="conformidad_15" value="NOK" <?php echo $check_conformidad_2[15]?>>
                        <label class="form-check-label" for="inlineCheckbox2_15">No OK</label>
                      </div>
                    </td>
                  </tr>
                  <tr rowspan="2">
                    <td colspan="4">
                      <label class="form-check-label float-left"><strong>INDICACIONES DE SEGURIDAD:</strong></label>
                      <br>
                      <label class="form-check-label float-left">-> Asegurar que la carga sujeta con cáncamos está equilibrada en todo momento.</label>
                      <br>
                      <label class="form-check-label float-left">-> SI SE DETECTA ALGUN PUNTO NOK, INFORMAR INMEDIATAMENTE AL JU.</label>
                      <br>
                      <label class="form-check-label float-left">-> NADA NI NADIE DEBE PERMANECER BAJO LA CARGA DURANTE LA ACTIVIDAD.</label>
                      <br>
                      <label class="form-check-label float-left">-> PROHIBIDO ESTAR A MENOS DE 6 METROS DE LA CARGA SUSPENDIDA.</label>
                      <br>
                      <label class="form-check-label float-left">-> PROHIBIDO UTILIZAR CÁNCAMOS SIN MARCAR LA CARGA O CON MARCADO ILEGIBLE POR RIESGO DE ACCIDENTE GRAVE POR ROTURA.</label>
                      <br>
                      <label class="form-check-label float-left">-> PROHIBIDO CONTACTO DE PRODUCTOS QUÍMICOS CON CÁNCAMOS, PELIGRO DE CORROSION Y RIESGO DE ACCIDENTE POR ROTURAA.</label>
                    </td>
                  </tr> 
                </tbody>
              </table>            
            </font>
          </div>
        </div>
      </div>
    </div>



</form>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="js/bootstrap.js"></script>

</body>
</html>