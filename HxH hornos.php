<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
     <title>HxH HORNOS</title>
          
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
    $ip="LOCALHOST";

    include('nav.php');
    
    
    $fecha_actual = date("Y-m-d");
    $hora=date("H:i:s");

    if(strtotime($hora)>=strtotime('00:00:00') and strtotime($hora)<=strtotime('05:59:59') ) {
        
       $date=date("Y-m-d",strtotime($fecha_actual."- 1 days"));

    } else{

        $date=$fecha_actual;
    }

    
    
    ?>

    <!-- Nav hasta aqui -->

    <h1 align="center">HxH HORNOS</h1>

<form action="HxH hornos cargar fecha.php" method="POST"> 

    
    <div class="col-md-6 offset-md-3 mt-5 border rounded" style="background-color:#ECECEC">
        <div class="row  align-items-center mr-auto ml-auto mt-1 mb-3 pt-2 pb-2 pl-2 pr-2" style="width: 88%" >            
            <div class="col mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1" style= "border:muted 3px solid">
            <label><strong>Seleccionar horno:</strong></label>
            <select class="mdb-select md-form" type="text" name="horno" id="horno"required>
                <?php 
                $default = "";
                $states = array(""=>"", "Horno 1"=>"Horno 1", "Horno 2"=>"Horno 2","Horno 3"=>"Horno 3","Horno 4"=>"Horno 4");
                foreach($states as $key=>$val) {
                 echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                }
                ?>
            </select>
            </div>             
            <div class="col mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1  " style= "border:muted 3px solid">
            <label><strong>Fecha:</strong></label>
            <input type="date"  id="fecha" name="fecha" value="<?php echo $date;?>" required>
            </div>             
            <div class="col-2 mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1" style= "border:muted 3px solid">               
            <input type="submit" value="Cargar" class="btn btn-primary btn-lg">
            </div>             
       </div>  
    </div>

</form>

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