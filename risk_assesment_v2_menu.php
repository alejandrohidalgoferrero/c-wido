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
    unset($_SESSION['id_risk_assement']);
    ?>

    <!-- Nav hasta aqui -->

    
<h1 align="center">Risk Asssement</h1>

<!-- Auí introduciremos los contenidos que lleve la pagina -->

<?php
    // $sql = "SELECT * FROM `risk_assesment_registro` WHERE `fecha_introducida` IS NULL";
    // $consulta = mysqli_query($conexion, $sql);
    // while ($row = mysqli_fetch_array($consulta)) {
    //     $id=$row['id'];
    //     $sql2="DELETE FROM `risk_assesment_registro` WHERE `id`='$id' ";
    //     $consulta2 = mysqli_query($conexion, $sql2);
    //     $sql3="DELETE FROM `risk_assesments_datos` WHERE `id_risk_assesment`='$id' ";
    //     $consulta3 = mysqli_query($conexion, $sql3);
    // }
?>

<div class="container-fluid  mt-2 mb-2 pt-1 pb-1">
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="col-10 justify-content-center mr-1 ml-1 mt-1 mb-1">
        </div>
        <div class="col-1 justify-content-center mr-1 ml-1 mt-1 mb-1">
            <form action="risk_assesment_v2_generacion.php" method="POST"> 
                <button style="vertical-align: middle;" type="submit" class=" btn btn-primary  btn-lg btn-block mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                    <small><strong>NUEVO <br> RA</strong></small>
                </button>
                <input type="hidden" id="tipo_generacion" name="tipo_generacion" value="nuevo"> 
            </form>
        </div>
    </div>
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border rounded text-dark justify-content-center text-center" style="background-color:#E4E4E4;">
            <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">                
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center border border-dark rounded">
                    <div class="d-inline-block mr-1 ml-1">
                        <span><strong>Filtro fecha:</strong></span>
                    </div>
                    <div class="d-inline-block mr-1 ml-1">
                        <span>Inicio:</span>
                    </div>
                    <div class="d-inline-block mr-1 ml-1">
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                    </div>
                    <div class="d-inline-block mr-1 ml-1">
                        <span>Fin:</span>
                    </div>
                    <div class="d-inline-block mr-1 ml-1">
                        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control">
                    </div>
                    <div class="d-inline-block mr-1 ml-1">
                        <input type="button" class="btn btn-secondary" value="Filtrar" onclick="function_filtro_fecha()">
                    </div>
                    <script>
                        function function_filtro_fecha() {
                            var input_startDate, input_stopDate, tr, i;
                            input_startDate =  new Date(document.getElementById("fecha_inicio").value);
                            input_stopDate =  new Date(document.getElementById("fecha_fin").value);

                            tr = document.querySelectorAll("#tabla_registro_risk_assesment tbody tr");

                            for (let i = 0; i < tr.length; i++) {

                                let td = tr[i].getElementsByTagName("td");

                                if (!td || !td[2]) continue;
                                
                                let date = td[1].textContent[6]+td[1].textContent[7]+td[1].textContent[8]+td[1].textContent[9]+"-"+td[1].textContent[3]+td[1].textContent[4]+"-"+td[1].textContent[0]+td[1].textContent[1];
                                let td_date = new Date(date);

                                if (td_date) {
                                    if (td_date >= input_startDate && td_date <= input_stopDate) {
                                        tr[i].style.display ="";
                                    } else {
                                        tr[i].style.display = 'none';
                                    }
                                }
                            }
                        }
                    </script>                          
                </div>  
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center border border-dark rounded">
                    <div class="d-inline-block mr-1 ml-1">
                        <span><strong>Filtro Linea:</strong></span>
                    </div>
                    <div class="d-inline-block mr-1 ml-1">
                        <?php
                            $area[""]="";
                            $sql = "SELECT `area` FROM `risk_assesments_assist` WHERE `area` IS NOT NULL";
                            $consulta = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_array($consulta)) {
                                $area[$row['area']]=$row['area'];
                            }
                        ?> 
                        <select class="form-control" name="filtro_area" id="filtro_area"  onchange="function_filtro_area()">
                        <?php
                            $default ="";
                            $states =$area;
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <script>
                        function function_filtro_area() {
                            // Declare variables
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("filtro_area");
                            filter = input.value;
                            table = document.getElementById("tabla_registro_risk_assesment");
                            tr = table.getElementsByTagName("tr");
                            // Loop through all table rows, and hide those who don't match the search query
                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[3];
                                if (td) {
                                    txtValue = td.textContent || td.innerText;
                                    if (txtValue==filter) {
                                        tr[i].style.display = "";
                                    } else {
                                        tr[i].style.display = "none";
                                    }
                                }
                            }
                        }
                    </script>                          
                </div>  
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center border border-dark rounded">
                    <div class="d-inline-block mr-1 ml-1">
                        <span><strong>Filtro Máquina:</strong></span>
                    </div>
                    <div class="d-inline-block mr-1 ml-1">
                        <?php
                            $maquina[""]="";
                            $sql = "SELECT `maquina` FROM `risk_assesments_assist` WHERE `maquina` IS NOT NULL";
                            $consulta = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_array($consulta)) {
                                $maquina[$row['maquina']]=$row['maquina'];
                            }
                        ?> 
                        <select class="form-control" name="filtro_maquina" id="filtro_maquina"  onchange="function_filtro_maquina()">
                        <?php
                            $default ="";
                            $states = $maquina;
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <script>
                        function function_filtro_maquina() {
                            // Declare variables
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("filtro_maquina");
                            filter = input.value;
                            table = document.getElementById("tabla_registro_risk_assesment");
                            tr = table.getElementsByTagName("tr");
                            // Loop through all table rows, and hide those who don't match the search query
                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[4];
                                if (td) {
                                    txtValue = td.textContent || td.innerText;
                                    if (txtValue.indexOf(filter) > -1) {
                                        tr[i].style.display = "";
                                    } else {
                                        tr[i].style.display = "none";
                                    }
                                }
                            }
                        }
                    </script>
                </div>  
                <!-- <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center border border-dark rounded">
                    <div class="d-inline-block mr-1 ml-1">
                        <span><strong>Filtro Actividad:</strong></span>
                    </div>
                    <div class="d-inline-block mr-1 ml-1">
                        <?php
                            $actividad[""]="";
                            $sql = "SELECT `actividad` FROM `risk_assesments_assist` WHERE `actividad` IS NOT NULL";
                            $consulta = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_array($consulta)) {
                                $actividad[$row['actividad']]=$row['actividad'];
                            }
                        ?> 
                        <select class="form-control" name="filtro_actividad" id="filtro_actividad"  onchange="function_filtro_actividad()">
                        <?php
                            $default ="";
                            $states = $actividad;
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                        ?>
                        </select>
                    </div> -->
                    <!-- <script>
                        function function_filtro_actividad() {
                            // Declare variables
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("filtro_actividad");
                            filter = input.value;
                            table = document.getElementById("tabla_registro_risk_assesment");
                            tr = table.getElementsByTagName("tr");
                            // Loop through all table rows, and hide those who don't match the search query
                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[5];
                                if (td) {
                                    txtValue = td.textContent || td.innerText;
                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                        tr[i].style.display = "";
                                    } else {
                                        tr[i].style.display = "none";
                                    }
                                }
                            }
                        }
                    </script>                 -->
                </div>  
            </div>
        </div>
    </div>
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border rounded text-dark justify-content-center text-center" style="background-color:#E4E4E4;">

            <table class="table table-striped table-bordered" id="tabla_registro_risk_assesment" style="font-size:10px" name="tabla_registro_risk_assesment">
                <thead class="thead-dark">
                    <tr>
                        <th style="vertical-align: middle" scope="col"></th>
                        <th style="vertical-align: middle" scope="col">Fecha</th>
                        <th style="vertical-align: middle" scope="col">Turno</th>
                        <th style="vertical-align: middle" scope="col">Linea</th>
                        <th style="vertical-align: middle" scope="col">Máquina</th>
                        <th style="vertical-align: middle" scope="col">Personal expuesto</th>
                        <th style="vertical-align: middle" scope="col">Nº personas</th>
                        <th style="vertical-align: middle" scope="col">Circunstacias</th>
                        <th style="vertical-align: middle" scope="col">Motivo evaluación</th>
                        <th style="vertical-align: middle" scope="col">Comentarios evaluación</th>
                        <th style="vertical-align: middle" scope="col">Mayor Riesgo</th>
                        <th style="vertical-align: middle" scope="col">Total Riesgo</th>
                        <th style="vertical-align: middle" scope="col">Mayor Riesgo después</th>
                        <th style="vertical-align: middle" scope="col">Total Riesgo después</th>
                        <th style="vertical-align: middle" scope="col">Creador</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            $sql = "SELECT * FROM `risk_assesment_registro` ORDER BY `risk_assesment_registro`.`id` DESC";
                            $consulta = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_array($consulta)) {
                            echo'
                                <tr>
                                    <td>
                                        <form action="risk_assesment_v2_generacion.php" method="POST"> 
                                            <button type="submit" class="btn btn-info">Ver</button>
                                            <input type="hidden" name="id_risk_assesment" id="id_risk_assesment" value="'.$row['id'].'">
                                            <input type="hidden" id="tipo_generacion" name="tipo_generacion" value="modificar"> 
                                        </form>
                                    </td>
                                    <td style="vertical-align: middle">'.date("d-m-Y", strtotime($row['fecha_introducida'])).'</td>
                                    <td style="vertical-align: middle">'.$row['turno_introducido'].'</td>
                                    <td style="vertical-align: middle">'.$row['area'].'</td>
                                    <td style="vertical-align: middle">'.$row['maquina'].'</td>
                                    <td style="vertical-align: middle">'.$row['personal_expuesto'].'</td>
                                    <td style="vertical-align: middle">'.$row['actividad'].'</td>
                                    <td style="vertical-align: middle">'.$row['circunstancias'].'</td>
                                    <td style="vertical-align: middle">'.$row['motivo_evaluacion'].'</td>
                                    <td style="vertical-align: middle">
                                        <textarea class="form-control" readonly rows="1">'.$row['comentarios_motivos'].'</textarea>
                                    </td>
                                    <td style="vertical-align: middle">'.$row['mayor_riesgo'].'</td>
                                    <td style="vertical-align: middle">'.$row['total_riesgo'].'</td>
                                    <td style="vertical-align: middle">'.$row['mayor_riesgo_despues'].'</td>
                                    <td style="vertical-align: middle">'.$row['total_riesgo_despues'].'</td>
                                    <td style="vertical-align: middle">'.$row['usuario_creacion'].'</td>
                                </tr>
                            ';
                            } 
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

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