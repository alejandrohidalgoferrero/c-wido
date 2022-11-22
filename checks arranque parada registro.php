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
     session_start();
     $operacion= $_SESSION['operacion'];
     $accion= $_SESSION['accion'];
     $num_test=$_SESSION['num_test'];
     $tabla=$_SESSION['tabla'];
?>

<body style="background-color: #D8F5CA" class="text-muted">
<!-- Nav desde aqui -->
<?php
     $titulo_pagina= "Check arranque parada";
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
<h1 align=center>CHECKS <?php echo $operacion.' '.$accion ?></h1>

<br>
<div class="container justify-center m-auto pt-1 pb-1 pl-1 pr-1" style= "background-color: #D6DBD3">
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
            <form action="checks arranque parada registro support.php" method="post">
                <input type="submit" name= "submit" value= "Nuevo Registro" class="btn btn-success"></input>

            </form>
        </div>

        <div class= "col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center" align=center>
        

        <form action="checks arranque parada.php">
                <input type="submit" name= "submit" value= "Volver a checks arranque/parada" class="btn btn-primary"></input>
        </form>
          
        </div> 

    </div>
        <br>

        <div class= "col m-auto pr-2 pt-2 pb-2 pl-2" align="center">
            <strong> <h3 style="color:black">Registros actuales: </h3></strong>
        
            <br>
        
         
            <table class= "table table-bordered rounded table-striped" style="text-align: center">
                <thead>
                    <tr >
                        
                        <th style="vertical-align: middle"> <div class= "col" align=center>Numero de check</div> </th>
                        <th style="vertical-align: middle"> <div class= "col" align=center>Máquina</div> </th>
                        <th style="vertical-align: middle"> <div class= "col" align=center>Nombre Operario</div> </th>
                        <th style="vertical-align: middle"> <div class= "col" align=center>Fecha y hora</div> </th>
                        <th style="vertical-align: middle"> <div class= "col" align=center></div> </th>
                                                
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql= "SELECT * FROM $tabla WHERE id='1'";
                        $consulta= mysqli_query($conexion, $sql);

                            while($row = mysqli_fetch_array($consulta)) {
                    ?>
                    <tr>
                        <?php
                            
                            echo '<td style="vertical-align: middle"> <div class= "col" align="center">' . $row['num_test']. '</div> </td>';
                            echo '<td style="vertical-align: middle"> <div class= "col" align="center">' . $row['maquina']. '</div> </td>';
                            echo '<td style="vertical-align: middle"> <div class= "col" align="center">' . $row['nombre_operario']. '</div> </td>';
                            echo '<td style="vertical-align: middle"> <div class= "col" align="center">' . $row['fecha_hora']. '</div> </td>';
                            
                            echo '<td>
                            
                            <form action= "checks arranque parada test.php" method= "Post">
                                <input type="submit" name= "submit" value= "Modificar" class="btn btn-info"></input>
                                <input type="hidden" id="num_test" name="num_test" value="'. $row['num_test'].'">
                            </form>
                                                     
                            
                            </td>';

                           
                        ?>
                    </tr> 
                    <?php

                    }
                    ?>
                </tbody>

            </table>
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