<?php

include("conexion.php");
include("nav.php");

session_start();
$id_risk_assesment=$_SESSION['id_risk_assement'];
$orden=$_SESSION['orden'];

$fecha_realizacion=$_POST['fecha_realizacion'];
$turno_realizacion=$_POST['turno_realizacion'];
$area=$_POST['area'];
$actividad=$_POST['actividad'];
$maquina=$_POST['maquina'];

$personal_expuesto=$_POST['personal_expuesto'];
$circustancias=$_POST['circustancias'];
$motivo_evaluacion=$_POST['motivo_evaluacion'];

$mayor_riesgo=$_POST['mayor_riesgo'];
$total_riesgo=$_POST['total_riesgo'];

$mayor_riesgo_despues=$_POST['mayor_riesgo_despues'];
$total_riesgo_despues=$_POST['total_riesgo_despues'];

$comentarios_motivos=$_POST['comentarios_motivos'];


$fecha_modificacion=date("Y-m-d H:i:s");


$sql = "UPDATE `risk_assesment_registro` SET `fecha_modificacion`=CURRENT_TIMESTAMP,  `usuario_moficacion`='$nombrecompleto', `fecha_introducida`='$fecha_realizacion', `turno_introducido`='$turno_realizacion', `maquina`='$maquina', `actividad`='$actividad', `area`='$area', `personal_expuesto`='$personal_expuesto', `circunstancias`='$circustancias', `motivo_evaluacion`='$motivo_evaluacion' , `mayor_riesgo`='$mayor_riesgo', `total_riesgo`='$total_riesgo', `mayor_riesgo_despues`='$mayor_riesgo_despues', `total_riesgo_despues`='$total_riesgo_despues' , `comentarios_motivos`='$comentarios_motivos'   WHERE `id`='$id_risk_assesment'";
$consulta = mysqli_query($conexion, $sql);

echo '<br>id_risk_assesment= '.$id_risk_assesment.'<br>';
echo '<br>orden= '.$orden.'<br>';
echo '<br>comentarios_motivos= '.$comentarios_motivos.'<br>';


for ($i = 1; $i <= 36; $i++) {

    $riesgo=$_POST['riesgo_'.$i];
    $probabilidad_riesgo=$_POST['probabilidad_riesgo_'.$i];
    if($probabilidad_riesgo==""){$probabilidad_riesgo=0;}

    $gravedad_riesgo=$_POST['gravedad_riesgo_'.$i];
    if($gravedad_riesgo==""){$gravedad_riesgo=0;}

    $valorar_riesgo=$_POST['valorar_riesgo_'.$i];

    $probabilidad_medidas=$_POST['probabilidad_medidas_'.$i];
    if($probabilidad_medidas==""){$probabilidad_medidas=0;}

    $gravedad_medidas=$_POST['gravedad_medidas_'.$i];
    if($gravedad_medidas==""){$gravedad_medidas=0;}

    $despues_medidas=$_POST['despues_medidas_'.$i];


    $sql = "UPDATE `risk_assesments_datos`  SET  `riesgo`='$riesgo', `probabilidad_riesgo`='$probabilidad_riesgo', `gravedad_riesgo`='$gravedad_riesgo', `valorar_riesgo`='$valorar_riesgo', `probabilidad_medidas`='$probabilidad_medidas', `gravedad_medidas`='$gravedad_medidas', `despues_medidas`='$despues_medidas' WHERE `id_risk_assesment`='$id_risk_assesment' AND `id`='$i' AND `orden`='$orden'";
    $consulta = mysqli_query($conexion, $sql);
}

for ($i = 37; $i <= 39; $i++) {

    $peligros_potenciales=$_POST['peligros_potenciales_'.$i];
    $riesgo=$_POST['riesgo_'.$i];
    $probabilidad_riesgo=$_POST['probabilidad_riesgo_'.$i];
    if($probabilidad_riesgo==""){$probabilidad_riesgo=0;}


    $gravedad_riesgo=$_POST['gravedad_riesgo_'.$i];
    if($gravedad_riesgo==""){$gravedad_riesgo=0;}

    $valorar_riesgo=$_POST['valorar_riesgo_'.$i];

    $probabilidad_medidas=$_POST['probabilidad_medidas_'.$i];
    if($probabilidad_medidas==""){$probabilidad_medidas=0;}

    $gravedad_medidas=$_POST['gravedad_medidas_'.$i];
    if($gravedad_medidas==""){$gravedad_medidas=0;}

    $despues_medidas=$_POST['despues_medidas_'.$i];


    $sql = "UPDATE `risk_assesments_datos`  SET `peligros_potenciales`='$peligros_potenciales', `riesgo`='$riesgo', `probabilidad_riesgo`='$probabilidad_riesgo', `gravedad_riesgo`='$gravedad_riesgo', `valorar_riesgo`='$valorar_riesgo', `probabilidad_medidas`='$probabilidad_medidas', `gravedad_medidas`='$gravedad_medidas', `despues_medidas`='$despues_medidas' WHERE `id_risk_assesment`='$id_risk_assesment' AND `id`='$i' AND `orden`='$orden'";
    $consulta = mysqli_query($conexion, $sql);
}

$medidas_prevencion_apropiadas=$_POST['medidas_prevencion_apropiadas'];

echo '<br>medidas_prevencion_apropiadas= '.$medidas_prevencion_apropiadas.'<br>';
$sql = "UPDATE `risk_assesment_registro`  SET `medidas_prevencion_apropiadas`='$medidas_prevencion_apropiadas' WHERE `id`='$id_risk_assesment'";
$consulta = mysqli_query($conexion, $sql);

for ($i = 1; $i <= 15; $i++) {

    $medidas_preventivas_existentes=$_POST['medidas_preventivas_existentes_'.$i];

    $sql = "UPDATE `risk_assesments_datos`  SET `dato_medidas_preventivas_existentes`='$medidas_preventivas_existentes'  WHERE `id_risk_assesment`='$id_risk_assesment' AND `id`='$i' AND `orden`='$orden'";
    $consulta = mysqli_query($conexion, $sql);
}

for ($i = 1; $i <= 6; $i++) {

    $circustancias_preventivas_existentes=$_POST['circustancias_preventivas_existentes_'.$i];

    $sql = "UPDATE `risk_assesments_datos`  SET `dato_circustancias_preventivas`='$circustancias_preventivas_existentes'  WHERE `id_risk_assesment`='$id_risk_assesment' AND `id`='$i' AND `orden`='$orden'";
    $consulta = mysqli_query($conexion, $sql);
}


for ($i = 1; $i <= 10; $i++) {

    $factor_de_riesgo=$_POST['factor_de_riesgo_'.$i];
    $medida_de_control=$_POST['medida_de_control_'.$i];
    $responsable=$_POST['responsable_'.$i];

    $sql = "UPDATE `risk_assesments_datos`  SET `factor_de_riesgo`='$factor_de_riesgo',`medida_de_control`='$medida_de_control',`responsable`='$responsable'  WHERE `id_risk_assesment`='$id_risk_assesment' AND `id`='$i' AND `orden`='$orden'";
    $consulta = mysqli_query($conexion, $sql);
}


$evaluada_por_1=$_POST['evaluada_por_1'];
$evaluada_por_2=$_POST['evaluada_por_2'];
$evaluacion_aprobada=$_POST['evaluacion_aprobada'];

echo '<br>evaluada_por_1= '.$evaluada_por_1.'<br>';
echo '<br>evaluada_por_2= '.$evaluada_por_2.'<br>';
echo '<br>evaluacion_aprobada= '.$evaluacion_aprobada.'<br>';



$sql = "UPDATE `risk_assesments_datos`  SET `evaluada_por_1`='$evaluada_por_1', `evaluada_por_2`='$evaluada_por_2',`evaluacion_aprobada`='$evaluacion_aprobada'  WHERE `id_risk_assesment`='$id_risk_assesment' AND `id`=1 AND `orden`='$orden'";
$consulta = mysqli_query($conexion, $sql);


header('Location: risk_assesment_v2_menu.php');

?>