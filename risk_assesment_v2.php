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

    include('nav.php');
    session_start();
    $id_risk_assesment=$_SESSION['id_risk_assement'];
    $orden=$_SESSION['orden'];
    $fecha=date("Y-m-d");

    $sql = "SELECT*FROM `risk_assesments_assist` LIMIT 1";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $num_personal_expuesto=$row['num_personal_expuesto'];
        $num_circustancias=$row['num_circustancias'];
        $num_motivo_evaluacion=$row['num_motivo_evaluacion'];
        $num_peligros_potenciales=$row['num_peligros_potenciales'];
        $num_medidas_preventivas=$row['num_medidas_preventivas'];
        $num_circustancias_preventivas=$row['num_circustancias_preventivas'];
        $num_circustancias_preventivas_adicionales=$row['num_circustancias_preventivas_adicionales'];
    }

    $area[]="";
    $sql = "SELECT DISTINCT(`area`) FROM `risk_assesments_assist` WHERE `area` IS NOT NULL";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $area[$row['area']]=$row['area'];
    }
    $actividad[]="";
    $sql = "SELECT `actividad` FROM `risk_assesments_assist` WHERE `actividad` IS NOT NULL";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $actividad[$row['actividad']]=$row['actividad'];
    }

    $personal_expuesto[]="";
    $sql = "SELECT `personal_expuesto` FROM `risk_assesments_assist` LIMIT $num_personal_expuesto";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $personal_expuesto[$row['personal_expuesto']]=$row['personal_expuesto'];
    }

    $circustancias[]="";
    $sql = "SELECT `circustancias` FROM `risk_assesments_assist` LIMIT $num_circustancias";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $circustancias[$row['circustancias']]=$row['circustancias'];
    }

    $motivo_evaluacion[]="";
    $sql = "SELECT `motivo_evaluacion` FROM `risk_assesments_assist` LIMIT $num_motivo_evaluacion";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $motivo_evaluacion[$row['motivo_evaluacion']]=$row['motivo_evaluacion'];
    }
    
    $sql = "SELECT*FROM `risk_assesment_registro` WHERE `id`='$id_risk_assesment'";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $dato_maquina=$row['maquina'];
        $dato_actividad=$row['actividad'];
        $dato_area=$row['area'];
        $dato_personal_expuesto=$row['personal_expuesto'];
        $dato_circunstancias=$row['circunstancias'];
        $dato_motivo_evaluacion=$row['motivo_evaluacion'];
        $fecha_introducida=$row['fecha_introducida'];
        $turno_introducido=$row['turno_introducido'];
        $mayor_riesgo=$row['mayor_riesgo'];
        $total_riesgo=$row['total_riesgo'];
        $mayor_riesgo_despues=$row['mayor_riesgo_despues'];
        $total_riesgo_despues=$row['total_riesgo_despues'];
        $medidas_prevencion_apropiadas=$row['medidas_prevencion_apropiadas'];
        $comentarios_motivos=$row['comentarios_motivos'];

    }

    $maquina[]="";
    $sql = "SELECT `maquina` FROM `risk_assesments_assist` WHERE `area`='$dato_area' AND `maquina` IS NOT NULL";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $maquina[$row['maquina']]=$row['maquina'];
    }

    ?>
    <script type="text/javascript">
        function show_maquina(str) {
            var valor =document.getElementById("area").value;
            console.log(str);

            if (str == "") {
                document.getElementById("maquina").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("maquina").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","get_maquina.php?q="+str,true);
                xmlhttp.send();
            }
        }
    </script>
    <!-- Nav hasta aqui -->

    
<h1 align="center">RISK ASSESMENT</h1>

<!-- Auí introduciremos los contenidos que lleve la pagina -->

<form action="risk_assesment_v2_support.php" method="POST">
    <div class="container-fluid justify-content-center">
        <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border border-dark rounded text-dark" style="background-color:#E4E4E4;">
            <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1 " >
                <!-- <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        ID Risk Assesment: <?php echo $id_risk_assesment?>
                    </div>
                </div> -->
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        Fecha realización: 
                    </div>
                    <div class="col-auto mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center">
                        <input type="date" class="form-control" name="fecha_realizacion" id ="fecha_realizacion" required value="<?php echo $fecha_introducida?>">
                    </div>
                </div>
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        Turno realización: 
                    </div>
                    <div class="col-auto mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center">
                        <select class="form-control" required name="turno_realizacion" id="turno_realizacion">
                            <?php
                                $default ="$turno_introducido";
                                $states = array(""=>"","Mañana"=>"Mañana","Tarde"=>"Tarde","Noche"=>"Noche");
                                foreach($states as $key=>$val) {
                                    echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                }
                            ?>              
                        </select>
                    </div>
                </div>
            <!-- </div> -->
            <!-- <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1 " > -->
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        Linea: 
                    </div>
                    <div class="col-auto mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center">
                        <select class="form-control" name="area" id="area" onchange="show_maquina(this.value)">
                            <?php
                                $default ="$dato_area";
                                $states = $area;
                                foreach($states as $key=>$val) {
                                    echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                }
                            ?>         
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        Máquina: 
                    </div>
                    <div class="col-auto mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center">
                        <select class="form-control" name="maquina" id="maquina">
                            <?php
                                $default ="$dato_maquina";
                                $states = $maquina;
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
                        Personal expuesto: 
                    </div>
                    <div class="col-auto mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center">
                        <select class="form-control" required name="personal_expuesto" id="personal_expuesto">
                            <?php
                                $default ="$dato_personal_expuesto";
                                $states = $personal_expuesto;
                                foreach($states as $key=>$val) {
                                    echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                }
                            ?>                             
                        </select> 
                    </div>
                </div>
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        Nº personas expuestas: 
                    </div>
                    <div class="col-auto mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center">
                        <input type="number" class="form-control text-center" name="actividad" id="actividad" value="<?php echo $dato_actividad?>">
                        <!-- <select class="form-control" name="actividad" id="actividad">
                            <?php
                                $default ="$dato_actividad";
                                $states = $actividad;
                                foreach($states as $key=>$val) {
                                    echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                }
                            ?>       
                        </select> -->
                    </div>
                </div>
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        Circunstancias: 
                    </div>
                    <div class="col-auto mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center">
                        <select class="form-control" required name="circustancias" id="circustancias">
                            <?php
                                $default ="$dato_circunstancias";
                                $states = $circustancias;
                                foreach($states as $key=>$val) {
                                    echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                }
                            ?>      
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        Motivo evaluación: 
                    </div>
                    <div class="col-auto mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center">
                        <select class="form-control" required name="motivo_evaluacion" id="motivo_evaluacion">
                            <?php
                                $default ="$dato_motivo_evaluacion";
                                $states = $motivo_evaluacion;
                                foreach($states as $key=>$val) {
                                    echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                }
                            ?>   
                        </select>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    Comentarios sobre los motivos: 
                </div>
                <div class="col-10 d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    <textarea class="form-control" placeholder="Explicación motivo de risk asssesment." id="comentarios_motivos" name="comentarios_motivos" rows="1"><?php echo $comentarios_motivos?></textarea>
                </div>
            </div>
            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    <button type="button" name="" id="" class="btn btn-info" onclick="mostrar_ocultar_filas()">
                        <div class="d-inline-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                            <div class="col-1 mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center" id="imagen_flecha_abajo" style="display: null">
                                <img src="imagenes/flecha_abajo.png" class="" style="width: 50%;">
                            </div>
                            <div class="col-1 mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center" id="imagen_flecha_derecha" style="display: none">
                                <img src="imagenes/flecha_derecha.png" class="" style="width: 50%;">
                            </div>
                            <div class="col-10 mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center">
                                <h3>PELIGROS POTENCIALES EN EL RA:</h3>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <div class="col-md-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    <img src="imagenes/img_peligros_potenciales.jpg" class="img-fluid" alt="Responsive image">
                </div>
            </div>
            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    <table class="table table-bordered" style="border: solid black;">
                        <thead class="thead-dark">
                            <tr style="border: solid black;">
                                <th class="align-middle" scope="col">Peligros potenciales</th>
                                <th class="align-middle" scope="col">¿Es un peligro?</th>
                                <th class="align-middle" scope="col">Probabilidad</th>
                                <th class="align-middle" scope="col">Gravedad</th>
                                <th class="align-middle" scope="col">Valorar riesgo</th>
                                <th class="align-middle" scope="col">Probabilidad</th>
                                <th class="align-middle" scope="col">Gravedad</th>
                                <th class="align-middle" scope="col">Después de medidas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $contador=0;
                        $sql = "SELECT*FROM `risk_assesments_datos` WHERE `id_risk_assesment`='$id_risk_assesment' AND `orden`='$orden' LIMIT $num_peligros_potenciales";
                        $consulta = mysqli_query($conexion, $sql);
                        while ($row = mysqli_fetch_array($consulta)) {
                        $contador++;
                        $color_celda="";
                        $color_celda_despues="";
                        if ($row['riesgo'] =="SI") 
                        {
                            switch (true) {
                                case $row['valorar_riesgo']>=9:
                                    $color_celda="background-color:#FF0000;";
                                    break;
                                default:
                                    $color_celda="background-color:#00FF00;";
                            } 
                            switch (true) {
                                case $row['despues_medidas']>=9:
                                    $color_celda_despues="background-color:#FF0000;";
                                    break;
                                default:
                                    $color_celda_despues="background-color:#00FF00;";
                            } 
                            $disabled_line="";
      
                        }
                        else
                        {

                            $disabled_line="disabled";
                        }
                        echo'
                        <tr style="border: solid black;" id="fila_'.$contador.'" name="fila_'.$contador.'">
                            <td class="align-middle">
                            ';
                            switch (true) {
                                case $contador>=37:
                                    echo'
                                        <input type="text" class="form-control" name="peligros_potenciales_'.$contador.'" id="peligros_potenciales_'.$contador.'" value="'.$row['peligros_potenciales'].'">
                                    ';                            
                                break;
                                default:
                                    echo'
                                        <label>'.$row['peligros_potenciales'].'</label>
                                    ';
                            }
                        echo'
                            </td>
                            <td class="align-middle">
                                <select class="form-control" name="riesgo_'.$contador.'" id="riesgo_'.$contador.'" onchange="bloqueo_desbloqueo_'.$contador.'()">
                            ';
                                    $default =$row['riesgo'];
                                    $states = array(
                                        "SI"=>"SI",  
                                        "NO"=>"NO");
                                    foreach($states as $key=>$val) {
                                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                    }
                            echo'   
                                </select>    
                            </td>
                            <td class="align-middle">
                                <select class="form-control" name="probabilidad_riesgo_'.$contador.'" id="probabilidad_riesgo_'.$contador.'" '.$disabled_line.' onchange="res_riesgo_'.$contador.'()">
                            ';
                                    $default =$row['probabilidad_riesgo'];
                                    $states = array(
                                        "0"=>"0",  
                                        "1"=>"1",
                                        "2"=>"2",  
                                        "3"=>"3",
                                        "4"=>"4",  
                                        "5"=>"5");
                                    foreach($states as $key=>$val) {
                                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                    }
                            echo'   
                                </select>                            
                            </td>
                            <td class="align-middle">
                                <select class="form-control" name="gravedad_riesgo_'.$contador.'" id="gravedad_riesgo_'.$contador.'" '.$disabled_line.' onchange="res_riesgo_'.$contador.'()">
                                ';
                                    $default =$row['gravedad_riesgo'];
                                    $states = array(
                                        "0"=>"0",  
                                        "1"=>"1",
                                        "2"=>"2",  
                                        "3"=>"3",
                                        "4"=>"4",  
                                        "5"=>"5");
                                    foreach($states as $key=>$val) {
                                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                    }
                        echo'   
                                </select>                                 
                            </td>
                            <td class="align-middle" style="'.$color_celda.'"  id="celda_antes_'.$contador.'" name="celda_antes_'.$contador.'">
                                <input  type="number" class="form-control" name="valorar_riesgo_'.$contador.'" id="valorar_riesgo_'.$contador.'" value="'.$row['valorar_riesgo'].'" readonly>
                            </td>
                            <td class="align-middle">
                                <select class="form-control" name="probabilidad_medidas_'.$contador.'" id="probabilidad_medidas_'.$contador.'" '.$disabled_line.' onchange="res_medidas_'.$contador.'()">
                                ';
                                    $default =$row['gravedad_medidas'];
                                    $states = array(
                                        "0"=>"0",  
                                        "1"=>"1",
                                        "2"=>"2",  
                                        "3"=>"3",
                                        "4"=>"4",  
                                        "5"=>"5");
                                    foreach($states as $key=>$val) {
                                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                    }
                        echo'                           
                            </td>
                            <td class="align-middle">
                                <select class="form-control" name="gravedad_medidas_'.$contador.'" id="gravedad_medidas_'.$contador.'" '.$disabled_line.' onchange="res_medidas_'.$contador.'()">
                                ';
                                    $default =$row['probabilidad_medidas'];
                                    $states = array(
                                        "0"=>"0",  
                                        "1"=>"1",
                                        "2"=>"2",  
                                        "3"=>"3",
                                        "4"=>"4",  
                                        "5"=>"5");
                                    foreach($states as $key=>$val) {
                                        echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                    }
                        echo'   
                                </select>                                 
                            </td>
                            <td class="align-middle" style="'.$color_celda_despues.'"  id="celda_despues_'.$contador.'" name="celda_despues_'.$contador.'">
                                <input type="number" class="form-control" name="despues_medidas_'.$contador.'" id="despues_medidas_'.$contador.'" value="'.$row['despues_medidas'].'" readonly >
                            </td>
                        </tr>

                        <script>
                            function bloqueo_desbloqueo_'.$contador.'() {
                                if(document.getElementById("riesgo_'.$contador.'").value=="NO"){
                                    document.getElementById("probabilidad_riesgo_'.$contador.'").disabled = true;
                                    document.getElementById("gravedad_riesgo_'.$contador.'").disabled = true;
                                    document.getElementById("probabilidad_riesgo_'.$contador.'").value =0;
                                    document.getElementById("gravedad_riesgo_'.$contador.'").value =0;
                                    document.getElementById("valorar_riesgo_'.$contador.'").value =0;
                                    document.getElementById("probabilidad_medidas_'.$contador.'").disabled = true;
                                    document.getElementById("gravedad_medidas_'.$contador.'").disabled = true;
                                    document.getElementById("probabilidad_medidas_'.$contador.'").value =0;
                                    document.getElementById("gravedad_medidas_'.$contador.'").value =0;
                                    document.getElementById("despues_medidas_'.$contador.'").value =0;
                                    document.getElementById("fila_'.$contador.'").style.backgroundColor = "#E4E4E4";
                                    document.getElementById("celda_antes_'.$contador.'").style.backgroundColor = "#E4E4E4";
                                    document.getElementById("celda_despues_'.$contador.'").style.backgroundColor = "#E4E4E4";

                                }
                                else{
                                    document.getElementById("probabilidad_riesgo_'.$contador.'").disabled = false;
                                    document.getElementById("gravedad_riesgo_'.$contador.'").disabled = false;
                                    document.getElementById("probabilidad_medidas_'.$contador.'").disabled = false;
                                    document.getElementById("gravedad_medidas_'.$contador.'").disabled = false;
                                }
                                var total_riesgo = 0;
                                var valor_maximo = 0;
                                for (let i = 1 ; i < 40; i++) {
                                    var variable_riesgo = "valorar_riesgo_".concat(i);
                                    total_riesgo= parseInt(total_riesgo)+ parseInt(document.getElementById(variable_riesgo).value);

                                    valor_maximo=Math.max(valor_maximo,parseInt(document.getElementById(variable_riesgo).value));

                                }
                                document.getElementById("total_riesgo").value =total_riesgo;
                                document.getElementById("mayor_riesgo").value =valor_maximo;
                            }

                            function res_riesgo_'.$contador.'() {
                                var multi_riesgo_'.$contador.' = document.getElementById("probabilidad_riesgo_'.$contador.'").value * document.getElementById("gravedad_riesgo_'.$contador.'").value;
                                document.getElementById("valorar_riesgo_'.$contador.'").value =multi_riesgo_'.$contador.';

                                if (multi_riesgo_'.$contador.' >= 10) {
                                    document.getElementById("celda_antes_'.$contador.'").style.backgroundColor = "#FF0000";
                                }
                                else{
                                    document.getElementById("celda_antes_'.$contador.'").style.backgroundColor = "#00FF00";
                                }
                                
                                var total_riesgo = 0;
                                var valor_maximo = 0;
                                for (let i = 1 ; i < 40; i++) {
                                    var variable_riesgo = "valorar_riesgo_".concat(i);
                                    total_riesgo= parseInt(total_riesgo)+ parseInt(document.getElementById(variable_riesgo).value);

                                    valor_maximo=Math.max(valor_maximo,parseInt(document.getElementById(variable_riesgo).value));

                                }
                                document.getElementById("total_riesgo").value =total_riesgo;
                                document.getElementById("mayor_riesgo").value =valor_maximo;
                                
            
                                if (valor_maximo >= 10) {
                                    document.getElementById("celda_mayor_riesgo").style.backgroundColor = "#FF0000";
                                }
                                else{
                                    document.getElementById("celda_mayor_riesgo").style.backgroundColor = "#00FF00";
                                }
            
                                if (total_riesgo >= 31) {
                                    document.getElementById("celda_total_riesgo").style.backgroundColor = "#FF0000";
                                }
                                else{
                                    document.getElementById("celda_total_riesgo").style.backgroundColor = "#00FF00";
                                }

                            }

                            function res_medidas_'.$contador.'() {
                                var multi_medidas_'.$contador.' = document.getElementById("probabilidad_medidas_'.$contador.'").value * document.getElementById("gravedad_medidas_'.$contador.'").value;
                                document.getElementById("despues_medidas_'.$contador.'").value =multi_medidas_'.$contador.';
                                
                                if (multi_medidas_'.$contador.' >= 10) {
                                    document.getElementById("celda_despues_'.$contador.'").style.backgroundColor = "#FF0000";
                                }
                                else{
                                    document.getElementById("celda_despues_'.$contador.'").style.backgroundColor = "#00FF00";
                                }

                                var total_riesgo_despues = 0;
                                var valor_maximo_despues = 0;

                                for (let i = 1 ; i < 40; i++) {
                                    var despues_medidas = "despues_medidas_".concat(i);
                                    total_riesgo_despues= parseInt(total_riesgo_despues)+ parseInt(document.getElementById(despues_medidas).value);

                                    valor_maximo_despues=Math.max(valor_maximo_despues,parseInt(document.getElementById(despues_medidas).value));

                                }
                                document.getElementById("total_riesgo_despues").value =total_riesgo_despues;
                                document.getElementById("mayor_riesgo_despues").value =valor_maximo_despues;

                                if (valor_maximo_despues >= 10) {
                                    document.getElementById("celda_mayor_riesgo_despues").style.backgroundColor = "#FF0000";
                                }
                                else{
                                    document.getElementById("celda_mayor_riesgo_despues").style.backgroundColor = "#00FF00";
                                }
            
                                if (total_riesgo_despues >= 31) {
                                    document.getElementById("celda_total_riesgo_despues").style.backgroundColor = "#FF0000";
                                }
                                else{
                                    document.getElementById("celda_total_riesgo_despues").style.backgroundColor = "#00FF00";
                                }
                            }
                        </script>

                        ';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <script>
                function mostrar_ocultar_filas() {
                    if (document.getElementById("imagen_flecha_abajo").style.display === "none") 
                    {
                        document.getElementById("imagen_flecha_abajo").style.display = null;
                        document.getElementById("imagen_flecha_derecha").style.display = "none";
                    } 
                    else 
                    {
                        document.getElementById("imagen_flecha_abajo").style.display = "none";
                        document.getElementById("imagen_flecha_derecha").style.display = null;
                    }
                    for (let i = 1 ; i < 40; i++) {
                        var variable_riesgo = "riesgo_".concat(i);
                        var variable_fila = "fila_".concat(i);

                        if (document.getElementById(variable_riesgo).value==="NO") {
                            if (document.getElementById(variable_fila).style.display === "none") 
                            {
                                document.getElementById(variable_fila).style.display = null;
                            } 
                            else 
                            {
                                document.getElementById(variable_fila).style.display = "none";
                            }
                        }
                    } 
                }
            </script>
            <?php
                if($mayor_riesgo>=10)
                {
                    $color_mayor_riesgo="background-color:#FF0000;";
                }
                else
                {
                    $color_mayor_riesgo="background-color:#00FF00;";
                }
                if($total_riesgo>=31)
                {
                    $color_total_riesgo="background-color:#FF0000;";
                }
                else
                {
                    $color_total_riesgo="background-color:#00FF00;";
                }
            ?>
            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    <table class="table table-bordered" style="border: solid black;">
                        <thead class="thead-dark">
                            <tr style="border: solid black;">
                                <th class="align-middle" scope="col">Nota más elevada de la evaluación de un riesgo unitario ANTES de realizar acciones</th>
                                <th class="align-middle" scope="col">Suma de todas las notas de la evaluación de riesgo ANTES de realizar acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border: solid black;">
                                <td class="align-middle" name="celda_mayor_riesgo" id="celda_mayor_riesgo" style="border: solid black; <?php echo $color_mayor_riesgo?>">
                                    <input type="number" readonly class="form-control text-center" name="mayor_riesgo" id="mayor_riesgo" value="<?php echo $mayor_riesgo?>" onchange="colores_antes()">

                                </td>
                                <td class="align-middle" name="celda_total_riesgo" id="celda_total_riesgo" style="border: solid black; <?php echo $color_mayor_riesgo?>">
                                    <input type="number" readonly class="form-control text-center" name="total_riesgo" id="total_riesgo" value="<?php echo $total_riesgo?>" onchange="colores_antes()">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    <strong>Buscar acciones: Para todo RIESGO evaluado >9 o si la suma de todos los RIESGOS es >30.</strong>
                </div>
            </div>
            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <div class="row d-flex mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        <label align="center" class="ml-1 mr-1 pl-1 pr-1" for="">
                            <h6>¿Las medidas de Prevención Actuales son Apropiadas?</h6>
                        </label>
                    </div>
                </div>
                <?php 
                    switch (true) {
                        case ($medidas_prevencion_apropiadas== "SI"):
                            $radio_checked_si="checked";
                            $radio_checked_no="";
                            break;
                        case ($medidas_prevencion_apropiadas== "NO"):
                            $radio_checked_si="";
                            $radio_checked_no="checked";
                            break;
                        default:
                            $radio_checked_si="";
                            $radio_checked_no="checked";
                  }
                ?>
                <div class="row d-flex mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" name="medidas_prevencion_apropiadas" id="option1" autocomplete="off" value="NO" <?php echo $radio_checked_no;?>> NO
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="medidas_prevencion_apropiadas" id="option2" autocomplete="off" value="SI" <?php echo $radio_checked_si;?>> SI
                            </label>
                        </div>     
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    <button type="button" name="" id="" class="btn btn-info" onclick="mostrar_ocultar_medidas_preventivas()">
                        <div class="d-inline-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                            <div class="col-1 mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center" id="imagen_flecha_abajo_medidas_preventivas" style="display: null">
                                <img src="imagenes/flecha_abajo.png" class="" style="width: 50%;">
                            </div>
                            <div class="col-1 mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center" id="imagen_flecha_derecha_medidas_preventivas" style="display: none">
                                <img src="imagenes/flecha_derecha.png" class="" style="width: 50%;">
                            </div>
                            <div class="col-10 mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center">
                                <h3>MEDIDAS PREVENTIVAS EXISTENTES:</h3>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
            <script>
                function mostrar_ocultar_medidas_preventivas() {
                    if (document.getElementById("imagen_flecha_abajo_medidas_preventivas").style.display === "none") 
                    {
                        document.getElementById("imagen_flecha_abajo_medidas_preventivas").style.display = null;
                        document.getElementById("imagen_flecha_derecha_medidas_preventivas").style.display = "none";
                    } 
                    else 
                    {
                        document.getElementById("imagen_flecha_abajo_medidas_preventivas").style.display = "none";
                        document.getElementById("imagen_flecha_derecha_medidas_preventivas").style.display = null;
                    }
                    if (document.getElementById("container_medidas_preventivas").style.display === "none") 
                    {
                        document.getElementById("container_medidas_preventivas").style.display = null;
                    } 
                    else 
                    {
                        document.getElementById("container_medidas_preventivas").style.display = "none";
                    }
                }
            </script>
            <div name="container_medidas_preventivas" id="container_medidas_preventivas">
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center border border-dark rounded">
                        <div class="row align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                            <strong>Medidas preventivas existentes:</strong>
                        </div>
                    <?php
                        $contador=0;
                        $sql = "SELECT*FROM `risk_assesments_datos` WHERE `id_risk_assesment`='$id_risk_assesment' AND `orden`='$orden' LIMIT $num_medidas_preventivas";
                        $consulta = mysqli_query($conexion, $sql);
                        while ($row = mysqli_fetch_array($consulta)) {
                        $contador++;

                        echo'
                        
                        <div class="row d-flex mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" '.$row['dato_medidas_preventivas_existentes'].' id="medidas_preventivas_existentes_'.$contador.'" name="medidas_preventivas_existentes_'.$contador.'" value="checked">
                                <label class="form-check-label" for="medidas_preventivas_existentes_'.$contador.'">'.$row['medidas_preventivas'].'</label>
                            </div>
                        </div>
                        ';
                        }
                    ?>
                    </div>
                    <div class="col align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center border border-dark rounded">
                        <div class="row align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                            <strong>Circunstancias:</strong>
                        </div>
                    <?php
                        $contador=0;
                        $sql = "SELECT*FROM `risk_assesments_datos` WHERE `id_risk_assesment`='$id_risk_assesment' AND `orden`='$orden' LIMIT $num_circustancias_preventivas";
                        $consulta = mysqli_query($conexion, $sql);
                        while ($row = mysqli_fetch_array($consulta)) {
                        $contador++;

                        echo'
                        
                        <div class="row d-flex mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" '.$row['dato_circustancias_preventivas'].' id="circustancias_preventivas_existentes_'.$contador.'" name="circustancias_preventivas_existentes_'.$contador.'" value="checked">
                                <label class="form-check-label" for="circustancias_preventivas_existentes_'.$contador.'">'.$row['circustancias_preventivas'].'</label>
                            </div>
                        </div>
                        ';
                        }
                    ?>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    <button type="button" name="" id="" class="btn btn-info" value="Ocultar/Mostrar PELIGROS NO POTENCIALES" onclick="mostrar_ocultar_medidas_preventivas_adicionales()">
                        <div class="d-inline-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                            <div class="col-1 mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center" id="imagen_flecha_abajo_medidas_preventivas_adicionales" style="display: null">
                                <img src="imagenes/flecha_abajo.png" class="" style="width: 50%;">
                            </div>
                            <div class="col-1 mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center" id="imagen_flecha_derecha_medidas_preventivas_adicionales" style="display: none">
                                <img src="imagenes/flecha_derecha.png" class="" style="width: 50%;">
                            </div>
                            <div class="col-10 mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center">
                                <h3>MEDIDAS PREVENTIVAS ADICIONALES:</h3>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
            <script>
                function mostrar_ocultar_medidas_preventivas_adicionales() {
                    if (document.getElementById("imagen_flecha_abajo_medidas_preventivas_adicionales").style.display === "none") 
                    {
                        document.getElementById("imagen_flecha_abajo_medidas_preventivas_adicionales").style.display = null;
                        document.getElementById("imagen_flecha_derecha_medidas_preventivas_adicionales").style.display = "none";
                    } 
                    else 
                    {
                        document.getElementById("imagen_flecha_abajo_medidas_preventivas_adicionales").style.display = "none";
                        document.getElementById("imagen_flecha_derecha_medidas_preventivas_adicionales").style.display = null;
                    }
                    if (document.getElementById("container_medidas_preventivas_adicionales").style.display === "none") 
                    {
                        document.getElementById("container_medidas_preventivas_adicionales").style.display = null;
                    } 
                    else 
                    {
                        document.getElementById("container_medidas_preventivas_adicionales").style.display = "none";
                    }
                }
            </script>
            <div name="container_medidas_preventivas_adicionales" id="container_medidas_preventivas_adicionales">
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center border border-dark rounded">
                        <table class="table table-bordered" style="border: solid black;">
                            <thead class="thead-dark">
                                <tr style="border: solid black;">
                                    <th class="align-middle" scope="col"></th>
                                    <th class="align-middle" scope="col">Factor de riesgo</th>
                                    <th class="align-middle" scope="col">Medida de control</th>
                                    <th class="align-middle" scope="col">Responsable</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $contador=0;
                            $sql = "SELECT*FROM `risk_assesments_datos` WHERE `id_risk_assesment`='$id_risk_assesment' AND `orden`='$orden' LIMIT $num_circustancias_preventivas_adicionales";
                            $consulta = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_array($consulta)) {
                            $contador++;
                            echo'
                                <tr style="border: solid black;">
                                    <td class="align-middle">
                                        '.$row['id'].'
                                    </td>
                                    <td class="align-middle">
                                        <input type="text" class="form-control" name="factor_de_riesgo_'.$contador.'" id="factor_de_riesgo_'.$contador.'" value="'.$row['factor_de_riesgo'].'" placeholder="FR:">
                                    </td>
                                    <td class="align-middle">
                                        <input type="text" class="form-control" name="medida_de_control_'.$contador.'" id="medida_de_control_'.$contador.'" value="'.$row['medida_de_control'].'" placeholder="MC:">
                                    </td>
                                    <td class="align-middle">
                                        <input type="text" class="form-control" name="responsable_'.$contador.'" id="responsable_'.$contador.'" value="'.$row['responsable'].'">
                                    </td>
                                </tr>
                            ';
                            }
                            ?>
                            </tbody>
                        </table> 
                    </div>
                </div>
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center border border-dark rounded">
                        <table class="table table-bordered" style="border: solid black;">
                            <thead class="thead-dark">
                                <tr style="border: solid black;">
                                    <th class="align-middle" scope="col">Evaluado por:</th>
                                    <th class="align-middle" scope="col">Evaluado por:</th>
                                    <th class="align-middle" scope="col">Evaluación aprobada por:</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $contador=0;
                            $sql = "SELECT*FROM `risk_assesments_datos` WHERE `id_risk_assesment`='$id_risk_assesment' AND `orden`='$orden' LIMIT 1";
                            $consulta = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_array($consulta)) {
                            $contador++;
                            echo'
                                <tr style="border: solid black;">
                                    <td class="align-middle">
                                        <input type="text" class="form-control" name="evaluada_por_1" id="evaluada_por_1" value="'.$row['evaluada_por_1'].'">
                                    </td>
                                    <td class="align-middle">
                                        <input type="text" class="form-control" name="evaluada_por_2" id="evaluada_por_2" value="'.$row['evaluada_por_2'].'">
                                    </td>
                                    <td class="align-middle">
                                        <input type="text" class="form-control" name="evaluacion_aprobada" id="evaluacion_aprobada" value="'.$row['evaluacion_aprobada'].'">
                                    </td>
                                </tr>
                            ';
                            }
                            ?>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>

            <?php
                if($mayor_riesgo_despues>=10)
                {
                    $color_mayor_riesgo_despues="background-color:#FF0000;";
                }
                else
                {
                    $color_mayor_riesgo_despues="background-color:#00FF00;";
                }
                if($total_riesgo_despues>=31)
                {
                    $color_total_riesgo_despues="background-color:#FF0000;";
                }
                else
                {
                    $color_total_riesgo_despues="background-color:#00FF00;";
                }
            ?>

            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    <table class="table table-bordered" style="border: solid black;">
                        <thead class="thead-dark">
                            <tr style="border: solid black;">
                                <th class="align-middle" scope="col">Nota más elevada de la evaluación de un riesgo unitario DESPUÉS de realizar acciones</th>
                                <th class="align-middle" scope="col">Suma de todas las notas de la evaluación de riesgo DESPUÉS de realizar acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border: solid black;">
                                <td class="align-middle" id="celda_mayor_riesgo_despues" name="celda_mayor_riesgo_despues" style="border: solid black; <?php echo $color_mayor_riesgo_despues?>" >
                                    <input type="number" readonly class="form-control text-center" name="mayor_riesgo_despues" id="mayor_riesgo_despues" value="<?php echo $mayor_riesgo_despues?>">
                                </td>
                                <td class="align-middle" id="celda_total_riesgo_despues" name="celda_total_riesgo_despues" style="border: solid black; <?php echo $color_total_riesgo_despues?>">
                                    <input type="number" readonly class="form-control text-center" name="total_riesgo_despues" id="total_riesgo_despues" value="<?php echo $total_riesgo_despues?>">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <div class="col-md-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    <input type="submit" name="" id="" class="btn btn-lg btn-primary" value="GUARDAR">
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