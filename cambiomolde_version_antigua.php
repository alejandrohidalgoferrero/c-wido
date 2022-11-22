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

<h1 align="center">Cambio molde.</h1>

<!-- Auí introduciremos los contenidos que lleve la pagina -->
<div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  justify-content-center">

        <form action="cambiomolde nuevo.php"> 
            <div class="col-4 pt-2 pb-2 pl-2 pr-2 " style= "border:muted 3px solid">               
                <input type="submit" value="Nuevo cambio de molde" class="btn btn-primary">
            </div>             
        </form>
</div>
           
<br>
<div align="center">
<div align="center"class="col-11 mt-1 mb-1 ml-1 mr-1 pt-3 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">
<h3 align="center">En proceso:</h3>

<font size="2" face="Arial">  

    <table style="text-align: center;" align="center" border="1"class="table table-striped table-sm ">
        <thead class="thead-dark">
            <tr>
              <th scope="col"><br></td>
              <th scope="col">Inyectora </td>
              <th scope="col">Fecha (año/mes/día)<br></td>
              <th scope="col">Molde saliente<br></td>
              <th scope="col">Impronta saliente<br></td>
              <th scope="col">Tipo pieza saliente<br></td>
              <th scope="col">Molde entrante<br></td>
              <th scope="col">Impronta entrante<br></td>
              <th scope="col">Tipo pieza entrante<br></td>
              <th scope="col">Minutos entre etapas<br></td>
              <th scope="col">Minutos totales<br></td>

            </tr
        </thead>
        <tbody>
            <tr>
            <?php



            $consulta = "SELECT * FROM cambio_molde_registro WHERE `estado`=0 ORDER BY `id` DESC ";
            $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
            while ($row = mysqli_fetch_array($resultado)) {
        ?>    
                <?php 
                $fecha1=$row['fecha1'];
                $fecha2=$row['fecha2'];
                $fecha3=$row['fecha3'];
                $fecha4=$row['fecha4'];

                $datetime1 = new DateTime($fecha1);
                $datetime2 = new DateTime($fecha2);
                $datetime3 = new DateTime($fecha3);
                $datetime4 = new DateTime($fecha4);

                $diff1 = $datetime1->diff($datetime2);
                $diff2 = $datetime2->diff($datetime3);
                $diff3 = $datetime3->diff($datetime4);


                $diff12 = ( (($diff1->m *30 )* 24 ) * 60 )+ ( ($diff1->days * 24 ) * 60 )+ ( $diff1->h * 60 ) + ( $diff1->i );
                $diff23 = ( (($diff2->m *30 )* 24 ) * 60 )+ ( ($diff2->days * 24 ) * 60 )+ ( $diff2->h * 60 ) + ( $diff2->i );
                $diff34 = ( (($diff3->m *30 )* 24 ) * 60 )+ ( ($diff3->days * 24 ) * 60 )+ ( $diff3->h * 60 ) + ( $diff3->i );


                

                
                If($diff12>100000){
                    $etapa1=0;
                }
                else{
                    $etapa1=$diff12;
                }
                If($diff23>100000){
                    $etapa2=0;
                }
                else{
                    $etapa2=$diff23;
                } 

                If($diff34>100000){
                    $etapa3=0;
                }
                else{
                    $etapa3=$diff34;
                } 

                $difftotal = $etapa1+$etapa2+$etapa3;
                

                echo '
                    <td class="my-auto" style="vertical-align: middle;">
                        <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" >
                        <form action="cambiomolde realizar.php" method="POST"> 
                                <input style="vertical-align: middle;" type="submit" value="Realizar" class=" btn btn-primary btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                                <input type="hidden" id="id" name="id" value="'.$row['id'].'"  >
                        </form>
                        <form action="cambiomolde modificar.php" method="POST"> 
                                <input style="vertical-align: middle;" type="submit" value="Modificar" class=" btn btn-warning btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                                <input type="hidden" id="id" name="id" value="'.$row['id'].'"  >
                        </form>
                        <form action="cambiomolde finalizar.php" method="POST"> 
                                <input style="vertical-align: middle;" type="submit" value="Finalizar" class=" btn btn-info btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                                <input type="hidden" id="id" name="id" value="'.$row['id'].'"  >
                        </form>
                        </div>
                    </td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['inyectora'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['fechacreacion'].'</td>' ;?>

                <!-- <?php echo '
                <td style="vertical-align: middle;">'. $row['fechacreacion'].'</td>' 
                ;?> -->
                <?php echo '<td style="vertical-align: middle;">'. $row['molde saliente'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['impronta saliente'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['tipo pieza saliente'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['molde entrante'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['impronta entrante'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['tipo pieza entrante'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'.$etapa1.'/'.$etapa2.'/'.$etapa3.'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'.$difftotal.'</td>' ;?>
        
            </tr>
            <?php
                }
        ?>
        </tbody>
            </table>

</font>
<br>

<div align="center">
<h3 align="center">FINALIZADOS:</h3>
<font size="2" face="Arial">  

    <table style="text-align: center;" align="center" border="1"class="table table-striped table-sm ">
        <thead class="thead-dark">
            <tr>
              <th scope="col"><br></td>
              <th scope="col">Inyectora </td>
              <th scope="col">Fecha (año/mes/día)<br></td>
              <th scope="col">Molde saliente<br></td>
              <th scope="col">Impronta saliente<br></td>
              <th scope="col">Tipo pieza saliente<br></td>
              <th scope="col">Molde entrante<br></td>
              <th scope="col">Impronta entrante<br></td>
              <th scope="col">Tipo pieza entrante<br></td>
              <th scope="col">Minutos entre etapas<br></td>
              <th scope="col">Minutos totales<br></td>

            </tr
        </thead>
        <tbody>
            <tr>
            <?php



            $consulta = "SELECT * FROM cambio_molde_registro WHERE `estado`=1 ORDER BY `id` DESC ";
            $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
            while ($row = mysqli_fetch_array($resultado)) {
        ?>    
                <?php 
                $fecha1=$row['fecha1'];
                $fecha2=$row['fecha2'];
                $fecha3=$row['fecha3'];
                $fecha4=$row['fecha4'];

                $datetime1 = new DateTime($fecha1);
                $datetime2 = new DateTime($fecha2);
                $datetime3 = new DateTime($fecha3);
                $datetime4 = new DateTime($fecha4);

                $diff1 = $datetime1->diff($datetime2);
                $diff2 = $datetime2->diff($datetime3);
                $diff3 = $datetime3->diff($datetime4);



                $diff12 = ( (($diff1->m *30 )* 24 ) * 60 )+ ( ($diff1->days * 24 ) * 60 )+ ( $diff1->h * 60 ) + ( $diff1->i );
                $diff23 = ( (($diff2->m *30 )* 24 ) * 60 )+ ( ($diff2->days * 24 ) * 60 )+ ( $diff2->h * 60 ) + ( $diff2->i );
                $diff34 = ( (($diff3->m *30 )* 24 ) * 60 )+ ( ($diff3->days * 24 ) * 60 )+ ( $diff3->h * 60 ) + ( $diff3->i );

                
                If($diff12>10000){
                    $etapa1=0;
                }
                else{
                    $etapa1=$diff12;
                }
                If($diff23>10000){
                    $etapa2=0;
                }
                else{
                    $etapa2=$diff23;
                } 

                If($diff34>10000){
                    $etapa3=0;
                }
                else{
                    $etapa3=$diff34;
                } 

                $difftotal=$etapa1+$etapa2+$etapa3;

                echo '
                    <td class="my-auto" style="vertical-align: middle;">
                        <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" >
                        <form action="cambiomolde realizar.php" method="POST"> 
                                <input style="vertical-align: middle;" disabled type="submit" value="Realizar" class=" btn btn-primary btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                                <input type="hidden"  id="id" name="id" value="'.$row['id'].'"  >
                        </form>
                        <form action="cambiomolde modificar.php" method="POST"> 
                                <input style="vertical-align: middle;" disabled type="submit" value="Modificar" class=" btn btn-warning btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                                <input type="hidden"  id="id" name="id" value="'.$row['id'].'"  >
                        </form>

                        <form action="cambiomolde finalizar.php" method="POST"> 
                                <input style="vertical-align: middle;" type="submit" value="Reabrir" class=" btn btn-info btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                                <input type="hidden" id="id" name="id" value="'.$row['id'].'"  >
                        </form>
                        </div>
                    </td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['inyectora'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['fecha1'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['molde saliente'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['impronta saliente'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['tipo pieza saliente'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['molde entrante'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['impronta entrante'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['tipo pieza entrante'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'.$etapa1.'/'.$etapa2.'/'.$etapa3.'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'.$difftotal.'</td>' ;?>
        
            </tr>
            <?php
                }
        ?>
        </tbody>
            </table>

            <br>
            

</div>
<br>
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