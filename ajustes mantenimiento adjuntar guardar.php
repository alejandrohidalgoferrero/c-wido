<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="./dropzone/dist/min/dropzone.min.css" rel="stylesheet">

</head>

<body style="background-color: #D8F5CA" class="text-muted">

    <!-- Nav desde aqui -->
    <?php
     $titulo_pagina= "Ajustes";
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


<h1 align="center">AJUSTES. ADJUNTAR ELEMENTO.</h1>
<br>

 <?php
        $id=$_POST['id2'];
        $formato=$_POST['formato'];

        $sql="SELECT*FROM `kitting_elementos_estado` where `id`=$id";
        $consulta = mysqli_query($conexion, $sql); 
        
        while ($row = mysqli_fetch_array($consulta)) {
            $marca=$row['marca'];
            $nombre=$row['nombre'];
            $familia=$row['familia'];
            $mabec=$row['mabec'];
            $cajonera=$row['cajonera'];
            $unidades_stock=$row['unidades en stock'];
            $stock_minimo=$row['stock minimo'];
            $stock_nominal=$row['stock nominal'];
            $stock_pedido=$row['stock pedido'];
            $observaciones=$row['observaciones'];
        };
        $sql1="UPDATE `kitting_elementos_estado` SET `plano` = '1', `formato` = '$formato' WHERE `kitting_elementos_estado`.`id` ='$id' ";
        $consulta2 = mysqli_query($conexion, $sql1);

        ?>         
            


            <!--  Columna 1, DATOS GENERALES PARA LA CREACION DE UNA OT -->
        <div class="row justify-content-md-center mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" style="align-items-start" >
        <font size="1" face="Arial">  

           
            </div> 
        </font>         
        </div> 


        <!-- <div class="row justify-content-md-center mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" style="align-items-start" >
            <div class="text-center border rounded  mt-1  mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" >
                <input type="submit" name="submit" value="Adjuntar elemento." class="btn btn-secondary"> 
            </div>
        </div> -->

        <div class="row justify-content-md-center mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" style="align-items-start" >

            <div id="recarga_fotos" class="col-5 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;" >
                <div class="x_content">
                        <p>Pulsa en este cuadro para cargar el archivo.</p>
                        <form action="conexionmod.php" name="documentos" method="post" class="dropzone" >
                        <div class=" border rounded" >
                        <input type="hidden" id="id" name="id" value=<?php echo $id?>> 
                        <input type="hidden" id="mabec" name="mabec" value=<?php echo $mabec?>>
                        <input type="hidden" id="formato" name="formato" value=<?php echo $formato?>> 

                        </form>

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
    <script type="text/javascript" src="./dropzone/dist/dropzone.js"></script>

</body>
</html>