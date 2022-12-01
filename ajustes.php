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

    include('nav.php');
    
    ?>

    <!-- Nav hasta aqui -->


<h1 align="center">AJUSTES</h1>     

    

       
            <!--  Columna 1, DATOS GENERALES PARA LA CREACION DE UNA OT -->
        <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1"  >
            <!-- <div  class="col-4 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark ">
            </div> -->

            <div  class="col-3 mx-auto mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border border-dark rounded" style="background-color:#E0F4F2;">
                <div align="center" class=" mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 " >
                    <label><strong>Opciones:</strong></label>
                </div>
                
                <div>
                    <div class="text-left  align-middle mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" >
                        <form  class="text-center" style="font-style: italic; font-weight: bold;" action="ajustes usuario.php" method="POST" enctype="multipart/form-data">
                            <div >
                            <input type="submit" name="submit" value="Ajustes usuario." class="btn btn-secondary align-middle btn-lg btn-block">
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="text-left  align-middle mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" >
                        <form  class="text-center" style="font-style: italic; font-weight: bold;" action="ajustes mantenimiento.php" method="POST" enctype="multipart/form-data">
                            <div >
                            <input type="submit" name="submit" value="Ajustes kitting mantenimiento." class="btn btn-secondary align-middle btn-lg btn-block">
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="text-left  align-middle mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" >
                        <form  class="text-center" style="font-style: italic; font-weight: bold;" action="ajustes descarga tablas.php" method="POST" enctype="multipart/form-data">
                            <div >
                            <input type="submit" name="submit" value="Descargar Tablas" class="btn btn-secondary align-middle btn-lg btn-block">
                            </div>
                        </form>
                    </div>                        
                    <br>
                    <!-- <div class="text-left  align-middle mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" >
                        <form  class="text-center" style="font-style: italic; font-weight: bold;" action="libro_relevos_fabricacion_menu.php" method="POST" enctype="multipart/form-data">
                            <div >
                            <input type="submit" name="submit" value="PRUEBA LIBRO DE RELEVOS" class="btn btn-secondary align-middle btn-lg">
                            </div>
                        </form>
                    </div>          -->
                    <!-- <div class="text-left  align-middle mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" >
                        <form  class="text-center" style="font-style: italic; font-weight: bold;" action="hoja_intervencion_menu.php" method="POST" enctype="multipart/form-data">
                            <div >
                            <input type="submit" name="submit" value="Prueba Hoja Intervencion" class="btn btn-secondary align-middle btn-lg">
                            </div>
                        </form>
                    </div>          -->
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