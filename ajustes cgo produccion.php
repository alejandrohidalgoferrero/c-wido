<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">


</head>

<body style="background-color: #D7BDE2" class="text-muted">

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


<h1 align="center">AJUSTES CGO PRODUCCIÓN</h1>     

    

       
            <!--  Columna 1, DATOS GENERALES PARA LA CREACION DE UNA OT -->
        <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1"  >
            <!-- <div  class="col-4 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark ">
            </div> -->

            <div  class="col-10 mx-auto mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">
                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 " >
                    <label><strong>Opciones:</strong></label>
                </div>
                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                    <div align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                        Nº de semana:
                    </div>
                    <div align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                        <input type="number" class="form-control" id="semana" name="semana" min="1" max="53">
                    </div>
                </div>
                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                    <div align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                        Producción por turno:
                    </div>
                    <div align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                        <input type="number" class="form-control" id="produccion_turno" name="produccion_turno">
                    </div>
                </div>
                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                    <div align="center" class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                        <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                            Turnos:
                        </div>
                        <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                            <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    <strong>LUNES</strong>
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                        <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                            <label class="form-check-label" for="turno_a">
                                        </div>  
                                        <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                            <label class="form-check-label" for="turno_a">Mañana</label>
                                        </div>                                        
                                    </div>
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    Tarde
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    Noche
                                </div>
                            </div>
                            <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    <strong>MARTES</strong>
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    Mañana
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    Tarde
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    Noche
                                </div>
                            </div>
                            <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    <strong>MIÉRCOLES</strong>
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    Mañana
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    Tarde
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    Noche
                                </div>
                            </div>
                            <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    <strong>JUEVES</strong>
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                        Mañana
                                    </div>
                                    <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                        input
                                    </div>
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                        Tarde
                                    </div>
                                    <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                        input
                                    </div>
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                        Noche
                                    </div>
                                    <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                        input
                                    </div>
                                </div>
                            </div>
                            <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    <strong>VIERNES</strong>
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                        Mañana
                                    </div>
                                    <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                        input
                                    </div>                                
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    Tarde
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    Noche
                                </div>
                            </div>
                            <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    <strong>SABADO</strong>
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                            Mañana
                                        </div>
                                        <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                            input
                                        </div>                                
                                    </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    Tarde
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    Noche
                                </div>
                            </div>
                            <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    <strong>DOMINGO</strong>
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                            Mañana
                                        </div>
                                        <div align="center" class="col  mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 border rounded">
                                            input
                                        </div>                                
                                    </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    Tarde
                                </div>
                                <div align="center" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 ">
                                    Noche
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> 
    <br>
    <br>
    <br>

    <!-- Footer -->
    <?php echo file_get_contents('http://'.$ip.'/M-WIDO/footer.php');?>
    <!-- Footer -->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

</body>
</html>