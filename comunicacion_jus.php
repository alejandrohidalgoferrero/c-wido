<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="js/icofont/icofont.min.css">

     <script src="js/jquery.min.js"></script>

          
</head>

<body style="background-color: #D8F5CA" class="text-muted">

<!-- Nav desde aqui -->
<?php
     $titulo_pagina= "Calidad";
     $subtitulo_pagina="Comunicación JUs";
     include("conexion.php");
    $sql="UPDATE tabla_navegador SET uso = '0'";
    $consulta = mysqli_query($conexion, $sql);

     $sql="UPDATE tabla_navegador SET uso = '1' WHERE tabla_navegador.titulo = '$titulo_pagina'";
     $consulta = mysqli_query($conexion, $sql);
     ?>
     
     <title><?php echo $titulo_pagina?></title>

    <?php 
    include('nav.php');
    $id_com_jus=$_SESSION['id_com_jus'];
    ?>


<h1 align="center"><?php echo $subtitulo_pagina?></h1>

<!-- Auí introduciremos los contenidos que lleve la pagina -->
<?php 
    $consulta = "SELECT * FROM `comunicacion_jus_registro_dias` WHERE `id_com_jus`='$id_com_jus'";
    $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
    while ($row = mysqli_fetch_array($resultado)) {
        $fecha=$row['fecha'];
        $turno=$row['turno'];
        $ju_matriceria=$row['ju_matriceria'];
        $ju_fabricacion=$row['ju_fabricacion'];

    }
?>

<form id="form_datos" method="POST"></form>

<div class="container-fluid  mt-2 mb-2 pt-1 pb-1">
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <button class="btn font-weight-bold border border-dark btn-lg" name="btn_guardar" id="btn_guardar" value="" style="background-color:#28a745;" onclick="guardar_datos()"><i class='icofont-ui-check'></i></button>
    </div>
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="col justify-content-center mr-1 ml-1 mt-1 mb-1" >
            <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border border-dark rounded text-dark justify-content-center text-center" style="background-color:#E4E4E4;">
                <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >

                    <div class="col mr-1 ml-1">
                        <div class="d-inline-block mr-1 ml-1">
                            <label>
                                <strong>FECHA:</strong>
                            </label>
                        </div>
                        <div class="d-inline-block mr-1 ml-1">
                            <input type="date" class="form-control text-center" readonly id="fecha" name="fecha" value="<?php echo $fecha?>" >
                        </div>
                    </div>
                    <div class="col mr-1 ml-1">
                        <div class="d-inline-block mr-1 ml-1">
                            <span>
                                <strong>TURNO:</strong>
                            </span>
                        </div>
                        <div class="d-inline-block mr-1 ml-1">
                            <input type="text" class="form-control text-center" readonly id="fecha" name="fecha" value="<?php echo $turno?>" >
                        </div>
                    </div>
                    <div class="col mr-1 ml-1">
                        <div class="d-inline-block mr-1 ml-1">
                            <span>
                                <strong>JU FABRICACIÓN:</strong>
                            </span>
                        </div>
                        <div class="d-inline-block mr-1 ml-1">
                            <input type="text" class="form-control text-center" form="form_datos" id="ju_fabricacion" name="ju_fabricacion" value="<?php echo $ju_fabricacion?>" oninput="btn_guardar_rojo();">
                        </div>
                    </div>
                    <div class="col mr-1 ml-1">
                        <div class="d-inline-block mr-1 ml-1">
                            <span>
                                <strong>JU MATRICERIA:</strong>
                            </span>
                        </div>
                        <div class="d-inline-block mr-1 ml-1">
                            <input type="text" class="form-control text-center" form="form_datos" id="ju_matriceria" name="ju_matriceria" value="<?php echo $ju_matriceria?>" oninput="btn_guardar_rojo();">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="col justify-content-center mr-1 ml-1 mt-1 mb-1" >
            <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border border-dark rounded text-dark justify-content-center text-center" style="background-color:#E4E4E4;">
                <div class="row d-flex  mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">                    
                    <!-- <div class="col justify-content-center mr-1 ml-1 mt-1 mb-1" >
                        <div class="row align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center ">    
                            <h4><strong>INCIDENCIAS REVISADAS:</strong></h4>
                        </div>
                        <?php
                            $sql2 = "SELECT `id` FROM `comunicacion_jus_registro_dias` WHERE `id_com_jus`='$id_com_jus'";
                            $consulta2 = mysqli_query($conexion, $sql2);
                            while ($row = mysqli_fetch_array($consulta2)) {
                                $id_suport=$row['id'];
                            }  
                            $id_suport--;

                            $sql2 = "SELECT `id_com_jus` FROM `comunicacion_jus_registro_dias` WHERE `id`='$id_suport'";
                            $consulta2 = mysqli_query($conexion, $sql2);
                            while ($row = mysqli_fetch_array($consulta2)) {
                                $id_com_jus_anterior=$row['id_com_jus'];
                            }  
                            $sql2 = "SELECT DISTINCT(`molde`) FROM `comunicacion_jus_registro_datos` WHERE `id_com_jus`='$id_com_jus_anterior' AND `a_revisar`='1' ";
                            $consulta2 = mysqli_query($conexion, $sql2);
                            while ($row = mysqli_fetch_array($consulta2)) {
                                $array_moldes_anterior[]=$row['molde'];
                            }  
                            foreach ($array_moldes_anterior as $molde) {
                                $sql3 = "SELECT*FROM `comunicacion_jus_registro_datos` WHERE `id_com_jus`='$id_com_jus_anterior' AND `molde`='$molde'";
                                $consulta3 = mysqli_query($conexion, $sql3);
                                while ($row = mysqli_fetch_array($consulta3)) {
                                    $fecha_molde=$row['fecha'];
                                    $turno_molde=$row['turno'];
                                }
                        ?>
                        <div class="row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">        
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th class="text-light bg-dark" style="border: 1px solid black; vertical-align: middle;" colspan="3" scope="col">MOLDE: <?php echo $molde?> (<?php echo date("d/m/Y", strtotime($fecha_molde))?> - <?php echo $turno_molde?>)</th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th class="text-light bg-dark" style="border: 1px solid black; vertical-align: middle;" scope="col">Incidencia</th>
                                        <th class="text-light bg-dark" style="border: 1px solid black; vertical-align: middle;" scope="col">Comentario Incidencia</th>
                                        <th class="text-light bg-dark" style="border: 1px solid black; vertical-align: middle;" scope="col">REVISADO</th>
                                    </tr>
                                </thead>
                                <tbody>

                        <?php
                                $sql3 = "SELECT*FROM `comunicacion_jus_registro_datos` WHERE `id_com_jus`='$id_com_jus_anterior' AND `molde`='$molde' AND `a_revisar`='1' ";
                                $consulta3 = mysqli_query($conexion, $sql3);
                                while ($row = mysqli_fetch_array($consulta3)) {
                                    $no_conformidad=$row['no_conformidad'];

                                    for ($i = 1; $i <= 20; $i++) {
                                        $nombre_columna_no_conformidad='no_conformidad_'.$i;
                                        $nombre_columna_estado_no_conformidad='estado_no_conformidad_'.$i;

                                        $estado_no_conformidad_revisada='0';
                                        $sql4 = "SELECT `$nombre_columna_estado_no_conformidad` FROM `comunicacion_sala_3d` WHERE `fecha`='$fecha_molde' AND  `turno`='$turno_molde' AND `molde`='$molde' AND `$nombre_columna_no_conformidad`='$no_conformidad'";
                                        $consulta4 = mysqli_query($conexion, $sql4);
                                        while ($row = mysqli_fetch_array($consulta4)) {
                                            $a=$row[$nombre_columna_estado_no_conformidad];
                                            if($a!='1')
                                            {

                                            }
                                            else
                                            {
                                                $estado_no_conformidad_revisada='1';
                                                break;
                                            }
                                        }
                                    }
                        ?>
                                    <tr>
                                        <td style="border: 1px solid black; vertical-align: middle;" >
                                            <?php echo $no_conformidad?>
                                        </td>
                                        <td style="border: 1px solid black; vertical-align: middle;" >
                                            <?php echo $row['comentario_no_conformidad']?>
                                        </td> 
                                        <td style="border: 1px solid black; vertical-align: middle;" >
                                            <?php
                                                if($estado_no_conformidad_revisada=='1')
                                                {
                                                    echo '<i class="icofont-tick-mark text-success">REVISADO</i>';
                                                }
                                                else
                                                {
                                                    echo '<i class="icofont-close-line text-danger">PENDIENTE</i>';
                                                }
                                            ?>

                                        </td> 
                                    </tr>
                        <?php
                                }
                        ?>
                                </tbody>
                            </table>
                        </div>

                        <?php
                            }

                        ?>
                    </div> -->
                    <div class="col justify-content-center mr-1 ml-1 mt-1 mb-1" >
                        <div class="row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">    
                            <h4><strong>INCIDENCIAS A REVISAR:</strong></h4>
                        </div>

                        <?php
                            $contador=0;
                            $sql2 = "SELECT DISTINCT(`molde`) FROM `comunicacion_jus_registro_datos` WHERE `id_com_jus`='$id_com_jus'";
                            $consulta2 = mysqli_query($conexion, $sql2);
                            while ($row = mysqli_fetch_array($consulta2)) {
                                $array_moldes[]=$row['molde'];
                            }  

                            foreach ($array_moldes as $molde) {
                                $sql3 = "SELECT `fecha`, `turno` FROM `comunicacion_jus_registro_datos` WHERE `id_com_jus`='$id_com_jus' AND `molde`='$molde'";
                                $consulta3 = mysqli_query($conexion, $sql3);
                                while ($row = mysqli_fetch_array($consulta3)) {
                                    $fecha_molde=$row['fecha'];
                                    $turno_molde=$row['turno'];

                                }
                        ?>
                        <div class="row d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">        
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th class="text-light bg-dark" style="border: 1px solid black; vertical-align: middle;" colspan="4" scope="col">MOLDE: <?php echo $molde?> (<?php echo date("d/m/Y", strtotime($fecha_molde))?> - <?php echo $turno_molde?>)</th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th class="text-light bg-dark" style="border: 1px solid black; vertical-align: middle;" scope="col">Incidencia</th>
                                        <th class="text-light bg-dark" style="border: 1px solid black; vertical-align: middle;" scope="col">Reparable en máquina</th>
                                        <th class="text-light bg-dark" style="border: 1px solid black; vertical-align: middle;" scope="col">ACCIÓN</th>
                                        <th class="text-light bg-dark" style="border: 1px solid black; vertical-align: middle;" scope="col">¿A revisar?</th>
                                    </tr>
                                </thead>
                                <tbody>

                        <?php
                                $sql3 = "SELECT*FROM `comunicacion_jus_registro_datos` WHERE `id_com_jus`='$id_com_jus' AND `molde`='$molde'";
                                $consulta3 = mysqli_query($conexion, $sql3);
                                while ($row = mysqli_fetch_array($consulta3)) {
                                    $contador=$row['num_conformidad'];
                                    $a_revisar=$row['a_revisar'];
                                    if($a_revisar==1)
                                    {
                                        $a_revisar_checked="checked";
                                    }
                                    else
                                    {
                                        $a_revisar_checked="";
                                    }
                                    $no_conformidad=$row['no_conformidad'];


                        ?>
                                    <tr>
                                        <td style="border: 1px solid black; vertical-align: middle;" >
                                            <?php echo $row['no_conformidad']?>
                                        </td>
                                        <td style="border: 1px solid black; vertical-align: middle;" >
                                            <?php echo $row['reparable_en_maquina']?>
                                        </td> 
                                        <td style="border: 1px solid black; vertical-align: middle;" >
                                            <input type="text" form="form_datos" class="form-control" name="accion_<?php echo $row['num_conformidad']?>" id="accion_<?php echo $row['num_conformidad']?>" value="<?php echo $row['accion']?>" onkeydown="btn_guardar_rojo()">
                                        </td> 
                                        <td style="border: 1px solid black; vertical-align: middle;" >
                        <?php
                                        switch ($row['estado_no_conformidad']) {
                                            case 0:
                                                echo '
                                                        <input type="checkbox" form="form_datos" class="form-control" id="checkbox_a_revisar_'.$row['num_conformidad'].'" name="checkbox_a_revisar_'.$row['num_conformidad'].'" '.$a_revisar_checked.' value="1" onclick="btn_guardar_rojo()">
                                                    ';
                                                break;
                                            case 1:
                                                echo '
                                                        <i class="icofont-tick-mark text-success">
                                                            CORREGIDO
                                                        </i>
                                                        <input type="hidden" form="form_datos"  id="checkbox_a_revisar_'.$row['num_conformidad'].'" name="checkbox_a_revisar_'.$row['num_conformidad'].'" value="0">
                                                    ';
                                                break;
                                        }
                        ?>
                                        </td> 
                                    </tr>
                        <?php
                                }
                        ?>
                                </tbody>
                            </table>
                        </div>

                        <?php
                            }

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" form="form_datos"  id="contador" name="contador" value="<?php echo $contador?>">
<?php 
echo '<br>contador= '.$contador.'<br>';
?>
<script>

    var id_com_jus = <?php echo $id_com_jus?>;

    function guardar_datos()
    {
        btn_guardar_verde();

        var form = new FormData(document.getElementById("form_datos"));
        var contador = document.getElementById("contador").value;
        var num_a_revisar=0;

        $.ajax({
            url: 'funciones_comunicacion_jus/guardar_datos.php?id_com_jus='+id_com_jus+'&num_a_revisar='+contador,
            type: 'POST',
            dataType: "json",
            data: form,
            cache: false,
            contentType: false,
            processData: false
        });
    }

    function btn_guardar_rojo() {
        var boton_guardar = document.getElementById("btn_guardar");
        boton_guardar.style.background = "#dc3545";   
        boton_guardar.innerHTML  = "<i class='icofont-save'></i>";   
    }
    function btn_guardar_verde() {
        var boton_guardar = document.getElementById("btn_guardar");
        boton_guardar.style.background = "#28a745";   
        boton_guardar.innerHTML  = "<i class='icofont-check'></i>";   
    }
</script>
    <!-- Footer -->
    <?php echo file_get_contents('footer.php');?>
    <!-- Footer -->

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script> -->

</body>
</html>