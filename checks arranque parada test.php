<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
          
</head>
<?php
     include("conexion.php");
     session_start();
     $operacion= $_SESSION['operacion'];
     $accion= $_SESSION['accion'];
     $tabla='check_'.$operacion.'_'.$accion.'_registro';


     if($_POST['num_test']!=""){
        $num_test=$_POST['num_test'];
        $_SESSION['num_test']=$num_test;
     }
     else{
        $num_test=$_SESSION['num_test'];
     }



?>
<?php
$contador=1;
$sql= "SELECT * FROM $tabla WHERE num_test = $num_test";
$consulta= mysqli_query($conexion, $sql);

    while($row = mysqli_fetch_array($consulta)) {

        $maquina=$row['maquina'];
        $nombre_operario=$row['nombre_operario'];
        $fecha_completa=$row['fecha_hora'];
        
       
    }
    if($fecha_completa==""){
        $fecha_completa=date("Y-m-d H:i:s");
    }
    else{
        $fecha_completa=$fecha_completa;
    }
       ?>   

    
<body style="background-color: #D8F5CA" class="text-muted">
 <!-- Nav desde aqui -->
 <?php
     $titulo_pagina= "Check arranque parada";
    //  include("conexion.php");
    $sql="UPDATE tabla_navegador SET uso = '0'";
    $consulta = mysqli_query($conexion, $sql);

     $sql="UPDATE tabla_navegador SET uso = '1' WHERE tabla_navegador.titulo = '$titulo_pagina'";
     $consulta = mysqli_query($conexion, $sql);
     ?>
     
     <title><?php echo $titulo_pagina?></title>

    <?php 
    $ip="LOCALHOST";

    include('nav.php');
    
    $fecha_actual= date("d-m-Y");
    $fecha_superior= date("d-m-Y",strtotime($fecha_actual."+ 2 days")); 
    $fecha_inferior= date("d-m-Y",strtotime($fecha_actual."- 2 days")); 
    $hora=date("H:i:s");
    $fecha_completa=date("Y-m-d H:i:s");
    
    if(strtotime($hora)>=strtotime('00:00:00') and strtotime($hora)<=strtotime('05:59:59') ) {$turno="Noche";} 
    if(strtotime($hora)>=strtotime('06:00:00') and strtotime($hora)<=strtotime('13:59:59') ) {$turno="Mañana";} 
    if(strtotime($hora)>=strtotime('14:00:00') and strtotime($hora)<=strtotime('21:59:59') ) {$turno="Tarde";} 
    if(strtotime($hora)>=strtotime('22:00:00') and strtotime($hora)<=strtotime('23:59:59') ) {$turno="Noche";} 
    ?>

    <!-- Nav hasta aqui -->
<br>
<h1 align=center class="text-muted">CHECKSLIST <?php echo $operacion.' '.$accion ?></h1>
<form action="checks arranque parada test support.php" method="POST" id="guardar">
<br>
<div class="container justify-center m-auto pt-1 pb-1 pl-1 pr-1" style= "background-color: #D6DBD3">
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded border-dark align-self-center">
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "left">
        <strong >Máquina:</strong>
        <?php
            switch ($operacion) {
            
                case "op_10":
                    echo'
                    <select class="form-control" type="text" name="maquina" id="maquina" required>';?>
                    <?php 
                    $default = "$maquina";
                    $states = array(""=>"", "Horno fusor A"=>"Horno fusor A", "Horno fusor B"=>"Horno fusor B", "Horno fusor C"=>"Horno fusor C", "Horno fusor D"=>"Horno fusor D");

                    
                    foreach($states as $key=>$val) {
                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                    }
                    echo'
                    </select>';

                break;
                
                case "op_30":
                
                    echo'
                    <select class="form-control" type="text" name="maquina" id="maquina" required>';?>
                    <?php 
                    $default = "$maquina";
                    $states = array(""=>"", "Horno Lethiguel A"=>"Horno Lethiguel A", "Horno Lethiguel B"=>"Horno Lethiguel B", "Horno Lethiguel C"=>"Horno Lethiguel C", "Horno Lethiguel D"=>"Horno Lethiguel D", "Horno Lethiguel E"=>"Horno Lethiguel E", "Horno Lethiguel F"=>"Horno Lethiguel F");

                     
                    foreach($states as $key=>$val) {
                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                    }
                    echo'
                    </select>';
                break;
                
                case "op_40":
                
                    echo'
                    <select class="form-control" type="text" name="maquina" id="maquina" required>';?>
                    <?php 
                    $default = "$maquina";
                    $states = array(""=>"", "Inyectora A"=>"Inyectora A", "Inyectora B"=>"Inyectora B", "Inyectora C"=>"Inyectora C", "Inyectora D"=>"Inyectora D", "Inyectora E"=>"Inyectora E", "Inyectora F"=>"Inyectora F");

                    
                    foreach($states as $key=>$val) {
                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                    }
                    echo'
                    </select>';
                break;
                
                case "op_80":
                
                    echo'
                    <select class="form-control" type="text" name="maquina" id="maquina" required>';?>
                    <?php 
                    $default = "$maquina";
                    $states = array(""=>"", "Horno T5 A"=>"Horno T5 A", "Horno T5 B"=>"Horno T5 B", "Horno T5 C"=>"Horno T5 C", "Horno T5 D"=>"Horno T5 D", "Horno T5 E"=>"Horno T5 E", "Horno T5 F"=>"Horno T5 F");

                    
                    foreach($states as $key=>$val) {
                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                    }
                    echo'
                    </select>';
                break;
                
                case "op_1130":
                
                    echo'
                    <select class="form-control" type="text" name="maquina" id="maquina" required>';?>
                    <?php 
                    $default = "$maquina";
                    $states = array(""=>"", "Lavadora A"=>"Lavadora A", "Lavadora B"=>"Lavadora B", "Lavadora C"=>"Lavadora C");

                    
                    foreach($states as $key=>$val) {
                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                    }
                    echo'
                    </select>';
                break;
                
                case "op_1140":
                
                    echo'
                    <select class="form-control" type="text" name="maquina" id="maquina" required>';?>
                    <?php 
                    $default = "$maquina";
                    $states = array(""=>"", "Estanqueidad A"=>"Estanqueidad A", "Estanqueidad B"=>"Estanqueidad B");

                    
                    foreach($states as $key=>$val) {
                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                    }
                    echo'
                    </select>';
                break;
            
                case "op_1150":
                    echo'
                    <label>Multicontrol</label>';?>
                    <input type="hidden" id="maquina" name="maquina" value="Multicontrol"></input>
                    <?php 
                    
                break;
                
                case "op_cv_final":
                    echo'
                    <label>CV final</label>';?>
                    <input type="hidden" id="maquina" name="maquina" value="CV final"></input>
                    <?php 
                    
                break;
                
                case "op_1200":
                    echo'
                    <label>Pórtico parada</label>';?>
                    <input type="hidden" id="maquina" name="maquina" value="Pórtico parada"></input>
                    <?php 
                    
                break;
                case "op_svs":
                    echo'
                    <label>SVS</label>';?>
                    <input type="hidden" id="maquina" name="maquina" value="SVS"></input>
                    <?php 
                    
                break;

                case "op_1110":
                    echo'
                    <select class="form-control" type="text" name="maquina" id="maquina" required>';?>
                    <?php 
                    $default = "$maquina";
                    $states = array(""=>"", "MAG A"=>"MAG A", "MAG B"=>"MAG B", "MAG C"=>"MAG C", "MAG D"=>"MAG D", "MAG E"=>"MAG E", "MAG F"=>"MAG F");

                    
                    foreach($states as $key=>$val) {
                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                    }
                    echo'
                    </select>';
                break;

            break;
                
            }
            ?>
        </div>

        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "left">
        <strong>Nombre operario: </strong>
            <input class="form-control" type= "text" name= "nombre_operario" id= "nombre_operario" value="<?php echo $nombre_operario ?>" placeholder= "Nombre y apellido" required>
        </div>

        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "left">
        
            <strong >Fecha y hora: </strong>
                
    
            <input class="form-control" type= "datetime-local" name= "fecha_hora" id= "fecha_hora" value="<?php echo $fecha_completa ?>" required>
                
        </div>


    </div>

<!-- Preguntas del checklist -->
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded border-dark align-self-center">
        <div class= "col align-self-center">

<?php
$contador=1;
$sql= "SELECT * FROM $tabla WHERE num_test = $num_test";
$consulta= mysqli_query($conexion, $sql);

    while($row = mysqli_fetch_array($consulta)) {

        $pregunta=$row['pregunta'];
        $info_pregunta=$row['info_pregunta'];
        $respuesta=$row['respuesta'];
        $comentario=$row['comentario'];
        $duracion=$row['duracion'];
        ?>     
    <div class="row align-self-center">

        <div class= "col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded border-dark align-self-center">

            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center ">
                <strong><?php echo $pregunta;?></strong>
            </div> 

            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <?php echo $info_pregunta;?>
            </div>
            
            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">

                <div class= "col-auto mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                    <select class="form-control" type="text" name="respuesta_<?php echo $contador?>" id="respuesta_<?php echo $contador?>" >
                        <?php 
                        $default = "$respuesta";
                        $states = array(""=>"", "OK"=>"OK", "No realizado"=>"No realizado");
                        foreach($states as $key=>$val) {
                            echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class= "col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                    <textarea class="form-control" rows="1" name="comentario_<?php echo $contador?>" id="comentario_<?php echo $contador?>" placeholder="Descripción de incidencias o comentarios"><?php echo $comentario?></textarea>
                </div>

            </div>
        </div>
        </div>

     <?php  
     $contador++;
     }

     $numVariables=$contador-1;

     ?> 
    <input type="hidden" id="numVariables" name="numVariables" value="<?php echo $numVariables?>">

    <div class="row  align-self-center">
    
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded border-dark align-self-center">

            <div class="row mt-1 mb-1 ml-1 mr-1  align-self-center">

                <div class= "col-auto pt-1 pb-1 pl-1 pr-1 align-self-center">

                        <strong><?php echo "DURACIÓN TOTAL CHECKLIST (minutos)";?></strong>
                </div>

                <div class="col-auto mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">

                    <input type="number" class="form-control" name="duracion" id="duracion" min="0" max="180" value="<?php echo $duracion ?>">

                </div>

            </div>

        </div>
        <div class= "col-auto mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center" align=center>
        </form>

        <form action="checks arranque parada registro.php">
                <input type="submit" name= "submit" value= "Volver a registro <?php echo $operacion?> <?php echo $accion?>" class="btn btn-primary"></input>
        </form>
          
        </div> 
        <div class= "col-auto mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center" align=center>
            
            
                <input type="submit" name= "submit" value= "Enviar/Guardar" class="btn btn-success" form= "guardar"></input>
          
        </div> 
     


     
    </div>
    </div>

</div>

    <!-- Footer -->
    <?php echo file_get_contents('http://'.$ip.'/C-WIDO/footer.php');?>
    <!-- Footer -->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

</body>
</html>