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
  <form action="RA guardar registro.php" method="POST"> 
                     
 </div>
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center ">
        <?php 
            $sql = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`num_ra` = '$num_ra' AND `ra_registro`.`id` =1";
            $consulta = mysqli_query($conexion, $sql);

            while ($row = mysqli_fetch_array($consulta)) {

            $actividad=$row['dato1'];
            }    
            ?>
        
        
        
        
        <div class="col-5 pt-2 pb-2 pl-2 pr-2 justify-content-center text-center text-dark border rounded" style= "background-color:#E0F4F2;">
            <label align="center" class="ml-1 mr-1 pl-1 pr-1" for="">
                <strong>Actividad / Area / Maquina: </strong><?php echo $actividad;?>
            </label>               
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
                        $checked="";
                    
                        if ($row['dato1']) {
                            $checked="checked";
                        }
                          
                    ?>
                

                    <div class="row mt-1 mb-1 ml-1 mr-1 text-center text-dark" >
                        <div class="form-check">
                            <input class="form-check-input" <?php echo $checked?> disabled type="checkbox" value="1" name="data_<?php echo $contador?>" id="data_<?php echo $contador?>">
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

                    <?php 
                    $sql = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`num_ra` = '$num_ra' AND `ra_registro`.`id` =9";
                    $consulta = mysqli_query($conexion, $sql);

                    while ($row = mysqli_fetch_array($consulta)) {
                    
                    $actividad=$row['dato1'];
                    }    
                    ?>
                        <div class="col ml-1 mr-1" >
                            <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                                Nº Personas Expuestas: <?php echo $actividad?>
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

                        $checked="";
                    
                        if ($row['dato1']) {
                            $checked="checked";}
                    ?>



                    <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                        <div class="form-check" align="left">
                        <input class="form-check-input" <?php echo $checked?> disabled type="checkbox" value="1" name="data_<?php echo $contador?>" id="data_<?php echo $contador?>">
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

                        
                        $checked="";
                    
                        if ($row['dato1']) {
                            $checked="checked";}
                    ?>
        
                    <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                        <div class="form-check" align="left">
                            <input class="form-check-input" <?php echo $checked?> disabled type="checkbox" value="1" name="data_<?php echo $contador?>" id="data_<?php echo $contador?>">
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

                <?php 
                $sql = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`num_ra` = '$num_ra' AND `ra_registro`.`id` =24";
                $consulta = mysqli_query($conexion, $sql);

                while ($row = mysqli_fetch_array($consulta)) {

                $actividad=$row['dato1'];
                }    
                ?>
                    <div class="col ml-1 mr-1" >
                        <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            Fecha de la Evaluación:
                            <input type="date" name="data_24" id="data_24"  disabled value="<?php echo $actividad?>"> 
                        </label>
                    </div>
                </div>


                <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >

                <?php 
                $sql = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`num_ra` = '$num_ra' AND `ra_registro`.`id` =25";
                $consulta = mysqli_query($conexion, $sql);

                while ($row = mysqli_fetch_array($consulta)) {

                $actividad=$row['dato1'];
                }    
                ?>


                    <div class="col ml-1 mr-1" >
                        <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            Información Complementaria:
                            <textarea class="form-control" name="data_25" id="data_25" rows="1" cols="50"><?php echo $actividad;?></textarea>
 
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
          <th scope="col">Es un Peligro<br></td>
          <th scope="col">Probabilidad<br></td>
          <th scope="col">Gravedad<br></td>
          <th scope="col">Valorar riesgo<br></td>
          <th scope="col">Después de medidas<br></td>         
        </tr>
    </thead>
    <tbody>

    <?php 
            $sql = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`num_ra` = '$num_ra' AND `ra_registro`.`id` > 25 AND `ra_registro`.`id` < 62 AND `ra_registro`.`dato1` = 'SI' ";
            $consulta = mysqli_query($conexion, $sql);
            $contador =26; 
            while ($row = mysqli_fetch_array($consulta)) {
            $producto=0;
            $producto=$row['dato2']*$row['dato3'];
                $color="";
            if ($producto > 9) {
                $color="red";
              }else{
                $color="orange";
              }
        echo'
        <tr style="background-color:'.$color.'">
            <td class="" style="font-size: medium;">'.$row['nombre'].'</td>
            <td class="" style="font-size: medium;">
                '.$row['dato1'].'
            </td>
            <td class="" style="font-size: medium;">
                '.$row['dato2'].'
            </td>
            <td class="" style="font-size: medium;">
                '.$row['dato3'].'
            </td>
            <td class="" style="font-size: medium;">
                <strong>'.$producto.'</strong>
            </td>
            <td class="" style="font-size: medium;">
                <input type="text" name="medida_'.$row['id'].'" id="nombre_'.$row['id'].'"  value="">            
            </td>
        </tr>';

        $contador++;// sumamos uno al contador para que identifique al siguiente row del while
        } 
       ?>

<?php 
            $sql = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`num_ra` = '$num_ra' AND `ra_registro`.`id` > 61 AND `ra_registro`.`id` < 65 AND `ra_registro`.`dato1` = 'SI' ";
            $consulta = mysqli_query($conexion, $sql);
            $contador =62; 
            while ($row = mysqli_fetch_array($consulta)) {
                $producto=0;
                $producto=$row['dato2']*$row['dato3'];
                    $color="";
                if ($producto > 9) {
                    $color="red";
                  }else{
                    $color="orange";
                  }
            echo'
            <tr style="background-color:'.$color.'">
                <td class="" style="font-size: medium;">'.$row['nombre'].'</td>
                <td class="" style="font-size: medium;">
                    '.$row['dato1'].'
                </td>
                <td class="" style="font-size: medium;">
                    '.$row['dato2'].'
                </td>
                <td class="" style="font-size: medium;">
                    '.$row['dato3'].'
                </td>
                <td class="" style="font-size: medium;">
                    <strong>'.$producto.'</strong>
                </td>
                <td class="" style="font-size: medium;">
                    <input type="text" name="medida_'.$row['id'].'" id="nombre_'.$row['id'].'"  value="">            
                </td>
            </tr>';
    
            $contador++;// sumamos uno al contador para que identifique al siguiente row del while
            } 
           ?>

</table>


<?php 
            $sumatotal=0;
            $maximo=0;
            $sql = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`num_ra` = '$num_ra' AND `ra_registro`.`id` > 25 AND `ra_registro`.`id` < 65 AND `ra_registro`.`dato1` = 'SI' ";
            $consulta = mysqli_query($conexion, $sql);
            while ($row = mysqli_fetch_array($consulta)) {
            $sumatotal=$sumatotal+$row['dato2']*$row['dato3'];
            $producto=0;
            $producto=$row['dato2']*$row['dato3'];

            if ($producto > $maximo) {
                $maximo = $producto;
            }else{
                $maximo = $maximo;
            }

            }

?>



<div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center ">
    <div class="col-5 pt-2 pb-2 pl-2 pr-2 justify-content-center text-center text-dark border rounded" style= "background-color:#E0F4F2;">

    <table style="text-align: center;" align="center" border="1"class="table table-striped table-sm ">
    <thead class="thead-dark">
      <tr>
        <th>Nota más elevada de la evaluación de un riesgo unitario antes de realizar acciones </th>
        <th>Suma de todas las notas de la evaluación de riesgo antes de realizar acciones</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><strong><?php echo $maximo?></strong></td>
        <td><strong><?php echo $sumatotal?></strong></td>
      </tr>
    </tbody>
  </table>

    </div>             
</div>






<h6>Buscar Acciones: Para todo RIESGO evaluado >9 o si la suma de todos los RIESGOS es >30</h6>
<div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center ">
    <div class="col-5 pt-2 pb-2 pl-2 pr-2 justify-content-center text-center text-dark border rounded" style= "background-color:#E0F4F2;">
            <label align="center" class="ml-1 mr-1 pl-1 pr-1" for="">
                <h6>¿Las medidas de Prevención Actuales son Apropiadas?</h6>
            </label>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-secondary active">
                    <input type="radio" name="data_65" id="option1" autocomplete="off" value="NO" checked> NO
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="data_65" id="option2" autocomplete="off" value="SI"> SI
                </label>
            </div>       

    </div>             
</div>

<br>
<br>

<h4>Medidas Preventivas Existentes</h4>

<div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">         
        <div align="center" class="col-12 pt-2 pb-2 pl-2 pr-2 " style= "border:muted 3px solid">               
            <div class="row mt-1 mb-1 ml-10 mr-10 pt-1 pb-1 pl-10 pr-10 justify-content-center">
                <div align="center"class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">
                    <div class="row mt-1 mb-1 ml-1 mr-1 text-center text-dark" >
                        <div class="col ml-1 mr-1 ">
                            <label class="ml-1 mr-1 pl-1 pr-1" for="molde">
                                <strong>Medidas preventivas existentes:</strong>
                            </label>
                        </div>
                    </div>


                    <?php 
                    $contador=66;
                    $sql = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`num_ra` = '$num_ra' AND `ra_registro`.`id` > 65 AND `ra_registro`.`id` < 81";
                    $consulta = mysqli_query($conexion, $sql);

                    while ($row = mysqli_fetch_array($consulta)) {
                        $checked="";
                    
                        if ($row['dato1']) {
                            $checked="checked";
                        }
                          
                    ?>
                

                    <div class="row mt-1 mb-1 ml-1 mr-1 text-center text-dark" >
                        <div class="form-check">
                            <input class="form-check-input" <?php echo $checked?> type="checkbox" value="1" name="data_<?php echo $contador?>" id="data_<?php echo $contador?>">
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
                                <strong>Circunstancias</strong>
                            </label>
                        </div>
                    </div>


                    <?php 
                    $contador=82;
                    $sql = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`num_ra` = '$num_ra' AND `ra_registro`.`id` > 81 AND `ra_registro`.`id` < 88";
                    $consulta = mysqli_query($conexion, $sql);

                    while ($row = mysqli_fetch_array($consulta)) {

                        $checked="";
                    
                        if ($row['dato1']) {
                            $checked="checked";}
                    ?>



                    <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                        <div class="form-check" align="left">
                        <input class="form-check-input" <?php echo $checked?>  type="checkbox" value="1" name="data_<?php echo $contador?>" id="data_<?php echo $contador?>">
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
            </div>
        </div>
    </div>
    <h4>Medidas Preventivas Adicionales:</h4>   




    <table style="text-align: center;" align="center" border="1"class="table table-striped table-sm ">
    <thead class="thead-dark">
        <tr>          
          <th scope="col"></td>        
          <th scope="col">Factor de riesgo<br></td>
          <th scope="col">Medida de control<br></td>
          <th scope="col">Responsable<br></td>

        </tr>
    </thead>
    <tbody>

    <?php 
            $sql = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`num_ra` = '$num_ra' AND `ra_registro`.`id` > 87 AND `ra_registro`.`id` < 98 ";
            $consulta = mysqli_query($conexion, $sql);
            $contador =88; 
            while ($row = mysqli_fetch_array($consulta)) {

        echo'
        <tr>
            <td class="" style="font-size: medium;">
                '.$row['nombre'].'
            </td>
            <td class="" style="font-size: medium;">
                <input type="text" style="width: 100%;" placeholder="FR:" name="data_'.$contador.'" id="data_'.$contador.'"  value="">            
            </td>
            <td class="" style="font-size: medium;">
                <input type="text" style="width: 100%;" placeholder="MC:" name="data2_'.$contador.'" id="data2_'.$contador.'"  value="">            
            </td>
            <td class="" style="font-size: medium;">
                <input type="text" style="width: 100%;" name="data3_'.$contador.'" id="data3_'.$contador.'"  value="">            
            </td>

            
        </tr>';

        $contador++;
        } 
       ?>

</table>

<br>


<table style="text-align: center;" align="center" border="1"class="table table-striped table-sm ">
<thead class="thead-dark">
    <tr>          
      <th scope="col"></td>        
      <th scope="col">Necesidades de formación:<br></td>
      <th scope="col">Autorización:<br></td>

    </tr>
</thead>
<tbody>

<?php 
        $sql = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`num_ra` = '$num_ra' AND `ra_registro`.`id` > 97 AND `ra_registro`.`id` < 102 ";
        $consulta = mysqli_query($conexion, $sql);
        $contador =98; 
        while ($row = mysqli_fetch_array($consulta)) {

    echo'
    <tr>
        <td class="" style="font-size: medium;">
            '.$row['nombre'].'
        </td>
        <td class="" style="font-size: medium;">
            <input type="text" style="width: 100%;"  name="data_'.$contador.'" id="data_'.$contador.'"  value="">            
        </td>
        <td class="" style="width: 25%; font-size: medium;">
            <input type="text" style="width: 100%;" name="data2_'.$contador.'" id="data2_'.$contador.'"  value="">            
        </td>
    </tr>';

    $contador++;// sumamos uno al contador para que identifique al siguiente row del while
    } 
   ?>

</table>
<br>


<table style="text-align: center;" align="center" border="1"class="table table-striped table-sm ">

    <tbody>

    <?php 
            $sql = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`num_ra` = '$num_ra' AND `ra_registro`.`id` > 101 AND `ra_registro`.`id` < 105 ";
            $consulta = mysqli_query($conexion, $sql);
            $contador =102; 
            while ($row = mysqli_fetch_array($consulta)) {

        echo'
        <tr>
            <td class="" style="font-size: medium;">
                '.$row['nombre'].'
            </td>
            <td class="" style="font-size: medium;">
                <input type="text" style="width: 100%;" placeholder="firma" name="data_'.$contador.'" id="data_'.$contador.'"  value="">            
            </td>


            
        </tr>';

        $contador++;// sumamos uno al contador para que identifique al siguiente row del while
        } 
       ?>

</table>

<br>

<div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center ">
    <div class="col-5 pt-2 pb-2 pl-2 pr-2 justify-content-center text-center text-dark border rounded" style= "background-color:#E0F4F2;">
<table style="text-align: center;" align="center" border="1"class="table table-striped table-sm ">
    <thead class="thead-dark">
      <tr>
        <th>Nota de evaluación más elevada de un riesgo unitario después de acciones </th>
        <th>Suma de todas las notas de la evaluación de riesgo después de acciones</th>
        <th>Próxima fecha de revisión:</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
            <input type="text" style="width: 100%;"  name="data_106" id="data_106"  value="">            
        </td>
        <td>
            <input type="text" style="width: 100%;"  name="data_107" id="data_107"  value="">            
        </td>
        <td>
            <input type="date" name="data_105" id="data_105"  value=""> 
        </td>
      </tr>
    </tbody>
  </table>

</div>
</div>


<button type="submit" class="btn btn-primary btn-lg">Registrar Evaluación de Riesgo</button>

</form>


    
<br><br><br>

<?php echo file_get_contents('http://'.$ip.'/D-WIDO/footer.php');?>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

</body>
</html>