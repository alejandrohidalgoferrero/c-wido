<?php 

include("conexion.php");

session_start();

$nombre_completo = $_SESSION['nombrecompleto'];
$tipo_generacion=$_POST['tipo_generacion'];


switch ($tipo_generacion) {
    case "nuevo":
        $sql = "SELECT*FROM `hoja_intervencion_registro` ORDER BY `id_hoja_intervencion` DESC LIMIT 1";
        $consulta = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_array($consulta)) {
            $nuevo_id=$row['id_hoja_intervencion']+1;
        }
        if(is_null($nuevo_id))
        {
            $nuevo_id=1;
        }

        $_SESSION['id_hoja_intervencion']=$nuevo_id;

        $sql = "INSERT INTO `hoja_intervencion_registro`(`id_hoja_intervencion`, `fecha_creacion`, `usuario_creacion`) 
        VALUES ('$nuevo_id',CURRENT_TIMESTAMP,'$nombre_completo')";
        $consulta = mysqli_query($conexion, $sql);

        for ($i = 1; $i <= 15; $i++) {
            $sql2 =  "INSERT INTO `hoja_intervencion_datos`(`id_hoja_intervencion`, `id`) VALUES ('$nuevo_id','$i')";
            $consulta2 = mysqli_query($conexion, $sql2);
        }

    break;
    case "modificar":

        $id_hoja_intervencion=$_POST['id_hoja_intervencion'];
        $_SESSION['id_hoja_intervencion']=$id_hoja_intervencion; 

    break;
}


header('Location: hoja_intervencion.php')

?>