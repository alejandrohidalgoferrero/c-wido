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

    include('nav.php');
    
    ?>

    <!-- Nav hasta aqui -->

<h1 align="center">Descargar Tabla Refundido</h1>     

<form action="ajustes_descarga_tablas_refundido.php" method="POST">
    <div class="container mx-auto mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1   " style="background-color:#E0F4F2;">
        <div class="row justify-content-center mr-auto ml-auto mt-1 mb-1">
            <div class="col justify-content-center mt-1 mb-1 mr-1 ml-1 ">
                <div class="row justify-content-center mt-1 mb-1 mr-1 ml-1">
                    <label for="fecha_inicio">FECHA INICIO</label>
                </div>
                <div class="row justify-content-center mt-1 mb-1 mr-1 ml-1">
                    <input class="form-control" required type="date" name="fecha_inicio" id="fecha_inicio" value="">
                </div>
            </div>
            <div class="col justify-content-center mt-1 mb-1 mr-1 ml-1 ">
                <div class="row justify-content-center mt-1 mb-1 mr-1 ml-1">
                    <label for="fecha_fin">FECHA FIN</label>
                </div>
                <div class="row justify-content-center mt-1 mb-1 mr-1 ml-1">
                    <input class="form-control" required type="date" name="fecha_fin" id="fecha_fin" value="">
                </div>
            </div>
            <div class="col d-flex align-items-center justify-content-center mt-1 mb-1 mr-1 ml-1">
                <input type="submit" name="submit" value="Mostrar tabla." class="btn btn-secondary align-middle btn-lg">
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