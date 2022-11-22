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


    $sql = "SELECT*FROM `risk_assesment_registro` WHERE `id`='$id_risk_assesment'";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $fecha_introducida=$row['fecha_introducida'];
        $turno_introducido=$row['turno_introducido'];
        $dato_maquina=$row['maquina'];
        $dato_actividad=$row['actividad'];
        $dato_area=$row['area'];
        $dato_personal_expuesto=$row['personal_expuesto'];
        $dato_circunstancias=$row['circunstancias'];
        $dato_motivo_evaluacion=$row['motivo_evaluacion'];
    }

    ?>

    <!-- Nav hasta aqui -->

    
<h1 align="center">Risk Assesment - PÁGINA 2</h1>

<form action="risk_assesment_v2_support.php" method="POST">
    <div class="container-fluid justify-content-center">
        <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border border-dark rounded text-dark" style="background-color:#E4E4E4;">
            <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1 " >
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        <strong>ID Risk Assesment: </strong> <?php echo $id_risk_assesment?>
                    </div>
                </div>
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        <strong>Fecha realización: </strong> <?php echo $fecha_introducida?>
                    </div>
                </div>
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        <strong>Turno realización: </strong> <?php echo $turno_introducido?>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1 " >
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        <strong>Area: </strong> <?php echo $dato_area?>
                    </div>
                </div>
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        <strong>Actividad: </strong> <?php echo $dato_actividad?>
                    </div>
                </div>
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        <strong>Máquina: </strong> <?php echo $dato_maquina?>
                    </div>
                </div>
            </div>


            <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1 " >
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        <strong>Personal expuesto: </strong> <?php echo $dato_personal_expuesto?>
                    </div>
                </div>
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        <strong>Circunstancias: </strong> <?php echo $dato_circunstancias?>
                    </div>
                </div>
                <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                    <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                        <strong>Motivo evaluación: </strong> <?php echo $dato_motivo_evaluacion?>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    <h3>PELIGROS POTENCIALES:</h3>
                </div>
            </div>
            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    "Imagen con los valores de posibilidad y gravedad."
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
                        $sql = "SELECT*FROM `risks_assesments_datos` WHERE `id_risk_assesment`='$id_risk_assesment' AND `orden`='$orden' AND `riesgo`='SI' LIMIT 39";
                        $consulta = mysqli_query($conexion, $sql);
                        while ($row = mysqli_fetch_array($consulta)) {
                        $contador++; 
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
                                <select class="form-control" name="probabilidad_riesgo_'.$contador.'" id="probabilidad_riesgo_'.$contador.'" disabled onchange="res_riesgo_'.$contador.'()">
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
                                <select class="form-control" name="gravedad_riesgo_'.$contador.'" id="gravedad_riesgo_'.$contador.'" disabled onchange="res_riesgo_'.$contador.'()">
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
                            <td class="align-middle">
                                <input type="number" class="form-control" name="valorar_riesgo_'.$contador.'" id="valorar_riesgo_'.$contador.'" value="'.$row['valorar_riesgo'].'" readonly>
                            </td>
                            <td class="align-middle">
                                <select class="form-control" name="probabilidad_medidas_'.$contador.'" id="probabilidad_medidas_'.$contador.'" disabled onchange="res_medidas_'.$contador.'()">
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
                                <select class="form-control" name="gravedad_medidas_'.$contador.'" id="gravedad_medidas_'.$contador.'" disabled onchange="res_medidas_'.$contador.'()">
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
                                </select>                                 
                            </td>
                            <td class="align-middle">
                                <input type="number" class="form-control" name="depues_medidas_'.$contador.'" id="depues_medidas_'.$contador.'" value="'.$row['depues_medidas'].'" readonly >
                            </td>
                        </tr>

                        <script>
                            function bloqueo_desbloqueo_'.$contador.'() {
                                if(document.getElementById("riesgo_'.$contador.'").value=="NO"){
                                    document.getElementById("probabilidad_riesgo_'.$contador.'").disabled = true;
                                    document.getElementById("gravedad_riesgo_'.$contador.'").disabled = true;
                                    document.getElementById("probabilidad_riesgo_'.$contador.'").value=0;
                                    document.getElementById("gravedad_riesgo_'.$contador.'").value=0;
                                    document.getElementById("valorar_riesgo_'.$contador.'").value =0;
                                    document.getElementById("probabilidad_medidas_'.$contador.'").disabled = true;
                                    document.getElementById("gravedad_medidas_'.$contador.'").disabled = true;
                                    document.getElementById("probabilidad_medidas_'.$contador.'").value=0;
                                    document.getElementById("gravedad_medidas_'.$contador.'").value=0;
                                    document.getElementById("depues_medidas_'.$contador.'").value =0;
                                    document.getElementById("fila_'.$contador.'").style.backgroundColor = "#E4E4E4";
                                }
                                else{
                                    document.getElementById("probabilidad_riesgo_'.$contador.'").disabled = false;
                                    document.getElementById("gravedad_riesgo_'.$contador.'").disabled = false;
                                    document.getElementById("probabilidad_medidas_'.$contador.'").disabled = false;
                                    document.getElementById("gravedad_medidas_'.$contador.'").disabled = false;
                                }
                            }

                            function res_riesgo_'.$contador.'() {
                                var multi_riesgo_'.$contador.' = document.getElementById("probabilidad_riesgo_'.$contador.'").value * document.getElementById("gravedad_riesgo_'.$contador.'").value;
                                if (multi_riesgo_'.$contador.' >= 10) {
                                    document.getElementById("fila_'.$contador.'").style.backgroundColor = "#FF0000";
                                }
                                else{
                                    document.getElementById("fila_'.$contador.'").style.backgroundColor = "#00FF00";
                                }
                                document.getElementById("valorar_riesgo_'.$contador.'").value =multi_riesgo_'.$contador.';
                            }

                            function res_medidas_'.$contador.'() {
                                var multi_medidas_'.$contador.' = document.getElementById("probabilidad_medidas_'.$contador.'").value * document.getElementById("gravedad_medidas_'.$contador.'").value;
                                document.getElementById("depues_medidas_'.$contador.'").value =multi_medidas_'.$contador.';
                            }
                        </script>

                        ';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                    <input type="submit" name="" id="" class="btn btn-primary" value="SIGUIENTE">
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