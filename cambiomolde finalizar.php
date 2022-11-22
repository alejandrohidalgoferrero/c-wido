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
     $titulo_pagina= "Cambio molde";
     include("conexion.php");
     include("ipserver.php");
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


    <?php

    $id=$_POST['id'];

    $consulta = "SELECT * FROM `cambio_molde_registro` WHERE id ='$id'";
    $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));

    while ($row = mysqli_fetch_array($resultado)) {
    $inyectora=$row['inyectora'];
    $molde_saliente=$row['molde saliente'];
    $impronta_saliente=$row['impronta saliente'];
    $tipo_pieza_saliente=$row['tipo pieza saliente'];
    $molde_entrante=$row['molde entrante'];                            
    $impronta_entrante=$row['impronta entrante'];
    $tipo_pieza_entrante=$row['tipo pieza entrante'];
    $estado=$row['estado'];
    }
    ?>
<h1 align="center">Cambio molde.</h1>


<!-- Auí introduciremos los contenidos que lleve la pagina -->
<form action="cambiomolde finalizar support.php" method="POST"> 

    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center ">
        <div class="col-5 pt-2 pb-2 pl-2 pr-2 justify-content-center text-center text-dark" style= "border:muted 3px solid">
            <label align="center" class="ml-1 mr-1 pl-1 pr-1" for="inyectora"> </label>     
            <input type="submit" value="Finalizar/Reabrir proceso" class="btn btn-info">
            <input type="hidden" id="id" name="id" value="<?php echo $id?>"  >
            <input type="hidden" id="estado" name="estado" value="<?php echo $estado?>"  >

        </div>             
    </div>
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center ">
        <div class="col-5 pt-2 pb-2 pl-2 pr-2 justify-content-center text-center text-dark border rounded" style= "background-color:#E0F4F2;">
            <label align="center" class="ml-1 mr-1 pl-1 pr-1" for="inyectora">
                <strong>INYECTORA: <?php echo $inyectora?></strong>
            </label>               
        </div>             
    </div>
<div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center">         
    <div align="center" class="col-5 pt-2 pb-2 pl-2 pr-2 " style= "border:muted 3px solid">               
        <div class="row mt-1 mb-1 ml-10 mr-10 pt-1 pb-1 pl-10 pr-10 justify-content-center">
            <div align="center"class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">
                <div class="row mt-1 mb-1 ml-1 mr-1 text-center text-dark" >
                    <div class="col ml-1 mr-1 ">
                        <label class="ml-1 mr-1 pl-1 pr-1" for="molde">
                            <strong>Molde saliente</strong>
                        </label>
                    </div>
                </div>

                <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col ml-1 mr-1" >
                        <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            Nº de molde: <?php echo $molde_saliente?> 
                        </label>
                    </div>
                </div>
                <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col ml-1 mr-1" >
                        <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            Nº de impronta: <?php echo $impronta_saliente?> 
                        </label>
                    </div>
                </div><div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col ml-1 mr-1" >
                        <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            Tipo de pieza: <?php echo $tipo_pieza_saliente?>
                        </label>
                    </div>
                </div>
            </div>

            <div align="center"class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">
                <div class="row mt-1 mb-1 ml-1 mr-1 text-center text-dark" >
                    <div class="col ml-1 mr-1 ">
                        <label class="ml-1 mr-1 pl-1 pr-1" for="molde">
                            <strong>Molde entrante</strong>
                        </label>
                    </div>
                </div>

                <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col ml-1 mr-1" >
                        <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            Nº de molde: <?php echo $molde_entrante?>
                        </label>
                    </div>
                </div>
                <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col ml-1 mr-1" >
                        <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            Nº de impronta: <?php echo $impronta_entrante?> 
                        </label>
                    </div>
                </div><div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col ml-1 mr-1" >
                        <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            Tipo de pieza: <?php echo $tipo_pieza_entrante?>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







</form>

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