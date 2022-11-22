<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
     <link href="./dropzone/dist/min/dropzone.min.css" rel="stylesheet">
     <script src="jquery/jquery-3.6.0.js" ></script>
  
</head>

<body style="background-color: #D8F5CA" class="text-muted">

<!-- Nav desde aqui -->
<?php
     $titulo_pagina= "Calidad";
     $subtitulo_pagina="Sala 3D";
     include("conexion.php");
    $sql="UPDATE tabla_navegador SET uso = '0'";
    $consulta = mysqli_query($conexion, $sql);

     $sql="UPDATE tabla_navegador SET uso = '1' WHERE tabla_navegador.titulo = '$titulo_pagina'";
     $consulta = mysqli_query($conexion, $sql);
     ?>
     
     <title><?php echo $titulo_pagina?></title>

    <?php 
        include('nav.php');
    ?>

<!-- Nav hasta aqui -->

<h1 class="mb-1" align="center">Informe NO CONFORMIDAD</h1>
<?php
    if(is_null($_POST['id_sala_3d']))
    {
        session_start();
        $id_sala_3d=$_SESSION['id_sala_3d'];
    }
    else
    {
        $id_sala_3d=$_POST['id_sala_3d'];
        session_start();
        $_SESSION['id_sala_3d']=$id_sala_3d;
    }

    $hora=date("H:i:s");

    $sql = "SELECT*FROM `comunicacion_sala_3d` WHERE `id`= '$id_sala_3d'";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $fecha=$row['fecha'];
        $turno=$row['turno'];
        $tipo_impronta=$row['tipo_impronta'];
        $molde=$row['molde'];
        $impronta=$row['impronta'];
        $nc=$row['no_conformidad_1'];
        $reparable=$row['reparable_1'];
        $estado_nc=$row['estado_no_conformidad_1'];
        $archivo_adjunto=$row['archivo_adjunto'];
        $nombre_archivo=$row['nombre_archivo'];

    }

    $array_inicial_molde[]="";

    $con = mysqli_connect("10.217.144.35","dwido","d-widoMatriceria1","informe_buhler");
    $sql1 = "SELECT*FROM `tabla_heavy_maintenance` WHERE `tipo_molde` = '$tipo_impronta'";
    $consulta1 = mysqli_query($con, $sql1);
    while ($row = mysqli_fetch_array($consulta1)) {
        $array_inicial_molde[$row['molde']]=$row['molde'];
    }

    if(is_null($fecha))
    {
        $fecha=date("Y-m-d");
    };
    if(is_null($turno)){
        if(strtotime($hora)>=strtotime('00:00:00') and strtotime($hora)<=strtotime('05:59:59') ) 
        {
            $turno="Noche";
            $fecha=date("Y-m-d",strtotime($fecha_actual."- 1 days")); 
        } 
        if(strtotime($hora)>=strtotime('06:00:00') and strtotime($hora)<=strtotime('13:59:59') ) 
        {
            $turno="Mañana";
        } 
        if(strtotime($hora)>=strtotime('14:00:00') and strtotime($hora)<=strtotime('21:59:59') ) 
        {
            $turno="Tarde";
        } 
        if(strtotime($hora)>=strtotime('22:00:00') and strtotime($hora)<=strtotime('23:59:59') ) 
        {
            $turno="Noche";
        } 
    };

    if(is_null($molde))
    {
        $control_select_molde="disabled";
    };
?>



<form action="sala_3d_informe_support.php" id="informe_support" name="informe_support" method="POST">
    <input type="hidden" id="operario" name="operario" value="<?php echo $nombre.' '.$apellido1.' '.$apellido2;?>">
    <div class="container-fluid justify-content-center">
        <div class="container-fluid justify-content-center mt-0 mb-0 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1" >
            <div class="row d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <div class="col-md-auto d-flex align-items-center mt-0 mb-0 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    <input type="submit" name="" id="" class="btn btn-lg btn-primary" value="GUARDAR">
                </div>
            </div>
        </div>
        <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border border-dark rounded text-dark" style="background-color:#E4E4E4;">
            <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1 " >
                <div class="col">
                    <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1 " >
                        <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                            <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                                Fecha realización: 
                            </div>
                            <div class="col-auto mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center">
                                <input type="date" class="form-control" name="fecha_realizacion" id ="fecha_realizacion" required value="<?php echo $fecha?>">
                            </div>
                        </div>
                        <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                            <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                                Turno realización: 
                            </div>
                            <div class="col-auto mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center">
                                <select class="form-control" required name="turno_realizacion" id="turno_realizacion">
                                    <?php
                                        $default ="$turno";
                                        $states = array(""=>"","Mañana"=>"Mañana","Tarde"=>"Tarde","Noche"=>"Noche");
                                        foreach($states as $key=>$val) {
                                            echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                        }
                                    ?>              
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1 " >
                        <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                            <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                                Tipo: 
                            </div>
                            <div class="col-auto mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center">
                                <select class="form-control" required name="tipo_molde" id="tipo_molde" onchange="desbloquear_select_molde();cargar_valores_select_molde(this.value)">
                                    <?php
                                        $default ="$tipo_impronta";
                                        $states = array(""=>"","HR13"=>"HR13","HR10"=>"HR10","HR12"=>"HR12");
                                        foreach($states as $key=>$val) {
                                            echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                        }
                                    ?>              
                                </select>
                            </div>
                        </div>   
                        <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                            <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                                MOLDE: 
                            </div>
                            <div class="col-auto mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center">
                                <select class="form-control" required name="molde" id="molde" <?php echo $control_select_molde?>>
                                    <?php
                                        $default ="$molde";
                                        $states = $array_inicial_molde;
                                        foreach($states as $key=>$val) {
                                            echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                        }
                                    ?>              
                                </select>
                            </div>
                        </div>             
                    </div>
                    <script>
                        function desbloquear_select_molde() {
                            if(document.getElementById("tipo_molde").value!=""){
                                document.getElementById("molde").disabled = false;
                            }
                            else
                            {
                                document.getElementById("molde").disabled = true;
                            }
                        }

                        function cargar_valores_select_molde(str) {
                            var valor =document.getElementById("tipo_molde").value;
                            console.log(str);

                            if (str == "") {
                                document.getElementById("molde").innerHTML = "";
                                return;
                            } else {
                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById("molde").innerHTML = this.responseText;
                                    }
                                };
                                xmlhttp.open("GET","sala_3d_get_molde.php?q="+str,true);
                                xmlhttp.send();
                            }
                        }
                    </script>

</form>
                </div>
                <div class="col">
                    <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1 " >
                        <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                            <form action="sala_3d_cargar_archivo.php" name="cargar_archivo" id="cargar_archivo" method="POST" class="dropzone text-center" >
                                Unicamente PDFs
                            </form>
                        </div>               
                    </div>
                    <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1 " >
                        <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                            <?php
                                switch ($archivo_adjunto) {
                                    case 0:
                                        echo'
                                        <span class="badge badge-danger">SIN ARCHIVO</span>
                                        ';
                                        break;
                                    case 1:
                                        echo'
                                        <a href="sala_3d_archivos/'.$nombre_archivo.'.pdf" class="badge badge-success" target="_blank">Archivo subido (pulse para ver)</a>
                                        ';                                        
                                        break;
                                    default:
                                       echo "ERROR AL CARGAR";
                                }                            
                            ?>
                        </div>               
                    </div>
                </div>

            </div>
            <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1 " >
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        <strong>LISTADO DE NO CONFORMIDADES:</strong> 
                    </div>
                </div> 
            </div>   
            <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1" >
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    <strong>1º</strong> 
                </div>
                <?php
                if($nc!="")
                {
                    if($estado_nc=="1")
                    {
                        echo'
                        <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                            <span class="badge badge-pill badge-success" >No Conformidad revisada</span>
                        </div>';
                    }
                    else
                    {
                        echo'
                        <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                            <span class="badge badge-pill badge-danger" >No Conformidad no revisada</span>
                        </div>';
                    }
                }
                ?>
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center border border-dark rounded">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label mr-1 ml-1"><strong>¿Reparable en máquina?</strong></label>
                        <select class="form-control form-check-input mr-1 ml-1" name="reparable_1" id="reparable_1" >
                            <?php
                                $default ="$reparable";
                                $states = array(""=>"","SI"=>"SI","NO"=>"NO");
                                foreach($states as $key=>$val) {
                                    echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    <textarea name="nc_1" id="nc_1" placeholder="Escriba la siguiente no conformidad" form="informe_support" class="form-control" rows="1" maxlength="500" onkeyup="mostar_nc_siguiente_1()"><?php echo $nc?></textarea>
                    <script>
                        function mostar_nc_siguiente_1() {
                            document.getElementById("div_nc_2").style.display=null;
                        }
                    </script>
                </div>
            </div>
            <?php
                for ($i = 2; $i <= 20; $i++) {
                    $i_siguiente=$i+1;
                    $nc_anterior=$nc;
                    $columna_no_conformidad= 'no_conformidad_'.$i;
                    $columna_reparable= 'reparable_'.$i;
                    $columna_estado_no_conformidad= 'estado_no_conformidad_'.$i;

                    $sql = "SELECT `$columna_no_conformidad`, `$columna_estado_no_conformidad`, `$columna_reparable` FROM `comunicacion_sala_3d` WHERE `id`= '$id_sala_3d'";
                    $consulta = mysqli_query($conexion, $sql);
                    while ($row = mysqli_fetch_array($consulta)) {
                        $nc=$row[$columna_no_conformidad];
                        $estado_nc=$row[$columna_estado_no_conformidad];
                        $reparable=$row[$columna_reparable];
                    }

                    if(($nc_anterior=="" or is_null($nc_anterior)) AND $nc=="")
                    {
                        $ocultar_linea_nc="none";
                    }
                    else
                    {
                        $ocultar_linea_nc="null";
                    }
                    
                    $funcion_ocultar='mostrar_siguiente_nc_'.$i.'()';
            echo'
                <div name="div_nc_'.$i.'" id="div_nc_'.$i.'" style="display:'.$ocultar_linea_nc.'">
                    <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1"  >
                        <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                            <strong>'.$i.'º</strong>
                        </div>';

                        if($nc!="")
                        {
                            if($estado_nc=="1")
                            {
                                echo'
                                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center ">
                                    <span class="badge badge-pill badge-success ">No Conformidad revisada</span>
                                </div>';
                            }
                            else
                            {
                                echo'
                                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                                    <span class="badge badge-pill badge-danger ">No Conformidad no revisada</span>
                                </div>';
                            }
                        }
                        
            echo'
                        <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center border border-dark rounded">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label mr-1 ml-1"><strong>¿Reparable en máquina?</strong></label>
                                <select class="form-control form-check-input mr-1 ml-1" name="reparable_'.$i.'" id="reparable_'.$i.'" >';
                                        $default ="$reparable";
                                        $states = array(""=>"","SI"=>"SI","NO"=>"NO");
                                        foreach($states as $key=>$val) {
                                            echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                        }
            echo'
                                </select>
                            </div>
                        </div>
                        <div class="col d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                            <textarea name="nc_'.$i.'" id="nc_'.$i.'" form="informe_support" placeholder="Escriba la siguiente no conformidad" class="form-control" rows="1" maxlength="500" onkeyup="mostar_nc_siguiente_'.$i.'()">'.$nc.'</textarea>
                        </div>
                    </div>  
                </div>
                ';
                    if($i<=20){
                        echo'
                        <script>
                            function mostar_nc_siguiente_'.$i.'() {
                                document.getElementById("div_nc_'.$i_siguiente.'").style.display=null;
                            }
                        </script>
                        ';
                    }
                }            
                ?>
        </div>
    </div>

    <!-- Footer -->
    <?php echo file_get_contents('http://'.$ip.'/D-WIDO/footer.php');?>
    <!-- Footer -->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script> -->
    <script src="jquery/jquery-3.6.0.js" integrity="sha256-b7uGpnxffoiDsm8SFc0zG7+evv9zK9/YLZUtmmb3iZE=" crossorigin="anonymous"></script>
    <script src="cdnjs/jquery.slim.min.js"  crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"  crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/instascan.min.js" crossorigin="anonymous"></script>
    <script src="js/plotly.min.js"></script>
    <script src="js/signature_pad.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./dropzone/dist/dropzone.js"></script>
</body>
</html>