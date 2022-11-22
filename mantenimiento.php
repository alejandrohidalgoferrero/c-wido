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

    include('nav.php')?>

    <!-- Nav hasta aqui -->

<h1 align="center">Mantenimiento</h1>

<!-- Auí introduciremos los contenidos que lleve la pagina -->



<div class="container-fluid  mt-2 mb-2 pt-1 pb-1 border ">
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="col-4 justify-content-center mr-1 ml-1 mt-1 mb-1" >
            <form action="Kitting.php"> 
                <input style="vertical-align: middle;" type="submit" value="Kitting" class=" btn btn-secondary  btn-lg btn-block mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
            </form>
        </div>
    </div>

    <!-- <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="col-4 justify-content-center mr-1 ml-1 mt-1 mb-1" >
            <form action="RA generar registro.php"> 
                <input style="vertical-align: middle;" type="submit" value="Nueva Evaluación de Riesgos" class=" btn btn-info btn-lg btn-block mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
            </form>
        </div>
    </div>

    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="col-4 justify-content-center mr-1 ml-1 mt-1 mb-1" >
            <form action="RA listado.php"> 
                <input style="vertical-align: middle;" type="submit" value="Registro Evaluaciones de Riesgos" class=" btn btn-info btn-lg btn-block mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
            </form>
        </div>
    </div> -->

    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="col-4 justify-content-center mr-1 ml-1 mt-1 mb-1" >
            <form action="risk_assesment_v2_menu.php"> 
                <input style="vertical-align: middle;" type="submit" value="Risk Assesment" class=" btn btn-primary  btn-lg btn-block mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
            </form>
        </div>
    </div>
</div>


<!-- <div class="justify-content-center  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" style="text-align:center" >
    <div>
        <br>
        <form action="Kitting.php"> 
            <input style="vertical-align: middle;" type="submit" value="Kitting" class=" btn btn-secondary  btn-lg btn-block mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
        </form>

        <br>
        <br>
        <br>
        <form action="RA generar registro.php"> 
            <input style="vertical-align: middle;" type="submit" value="Nueva Evaluación de Riesgos" class=" btn btn-info btn-lg btn-block mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
        </form>
        <br>
        <br>
        <br>
        <form action="RA listado.php"> 
            <input style="vertical-align: middle;" type="submit" value="Registro Evaluaciones de Riesgos" class=" btn btn-info btn-lg btn-block mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
        </form>
    <div>
</div>   -->


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