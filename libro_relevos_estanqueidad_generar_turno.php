<?php 
$id="localhost";
include("conexion.php");

$id_libro= $_POST["id_libro"] ;

session_start();
$_SESSION['id_libro']=$id_libro;
$nombrecompleto=$_SESSION['nombrecompleto'];
$numero_empresa=$_SESSION['usuario'];

$consulta = "SELECT * FROM `usuarios` WHERE `numero empresa`='$numero_empresa'";
$resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
while ($row = mysqli_fetch_array($resultado)) {
    $uet=$row['uet'];
}

echo '<br>id_libro= '.$id_libro.'<br>';
echo '<br>nombrecompleto= '.$nombrecompleto.'<br>';


$consulta = "SELECT `estado_estanqueidad` FROM `libro_relevos_fabricacion_registro_dias` WHERE `id_libro`='$id_libro'";
$resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
while ($row = mysqli_fetch_array($resultado)) {
    $estado=$row['estado_estanqueidad'];
}

switch ($estado) {
    case 0:
        $sql="UPDATE `libro_relevos_estanqueidad_registro_datos_plantilla` SET `id_libro`='$id_libro', `orden`=1 , `autor`='$nombrecompleto', `fecha_creacion`= CURRENT_TIMESTAMP";
        $consulta=mysqli_query($conexion, $sql);

        $sql2 =  "INSERT INTO `libro_relevos_estanqueidad_registro_datos` SELECT*FROM `libro_relevos_estanqueidad_registro_datos_plantilla`";
        $consulta2 = mysqli_query($conexion, $sql2);

        $sql="UPDATE `libro_relevos_estanqueidad_registro_datos_plantilla` SET `id_libro`= NULL , `orden`= NULL , `autor`=NULL, `fecha_creacion`= NULL";
        $consulta=mysqli_query($conexion, $sql);

        $sql="UPDATE `libro_relevos_fabricacion_registro_dias` SET `estado_estanqueidad`='1',`creador_estanqueidad`='$nombrecompleto',`fecha_creacion_estanqueidad`=CURRENT_TIMESTAMP ,`ultimo_modificador_estanqueidad`='$nombrecompleto',`fecha_ultima_modificacion_estanqueidad`=CURRENT_TIMESTAMP WHERE `id_libro`='$id_libro' ";
        $consulta=mysqli_query($conexion, $sql);

        break;
    case 1:

        $consulta = "SELECT `orden` FROM `libro_relevos_estanqueidad_registro_datos` WHERE `id_libro`='$id_libro'";
        $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
        while ($row = mysqli_fetch_array($resultado)) {
            $orden=$row['orden'];
        }
        $orden_nuevo=$orden +1 ;

        $sql="UPDATE `libro_relevos_fabricacion_registro_dias` SET `ultimo_modificador_estanqueidad`='$nombrecompleto',`fecha_ultima_modificacion_estanqueidad`=CURRENT_TIMESTAMP WHERE `id_libro`='$id_libro' ";
        $consulta=mysqli_query($conexion, $sql);

        $sql2 =  "INSERT INTO `libro_relevos_estanqueidad_registro_datos_orden_viejo` (SELECT*FROM `libro_relevos_estanqueidad_registro_datos` WHERE `id_libro`='$id_libro' AND `orden`='$orden')";
        $consulta2 = mysqli_query($conexion, $sql2);

        $sql="UPDATE `libro_relevos_estanqueidad_registro_datos_orden_viejo` SET `autor`='$nombrecompleto', `fecha_creacion`= CURRENT_TIMESTAMP WHERE `id_libro`='$id_libro' AND `orden`='$orden' ";
        $consulta=mysqli_query($conexion, $sql);

        $sql="UPDATE `libro_relevos_estanqueidad_registro_datos` SET  `orden`= '$orden_nuevo' WHERE `id_libro`= '$id_libro' ";
        $consulta=mysqli_query($conexion, $sql);

        $_SESSION['orden']=$orden_nuevo;

        break;
}

    header('Location: libro_relevos_estanqueidad.php')

?>