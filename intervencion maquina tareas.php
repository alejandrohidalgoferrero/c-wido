<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
          
</head>

<body class="bg-warning text-muted">

<!-- Nav desde aqui -->
<?php
    $titulo_pagina= "Intervencion maquina";
    include("conexion.php");
    $sql="UPDATE tabla_navegador SET uso = '0'";
    $consulta = mysqli_query($conexion, $sql);

     $sql="UPDATE tabla_navegador SET uso = '1' WHERE tabla_navegador.titulo = '$titulo_pagina'";
     $consulta = mysqli_query($conexion, $sql);
     ?>
     
     <title><?php echo $titulo_pagina?></title>

    <?php 

    session_start();

    $id=$_SESSION['id'];

    $sql = "SELECT * FROM intervencion_maquina_registro WHERE id=$id";         
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {  
        $nombrecompleto=$row['operario'];
        $fecha=$row['fecha'];
        $turno=$row['turno'];
        $lugar=$row['lugar'];
        $tipo_pieza=$row['tipo_pieza'];
        $molde=$row['molde'];
        $impronta=$row['impronta'];
        $comentarios=$row['comentarios'];

    }
    include('nav.php');
    
    echo'<br>id='.$id;
    ?>

    <!-- Nav hasta aqui -->

<h1 align="center">INTERVENCIÓN EN MÁQUINA. Tareas.</h1>

<!-- Auí introduciremos los contenidos que lleve la pagina -->

<div class="col">
<!-- <div class="container justify-content-center"> -->
<div class="m-auto pt-2 pb-2 pl-5 pr-5 border rounded" style="background-color:#ECECEC; color: black">
    <font size="2" face="Arial">
    <div class="row  " style="vertical-align: middle;">
        <div style="vertical-align: middle;" align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark">
            <strong>Operario: </strong><?php echo $nombrecompleto?>
        </div>
        <div style="vertical-align: middle;" align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark">
            <label><strong>Fecha: </strong></label>
            <input type="date" disabled name="fecha" id="fecha" value="<?php echo $fecha?>">

        </div>
        <div style="vertical-align: middle;" align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark">
            <span class="align-middle"><strong>Turno: </strong><?php echo $turno?></span>
        </div>
        <div style="vertical-align: middle;" align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark">
            <span class="align-middle"><strong>Lugar: </strong><?php echo $lugar?></span></label>
        </div>
    </div>
    <div class="row " style="vertical-align: middle;">
        <div align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark align-items-center">
            <div class="row  t-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 align-items-center">
                <span class="align-middle"><strong>Tipo pieza: </strong><?php echo  $tipo_pieza?></span>
            </div>
        </div>
        <div align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark align-items-center">
            <div class="row  t-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 align-items-center">
                <span class="align-middle"><strong>Molde: </strong><?php echo  $molde?></span>
            </div>
        </div>
        <div align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark align-items-center">
            <div class="row  t-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 align-items-center">
                <span><strong>Impronta: </strong><?php echo  $impronta?></span>
            </div>
        </div>
    </div>
    <div class="row  " style="vertical-align: middle;">
        <div style="vertical-align: middle;" align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1">
            <textarea class="form-control" disabled rows="1" name="comentarios" id="comentarios" placeholder="Comentarios"><?php echo $comentarios?></textarea>
        </div>
    </div>
    </font>
</div>
<br>

<div class="m-auto pt-2 pb-2 pl-5 pr-5 border rounded" style="background-color:#ECECEC; color: black">
    <font size="2" face="Arial">
    <div class="row  " style="vertical-align: middle;">
        <div style="vertical-align: middle;" align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1">
            <h4 align="center"><strong>Problemas en la intervención.</strong></h4>
        </div>
    </div>
    <div class="row " style="vertical-align: middle;">
        <form action="intervencion maquina tareas support.php"> 
            <div class="col pt-2 pb-2 pl-2 pr-2">               
                <input type="submit" value="Añadir problema" class="btn btn-warning">
            </div>             
        </form>
    </div>
    </font>
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