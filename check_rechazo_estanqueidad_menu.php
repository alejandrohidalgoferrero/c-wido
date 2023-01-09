<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="js/icofont/icofont.min.css">

          
</head>

<body style="background-color: #D8F5CA" class="text-muted">

<!-- Nav desde aqui -->
<?php
     $titulo_pagina= "Check rechazo estanqueidad";
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
    unset($_SESSION['id_check_rechazo_estanqueidad']);
    unset($_SESSION['orden']);
    ?>

    <!-- Nav hasta aqui -->

    
<h1 align="center">Check rechazo estanqueidad</h1>



<div class="container-fluid  mt-2 mb-2 pt-1 pb-1">
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="col-5 justify-content-center mr-1 ml-1 mt-1 mb-1">
            <form action="check_rechazo_estanqueidad_generacion.php" method="POST"> 
                <button style="vertical-align: middle;" type="submit" class=" btn btn-primary  btn-lg btn-block mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                    <small><strong>NUEVO CHECK</strong></small>
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
                        <th style="vertical-align: middle" scope="col">Inyectora</th>
                        <th style="vertical-align: middle" scope="col">MOLDE</th>
                        <th style="vertical-align: middle" scope="col">Tipo molde</th>
                        <th style="vertical-align: middle" scope="col">ESTADO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 

                            $sql = "SELECT DISTINCT(`id_check_rechazo_estanqueidad`) AS id_check_rechazo_estanqueidad, MAX(`orden`) as orden FROM `check_rechazo_estanqueidades_registro` GROUP BY `id_check_rechazo_estanqueidad` ORDER BY `id_check_rechazo_estanqueidad` DESC";
                            $consulta = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_array($consulta)) {
                                $array_id[]=$row['id_check_rechazo_estanqueidad'];
                                $array_orden[]=$row['orden'];
                            }

                            foreach($array_id as $key=> $id_check_rechazo_estanqueidad)
                            {
                                $orden=$array_orden[$key];

                                $texto_estado="";
                                unset($array_estados);
                                $sql = "SELECT * FROM `check_rechazo_estanqueidades_registro` WHERE `id_check_rechazo_estanqueidad`='$id_check_rechazo_estanqueidad' AND `orden`='$orden' ORDER BY `id_check_rechazo_estanqueidad` DESC";
                                $consulta = mysqli_query($conexion, $sql);
                                while ($row = mysqli_fetch_array($consulta)) {
                                    $array_estados[]=$row['estado'];
                                }
                                    $texto_estado='<span class="badge badge-success">OK</span>';
                                if (in_array(NULL, $array_estados)) {
                                    $texto_estado='<span class="badge badge-warning">PENDIENTE</span>';
                                }     
                                if (in_array("0", $array_estados)) {
                                    $texto_estado='<span class="badge badge-danger">KO</span>';
                                }     
                                $sql = "SELECT * FROM `check_rechazo_estanqueidades_registro` WHERE `id_check_rechazo_estanqueidad`='$id_check_rechazo_estanqueidad' AND `orden`='$orden' AND `id`=1  ORDER BY `id_check_rechazo_estanqueidad` DESC";
                                $consulta = mysqli_query($conexion, $sql);
                                while ($row = mysqli_fetch_array($consulta)) {
                                echo'
                                    <tr>
                                        <td>
                                            <form action="check_rechazo_estanqueidad_generacion.php" method="POST"> 
                                                <button type="submit" class="btn btn-info">Ver '.$orden.'</button>
                                                <input type="hidden" name="id_check_rechazo_estanqueidad" id="id_check_rechazo_estanqueidad" value="'.$row['id_check_rechazo_estanqueidad'].'">
                                                <input type="hidden" id="tipo_generacion" name="tipo_generacion" value="modificar"> 
                                            </form>
                                        </td>
                                        <td style="vertical-align: middle">'.$row['fecha'].'</td>
                                        <td style="vertical-align: middle">'.$row['turno'].'</td>
                                        <td style="vertical-align: middle">'.$row['inyectora'].'</td>
                                        <td style="vertical-align: middle">'.$row['molde'].'</td>
                                        <td style="vertical-align: middle">'.$row['tipo_pieza'].'</td>
                                        <td style="vertical-align: middle">'.$texto_estado.'</td>
                                    </tr>
                                ';
                                } 
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