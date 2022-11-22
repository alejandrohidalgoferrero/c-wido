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
     $titulo_pagina= "HORNOS";
     include("conexion.php");
    $sql="UPDATE tabla_navegador SET uso = '0'";
    $consulta = mysqli_query($conexion, $sql);

     $sql="UPDATE tabla_navegador SET uso = '1' WHERE tabla_navegador.titulo = '$titulo_pagina'";
     $consulta = mysqli_query($conexion, $sql);
     ?>
     
     <title><?php echo $titulo_pagina?></title>

    <?php 
        include('nav.php');
    ?>

<!-- Nav hasta aqui -->

<h1 class="mb-5" align="center">Registro piezas refundidas</h1>
<?php
            $hora=date("H:i:s");
            $turno="";
            if(strtotime($hora)>=strtotime('00:00:00') and strtotime($hora)<=strtotime('05:59:59') ) {$turno="Noche";} 
            if(strtotime($hora)>=strtotime('06:00:00') and strtotime($hora)<=strtotime('13:59:59') ) {$turno="Mañana";} 
            if(strtotime($hora)>=strtotime('14:00:00') and strtotime($hora)<=strtotime('21:59:59') ) {$turno="Tarde";} 
            if(strtotime($hora)>=strtotime('22:00:00') and strtotime($hora)<=strtotime('23:59:59') ) {$turno="Noche";} 
?>

<form action="registro refundidas guardar.php" method="POST">

<input type="hidden" id="operario" name="operario" value="<?php echo $nombre.' '.$apellido1.' '.$apellido2;?>">

<div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  ">
    <div align="center"class="col-6 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 " style="background-color:#E0F4F2;">
        <div class="row justify-content-md-center ">        
            <div align="center"class="col-5 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark">
                <div class=" mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-left" >
                    <label class="ml-1 mr-1 pl-1 pr-1" for="Fecha:"><strong>Fecha:</strong></label>
                    <input type="date" id="fecha" required name="fecha" value="<?php echo date("Y-m-d");?>">
                </div>
            </div>
            <div align="center"class="col-5 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark">
                <div class=" mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-left" >
                    <label class="ml-1 mr-1 pl-1 pr-1" for="Fecha:"><strong>Turno:</strong></label>
                    <?php                           
                            echo '<label for="turno"  ></label>      
                                <select class="border rounded"  type="text" required name="turno" id="turno">';
                                
                                    $default ="$turno";
                                    $states = array(""=>"","Mañana"=>"Mañana","Tarde"=>"Tarde","Noche"=>"Noche");          
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
<br>
<div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  align-middle">
    <div align="center"class="col-6 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-middle" style="background-color:#E0F4F2;">
        <div class="row justify-content-md-center align-middle">        
            <div align="center"class="col-2 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark align-middle">
                <div class="align-middle mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-left" >
                    <div><input class="w-100" type="text" maxlength="13" placeholder="DATAMATRIX" autofocus name="datamatrix" id="datamatrix"  value=""> </div>        
                </div>
            </div>
            <div align="center"class="col-8 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark">
                <div class=" align-middle mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-left" >
                    <div class="text-left">
                        <label class="ml-1 mr-1 pl-1 pr-1"  for="inyectora:"><strong>ORIGEN:</strong></label>
                        <?php
                        $consulta = "SELECT * FROM  `piezas_refundidas_registro`ORDER BY id DESC LIMIT 1";
                        $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
                        while ($row = mysqli_fetch_array($resultado)) {
                        
                        $origen=$row['origen'];

                        }

                        switch ($origen) {
                            case "Inyección":
                                $check1="checked";
                                $check2="";
                                $check3="";
                                break;
                            case "Premeca":
                                $check1="";
                                $check2="checked";
                                $check3="";
                                break;
                            case "Mecanizado":
                                $check1="";
                                $check2="";
                                $check3="checked";
                                break;
                        }
                        ?>
                        
                        <div class="form-check-inline">
                          <input type="radio" <?php echo $check1?> class="form-check-input" id="1" name="origen" value="Inyección">
                          <label class="ml-1 mr-1 mt-1 pl-1 pr-1" for="1">Inyección</label>
                        </div>

                        <div class="form-check-inline">
                          <input type="radio" <?php echo $check2?> class="form-check-input" id="2" name="origen" value="Premeca">
                          <label class="ml-1 mr-1 mt-1 pl-1 pr-1" for="2">Premeca</label>
                        </div>

                        <div class="form-check-inline">
                          <input type="radio" <?php echo $check3?> class="form-check-input" id="3" name="origen" value="Mecanizado">
                          <label class="ml-1 mr-1 mt-1 pl-1 pr-1" for="3">Mecanizado</label>
                        </div>                    
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</form>
<div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  align-middle">
    <div align="center"class="col-6 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-middle" style="background-color:#E0F4F2;">
        <div class="row-10 justify-content-md-center align-middle">    
            <h5 class="mb-1" align="center">Últimas piezas:</h5>
    
            <table style="text-align: center;" align="center" border="1"class="table table-striped table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="vertical-align: middle;">DATAMATRIX</td>
                        <th scope="col" style="vertical-align: middle;">Fecha </td>
                        <th scope="col" style="vertical-align: middle;">Origen</td>
                    </tr>
                </thead>
                <tbody>
                            <tr>
                            <?php



                            $consulta = "SELECT * FROM piezas_refundidas_registro ORDER BY id DESC LIMIT 10";
                            $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
                            while ($row = mysqli_fetch_array($resultado)) {
                            ?>
                        <?php echo '<td style="vertical-align: middle;"><label for="normal cooler"  ></label>'. $row['datamatrix'].'</td>' ;?>
                        <?php echo '<td style="vertical-align: middle;"><label for="normal cooler"  ></label>'. $row['fecha'].' ('. $row['turno'].')</td>' ;?>
                        <?php echo '<td style="vertical-align: middle;"><label for="normal cooler"  ></label>'. $row['origen'].'</td>' ;?>               
                    </tr>
                    <?php
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