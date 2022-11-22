<?php
    include("conexion.php");

$maquina=$_POST["maquina"];
$nombre_operario=$_POST["nombre_operario"];
$fecha_hora=$_POST["fecha_hora"];
$duracion=$_POST["duracion"];
$numVariables=$_POST["numVariables"];


session_start();
$operacion= $_SESSION['operacion'];
$accion= $_SESSION['accion'];
$tabla='check_'.$operacion.'_'.$accion.'_plantilla';
$num_test=$_SESSION['num_test'];

$tabla_registro='check_'.$operacion.'_'.$accion.'_registro';
$fecha_hora = str_replace("T", " ", $fecha_hora);

// echo '<br>operacion= '.$operacion;
// echo '<br>tabla_registro= '.$tabla_registro;
// echo '<br>fecha_hora= '.$fecha_hora;

for ($i = 1; $i <= $numVariables; $i++) {

    $respuesta = $_POST["respuesta_".$i] ;
    $comentario = $_POST["comentario_".$i] ;

    echo '<br>prueba';
    echo '<br>respuesta_'.$i.'= '.$respuesta;
    echo '<br>comentario_'.$i.'= '.$comentario;
$sql2 =  "UPDATE `$tabla_registro` SET `maquina`='$maquina',`nombre_operario`='$nombre_operario',`fecha_hora`='$fecha_hora',
`respuesta`='$respuesta',`comentario`='$comentario',`duracion`='$duracion' WHERE num_test= $num_test AND id=$i";
$consulta2 = mysqli_query($conexion, $sql2);

}
header('Location: checks arranque parada registro.php');

?>