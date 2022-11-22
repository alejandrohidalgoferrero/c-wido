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
    $ip="LOCALHOST";

    include('nav.php');
    session_start();
    unset($_SESSION['id_sala_3d']);
    ?>

    <!-- Nav hasta aqui -->

    
<h1 align="center">INFORME NO CONFORMIDAD</h1>

<!-- Auí introduciremos los contenidos que lleve la pagina -->

<?php
    $sql = "SELECT * FROM `comunicacion_sala_3d` WHERE `fecha` IS NULL";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $id=$row['id'];
        $sql2="DELETE FROM `comunicacion_sala_3d` WHERE `id`='$id' ";
        $consulta2 = mysqli_query($conexion, $sql2);
    }
?>

<div class="container-fluid  mt-2 mb-2 pt-1 pb-1">
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="col-auto justify-content-center mr-1 ml-1 mt-1 mb-1">
            <form action="sala_3d_generacion.php" method="POST"> 
                <button style="vertical-align: middle;" type="submit" class=" btn btn-primary  btn-lg btn-block mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                    <small><strong>Crear Informe NC </strong></small>
                </button>
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

                            tr = document.querySelectorAll("#tabla_comunicacion_sala_3d tbody tr");

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
                        <span><strong>Filtro Tipo Molde:</strong></span>
                    </div>
                    <div class="d-inline-block mr-1 ml-1">
                        <?php
                            $tipo_impronta[""]="";
                            $sql = "SELECT `tipo_impronta` FROM `comunicacion_sala_3d` WHERE `tipo_impronta` IS NOT NULL";
                            $consulta = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_array($consulta)) {
                                $tipo_impronta[$row['tipo_impronta']]=$row['tipo_impronta'];
                            }
                        ?> 
                        <select class="form-control" name="filtro_tipo_molde" id="filtro_tipo_molde"  onchange="function_filtro_tipo_molde()">
                        <?php
                            $default ="";
                            $states =$tipo_impronta;
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <script>
                        function function_filtro_tipo_molde() {
                            // Declare variables
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("filtro_tipo_molde");
                            filter = input.value;
                            table = document.getElementById("tabla_comunicacion_sala_3d");
                            tr = table.getElementsByTagName("tr");
                            // Loop through all table rows, and hide those who don't match the search query
                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[3];
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
                    </script>                          
                </div>  
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center border border-dark rounded">
                    <div class="d-inline-block mr-1 ml-1">
                        <span><strong>Filtro Molde:</strong></span>
                    </div>
                    <div class="d-inline-block mr-1 ml-1">
                        <?php
                            $molde[""]="";
                            $sql = "SELECT `molde` FROM `comunicacion_sala_3d` WHERE `molde` IS NOT NULL";
                            $consulta = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_array($consulta)) {
                                $molde[$row['molde']]=$row['molde'];
                            }
                        ?> 
                        <select class="form-control" name="filtro_molde" id="filtro_molde"  onchange="function_filtro_molde()">
                        <?php
                            $default ="";
                            $states = $molde;
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <script>
                        function function_filtro_molde() {
                            // Declare variables
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("filtro_molde");
                            filter = input.value;
                            table = document.getElementById("tabla_comunicacion_sala_3d");
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
                            $sql = "SELECT `actividad` FROM `filtro_moldecomunicacion_sala_3d` WHERE `actividad` IS NOT NULL";
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
                            table = document.getElementById("tabla_comunicacion_sala_3d");
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

            <table class="table table-striped table-bordered" id="tabla_comunicacion_sala_3d" name="tabla_comunicacion_sala_3d">
                <thead class="thead-dark">
                    <tr>
                        <th style="vertical-align: middle" scope="col"></th>
                        <th style="vertical-align: middle" scope="col">Fecha</th>
                        <th style="vertical-align: middle" scope="col">Turno</th>
                        <th style="vertical-align: middle" scope="col">Tipo molde</th>
                        <th style="vertical-align: middle" scope="col">Molde</th>
                        <th style="vertical-align: middle" scope="col">Nº de no conformidades</th>
                        <th style="vertical-align: middle" scope="col">Enlace a PDF</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            $sql = "SELECT * FROM `comunicacion_sala_3d` ORDER BY `comunicacion_sala_3d`.`id` DESC";
                            $consulta = mysqli_query($conexion, $sql);
                            while ($row = mysqli_fetch_array($consulta)) {
                            echo'
                                <tr>
                                    <td>
                                        <form action="sala_3d_informe.php" method="POST"> 
                                            <button type="submit" class="btn btn-info">Ver Informe</button>
                                            <input type="hidden" name="id_sala_3d" id="id_sala_3d" value="'.$row['id'].'">
                                        </form>
                                    </td>
                                    <td style="vertical-align: middle">'.date("d-m-Y", strtotime($row['fecha'])).'</td>
                                    <td style="vertical-align: middle">'.$row['turno'].'</td>
                                    <td style="vertical-align: middle">'.$row['tipo_impronta'].'</td>
                                    <td style="vertical-align: middle">'.$row['molde'].'</td>
                                    <td style="vertical-align: middle">'.$row['num_no_conformidades'].'</td>';

                                    switch ($row['archivo_adjunto']) {
                                        case 0:
                                            echo'
                                            <td style="vertical-align: middle">
                                                <span class="badge badge-danger">SIN ARCHIVO</span>
                                            </td>
                                            ';
                                            break;
                                        case 1:
                                            echo'
                                            <td style="vertical-align: middle">
                                                <a href="sala_3d_archivos/'.$row['nombre_archivo'].'.pdf" class="badge badge-success" target="_blank">Archivo subido (pulse para ver)</a>
                                            </td>
                                            ';                                        
                                            break;
                                        default:
                                           echo "ERROR AL CARGAR";
                                    }      


                            echo'

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