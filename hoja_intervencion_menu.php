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
     $titulo_pagina= "Hoja de intervención";
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
    session_start();
    unset($_SESSION['id_risk_assement']);
    ?>

    <!-- Nav hasta aqui -->

    
<h1 align="center">Hoja intervención</h1>

<!-- Auí introduciremos los contenidos que lleve la pagina -->

<?php
    // $sql = "SELECT * FROM `risk_assesment_registro` WHERE `fecha_introducida` IS NULL";
    // $consulta = mysqli_query($conexion, $sql);
    // while ($row = mysqli_fetch_array($consulta)) {
    //     $id=$row['id'];
    //     $sql2="DELETE FROM `risk_assesment_registro` WHERE `id`='$id' ";
    //     $consulta2 = mysqli_query($conexion, $sql2);
    //     $sql3="DELETE FROM `risk_assesments_datos` WHERE `id_risk_assesment`='$id' ";
    //     $consulta3 = mysqli_query($conexion, $sql3);
    // }
?>

<div class="container-fluid  mt-2 mb-2 pt-1 pb-1">
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="col-5 justify-content-center mr-1 ml-1 mt-1 mb-1">
            <form action="hoja_intervencion_generacion.php" method="POST"> 
                <button style="vertical-align: middle;" type="submit" class=" btn btn-primary  btn-lg btn-block mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                    <small><strong>NUEVA HOJA DE INTERVENCIÓN</strong></small>
                </button>
                <input type="hidden" id="tipo_generacion" name="tipo_generacion" value="nuevo"> 
            </form>
        </div>
    </div>
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border rounded text-dark justify-content-center text-center" style="background-color:#E4E4E4;">

            <table class="table table-striped table-bordered" id="tabla_registro_hoja_intervencion" name="tabla_registro_hoja_intervencion">
                <thead class="thead-dark">
                    <tr>
                        <th style="vertical-align: middle" scope="col"></th>
                        <th style="vertical-align: middle" scope="col">Fecha</th>
                        <th style="vertical-align: middle" scope="col">Turno</th>
                        <th style="vertical-align: middle" scope="col">MOLDE</th>
                        <th style="vertical-align: middle" scope="col">Impronta</th>
                        <th style="vertical-align: middle" scope="col">JU Matricería</th>
                        <th style="vertical-align: middle" scope="col">JU Fabricación</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            $sql = "SELECT * FROM `hoja_intervencion_registro` ORDER BY `hoja_intervencion_registro`.`id_hoja_intervencion` DESC";
                            $consulta = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_array($consulta)) {
                            echo'
                                <tr>
                                    <td>
                                        <form action="hoja_intervencion_generacion.php" method="POST"> 
                                            <button type="submit" class="btn btn-info">Ver</button>
                                            <input type="hidden" name="id_hoja_intervencion" id="id_hoja_intervencion" value="'.$row['id_hoja_intervencion'].'">
                                            <input type="hidden" id="tipo_generacion" name="tipo_generacion" value="modificar"> 
                                        </form>
                                    </td>
                                    <td style="vertical-align: middle">'.date("d-m-Y", strtotime($row['fecha'])).'</td>
                                    <td style="vertical-align: middle">'.$row['turno'].'</td>
                                    <td style="vertical-align: middle">'.$row['molde'].'</td>
                                    <td style="vertical-align: middle">'.$row['impronta'].'</td>
                                    <td style="vertical-align: middle">'.$row['ju_matriceria'].'</td>
                                    <td style="vertical-align: middle">'.$row['ju_fabricacion'].'</td>
                                </tr>
                            ';
                            } 
                        ?>
                </tbody>
            </table>
        </div>
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