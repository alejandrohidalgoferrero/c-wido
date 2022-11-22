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
     $titulo_pagina= "HxH inyectoras";
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
    
    session_start();
    $fecha=$_SESSION['fecha'];
    $iny=$_SESSION['iny'];
    $inyectora=$_SESSION['inyectora'];
    $tabla=$_SESSION['tabla'];
    $tabla_problemas=$_SESSION['tabla_problemas'];

    $turno=$_POST['turno'];






    switch ($turno) {
        case "MAÑANA":
            $primera="6h-7h";
            $segunda="7h-8h";
            $tercera="8h-9h";
            $cuarta="9h-10h";
            $quinta="10h-11h";
            $sexta="11h-12h";
            $septima="12h-13h";
            $octava="13h-14h";
            break;
        case "TARDE":
            $primera="14h-15h";
            $segunda="15h-16h";
            $tercera="16h-17h";
            $cuarta="17h-18h";
            $quinta="18h-19h";
            $sexta="19h-20h";
            $septima="20h-21h";
            $octava="21h-22h";
            break;
        case "NOCHE":
            $primera="22h-23h";
            $segunda="23h-0h";
            $tercera="0h-1h";
            $cuarta="1h-2h";
            $quinta="2h-3h";
            $sexta="3h-4h";
            $septima="4h-5h";
            $octava="5h-6h";
            break;
    }
    ?>

    <!-- Nav hasta aqui -->

<h1 align="center">AÑADIR PARADA.</h1>


<!-- Auí introduciremos los contenidos que lleve la pagina -->
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center ">
<form action="hxh_inyectoras_añadirparada support.php" method="POST"> 
        <div class="col-4 pt-2 pb-2 pl-2 pr-2 " style= "border:muted 3px solid">               
            <input type="submit" value="Guardar" class="btn btn-primary">
            <input type="hidden" id="turno" name="turno" value="<?php echo $turno?>">
            <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre.' '.$apellido1.' '.$apellido2?>">
            <input type="hidden" id="parada" name="parada" value="<?php echo $parada?>">

        </div>             
    </div>
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 justify-content-center ">
        <div class="col-6 pt-2 pb-2 pl-2 pr-2 justify-content-center text-center text-dark border rounded" style= "background-color:#E0F4F2;">
            <label align="center" class="ml-1 mr-1 pl-1 pr-1" for="inyectora">
                <h3 align="center"><strong><?php echo $inyectora.' TURNO DE '.$turno?></strong></h3>
            </label>                                  
    

                <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col ml-1 mr-1" >
                        <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            <strong>OPERARIO: </strong><?php echo $nombre.' '.$apellido1.' '.$apellido2;?>
                        </label>
                    </div>
                </div>
                <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col ml-1 mr-1" >
                        <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            <strong>FECHA: </strong><?php echo $fecha?>
                        </label>
                    </div>
                </div>
 
                <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col ml-1 mr-1" >
                        <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            <strong>HORA INICIO:</strong>
                        </label>
                        <select class="border rounded"  type="text" required name="hora" id="hora">';
                            <?php                           
                                $default = "";
                                $states = array(""=>"","$primera"=>"$primera","$segunda"=>"$segunda","$tercera"=>"$tercera","$cuarta"=>"$cuarta","$quinta"=>"$quinta","$sexta"=>"$sexta","$septima"=>"$septima","$octava"=>"$octava");          
                                foreach($states as $key=>$val) {
                                    echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                }
                            ?>
                        </select> 
                    </div>
                </div>
                <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col ml-1 mr-1" >
                        <label class="align-middle ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            <strong>TIEMPO:</strong>
                        </label>
                        <input type="text" name="tiempo" id="tiempo"  value=""> 
                    </div>
                </div>
                <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col ml-1 mr-1" >
                        <label class="align-middle ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            <strong>SINTOMA:</strong>
                        </label>
                        <textarea class="align-middle" id="sintoma" name="sintoma" rows="1" cols="60" "></textarea>
                    </div>
                </div>
                <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col ml-1 mr-1" >
                        <label class=" align-middle ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            <strong>CAUSA:</strong>
                        </label>
                        <textarea class="align-middle" id="causa" name="causa" rows="1" cols="60" ></textarea>                  
                    </div>
                </div>
                <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col ml-1 mr-1" >
                        <label class=" align-middle ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            <strong>RESULTADO:</strong>
                        </label>
                        <textarea class="align-middle"id="resultado" name="resultado" rows="1" cols="60"></textarea>                        
                    </div>
                </div>
                <div class="row mt-1 mb-1 ml-1 mr-1 text-left text-dark" >
                    <div class="col ml-1 mr-1" >
                        <label class="ml-1 mr-1 pl-1 pr-1 text-left"  for="molde">
                            <strong>TIPO:</strong>
                        </label>
                        <select class="border rounded"  type="text" required name="tipo" id="tipo">';
                            <?php                           
                                $default = "";
                                $states = array(""=>"","ROTURA/GRIETA"=>"ROTURA/GRIETA","PIN ROTO"=>"PIN ROTO","AL PEGADO"=>"AL PEGADO"
                                ,"FUGAS MOLDE"=>"FUGAS MOLDE","VALVULA VACIO"=>"VALVULA VACIO","FALTA MATERIAL EN MOLDE"=>"FALTA MATERIAL EN MOLDE"
                                ,"FALTA MOLDE/MONTAJE"=>"FALTA MOLDE/MONTAJE","EXPULSORES"=>"EXPULSORES","BROCAS SUBMARINAS"=>"BROCAS SUBMARINAS"
                                ,"MOLDE SUCIO"=>"MOLDE SUCIO","OTROS"=>"OTROS","REFRIGERACION MOLDE"=>"REFRIGERACION MOLDE"

                                ,"NAMBU ROTO"=>"NAMBU ROTO","NOYOS"=>"NOYOS","EXCESO REBABA"=>"EXCESO REBABA"
                                ,"SATURACION T5"=>"SATURACION T5","ROBOT T5"=>"ROBOT T5","DATAMATRIX"=>"DATAMATRIX"
                                ,"SIERRA SIIF"=>"SIERRA SIIF","SATURACION SIIF"=>"SATURACION SIIF","ROBOT SIIF"=>"ROBOT SIIF"
                                ,"CONTROL VISUAL"=>"CONTROL VISUAL","TOPES"=>"TOPES","CUBA REFRIGERACIÓN"=>"CUBA REFRIGERACIÓN"
                                ,"CONTROL PIN"=>"CONTROL PIN","FUGA MAQUINA"=>"FUGA MAQUINA","CAMBIO CARRO"=>"CAMBIO CARRO"
                                ,"PARADA DE EMERGENCIA"=>"PARADA DE EMERGENCIA","ROBOT ASERRADO"=>"ROBOT ASERRADO","AGV"=>"AGV"
                                ,"FALTA CALDO"=>"FALTA CALDO","CONTROL INTEGRIDAD"=>"CONTROL INTEGRIDAD","FALLO T5"=>"FALLO T5"
                                ,"BROTHER"=>"BROTHER","PUENTE GRUA"=>"PUENTE GRUA","INSTALACIONES"=>"INSTALACIONES"
                                ,"ROBOT SPRAYADO"=>"ROBOT SPRAYADO","PISTON"=>"PISTON","PUERTA/PASARELA"=>"PUERTA/PASARELA"
                                ,"EXPULSIÓN DE PIEZA"=>"EXPULSIÓN DE PIEZA","REFRIGERACION MAQUINA"=>"REFRIGERACION MAQUINA","PMA LIMPIEZA"=>"PMA LIMPIEZA"
                                ,"HORNO MNTO"=>"HORNO MNTO","LIMPIEZA SPRAYADO"=>"LIMPIEZA SPRAYADO","NAMBU"=>"NAMBU"
                                ,"INTERVENCION BUHLER"=>"INTERVENCION BUHLER","LINGOTE"=>"LINGOTE","PMP"=>"PMP"
                                ,"ENGRASE CENTRAL"=>"ENGRASE CENTRAL","ACUMULADORES"=>"ACUMULADORES","FALTA HIDRÁULICO"=>"FALTA HIDRÁULICO"
                                ,"CUCHARA"=>"CUCHARA","CIERRE MOLDE"=>"CIERRE MOLDE","SEGURIDADES"=>"SEGURIDADES"
                                ,"VACIO MAQUINA"=>"VACIO MAQUINA");          
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