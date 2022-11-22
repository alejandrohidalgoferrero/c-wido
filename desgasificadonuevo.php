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
     $titulo_pagina= "HORNOS";
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
    
    $consulta = "SELECT MAX(id) AS id FROM hornos_desgasificado";               
    $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));
    
    if ($row = mysqli_fetch_row($resultado)) {
       $id = trim($row[0]);
       }
   
    
   ?>

    <!-- Nav hasta aqui -->

<h1 align="center">Registro programa desgasificado.</h1>

<!-- Auí introduciremos los contenidos que lleve la pagina -->

        <form action="desgasificado guardar.php" method="POST"> 
            <div class="d-flex justify-content-center pt-2 pb-2 pl-2 pr-2" style= "border:muted 3px solid">               
                <input type="submit" value="GUARDAR" class="btn btn-primary">
            </div>             
        

        <?php
            $hora=date("H:i:s");
            $turno="";
            if(strtotime($hora)>=strtotime('00:00:00') and strtotime($hora)<=strtotime('05:59:59') ) {$turno="Noche";} 
            if(strtotime($hora)>=strtotime('06:00:00') and strtotime($hora)<=strtotime('13:59:59') ) {$turno="Mañana";} 
            if(strtotime($hora)>=strtotime('14:00:00') and strtotime($hora)<=strtotime('21:59:59') ) {$turno="Tarde";} 
            if(strtotime($hora)>=strtotime('22:00:00') and strtotime($hora)<=strtotime('23:59:59') ) {$turno="Noche";} 
            
        



            $sql = "SELECT * FROM tabla_navegador WHERE `tabla_navegador`.`titulo` = 'usuario'";
            $consulta = mysqli_query($conexion, $sql); 
            while ($row = mysqli_fetch_array($consulta)) {
                $numero_empresa=$row['usuario']; 
            };

            $sql = "SELECT * FROM usuarios WHERE `usuarios`.`numero empresa` = '$numero_empresa'  ";
            $consulta = mysqli_query($conexion, $sql); 
            while ($row = mysqli_fetch_array($consulta)) {
                $nombre=$row['nombre']; 
                $apellido1=$row['apellido1']; 
                $apellido2=$row['apellido2'];
                $tipo_usuario=$row['tipo'];
                

            };
 
            ?>
<br>
<div align="center" class="mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  ">
    <div align="center"class="col-8 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 " style="background-color:#E0F4F2;">
        <div class="row justify-content-md-center ">        
            <div align="center"class="col-5 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded " style="background-color:#E0F4F2;">
                <div class=" mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-left" >
                    <label class="ml-1 mr-1 pl-1 pr-1" for="id"><strong>ID:</strong></label>
                    <label class="ml-1 mr-1 pl-1 pr-1" name="id" id="id" for="id"><strong><?php echo $id;?></strong></label>
                    <input type="hidden" id="id" name="id" value=<?php echo $id?>>

                </div>
                <div class=" mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-left" >
                    <label class="ml-1 mr-1 pl-1 pr-1" for="Fecha:"><strong>Fecha:</strong></label>
                    <input type="date" id="fecha" required name="fecha" value="<?php echo date("Y-m-d");?>">
                </div>
                <div class=" mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  text-left">
                    <label  class="ml-1 mr-1 pl-1 pr-1" for="turno:"><strong>Turno:</strong></label>
                    <?php                           
                            echo '<label for="turno"  ></label>      
                                <select class="border rounded"  type="text" required name="turno" id="turno">';
                                
                                    $default ="$turno";
                                    $states = array(""=>"","Mañana"=>"Mañana","Tarde"=>"Tarde","Noche"=>"Noche");          
                                    foreach($states as $key=>$val) {
                                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                    }
                    ?>
                    </select>
                </div> 
                <div class=" mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-left">
                    <label class="ml-1 mr-1 pl-1 pr-1"  for="operario:"><strong>Operario:</strong></label>
                    <?php echo '<input class="border rounded"   type="text" name="operario" id="operario"  value="'.$nombre.' '.$apellido1.' '.$apellido2.'"/>';?>          
                </div> 
                <div class=" mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-left">
                    <label class="ml-1 mr-1 pl-1 pr-1"  for="tiempo:"><strong>Programa desgasificado </strong></label>
                    <!-- <input class="border rounded"   type="text" name="programa" id="programa"  value=""/>  -->
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="programa" value="Programa 1. 3 minutos con sales"><u>Programa 1:</u> 3 minutos con sales
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="programa" value="Programa 2. 3 minutos sin sales"><u>Programa 2:</u> 3 minutos sin sales
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="programa" value="Programa 3. 5 minutos con sales"><u>Programa 3:</u> 5 minutos con sales
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="programa" value="Programa 4. 5 minutos sin sales"><u>Programa 4:</u> 5 minutos sin sales
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="programa" value="Programa 5. 7 minutos con sales"><u>Programa 5:</u> 7 minutos con sales
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="programa" value="Programa 6. 7 minutos sin sales"><u>Programa 6:</u> 7 minutos sin sales
                      </label>
                    </div>




                </div> 
            </div>
            <div align="center"class="col-6 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">
                <div class=" mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-left">
                    <label class="ml-1 mr-1 pl-1 pr-1"  for="horno"><strong>Horno origen:</strong></label>
                    <div class="form-check-inline">
                      <input type="radio" class="form-check-input" id="1" name="horno" value="1">
                      <label for="1">1</label>
                    </div>

                    <div class="form-check-inline">
                      <input type="radio" class="form-check-input" id="2" name="horno" value="2">
                      <label for="2">2</label>
                    </div>

                    <div class="form-check-inline">
                      <input type="radio" class="form-check-input" id="3" name="horno" value="3">
                      <label for="3">3</label>
                    </div>
                    <div class="form-check-inline">
                      <input type="radio" class="form-check-input" id="4" name="horno" value="4">
                      <label for="4">4</label>
                    </div>
                </div> 
                <div class=" mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-left">
                    <label class="ml-1 mr-1 pl-1 pr-1"  for="desgasificadora:"><strong>Desgasificadora:</strong></label>
                    <div class="form-check-inline">
                      <input type="radio" class="form-check-input" id="1" name="desgasificadora" value="1">
                      <label for="1">1</label>
                    </div>
                    <div class="form-check-inline">
                      <input type="radio" class="form-check-input" id="2" name="desgasificadora" value="2">
                      <label for="2">2</label>
                    </div>
                </div> 
                <div class=" mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-left">
                    <label class="ml-1 mr-1 pl-1 pr-1"  for="inyectora:"><strong>Inyectora destino:</strong></label>
                    <div class="form-check-inline">
                      <input type="radio" class="form-check-input" id="1" name="inyectora" value="1">
                      <label for="1">1</label>
                    </div>

                    <div class="form-check-inline">
                      <input type="radio" class="form-check-input" id="2" name="inyectora" value="2">
                      <label for="2">2</label>
                    </div>

                    <div class="form-check-inline">
                      <input type="radio" class="form-check-input" id="3" name="inyectora" value="3">
                      <label for="3">3</label>
                    </div>
                    <div class="form-check-inline">
                      <input type="radio" class="form-check-input" id="4" name="inyectora" value="4">
                      <label for="4">4</label>
                    </div>
                    <div class="form-check-inline">
                      <input type="radio" class="form-check-input" id="5" name="inyectora" value="5">
                      <label for="5">5</label>
                    </div>

                    <div class="form-check-inline">
                      <input type="radio" class="form-check-input" id="2" name="inyectora" value="6">
                      <label for="6">6</label>
                    </div>

                    <div class="form-check-inline">
                      <input type="radio" class="form-check-input" id="3" name="inyectora" value="7">
                      <label for="7">7</label>
                    </div>
                </div>

                <div class=" mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-left">
                    <textarea id="comentarios" name="comentarios" rows="3" cols="60" placeholder="Comentarios"></textarea>
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