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

    include('nav.php');
    
    $id=$_POST['id'];
    $sql = "SELECT * FROM `cambio_molde_registro` WHERE `cambio_molde_registro`.`id` = '$id'  ";
    $consulta = mysqli_query($conexion, $sql);
    
      while ($row = mysqli_fetch_array($consulta)) {
        $inyectora=$row['inyectora'];
        $moldesaliente=$row['molde saliente'];
        $improntasaliente= $row['impronta saliente'];
        $tipopiezasaliente=$row['tipo pieza saliente'];
        $moldeentrante= $row['molde entrante'];
        $improntaentrante=$row['impronta entrante'];
        $tipopiezaentrante= $row['tipo pieza entrante'];
        $estado=$row['estado'];
        $fechacreacion=$row['fechacreacion'];
        $fecha1=$row['fecha1'];
        $comentarios1=$row['comentarios1'];
        $fecha2=$row['fecha2'];
        $comentarios2=$row['comentarios2'];
        $fecha3=$row['fecha3'];
        $comentarios3=$row['comentarios3'];
        $fecha4=$row['fecha4'];
        $comentarios4=$row['comentarios4'];
        $fecha5=$row['fecha5'];
        $comentarios5=$row['comentarios5'];
      }
    $date1=strftime('%Y-%m-%dT%H:%M:%S', strtotime($fecha1));
    $date2=strftime('%Y-%m-%dT%H:%M:%S', strtotime($fecha2));
    $date3=strftime('%Y-%m-%dT%H:%M:%S', strtotime($fecha3));
    $date4=strftime('%Y-%m-%dT%H:%M:%S', strtotime($fecha4));
    $date5=strftime('%Y-%m-%dT%H:%M:%S', strtotime($fecha5));





    ?>
    <!-- Nav hasta aqui -->

<h1 align="center">Cambio molde en la inyectora <?php echo $inyectora?>.</h1>

<!-- Auí introduciremos los contenidos que lleve la pagina -->
<div class="container-fluid justify-content-center" style="background-color:#E0F4F2;">
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  justify-content-center">
        <div class="col-2 pt-2 pb-2 pl-2 pr-2 justify-content-center" style= "border:muted 3px solid">               
            <input type="submit" value="Guardar" class="btn btn-primary btn-block" form="formulario">
        </div>             
    </div>        
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 justify-content-center ">
        <div class="col-3 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark text-center">
            <strong>Molde saliente: <?php echo $moldesaliente;?></strong>
        </div>
        <div class="col-3 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark text-center">
            <label><strong>Impronta saliente: <?php echo $improntasaliente;?></strong></label>
        </div>
        <div class="col-3 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark text-center">
            <label><strong>Tipo de pieza saliente: <?php echo $tipopiezasaliente;?></strong></label>
        </div>
    </div>
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 justify-content-center ">
        <div class="col-3 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark text-center">
            <label><strong>Molde entrante: <?php echo $moldeentrante;?></strong></label>
        </div>
        <div class="col-3 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark text-center">
            <label><strong>Impronta entrante: <?php echo $improntaentrante;?></strong></label>
        </div>
        <div class="col-3 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark text-center">
            <label><strong>Tipo de pieza entrante: <?php echo $tipopiezaentrante;?></strong></label>
        </div>
    </div>
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 justify-content-center ">
        <div class="col-1 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" >
            <form action="cambiomolde modificar.php" method="POST"> 
                <input style="vertical-align: middle;" type="submit" value="Modificar" class=" btn btn-warning btn-block">
                <input type="hidden" id="id" name="id" value="<?php echo $id?>">
            </form>
        </div>
    </div>
    <form action="cambiomolde realizar support.php" method="POST" id="formulario" name="formulario">
    <input type="hidden" id="id" name="id" value="<?php echo $id;?>">


    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 justify-content-center">
        <h3 align="center">Etapas:</h3>
    </div>

    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark">
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1">
            <strong>Etapa 1: Necesidad cambio molde.</strong>
        </div>
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1">
            <div class="row">
                <div class="col-2 justify-content-center">
                    <script type="text/javascript">
                        function completarHoraInicio1(){
                            var fecha = new Date(); //Fecha actual
                            var mes = fecha.getMonth()+1; //obteniendo mes
                            var dia = fecha.getDate(); //obteniendo dia
                            var ano = fecha.getFullYear(); //obteniendo año
                            var hora = fecha.getHours(); //obteniendo hora
                            var minutos = fecha.getMinutes(); //obteniendo minuto
                        
                            document.getElementById("fecha1").value=ano+"-"+minTwoDigits(mes)+"-"+minTwoDigits(dia)+"T"+minTwoDigits(hora)+":"+minTwoDigits(minutos);
                        }
                    
                        function minTwoDigits(n) {
                            return (n < 10 ? '0' : '') + n;
                        }
                    </script>
                    <button type="button" class="btn btn-info" onclick="completarHoraInicio1()">AUTO</button>
                </div>
                <div class="col justify-content-center">
                    <input type="datetime-local"  id="fecha1" name="fecha1" class="form-control" value="<?php echo $date1;?>">
                </div>
            </div>
        </div>
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1">
            <textarea class="form-control" rows="1" name="comentarios1" id="comentarios1" placeholder="Motivos del cambio de molde..."><?php echo $comentarios1;?></textarea>
        </div>
    </div>

    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark">
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1">
            <strong>Etapa 2: Tomada decisión de cambio de molde. TOP PARADA.</strong>
        </div>
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1">
            <div class="row">
                <div class="col-2 justify-content-center">
                    <script type="text/javascript">
                        function completarHoraInicio2(){
                            var fecha = new Date(); //Fecha actual
                            var mes = fecha.getMonth()+1; //obteniendo mes
                            var dia = fecha.getDate(); //obteniendo dia
                            var ano = fecha.getFullYear(); //obteniendo año
                            var hora = fecha.getHours(); //obteniendo hora
                            var minutos = fecha.getMinutes(); //obteniendo minuto
                        
                            document.getElementById("fecha2").value=ano+"-"+minTwoDigits(mes)+"-"+minTwoDigits(dia)+"T"+minTwoDigits(hora)+":"+minTwoDigits(minutos);
                        }
                    
                        function minTwoDigits(n) {
                            return (n < 10 ? '0' : '') + n;
                        }
                    </script>
                    <button type="button" class="btn btn-info" onclick="completarHoraInicio2()">AUTO</button>
                </div>
                <div class="col justify-content-center">
                    <input type="datetime-local"  v-model="inicio" id="fecha2" name="fecha2" class="form-control"  value="<?php echo $date2;?>">
                </div>
            </div>
        </div>
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1">
            <textarea class="form-control" rows="1" name="comentarios2" id="comentarios2" placeholder="Motivos de la demora en la decisión..."><?php echo $comentarios2;?></textarea>
        </div>
    </div>
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark">
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1">
            <strong>Etapa 3: TOP ARRANQUE.</strong>
        </div>
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1">
            <div class="row">
                <div class="col-2 justify-content-center">
                    <script type="text/javascript">
                        function completarHoraInicio3(){
                            var fecha = new Date(); //Fecha actual
                            var mes = fecha.getMonth()+1; //obteniendo mes
                            var dia = fecha.getDate(); //obteniendo dia
                            var ano = fecha.getFullYear(); //obteniendo año
                            var hora = fecha.getHours(); //obteniendo hora
                            var minutos = fecha.getMinutes(); //obteniendo minuto
                        
                            document.getElementById("fecha3").value=ano+"-"+minTwoDigits(mes)+"-"+minTwoDigits(dia)+"T"+minTwoDigits(hora)+":"+minTwoDigits(minutos);
                        }
                    
                        function minTwoDigits(n) {
                            return (n < 10 ? '0' : '') + n;
                        }
                    </script>
                    <button type="button" class="btn btn-info" onclick="completarHoraInicio3()">AUTO</button>
                </div>
                <div class="col justify-content-center">
                    <input type="datetime-local"  v-model="inicio" id="fecha3" name="fecha3" class="form-control"  value="<?php echo $date3;?>">
                </div>
            </div>
        </div>
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1">
            <textarea class="form-control" rows="1" name="comentarios3" id="comentarios3" placeholder="Dificultades durante el cambio de molde..."><?php echo $comentarios3;?></textarea>
        </div>
    </div>
        <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 border rounded border-dark">
            <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1">
                <strong>Etapa 4: 30 piezas buenas.</strong>
            </div>
            <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1">
                <div class="row">
                    <div class="col-2 justify-content-center">
                        <script type="text/javascript">
                            function completarHoraInicio4(){
                                var fecha = new Date(); //Fecha actual
                                var mes = fecha.getMonth()+1; //obteniendo mes
                                var dia = fecha.getDate(); //obteniendo dia
                                var ano = fecha.getFullYear(); //obteniendo año
                                var hora = fecha.getHours(); //obteniendo hora
                                var minutos = fecha.getMinutes(); //obteniendo minuto
                            
                                document.getElementById("fecha4").value=ano+"-"+minTwoDigits(mes)+"-"+minTwoDigits(dia)+"T"+minTwoDigits(hora)+":"+minTwoDigits(minutos);
                            }
                        
                            function minTwoDigits(n) {
                                return (n < 10 ? '0' : '') + n;
                            }
                        </script>
                        <button type="button" class="btn btn-info" onclick="completarHoraInicio4()">AUTO</button>
                    </div>
                    <div class="col justify-content-center">
                        <input type="datetime-local"  v-model="inicio" id="fecha4" name="fecha4" class="form-control"  value="<?php echo $date4;?>">
                    </div>
                </div>
            </div>
            <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1">
                <textarea class="form-control" rows="1" name="comentarios4" id="comentarios4" placeholder="Dificultades con el molde nuevo..."><?php echo $comentarios4;?></textarea>
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