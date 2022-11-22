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
     $titulo_pagina= "PMA";
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

<h1 align="center">PMA.</h1>

<!-- Auí introduciremos los contenidos que lleve la pagina -->
<div class="row justify-content-center mr-auto ml-auto mt-1 mb-3" style="width: 88%" >

        <form action="pma crear registro.php"> 
            <div class="col pt-2 pb-2 pl-2 pr-2 " style= "border:muted 3px solid">               
                <input type="submit" value="Realizar PMA" class="btn btn-primary">
            </div>             
        </form>
        </div>
           
<br>
<h3 align="center">Histórico:</h3>
<div align="center">
<div align="center"class="col-11 mt-1 mb-1 ml-1 mr-1 pt-5 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">

    <table style="text-align: center;" align="center" border="1"class="table table-striped table-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col"><br></td>
                <th scope="col">Fecha </td>
                <th scope="col">Inyectora<br></td>
                <th scope="col">Molde<br></td>
                <th scope="col">Operario<br></td>
                <th scope="col">Tiempo<br></td>
                <th scope="col">Comentarios<br></td>

            </tr>
        </thead>
        <tbody>
            <tr>
            <?php



            $consulta = "SELECT * FROM pma ORDER BY id DESC";
            $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
            while ($row = mysqli_fetch_array($resultado)) {
        ?>    
                <?php echo '<td style="vertical-align: middle;">
                                <form action="pma modificar.php" method="POST">  
                                    <input type="submit" value="Modificar" class="btn btn-info btn-sm">
                                    <input class="ml-1 pt-2 pb-2 pl-2 pr-2 border rounded "  type="hidden" name="id" id="id" value="'. $row['id'].'"/>
                                </form>                
                            </td>' ;?>

                <?php echo '<td style="vertical-align: middle;"><label for="normal cooler"  ></label>'. $row['fecha'].' ('. $row['turno'].')</td>' ;?>
                <?php echo '<td style="vertical-align: middle;"><label for="normal cooler"  ></label>'. $row['inyectora'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;"><label for="normal cooler"  ></label>'. $row['tipo_pieza'].'#'.$row['molde'].'/'.$row['impronta'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;"><label for="normal cooler"  ></label>'. $row['operario'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;"><label for="normal cooler"  ></label>'. $row['tiempo'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;"><label for="normal cooler"  ></label>'. $row['comentarios'].'</td>' ;?>


        
            </tr>
            <?php
                }
        ?>
        </tbody>
            </table>
            <br>
            <br>
            <br>
            

</div>
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