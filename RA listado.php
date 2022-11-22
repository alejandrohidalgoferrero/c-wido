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
    session_start();
    $num_ra=$_SESSION['num_ra'];
    echo 'num_ra= '.$num_ra;

    include('nav.php')?>


<h1 align="center">Resgistro de evaluaciones de Riesgos.</h1>


<!-- Auí introduciremos los contenidos que lleve la pagina -->
<div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center ">
  <form action="RA guardar registro.php" method="POST"> 
                     
 </div>
   


 <div class="col">
<div class="m-auto pt-3 pb-5 pl-5 pr-5 border rounded" style="background-color:#ECECEC; color: black">

                    <table id="tabla" class="table-bordered table-sm" align="center">
                      <thead>
                        <tr>
                          <td colspan="12">
                            <input id="buscar" type="text" class="form-control" placeholder="Escriba algo para filtrar" />
                          </td>
                        </tr>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Nº de evaluación de riesgo</th>
                          <th scope="col">Actividad  /  Área  /  Máquina :</th>
                          <th scope="col">Fecha</th>
                        </tr>
                      </thead>
                      <tbody>

                        <script>
                            var busqueda = document.getElementById('buscar');
                            var table = document.getElementById("tabla").tBodies[0];                         
                            buscaTabla = function(){
                                texto = busqueda.value.toLowerCase();
                                var r=0;
                                while(row = table.rows[r++])
                                {
                                if ( row.innerText.toLowerCase().indexOf(texto) !== -1 )
                                    row.style.display = null;
                                else
                                    row.style.display = 'none';
                                }
                            }                            
                            busqueda.addEventListener('keyup', buscaTabla);
                        </script>
                        <tr>
                        <?php

                        $consulta = "SELECT * FROM `ra_registro` WHERE `ra_registro`.`id` =1";
                        $resultado = mysqli_query($conexion, $consulta );
                        while ($row = mysqli_fetch_array($resultado)) {

                        
                        echo '
                            <th scope="row">
                                <div align="left" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                                    <div class="ml-1 mr-1 pl-1 pr-1">
                                    <form action="RA mostrar registro.php" method="POST">  
                                        <input type="submit" value="Mostrar" class="btn btn-primary">
                                        <input type="hidden" id="num_ra" name="num_ra" value="'.$row['num_ra'].'">
                                    </form>
                                    </div>
                                   
                                </div>
                            </th>
                            <td class="text-center align-middle">'.$row['num_ra'].'</td>

                            <td class="text-center align-middle">'.$row['dato1'].'</td>
                            <td class="align-middle">'.$row['fecha'].'</td>

                            </tr>
                            ';
                            
                    }
                        ?>
                      </tbody>
                    </table>
    </div>
</div>

</form>


    
<br><br><br>

<?php echo file_get_contents('http://'.$ip.'/D-WIDO/footer.php');?>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

</body>
</html>