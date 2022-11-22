<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="http://localhost/D-WIDO/css/bootstrap.min.css" rel="stylesheet">
     <title>CHECK CAMBIO MOLDES</title>
          
</head>

<body style="background-color: #D8F5CA" class="text-muted">

   <!-- Nav desde aqui -->
<?php

    $fecha= date("Y-m-d");
    $hora=date("H:i:s");
    
    if(strtotime($hora)>=strtotime('00:00:00') and strtotime($hora)<=strtotime('05:59:59') ) {$turno="Noche";} 
    if(strtotime($hora)>=strtotime('06:00:00') and strtotime($hora)<=strtotime('13:59:59') ) {$turno="Mañana";} 
    if(strtotime($hora)>=strtotime('14:00:00') and strtotime($hora)<=strtotime('21:59:59') ) {$turno="Tarde";} 
    if(strtotime($hora)>=strtotime('22:00:00') and strtotime($hora)<=strtotime('23:59:59') ) {$turno="Noche";} 

    $titulo_pagina= "Cambio molde";
    include("conexion.php");
    $sql="UPDATE tabla_navegador SET uso = '0'";
    $consulta = mysqli_query($conexion, $sql);

     $sql="UPDATE tabla_navegador SET uso = '1' WHERE tabla_navegador.titulo = '$titulo_pagina'";
     $consulta = mysqli_query($conexion, $sql);


    $ip="LOCALHOST";

    include('nav.php');

    $orden=$_SESSION['orden'];
    $num_cambio_molde=$_SESSION['num_cambio_molde'];
    $tipo_cambio_molde=$_SESSION['tipo_cambio_molde'];
    $tipo_check=$_SESSION['tipo_check'];

    
    switch ($tipo_cambio_molde) {
        case "validacion_calidad":
            $titulo_check="CHECK-LIST VALIDACIÓN CAMBIO DE MOLDE";
            break;
        case "validacion_hm":
            $titulo_check="CHECK-LIST VALIDACIÓN MOLDE HEAVY MAINTENANCE / MODIFICACIÓN BSG";
            break;
    }

    switch ($tipo_check) {
        case "planetario":
            $subtitulo_check="Realiza operario control visual inyectora y operario matricería en planetario, primera pieza en alta presión.";
            break;
        case "banco_revision":
            $subtitulo_check="Realiza conductor inyectora y operario matricería en banco de revisión, primera pieza en alta presión.";
            break;
        case "tomografia":
            $subtitulo_check="Realiza operario 3D / Tomografía.";
            break;
        case "flujo_piezas":
            $subtitulo_check="Flujo de piezas.";
            break;
        case "qrqc_n3":
            $subtitulo_check="Validación molde en QRQC N3.";
            break;

    }
    $sql = "SELECT * FROM `cambio_molde_check_registro` WHERE `tipo_cambio_molde` = '$tipo_cambio_molde' AND  `tipo_check` = '$tipo_check' AND `num_cambio_molde` = '$num_cambio_molde' AND  `orden` = '$orden'";
      $consulta = mysqli_query($conexion, $sql); 
      while ($row = mysqli_fetch_array($consulta)) {
        $maquina=$row['maquina'];
        $condiciones_validacion=$row['condiciones_validacion'];
        $operario_matriceria=$row['operario_matriceria'];
        $operario_fabricacion=$row['operario_fabricacion'];
        $ju_matriceria=$row['ju_matriceria'];
        $ju_fabricacion	=$row['ju_fabricacion'];
        $molde_holder_block=$row['molde_holder_block'];
        $molde_impronta=$row['molde_impronta'];
        $validacion=$row['validacion'];
        $fecha_matriceria=$row['fecha_matriceria'];
        $turno_matriceria=$row['turno_matriceria'];
        $fecha_fabricacion=$row['fecha_fabricacion'];
        $turno_fabricacion=$row['turno_fabricacion'];
      }
    ?>



    <!-- Nav hasta aqui -->

<form action="cambiomolde_check_support.php" method="POST" id="formulario">
  <h1 align="center"><?php echo $titulo_check?></h1>
  <br>
  <h3 align="center"><?php echo $subtitulo_check?></h3>



<div class="container-fluid  mt-3 mb-5 pt-1 pb-1 justify-content-center" style="background-color:#E0F4F2;">
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  justify-content-center">
        <div class="col-2 pt-1 pb-1 pl-1 pr-1 justify-content-center">               
            <input type="submit" value="Guardar" class="btn btn-primary btn-block">
        </div>             
    </div>
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center border border-dark">
        <div class="col pt-1 pb-1 pl-1 pr-1 justify-content-center text-center text-dark"> 
            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center border border-dark">
                <div class="col pt-1 pb-1 pl-1 pr-1 justify-content-center text-center text-dark">
                    <strong>Inyectora: </strong> <?php echo $maquina?>
                </div>
                <div class="col pt-1 pb-1 pl-1 pr-1 justify-content-center text-center text-dark"> 
                    <strong>Molde Holder Block: </strong> <?php echo $molde_holder_block?>
                </div>
                <div class="col pt-1 pb-1 pl-1 pr-1 justify-content-center text-center text-dark"> 
                    <strong>Molde Impronta: </strong> <?php echo $molde_impronta?>
                </div>
            </div>
            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center  border border-dark">
                <div class="col pt-1 pb-1 pl-1 pr-1 justify-content-center text-center text-dark d-flex align-items-center">
                    <script type="text/javascript">
                        <?php 
                        echo'
                        function autofecha_matriceria(casilla) {
                            document.getElementById("fecha_matriceria").value ="'.$fecha.'";
                            document.getElementById("turno_matriceria").value ="'.$turno.'";
                        }';
                        ?>
                    </script>
                    <input style="vertical-align: middle;" onClick="autofecha_matriceria(this);" type="button" name="boton_fecha_matriceria" id="boton_fecha_matriceria" value="AUTO" class="btn btn-info btn-block">                    
                </div>
                <div class="col pt-1 pb-1 pl-1 pr-1 justify-content-center text-center text-dark">
                    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">
                        <strong>Fecha matricería: </strong>
                    </div>
                    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">
                        <input type="date" class="form-control" name="fecha_matriceria" id="fecha_matriceria" value="<?php echo $fecha_matriceria?>">
                    </div>
                </div>
                <div class="col pt-1 pb-1 pl-1 pr-1 justify-content-center text-center text-dark"> 
                    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">
                        <strong>Turno matricería: </strong>
                    </div>
                    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">
                        <select class="form-control" style="width: 100%;" type="text" name="turno_matriceria" id="turno_matriceria">
                            <?php 
                            $default = "$turno_matriceria";
                            $states = array(""=>"", "Mañana"=>"Mañana", "Tarde"=>"Tarde","Noche"=>"Noche");
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                            ?>
                        </select>                         
                    </div>
                </div>
                <div class="col pt-1 pb-1 pl-1 pr-1 justify-content-center text-center text-dark"> 
                    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">
                        <strong>Operario matricería: </strong>
                    </div>
                    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">
                        <input type="text" class="form-control" name="operario_matriceria" id="operario_matriceria" value="<?php echo $operario_matriceria?>">
                    </div>                
                </div>
                <div class="col pt-1 pb-1 pl-1 pr-1 justify-content-center text-center text-dark"> 
                    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">
                        <strong>JU matricería: </strong>
                    </div>
                    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">
                        <input type="text" class="form-control" name="ju_matriceria" id="ju_matriceria" value="<?php echo $ju_matriceria?>">
                    </div>                  
                </div>
            </div>
            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center  border border-dark">
                <div class="col pt-1 pb-1 pl-1 pr-1 justify-content-center text-center text-dark d-flex align-items-center">
                    <script type="text/javascript">
                        <?php 
                        echo'
                        function autofecha_fabricacion(casilla) {
                            document.getElementById("fecha_fabricacion").value ="'.$fecha.'";
                            document.getElementById("turno_fabricacion").value ="'.$turno.'";
                        }';
                        ?>
                    </script>
                    <input style="vertical-align: middle;" onClick="autofecha_fabricacion(this);" type="button" name="boton_fecha_fabricacion" id="boton_fecha_fabricacion" value="AUTO" class="btn btn-info btn-block">                    
                </div>
                <div class="col pt-1 pb-1 pl-1 pr-1 justify-content-center text-center text-dark">
                    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">
                        <strong>Fecha fabricación: </strong>
                    </div>
                    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">
                        <input type="date" class="form-control" name="fecha_fabricacion" id="fecha_fabricacion" value="<?php echo $fecha_fabricacion?>">
                    </div>
                </div>
                <div class="col pt-1 pb-1 pl-1 pr-1 justify-content-center text-center text-dark"> 
                    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">
                        <strong>Turno fabricación: </strong>
                    </div>
                    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">
                        <select class="form-control" placeholder="Turno" style="width: 100%;" type="text" name="turno_fabricacion" id="turno_fabricacion">
                            <?php 
                            $default = "$turno_fabricacion";
                            $states = array(""=>"", "Mañana"=>"Mañana", "Tarde"=>"Tarde","Noche"=>"Noche");
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                            ?>
                        </select>                         
                    </div>
                </div>
                <div class="col pt-1 pb-1 pl-1 pr-1 justify-content-center text-center text-dark"> 
                    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">
                        <strong>Operario fabricación: </strong>
                    </div>
                    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">
                        <input type="text" class="form-control" name="operario_fabricacion" id="operario_fabricacion" value="<?php echo $operario_fabricacion?>">
                    </div>                
                </div>
                <div class="col pt-1 pb-1 pl-1 pr-1 justify-content-center text-center text-dark"> 
                    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">
                        <strong>JU fabricación: </strong>
                    </div>
                    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">
                        <input type="text" class="form-control" name="ju_fabricacion" id="ju_fabricacion" value="<?php echo $ju_fabricacion?>">
                    </div>                  
                </div>
            </div>
        </div>
        <div class="col-2 pt-1 pb-1 pl-1 pr-1 justify-content-center text-left text-dark border border-dark"> 
            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-left justify-content-center">
                <strong>Condiciones de validación: </strong><?php echo $condiciones_validacion?>
            </div>
            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-left justify-content-center">
                <div class="col pt-1 pb-1 pl-1 pr-1 justify-content-center text-center text-dark"> 
                    <strong>Validación: </strong>
                </div>

                <?php
                    switch ($validacion) {
                        case "":
                            $color_bk = "";
                            break;
                        case "NOK":
                            $color_bk = "bg-danger";
                            break;
                        case "OK":
                            $color_bk = "bg-success";
                            break;
                    }   
                ?>
                    <script type="text/javascript">
                        function cambiaFondo(x){
                            var valor =x.value;
                            var color="";
                            switch (valor) {
                                case "":
                                    color = "";
                                    break;
                                case "NOK":
                                    color = "red";
                                    break;
                                case "OK":
                                    color = "green";
                                    break;
                              }
                          
                        var elemento= document.getElementById("validacion")
                        elemento.style.backgroundColor = color;
                       }
                    </script>
                    <select class="form-control font-weight-bold text-dark <?php echo $color_bk?>" style="width: 100%;" type="text" name="validacion" id="validacion" onchange="cambiaFondo(this)"> 
                        <?php 
                        $default = "$validacion";
                        $states = array(""=>"", "OK"=>"OK", "NOK"=>"NOK");
                        foreach($states as $key=>$val) {
                            echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                        }
                        ?>
                    </select>                          
            </div>
        </div>
    </div>
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center border border-dark">
        <table style="text-align: center;" align="center" border="1"class="table  table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Acción</th>
                    <th>Personal</th>
                    <th>Punto Clave</th>
                    <th>OK/NOK</th>
                    <th>INCIDENCIAS</th>
                </tr>
            </thead>
            <tbody>
            <?php   
                $contador=1;
                $sql = "SELECT * FROM `cambio_molde_check_registro` WHERE `tipo_cambio_molde` = '$tipo_cambio_molde' AND  `tipo_check` = '$tipo_check' AND `num_cambio_molde` = '$num_cambio_molde' AND  `orden` = '$orden'";
                $consulta = mysqli_query($conexion, $sql ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));

                while ($row = mysqli_fetch_array($consulta)) {
                $resultado=$row['resultado'];
                $estado_imagen=$row['estado_imagen'];

                echo'
                <tr>
                    <td style="vertical-align: middle;" class="text-left">
                        <strong>'.$row['accion_check'].'</strong>
                    </td>
                    <td style="vertical-align: middle;">
                        '.$row['personal_check'].'
                    </td>
                    <td style="vertical-align: middle;" class="text-left">
                        <h6>'.$row['punto_clave_check'].'</h6>';

                    if($estado_imagen=="1")
                    {
                    echo'
                        <img src="imagenes/check_cambio_molde/'.$row['imagen'].'" class="img-fluid" alt="Falta imagen">';

                    }

                echo'
                    </td>
                    <td style="vertical-align: middle;">
                        <select class="form-control" placeholder="Turno" style="width: 100%;" type="text" name="resultado_'.$contador.'" id="resultado_'.$contador.'">'; 
                            $default = "$resultado";
                            $states = array(""=>"", "OK"=>"OK", "NOK"=>"NOK");
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                echo'
                        </select>        
                    </td>
                    <td style="vertical-align: middle;">
                        <textarea class="form-control" id="incidencias_'.$contador.'" name="incidencias_'.$contador.'" rows="1">'.$row['incidencias'].'</textarea>
                    </td>
                </tr>
                ';
                $contador++;
                }
                $num_variables=$contador-1;
                
            ?>
            </tbody>
        </table>
    </div>
</div>
<input type="hidden" name="num_variables" id="num_variables" value="<?php echo $num_variables?>">
<input type="hidden" name="nombrecompleto" id="nombrecompleto" value="<?php echo $nombrecompleto?>">

</form>

<?php echo file_get_contents('http://'.$ip.'/C-WIDO/footer.php');?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="js/bootstrap.js"></script>

</body>
</html>