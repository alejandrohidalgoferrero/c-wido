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

  <!-- Nav desde aqui -->
  <?php
     $titulo_pagina= "Mantenimiento ";
     include("conexion.php");
    $sql="UPDATE tabla_navegador SET uso = '0'";
    $consulta = mysqli_query($conexion, $sql);

     $sql="UPDATE tabla_navegador SET uso = '1' WHERE tabla_navegador.titulo = '$titulo_pagina'";
     $consulta = mysqli_query($conexion, $sql);
     ?>
     
     <title><?php echo $titulo_pagina?></title>

    <?php 
    $ip="LOCALHOST";
    session_start();
    $num_ra=$_SESSION['num_ra'];

    include('nav.php')?>


<h1 align="center">Nueva Evaluación de Riesgos.</h1>


<!-- Auí introduciremos los contenidos que lleve la pagina -->
<div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center ">
  <form action="RA guardar datos.php" method="POST"> 
                     
 </div>
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center ">
        <div class="col-5 pt-2 pb-2 pl-2 pr-2 justify-content-center text-center text-dark border rounded" style= "background-color:#E0F4F2;">
            <label align="center" class="ml-1 mr-1 pl-1 pr-1" for="">
                <strong>Actividad / Area / Maquina</strong>
            </label>               
            <input type="text" name="data_1" required id="data_1" value=""> 
        </div>             
    </div>
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">         
        <div align="center" class="col-12 pt-2 pb-2 pl-2 pr-2 " style= "border:muted 3px solid">               
            <div class="row mt-1 mb-1 ml-10 mr-10 pt-1 pb-1 pl-10 pr-10 justify-content-center">
                <div align="center"class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">
                    <div class="row mt-1 mb-1 ml-1 mr-1 text-center text-dark" >
                        <div class="col ml-1 mr-1 ">
                            <label class="ml-1 mr-1 pl-1 pr-1" for="molde">
                                <strong>Personal Expuesto</strong>
                            </label>
                        </div>
                    </div>


                    <?php 
                    $contador=2;
                    $sql = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`num_ra` = '$num_ra' AND `ra_registro`.`id` > 1 AND `ra_registro`.`id` < 9";
                    $consulta = mysqli_query($conexion, $sql);

                    while ($row = mysqli_fetch_array($consulta)) {
                    ?>
                

                    <div class="row mt-1 mb-1 ml-1 mr-1 text-center text-dark" >
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="data_<?php echo $contador?>" id="data_<?php echo $contador?>">
                            <label class="form-check-label" for="data_<?php echo $contador?>">
                              <?php echo $row['nombre'];?>  
                            </label>
                        </div>
                    </div>
                    <?php 
                    $contador++;
                    }
                    ?>
               
                    <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                        <div class="col ml-1 mr-1" >
                            <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                                Nº Personas Expuestas
                                <input type="text" name="data_9" id="data_9"  value="">  
                            </label>
                        </div>
                    </div>
                </div>

                <div align="center"class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">
                    <div class="row mt-1 mb-1 ml-1 mr-1 text-center text-dark" >
                        <div class="col ml-1 mr-1 ">
                            <label class="ml-1 mr-1 pl-1 pr-1" for="molde">
                                <strong>Circunstancias</strong>
                            </label>
                        </div>
                    </div>


                    <?php 
                    $contador=10;
                    $sql = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`num_ra` = '$num_ra' AND `ra_registro`.`id` > 9 AND `ra_registro`.`id` < 18";
                    $consulta = mysqli_query($conexion, $sql);

                    while ($row = mysqli_fetch_array($consulta)) {
                    ?>



                    <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                        <div class="form-check" align="left">
                            <input class="form-check-input" type="checkbox" value="1" name="data_<?php echo $contador?>" id="data_<?php echo $contador?>">
                            <label class="form-check-label" for="data_<?php echo $contador?>">
                                <?php echo $row['nombre'];?>  
                            </label>
                        </div>
                    </div>
                    <?php 
                    $contador++;
                    }
                    ?>

                </div>
                <div align="center"class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">
                    <div class="row mt-1 mb-1 ml-1 mr-1 text-center text-dark" >
                        <div class="col ml-1 mr-1 ">
                            <label class="ml-1 mr-1 pl-1 pr-1" for="molde">
                                <strong>Motivo de la Evaluación</strong>
                            </label>
                        </div>
                    </div>
                    <?php 
                    $contador=18;
                    $sql = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`num_ra` = '$num_ra' AND `ra_registro`.`id` > 17 AND `ra_registro`.`id` < 24";
                    $consulta = mysqli_query($conexion, $sql);

                    while ($row = mysqli_fetch_array($consulta)) {
                    ?>
        
                    <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                        <div class="form-check" align="left">
                            <input class="form-check-input" type="checkbox" value="1" name="data_<?php echo $contador?>" id="data_<?php echo $contador?>">
                            <label class="form-check-label" for="data_<?php echo $contador?>">
                                <?php echo $row['nombre'];?>  
                            </label>
                        </div>
                    </div>
                    <?php 
                    $contador++;
                    }
                    ?>
                </div>          
            <div align="center"class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">
                <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col ml-1 mr-1" >
                        <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            Fecha de la Evaluación:
                            <input type="date" name="data_24" id="data_24"  value=""> 
                        </label>
                    </div>
                </div>
                <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col ml-1 mr-1" >
                        <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            Información Complementaria:
                            <textarea class="form-control" name="data_25" id="data_25" rows="1" cols="50"></textarea>
 
                        </label>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
<div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center ">                     
</div>

<div align="center">
<div align="center"class="col-11 mt-1 mb-1 ml-1 mr-1 pt-3 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">
    <h2>Identificación de Peligros Potenciales</h2>        
    (Considerar solamente los peligros que razonablemente puedan causar un daño significativo)
    <div class="container">
        <div class="row">
            <div class="col"><h5>Probabilidad:</h5></div>
            <div class="col"><h5>Improbable - 1</h5></div>            
            <div class="col"><h5>Posible - 2</h5></div>            
            <div class="col"><h5>Probable - 3</h5></div>            
            <div class="col"><h5>Muy Probable - 4</h5></div>            
            <div class="col"><h5>Seguro - 5</h5></div>            
        </div>
        <div class="row">
            <div class="col"><h5>Gravedad:</h5></div>
            <div class="col"><h5>Ninguna - 1</h5></div>            
            <div class="col"><h5>Leve - 2</h5></div>
            <div class="col"><h5>Moderada - 3</h5></div>
            <div class="col"><h5>Alta - 4</h5></div>
            <div class="col"><h5>Extrema - 5</h5></div>
        </div>
        <br>
    </div>
    
    <font size="2" face="Arial">  
<table style="text-align: center;" align="center" border="1"class="table table-striped table-sm ">
    <thead class="thead-dark">
        <tr>          
          <th scope="col">Peligros Potenciales</td>        
          <th scope="col">Es un riesgo<br></td>
          <th scope="col">Probabilidad<br></td>
          <th scope="col">Gravedad<br></td>        
        </tr>
    </thead>
    <tbody>

    <?php 
            $sql = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`num_ra` = '$num_ra' AND `ra_registro`.`id` > 25 AND `ra_registro`.`id` < 62";
            $consulta = mysqli_query($conexion, $sql);
            $contador =26; 
            while ($row = mysqli_fetch_array($consulta)) {
    
        echo'
        <tr>
            <td class="" style="font-size: medium;">'.$row['nombre'].'</td>
            <td class="" style="font-size: medium;">
                <div class="form-check form-check-inline">
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-success active">
                      <input type="radio" name="data_'.$contador.'" id="option1" autocomplete="off" value="NO" checked> NO
                    </label>
                    <label class="btn btn-outline-danger">
                      <input type="radio" name="data_'.$contador.'" id="option2" autocomplete="off" value="SI"> SI
                    </label>
                </div>
  
                </div>                                              
            </td>
            <td class="" style="font-size: medium;">
                <select class="border rounded"  type="text" name="data2_'.$contador.'" id="selectA'.$contador.'">';?>
                    <?php
                    $default = "";
                    $states = array(
                                ""=>"",
                                "1"=>"1",  
                                "2"=>"2",  
                                "3"=>"3",  
                                "4"=>"4",  
                                "5"=>"5");
                    foreach($states as $key=>$val) {
                    echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                }
                ?>
                </select>  
            </td>
            <?php echo '<td class="" style="font-size: medium;">
                <select class="border rounded"  type="text"  name="data3_'.$contador.'" id="selectB'.$contador.'">';?>
                    <?php
                    $default = "";
                    $states = array(
                                ""=>"",
                                "1"=>"1",  
                                "2"=>"2",  
                                "3"=>"3",  
                                "4"=>"4",  
                                "5"=>"5");
                    foreach($states as $key=>$val) {
                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                }
                ?>
                </select>  
            </td>
        </tr>

        <?php

        $contador++;// sumamos uno al contador para que identifique al siguiente row del while
        } 
       ?>

<?php 
            $sql = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`num_ra` = '$num_ra' AND `ra_registro`.`id` > 61 AND `ra_registro`.`id` < 65";
            $consulta = mysqli_query($conexion, $sql);
            $contador =62; 
            while ($row = mysqli_fetch_array($consulta)) {
    
        echo'
        <tr>
            <td class="" style="font-size: medium;"><input type="text" name="nombre_'.$contador.'" id="nombre_'.$contador.'"  value="">  
            </td>
            <td class="" style="font-size: medium;">
                <div class="form-check form-check-inline">
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-success active">
                      <input type="radio" name="data_'.$contador.'" id="option1" autocomplete="off" value="NO" checked> NO
                    </label>
                    <label class="btn btn-outline-danger">
                      <input type="radio" name="data_'.$contador.'" id="option2" autocomplete="off" value="SI"> SI
                    </label>
                </div>
  
                </div>                                              
            </td>
            <td class="" style="font-size: medium;">
                <select class="border rounded"  type="text" name="data2_'.$contador.'" id="selectA'.$contador.'">';?>
                    <?php
                    $default = "";
                    $states = array(
                                ""=>"",
                                "1"=>"1",  
                                "2"=>"2",  
                                "3"=>"3",  
                                "4"=>"4",  
                                "5"=>"5");
                    foreach($states as $key=>$val) {
                    echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                }
                ?>
                </select>  
            </td>
            <?php echo '<td class="" style="font-size: medium;">
                <select class="border rounded"  type="text"  name="data3_'.$contador.'" id="selectB'.$contador.'">';?>
                    <?php
                    $default = "";
                    $states = array(
                                ""=>"",
                                "1"=>"1",  
                                "2"=>"2",  
                                "3"=>"3",  
                                "4"=>"4",  
                                "5"=>"5");
                    foreach($states as $key=>$val) {
                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                }
                ?>
                </select>  
            </td>
        </tr>

        <?php

        $contador++;// sumamos uno al contador para que identifique al siguiente row del while
        } 
       ?>

</table>

<button type="submit" class="btn btn-primary btn-lg">Siguiente</button>





<!-- <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center ">
    <div class="col-5 pt-2 pb-2 pl-2 pr-2 justify-content-center text-center text-dark border rounded" style= "background-color:#E0F4F2;">
        <label align="center" class="ml-1 mr-1 pl-1 pr-1" for="">
            <h6>Nota más elevada de la evaluación de un<br> riesgo unitario antes de realizar acciones</h6>
        </label> 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;              
        <input class="w-25" type="text"  name="elevada" id="elevada"  value=""> 
    </div>             
</div>
<h6>Buscar Acciones: Para todo RIESGO evaluado >9 o si la suma de todos los RIESGOS es >30</h6>
<div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center ">
    <div class="col-5 pt-2 pb-2 pl-2 pr-2 justify-content-center text-center text-dark border rounded" style= "background-color:#E0F4F2;">
        <label align="center" class="ml-1 mr-1 pl-1 pr-1" for="">
            <h6>¿Las medidas de Prevención Actuales son Apropiadas?</h6>
        </label>               
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">SI</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">NO</label>
        
    </div>             
</div>
<h4>Medidas Preventivas Existentes</h4>

<div class="row">
    <div class="col-sm-6"><label align="center" class="ml-1 mr-1 pl-1 pr-1" for="">
        <strong>Medidas de Control Jerarquizadas ERICDP</strong>
    </label></div>
    <div class="col-sm-6"><input type="text" name="" required id=""  value=""></div>
</div>  -->





</form>

    <!-- Footer -->
    
<br><br><br>

<?php echo file_get_contents('http://'.$ip.'/D-WIDO/footer.php');?>


    <!-- Footer -->

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

</body>
</html>