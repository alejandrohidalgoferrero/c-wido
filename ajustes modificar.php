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

    include('nav.php')?>

    <!-- Nav hasta aqui -->


<h1 align="center">AJUSTES. MODIFICAR USUARIO.</h1>
<br>

 <form  class="text-center" style="font-style: italic; font-weight: bold;" action="ajustes guardar modificar.php" method="POST" enctype="multipart/form-data">  
 <?php
        $id=$_POST['id'];
        $sql="SELECT*FROM `usuarios` where `id`=$id";
        $consulta = mysqli_query($conexion, $sql); 
        
        while ($row = mysqli_fetch_array($consulta)) {
            $nombre=$row['nombre'];
            $apellido1=$row['apellido1'];
            $apellido2=$row['apellido2'];
            $uet=$row['uet'];
            $ju=$row['ju'];

            $usuario=$row['numero empresa'];
            $password=$row['password'];
            $tipo=$row['tipo'];
        };

        ?>         
                            
                            
                            
        <input type="submit" name="submit" value="Modificar usuario." class="btn btn-secondary"> 
        <label for="id"  >ID: <?php echo $id;?>  </label>
        <input type="hidden" id="id2" name="id2" value=<?php echo $id?>> 

        <br>
       

       
            <!--  Columna 1, DATOS GENERALES PARA LA CREACION DE UNA OT -->
        <div class="row justify-content-md-center mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" style="align-items-start" >
          
            <div class="col-2 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">
                
                <div>
                 
                    <br>
                    <div class="text-left border rounded" >
                            <label for="Nombre"  >NOMBRE:</label>
                            <input type="text" name="nombre" id="nombre" placeholder="nombre" value="<?php echo $nombre;?>"required>  
                    </div>
                    <br>
                    <div class="text-left border rounded" >
                            <label for="Nombre"  >1º APELLIDO:</label>
                            <input type="text" name="apellido1" id="apellido1" placeholder="1º apellido"value="<?php echo $apellido1;?>"required>  
                    </div>
                    <br>
                    <div class="text-left border rounded" >
                            <label for="Nombre"  >2º APELLIDO:</label>
                            <input type="text" name="apellido2" id="apellido2" placeholder="2º apellido"value="<?php echo $apellido2;?>"required>  
                    </div>
                    <br>
                    <div class="text-left border rounded" >
                            <label for="Nombre"  >UET:</label>
                            <input type="text" name="uet" id="uet" placeholder="uet"value="<?php echo $uet;?>"required>  
                    </div>
                    <br>
                                       
                    
                </div>
            </div>
            
            <div class="col-2 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">
                
                <div>
                 
                    <br>
                    <div class="text-left border rounded" >
                            <label for="Nombre"  >JU:</label>
                            <input type="text" name="ju" id="ju" placeholder="JU"value="<?php echo $ju;?>"required>  
                    </div>
                    <br>

                    <div class="text-left border rounded" >
                            <label for="Nombre"  >USUARIO:</label>
                            <input type="text" name="usuario" id="usuario" placeholder="usuario"value="<?php echo $usuario;?>"required>  
                    </div>
                    <br>
                    <div class="text-left border rounded" >
                            <label for="Nombre"  >PASSWORD:</label>
                            <input type="text" name="password" id="password" placeholder="password"value="<?php echo $password;?>"required>  
                    </div>
                    <br>
                    <div class="text-left border rounded" >
                            <label for="Nombre"  >TIPO USUARIO:</label>
                            <select required class="mdb-select md-form" style="'.$background.'width: 90%; height=100%;" type="text" name="tipo" id="tipo"  value="<?php echo $tipo;?>">';?>
                            <?php 
                            $default = "$tipo";
                            $states = array(
                                        ""=>"",
                                        "usuario"=>"usuario", 
                                        "superusuario"=>"superusuario");
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                            ?>
                            </select>    
                    </div>
                    <br>
                    
                </div>
            </div>
           
        </div> 

        </form>

    
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