<?php 

include("conexion.php");

session_start();

$nombre_completo = $_SESSION['nombrecompleto'];

$tipo_generacion=$_POST['tipo_generacion'];
$tipo_check=$_POST['tipo_check'];

$nombre_tabla_plantilla='checks_mto_seguridad_'.$tipo_check.'_plantilla';
$nombre_tabla_registro='checks_mto_seguridad_'.$tipo_check.'_registro';
$direccion='checks_mto_seguridad_'.$tipo_check;

switch ($tipo_generacion) {
    case "nuevo":
        $sql = "SELECT `id_check` FROM `checks_mto_seguridad_registro` ORDER BY `checks_mto_seguridad_registro`.`id_check` DESC LIMIT 1";
        $consulta = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_array($consulta)) {
            $id_check=$row['id_check']+1;
        }
        if(is_null($id_check)){$id_check=1;};

        $_SESSION['id_check']=$id_check;

        $sql = "INSERT INTO `checks_mto_seguridad_registro`(`id_check`, `fecha_creacion`, `usuario_creacion`, `fecha_modificacion`, `usuario_modificacion`, `tipo_check`, `estado_check`) 
        VALUES ('$id_check',CURRENT_TIMESTAMP,'$nombre_completo',CURRENT_TIMESTAMP,'$nombre_completo','$tipo_check',0)";
        $consulta = mysqli_query($conexion, $sql);

        $sql = "UPDATE `$nombre_tabla_plantilla` SET `id_check`='$id_check'";
        $consulta = mysqli_query($conexion, $sql);

        $sql2 =  "INSERT INTO `$nombre_tabla_registro` SELECT*FROM `$nombre_tabla_plantilla`";
        $consulta2 = mysqli_query($conexion, $sql2);

    break;
    case "modificar":
        $id_check=$_POST['id_check'];
        $_SESSION['id_check']=$id_check;

    break;
}


header('Location: '.$direccion.'.php')

?>