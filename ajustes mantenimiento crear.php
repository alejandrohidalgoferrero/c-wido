<!DOCTYPE html>
<html lang="es"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">

     <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="./dropzone/dist/min/dropzone.min.css" rel="stylesheet">
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

    include('nav.php')?>

    <!-- Nav hasta aqui -->


<h1 align="center">AJUSTES. CREAR ELEMENTO.</h1>
<br>

 <form  class="text-center" name="form1" style="font-style: italic; font-weight: bold;" action="ajustes mantenimiento crear guardar.php" method="POST" enctype="multipart/form-data">  
                            <input type="submit" name="submit" value="Guardar elemento." class="btn btn-secondary">   
<br>
       
            <!--  Columna 1, DATOS GENERALES PARA LA CREACION DE UNA OT -->
        <div class="row justify-content-md-center mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" style="align-items-start" >
          
            <div class="col-2 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">
                
                <div>
                 
                    <br>
                    <div class="text-left border rounded" >
                            <label for="Nombre"  >MARCA:</label>
                            <input type="text" name="marca" id="marca" placeholder="marca">  
                    </div>
                    <br>
                    <div class="text-left border rounded" >
                            <label for="Nombre"  >NOMBRE:</label>
                            <input type="text" name="nombre" id="nombre" placeholder="nombre"required>  
                    </div>
                    <br>
                    <div class="text-left border rounded" >
                            <label for="Nombre"  >FAMILIA:</label>
                            <!-- <input type="text" name="familia" id="familia" placeholder="familia"required>  -->
                            <select class="mdb-select md-form" type="text" name="familia" id="familia"required>
                                        <?php 
                                        $default = "";
                                        $states = array(""=>"", "AGV"=>"AGV", "CABLES"=>"CABLES","CASQUILLOS"=>"CASQUILLOS", "CAUDALIMETROS"=>"CAUDALIMETROS", "CILINDRO"=>"CILINDRO","CORREAS"=>"CORREAS", "DETECTORES"=>"DETECTORES","EJES"=>"EJES","ELECTRICO"=>"ELECTRICO","ENGRASE"=>"ENGRASE","EUCHNER"=>"EUCHNER","FILTROS"=>"FILTROS","FLUIDOS"=>"FLUIDOS","GUIA"=>"GUIA","HIDRAULICA"=>"HIDRAULICA","IGUS"=>"IGUS","JUNTAS"=>"JUNTAS","MANUTENCION"=>"MANUTENCION","MECANICA"=>"MECANICA","NEUMATICA"=>"NEUMATICA","NITROGENO"=>"NITROGENO","PALETAS"=>"PALETAS","PATIN"=>"PATIN","PLANOS"=>"PLANOS","QUEMADOR"=>"QUEMADOR","RODAMIENTO"=>"RODAMIENTO","TERMOPAR"=>"TERMOPAR","TOPES"=>"TOPES","TORNILLERIA"=>"TORNILLERIA","UTILLAJE"=>"UTILLAJE","VACIO"=>"VACIO","VALVULA"=>"VALVULA");
                                        foreach($states as $key=>$val) {
                                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                        }
                                        ?>
                                </select> 
                    </div>
                    <br>
                    <div class="text-left border rounded" >
                            <label for="Nombre">MABEC:</label>
                            <input type="text" name="mabec" id="mabec" placeholder="mabec"required onblur="document.documentos.input.value = this.value;" />  
                    </div>









                    <br>
                    <div class="text-left border rounded" >
                            <label for="Nombre"  >CAJONERA:</label>
                            <input type="text" name="cajonera" id="cajonera" placeholder="cajonera"required>  
                    </div>
                    <br>                  

                </div>

            </div>
            
            <div class="col-2 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">
                
                <div>
                 
                    <br>
                    <div class="text-left border rounded" >
                            <label for="Nombre"  >Unidades stock:</label>
                            <input type="text" name="unidades_stock" id="unidades_stock" placeholder="unidades stock" >  
                    </div>
                    <br>
                    <div class="text-left border rounded" >
                            <label for="Nombre"  >Stock mínimo:</label>
                            <input type="text" name="stock_minimo" id="stock_minimo" placeholder="stock mínimo">  
                    </div>
                    <br>
                    <div class="text-left border rounded" >
                            <label for="Nombre"  >Stock nominal:</label>
                            <input type="text" name="stock_nominal" id="stock_nominal" placeholder="stock nominal">  
                    </div>
                    <br>
                    <div class="text-left border rounded" >
                            <label for="Nombre"  >Stock pedido:</label>
                            <input type="text" name="stock_pedido" id="stock_pedido" placeholder="stock pedido">  
                    </div>
                    <br>
                    <div class="text-left border rounded" >
                            <label for="Nombre"  >Observaciones:</label>
                            <input type="text" name="observaciones" id="observaciones" placeholder="observaciones">  
                    </div>
                    
                    <br>
                    
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
    <script type="text/javascript" src="./dropzone/dist/dropzone.js"></script>

</body>
</html>