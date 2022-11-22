<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
     <title>Kitting</title>
          
</head>

<body style="background-color: #D8F5CA" class="text-muted">

    <!-- Nav desde aqui -->
    <?php
     $titulo_pagina= "Mantenimiento";
     include("conexion.php");
    $sql="UPDATE tabla_navegador SET uso = '0'";
    $consulta = mysqli_query($conexion, $sql);

     $sql="UPDATE tabla_navegador SET uso = '1' WHERE tabla_navegador.titulo = '$titulo_pagina'";
     $consulta = mysqli_query($conexion, $sql);
     ?>
     
     <title><?php echo $titulo_pagina?></title>

    <?php 
    $ip="LOCALHOST";

    include('nav.php');?>
    <?php
    $cajonera=$_POST['familia'];
    $armario=$cajonera;
    $cajonera=$cajonera.'%';
    ?>
    <!-- Nav hasta aqui -->

    <h1 align="center">Kitting Taller Mantenimiento</h1>
    <br>
    <?php 
    include('kitting botones.php');
    ?>

<div class="col">
<div class="m-auto pt-3 pb-5 pl-5 pr-5 border rounded" style="background-color:#ECECEC; color: black">
    <h4 align="center"><u>Elementos pertenecientes a la cajonera nº <?php echo $armario?>.</u></h4>
                <br>
                <?php 

                        
                    ?>
                    <table align="center"class="table-bordered table-sm">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">NOMBRE</th>
                          <th scope="col">FAMILIA</th>
                          <th scope="col">MABEC</th>
                          <th scope="col">CAJONERA</th>
                          <th scope="col">UNIDADES EN STOCK</th>
                          <th scope="col">STOCK NOMINAL</th>
                          <th scope="col">STOCK PEDIDO</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <?php

                        $consulta = "SELECT * FROM `kitting_elementos_estado` WHERE `cajonera` LIKE '$cajonera'";
                        $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));

                        while ($row = mysqli_fetch_array($resultado)) {
                        $nombre=$row['nombre'];
                        $familia=$row['familia'];
                        $mabec=$row['mabec'];
                        $estado=$row['estado'];
                        $cajonera=$row['cajonera'];                            
                        $unidadesstock=$row['unidades en stock'];
                        $observaciones=$row['observaciones'];
                        $stocknominal=$row['stock nominal'];
                        $stockpedido=$row['stock pedido'];
                        $formato=$row['formato'];


                        switch ($estado) {
                            case "0":
                                $color="green";
                                break;
                            case "1":
                                $color="orange";
                                break;
                            case "2":
                                $color="red";
                                break;
                            case "3":
                                $color="blue";
                                break;
                            case "4":
                                $color="";
                                break;
                        }  
                        
                        echo '
                            <th scope="row">
                                <div align="left" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                                    <div class="ml-1 mr-1 pl-1 pr-1">
                                    <form action="kitting sacar.php" method="POST">  
                                        <input type="submit" value="Sacar" class="btn btn-primary">
                                        <input type="hidden" id="mabec" name="mabec" value="'.$mabec.'">
                                    </form>
                                    </div>
                                    <div class="ml-1 mr-1 pl-1 pr-1">
                                    <form action="kitting introducir.php" method="POST">  
                                        <input type="submit" value="Introducir" class="btn btn-secondary">
                                        <input type="hidden" id="mabec" name="mabec" value="'.$mabec.'">
                                    </form>
                                    </div>
                                    <div class="ml-1 mr-1 pl-1 pr-1">
                                    <form action="kitting pedir.php" method="POST">  
                                        <input type="submit" value="Pedir" class="btn btn-danger">
                                        <input type="hidden" id="mabec" name="mabec" value="'.$mabec.'">
                                    </form>
                                    </div>
                                </div>
                            </th>
                            <td style="color:'.$color.'" class="align-middle">'.$nombre.'</td>
                            <td style="color:'.$color.'" class="text-center align-middle">'.$familia.'</td>';

                            // AÑADIDO DESDE AQUI

                            $plano= $row['plano'];

                            
                            if ($plano != "1") {
                                echo ' <td style="color:'.$color.'" class="text-center align-middle">'.$mabec.'</td>';
                              }
                            else{

                                echo ' <td style="color:'.$color.'" class="text-center align-middle"><a href="http://'.$ipserver.'/C-WIDO/imagenes/'.$mabec.$formato.'" target="_blank">'.$mabec.'</a></td>';

                            }

                            // HASTA AQUI
                            echo'
                            <td style="color:'.$color.'" class="text-center align-middle">'.$cajonera.'</td>
                            <td style="color:'.$color.'" class="text-center align-middle">'.$unidadesstock.'</td>
                            <td style="color:'.$color.'" class="align-middle">'.$stocknominal.'</td>
                            <td style="color:'.$color.'" class="align-middle">'.$stockpedido.'</td>
                        </tr>';
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