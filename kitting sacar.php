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
    $mabec=$_POST['mabec'];
    include('nav.php');?>

    <!-- Nav hasta aqui -->

    <h1 align="center">Kitting Taller Mantenimiento</h1>
    <br>
    <?php 
    include('kitting botones.php');
    ?>  

<div class="col">
    <div class="m-auto pt-3 pb-5 pl-5 pr-5 border rounded" style="background-color:#ECECEC; color: black">
        <h4 align="center"><u>Extraer elemento.</u></h4>
            <br>
            <form action="kitting sacar support.php" method="POST">
                <div class="container justify-content-center mr-auto ml-auto mt-1 mb-3" style="width: 88%" >
                    <div class="row justify-content-center mr-auto ml-auto mt-1 mb-3" style="width: 88%" >
                            <div class="d-flex justify-content-center pt-2 pb-2 pl-2 pr-2 " style= "border:muted 3px solid">
                                <!-- <input type="button" onClick="restar5();" value="-5" class="btn btn-primary"> -->
                                <input type="button" onClick="restar1();" value="-1" class="btn btn-secondary">
                                <input type="text" id="cantidad" name="cantidad" value="0"required style="text-align:center">
                                <input type="button" onClick="sumar1();" value="+1" class="btn btn-secondary">
                                <!-- <input type="button" onClick="sumar5();" value="+5" class="btn btn-primary"> -->
                                <input type="hidden" id="mabec" name="mabec" value="<?php echo $mabec?>"> 


                                <script type="text/javascript">
                                    var valor=0;
                                    function sumar1() {
                                        valor=valor+1;
                                        document.getElementById("cantidad").value=valor;
                                    }
                                    function restar1() {
                                        if (document.getElementById("cantidad").value == 0) {
                                        } else
                                        valor=valor-1;
                                        document.getElementById("cantidad").value=valor;
                                    }
                                    function sumar5() {
                                        valor=valor+5;
                                        document.getElementById("cantidad").value=valor;
                                    }
                                    function restar5() {
                                        if (document.getElementById("cantidad").value < 5) {
                                        } else
                                        valor=valor-5;
                                        document.getElementById("cantidad").value=valor;
                                    }                      
                                </script>
                            </div>             
                    </div>
                    <div class="row justify-content-center mr-auto ml-auto mt-1 mb-3" style="width: 88%" >
                            <div class="d-flex justify-content-center pt-2 pb-2 pl-2 pr-2" style= "border:muted 3px solid">
                                <input type="submit" value="Extraer elemento" class="btn btn-primary">
                            </div>             
                    </div>
                </div>        
            </form>

                    <table align="center"class="table-bordered table-sm">
                      <thead>
                        <tr>
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

                        $consulta = "SELECT * FROM `kitting_elementos_estado` WHERE `mabec` ='$mabec'";
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
                        $mystring = $cajonera;
                        $findme   = '-';
                        $pos = strpos($mystring, $findme);
                        $armario=substr($cajonera, 0, $pos);

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
                            <td style="color:'.$color.'" class="align-middle">'.$nombre.'</td>
                            <td style="color:'.$color.'" class="text-center align-middle">'.$familia.'</td>
                            <td style="color:'.$color.'" class="text-center align-middle">'.$mabec.'</td>
                            <td style="color:'.$color.'" class="text-center align-middle">'.$cajonera.'</td>
                            <td style="color:'.$color.'" class="text-center align-middle">'.$unidadesstock.'</td>
                            <td style="color:'.$color.'" class="align-middle">'.$stocknominal.'</td>
                            <td style="color:'.$color.'" class="align-middle">'.$stockpedido.'</td>

                        </tr>';
                    }
                        ?>
                      </tbody>
                    </table>
                    <br>
                <div class="row-10 justify-content-center mr-auto ml-auto mt-1 mb-3" style="width: 88%" >
                    <img src="imagenes/kitting cajonera <?php echo $armario?>.png" class="img-fluid">
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

</body>
</html>