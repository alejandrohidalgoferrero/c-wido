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



<form action="cambiomolde nuevo support.php" method="POST"> 
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center ">
            <input type="submit" value="Guardar" class="btn btn-primary">
    </div>
    <div class="container-fluid  mt-3 mb-5 pt-1 pb-1 justify-content-center" style="background-color:#E0F4F2;">
        <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center ">
            <div class="col-4 pt-2 pb-2 pl-2 pr-2 justify-content-center text-center text-dark"> 
                <label align="center" class="ml-1 mr-1 pl-1 pr-1" for="inyectora">
                    <strong>INYECTORA:</strong>
                </label>               
                <input class="form-control border rounded" type="text" name="inyectora" required id="inyectora"  value=""> 
            </div>
            <div class="col-4 pt-2 pb-2 pl-2 pr-2 justify-content-center text-center text-dark">
                <label align="center" class="ml-1 mr-1 pl-1 pr-1" for="inyectora">
                    <strong>Tipo de cambio:</strong>
                </label>               
                <select class="form-control border rounded"  type="text" required name="tipo_cambio" id="tipo_cambio">';
                    <?php                           
                        $default = "";
                        $states = array(""=>"","Heavy maintenance"=>"Heavy maintenance","Correctivo"=>"Correctivo");          
                        foreach($states as $key=>$val) {
                            echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                        }
                    ?>
                </select>  
            </div>                 
        </div>
        <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center ">
            <div class="col-4 pt-2 pb-2 pl-2 pr-2 justify-content-center text-center text-dark border rounded"> 
                <div class="row mt-1 mb-1 ml-1 mr-1 justify-content-center text-center text-dark" >
                    <label class="ml-1 mr-1 pl-1 pr-1" for="molde">
                        <strong>Molde saliente</strong>
                    </label>
                </div>
                <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col justify-content-center"> 
                        <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            Nº Molde (Holder Block):
                        </label>
                    </div>
                    <div class="col justify-content-center"> 
                        <input class="form-control border rounded" type="text" required name="moldesaliente" id="moldesaliente"  value=""> 
                    </div>
                </div>
                <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col justify-content-center"> 
                        <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            Nº de impronta:
                        </label>
                    </div>
                    <div class="col justify-content-center"> 
                        <input class="form-control border rounded" type="text" required name="improntasaliente" id="improntasaliente"  value=""> 
                    </div>

                </div>
                    <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                        <div class="col justify-content-center"> 
                            <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            Tipo de pieza:
                            </label>
                        </div>
                        <div class="col justify-content-center"> 
                            <select class="form-control border rounded"  type="text" required name="tipopiezasaliente" id="tipopiezasaliente">';
                                <?php                           
                                    $default = "";
                                    $states = array(""=>"","HR13"=>"HR13","HR10"=>"HR10","HR12"=>"HR12");          
                                    foreach($states as $key=>$val) {
                                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                    }
                                ?>
                            </select> 
                        </div> 
                    </div>
                </div>
                <div class="col-4 pt-2 pb-2 pl-2 pr-2 justify-content-center text-center text-dark border rounded"> 
                    <div class="row mt-1 mb-1 ml-1 mr-1 text-center text-dark" >
                        <div class="col ml-1 mr-1 ">
                            <label class="ml-1 mr-1 pl-1 pr-1" for="molde">
                                <strong>Molde entrante</strong>
                            </label>
                        </div>
                    </div>
                    <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                        <div class="col justify-content-center"> 
                            <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                                Nº Molde (Holder Block):
                            </label>
                        </div>
                        <div class="col justify-content-center"> 
                            <input class="form-control border rounded" type="text" required name="moldeentrante" id="moldeentrante"  value=""> 
                        </div>
                    </div>
                    <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                        <div class="col justify-content-center"> 
                            <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                                Nº de impronta:
                            </label>
                        </div>
                        <div class="col justify-content-center"> 
                            <input class="form-control border rounded" required type="text" name="improntaentrante" id="improntaentrante"  value=""> 
                        </div>        
                    </div>
                    <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                        <div class="col justify-content-center"> 
                            <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                                Tipo de pieza:
                            </label>
                        </div>
                        <div class="col justify-content-center"> 
                            <select class="form-control border rounded"  type="text" required name="tipopiezaentrante" id="tipopiezaentrante">';
                                <?php                           
                                    $default = "";
                                    $states = array(""=>"","HR13"=>"HR13","HR10"=>"HR10","HR12"=>"HR12");          
                                    foreach($states as $key=>$val) {
                                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                    }
                                ?>
                            </select> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</form>

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