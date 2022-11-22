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

    include('nav.php')?>

    <!-- Nav hasta aqui -->


<h1 align="center">AJUSTES. ADJUNTAR ELEMENTO.</h1>
<br>

 <form  class="text-center" style="font-style: italic; font-weight: bold;" action="ajustes mantenimiento adjuntar guardar.php" method="POST" enctype="multipart/form-data">  
 <?php
        $id=$_POST['id'];
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
        
        ?>         
              
        <input type="hidden" id="id2" name="id2" value=<?php echo $id?>> 

            <!--  Columna 1, DATOS GENERALES PARA LA CREACION DE UNA OT -->
        <div class="row justify-content-md-center mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" style="align-items-start" >
        <font size="1" face="Arial">  

            <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">

                <br>  
                
                <table border="1" align="center">
                        <tr>                                
                            <td style="background-color: #EEF1AF;"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">Id </div></td>
                            <td style="background-color: #EEF1AF;"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">MARCA</div></td>
                            <td style="background-color: #EEF1AF;"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">NOMBRE</div></td>
                            <td style="background-color: #EEF1AF;"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">FAMILIA</div></td>
                            <td style="background-color: #EEF1AF;"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">MABEC</div></td>
                            <td style="background-color: #EEF1AF;"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">CAJONERA</div></td>
                            <td style="background-color: #EEF1AF;"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">Unidades stock </div></td>
                            <td style="background-color: #EEF1AF;"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">Stock mínimo </div></td>
                            <td style="background-color: #EEF1AF;"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">Stock nominal </div></td>
                            <td style="background-color: #EEF1AF;"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">Stock pedido </div></td>
                            <td style="background-color: #EEF1AF;"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">Observaciones </div></td>
                        </tr>
                            <?php 
                                $color="background-color: #FFDBFF;"; 
                                $consulta = "SELECT * FROM kitting_elementos_estado WHERE id='$id'";
                                $resultado = mysqli_query($conexion, $consulta);
                                $contador =1;                       
                                while ($row = mysqli_fetch_array($resultado)) {
                                $id=$row['id'];             
                                if($id%2==0){$background=$color;}else{$background="";}
                            ?>
                        <tr >

                            <?php 
                                if ($row['plano']!="1" ) {$checked="";}else{$checked="checked";}
                                    echo '<td style="'.$background.'"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">'.$row['id'].'</div></td>';
                                    echo '<td style="'.$background.'"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">'.$row['marca'].'</div></td>';
                                    echo '<td style="'.$background.'"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">'.$row['nombre'].'</div></td>';
                                    echo '<td style="'.$background.'"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">'.$row['familia'].'</div></td>';                                 
                                    echo '<td style="'.$background.'"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">'.$row['mabec'].'</div></td>';
                                    echo '<td style="'.$background.'"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">'.$row['cajonera'].'</div></td>';
                                    echo '<td style="'.$background.'"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">'.$row['unidades en stock'].'</div></td>';
                                    echo '<td style="'.$background.'"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">'.$row['stock minimo'].'</div></td>';
                                    echo '<td style="'.$background.'"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">'.$row['stock nominal'].'</div></td>';
                                    echo '<td style="'.$background.'"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">'.$row['stock pedido'].'</div></td>';
                                    echo '<td style="'.$background.'"><div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">'.$row['observaciones'].'</div></td>';
                            ?>
                        </tr>
                            <?php
                                $contador++;
                                } 
                            ?>                
                    </table>  
                    <br>                                
            </div>                                     
            </div>
            </div> 
        </font>         
        </div> 
        <div class="row justify-content-md-center mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" style="align-items-start" >
            Seleccione el tipo de archivo.
        </div> 

        <div class="row justify-content-md-center mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" style="align-items-start" >
            <label class="radio-inline"><input type="radio" name="formato" value=".jpg">JPG</label>
            <label class="radio-inline"><input type="radio" name="formato" value=".pdf">PDF</label>
            <label class="radio-inline"><input type="radio" name="formato" value=".xls">Xls</label>
            <label class="radio-inline"><input type="radio" name="formato" value=".xlsm">Xlsm</label>
            <label class="radio-inline"><input type="radio" name="formato" value=".xlsx">Xlsx</label>

        </div> 

        <div class="row justify-content-md-center mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" style="align-items-start" >
            <div class="text-center border rounded  mt-1  mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" >
                <input type="submit" name="submit" value="Adjuntar elemento." class="btn btn-secondary"> 
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $row['id'];?>" class="align-middle">  
 
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