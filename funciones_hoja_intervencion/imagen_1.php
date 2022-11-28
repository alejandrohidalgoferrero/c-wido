<?php
$imagenCodificada = $_POST["imagen_1"];
$id_hoja_intervencion = $_GET["id_hoja_intervencion"];
$tipo_molde = $_GET["tipo_molde"];

$imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", $imagenCodificada);
$imagenDecodificada = base64_decode($imagenCodificadaLimpia);
$urlImagenGuardada = "../imagenes/imagen_hoja_intervencion_id".$id_hoja_intervencion."_".$tipo_molde."_f100.jpg";
$nombre_imagen_guardada="imagenes/imagen_hoja_intervencion_id".$id_hoja_intervencion."_".$tipo_molde."_f100.jpg";

file_put_contents($urlImagenGuardada, $imagenDecodificada);
echo json_encode($urlImagenGuardada);

include('../conexion.php');

$sql="UPDATE `hoja_intervencion_registro` SET `img_1`='$nombre_imagen_guardada' WHERE `id_hoja_intervencion`='$id_hoja_intervencion'";
$consulta=mysqli_query($conexion, $sql);

?>