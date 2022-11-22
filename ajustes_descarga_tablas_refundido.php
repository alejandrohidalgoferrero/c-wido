<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
     <script lang="javascript" src="dist/xlsx.full.min.js"></script>

</head>

<body style="background-color: #D8F5CA" class="text-muted">

    <!-- Nav desde aqui -->
    <?php
     $titulo_pagina= "Ajustes";
     include("conexion.php");
     $fecha_inicio=$_POST['fecha_inicio'];
     $fecha_fin=$_POST['fecha_fin'];

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

<h1 align="center">Descargar Tabla refundido del <?php echo date("d-m-Y",strtotime($fecha_inicio)) ?> hasta el <?php echo date("d-m-Y",strtotime($fecha_fin)) ?></h1>     

<div class="container mx-auto mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1   " style="background-color:#E0F4F2;">
    <div class="row justify-content-center mr-auto ml-auto mt-1 mb-1">
        <div class="col justify-content-center mt-1 mb-1 mr-1 ml-1 ">
            <a href="ajustes descarga tablas.php" class="btn btn-info"> Volver</a>    
        </div>
        <div class="col justify-content-center mt-1 mb-1 mr-1 ml-1 ">
            <input type="button" class="btn btn-info" onclick="descargar_tabla()" value="Descargar">
            <script>
                function descargar_tabla() {
                    var table_elt = document.getElementById("tabla1");
                    // Extract Data (create a workbook object from the table)
                    var workbook = XLSX.utils.table_to_book(table_elt);
                
                    // Process Data (add a new row)
                    var ws = workbook.Sheets["Sheet1"];
                    XLSX.utils.sheet_add_aoa(ws, [["Created "+new Date().toISOString()]], {origin:-1});
                
                    // Package and Release Data (`writeFile` tries to write and save an XLSB file)
                    XLSX.writeFile(workbook, "Piezas refundidas desde <?php echo date("d-m-Y",strtotime($fecha_inicio)) ?> hasta <?php echo date("d-m-Y",strtotime($fecha_fin)) ?>.xlsb");
                }
            </script>
        </div>
    </div>
    <div class="row justify-content-center mr-auto ml-auto mt-1 mb-1">
        <table id="tabla1"style="text-align: center; border-color:black;" align="center"  class="table table-striped table-sm table-bordered border-dark">
            <thead class="thead-dark">            
                <th class="align-middle">Fecha</th>
                <th class="align-middle">Turno</th>
                <th class="align-middle">Datamatrix</th>
                <th class="align-middle">Operario</th>
                <th class="align-middle">Origen</th>
            </thead> 
            <tbody>
            <?php   
                $consulta = "SELECT * FROM `piezas_refundidas_registro` WHERE `fecha`>='$fecha_inicio' AND `fecha`<='$fecha_fin'";
                $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));
                while ($row = mysqli_fetch_array($resultado)) {
                    echo '<tr>';
                        echo '<td class="align-middle">'.$row['fecha'].'</td>';
                        echo '<td class="align-middle">'.$row['turno'].'</td>';
                        echo '<td class="align-middle">'.$row['datamatrix'].'</td>';
                        echo '<td class="align-middle">'.$row['operario'].'</td>';
                        echo '<td class="align-middle">'.$row['origen'].'</td>';
                    echo '</tr>';
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