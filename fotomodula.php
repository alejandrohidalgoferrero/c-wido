<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">

	<title>Moficar foto estantería <?php echo $estanteria?>.</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="./dropzone/dist/min/dropzone.min.css" rel="stylesheet">

</head>

<body>

<?php
include("conexion.php");
$sql = "SELECT * FROM sinoptico_modula WHERE `sinoptico_modula`.`id` = '1'  ";
$consulta = mysqli_query($conexion, $sql);

while ($row = mysqli_fetch_array($consulta)) {
$estanteria=$row['foto en uso'];
} 
session_start();
$_SESSION["estanteria"]=$estanteria;

?>

<!-- Nav desde aqui -->

     
     <title><?php echo $titulo_pagina?></title>

    <?php 
    $ip="10.217.144.35";
	include('nav.php')

	?>

    <!-- Nav hasta aqui -->
	
    <div align="center" class=" mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark">

	<label align="center"><h1>Estanteria nº <?php echo $estanteria?> </h1><label>
		<form action="sinopticoModula.php">
			<div class="mb-5 ml-2 mr-1">               
					<!-- //<input type="submit" name="submit" value="Volver" class="btn btn-outline-secondary"> -->
			</div> 
		</form>

    <div align="center" class=" mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">

	<div id="recarga_fotos" >
        <div class="x_content">
            <p>Pulsa en este cuadro para realizar/cargar la foto.</p>
            <form action="conexionmod.php" name="documentos" method="post" class="dropzone" >
            </form>
        </div>
    </div>
    </div>
    </div>
	<br>           
	<br>           
	<br>           

	<!-- Footer -->
    <?php echo file_get_contents('http://'.$ip.'/D-WIDO/footer.php');?>
    <!-- Footer -->
    <script type="text/javascript" src="./dropzone/dist/dropzone.js"></script>

</body>

</html>