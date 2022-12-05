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

    include('nav.php')?>

    <!-- Nav hasta aqui -->

<h1 align="center">Checks SEGURIDAD</h1>

<!-- Auí introduciremos los contenidos que lleve la pagina -->



<div class="container-fluid  mt-2 mb-2 pt-1 pb-1 border ">
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="col-4 justify-content-center mr-1 ml-1 mt-1 mb-1" >
            <form action="checks_mto_seguridad_generacion.php"  method="POST"> 
                <div class="input-group">
                    <select required class="custom-select" id="tipo_check" name="tipo_check">
                        <option selected value="">Elija el tipo de check</option>
                        <option value="cancamos">Cáncamos</option>
                        <option value="eslingas">Eslingas</option>
                        <option value="radial">Radial</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Crear nuevo check</button>
                        <input type="hidden" name="tipo_generacion" id="tipo_generacion" value="nuevo">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <table class="table table-sm table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" style="vertical-align: middle" scope="col"></th>
                    <th class="text-center" style="vertical-align: middle" scope="col">Fecha</th>
                    <th class="text-center" style="vertical-align: middle" scope="col">Turno</th>
                    <th class="text-center" style="vertical-align: middle" scope="col">Operario</th>
                    <th class="text-center" style="vertical-align: middle" scope="col">Tipo de CHECK</th>
                    <th class="text-center" style="vertical-align: middle" scope="col">Elemento</th>
                    <th class="text-center" style="vertical-align: middle" scope="col">Comentarios</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $consulta = "SELECT * FROM `checks_mto_seguridad_registro`";
                  $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));
                  while ($row = mysqli_fetch_array($resultado)) {
            ?>
                <tr>
                    <td class="w-auto text-center">
                        <form action="checks_mto_seguridad_generacion.php"  method="POST"> 
                            <button type="submit" name="" id="" class="btn btn-info">VER <?php echo $row['id_check']?></button>
                            <input type="hidden" name="tipo_generacion" id="tipo_generacion" value="modificar">
                            <input type="hidden" name="id_check" id="id_check" value="<?php echo $row['id_check']?>">
                            <input type="hidden" name="tipo_check" id="tipo_check" value="<?php echo $row['tipo_check']?>">

                        </form>
                    </td>
                    <td class="text-center" style="vertical-align: middle">
                        <?php 
                        //echo date("d-m-Y", $row['fecha'])
                        echo $row['fecha'];
                        ?>
                    </td>
                    <td class="text-center" style="vertical-align: middle">
                        <?php echo $row['turno']?>
                    </td>
                    <td class="text-center" style="vertical-align: middle">
                        <?php echo $row['usuario_modificacion']?>
                    </td>
                    <td class="text-center" style="vertical-align: middle">
                        <?php echo $row['tipo_check']?>
                    </td>
                    <td class="text-center" style="vertical-align: middle">
                        <?php echo $row['elemento']?>
                    </td>
                    <td class="text-center" style="vertical-align: middle">
                        <?php echo $row['comentarios']?>
                    </td>
                </tr>
            <?php 
                  }
            ?>
            </tbody>
        </table>
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