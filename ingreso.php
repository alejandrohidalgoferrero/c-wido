<?php
include("conexion.php");

$usuario= $_POST['matricero'];
$pass= $_POST['password'];


// echo $filas;

$sql="SELECT*FROM usuarios WHERE `numero empresa`='$usuario' AND `password`='$pass'";

if ($result = mysqli_query($conexion, $sql)) {

    $filas=mysqli_num_rows($result);

}



if($filas != 1){
    
    header("Location:indexError.php");}
else {
    
    $sql="SELECT*FROM usuarios WHERE `numero empresa`='$usuario' AND `password`='$pass'";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {
        $nombre=$row['nombre'];
        $apellido1=$row['apellido1'];
        $apellido2=$row['apellido2'];   
    }
    $nombrecompleto=$nombre.' '.$apellido1.' '.$apellido2; 

    session_start();
    $_SESSION['usuario']=$usuario;
    $_SESSION['nombrecompleto']=$nombrecompleto;
    $autentificado = "SI";

    // $sql="UPDATE tabla_navegador SET `usuario` = '$nombre' WHERE `titulo` ='usuario'";
    // $consulta=mysqli_query($conexion, $sql);

    header("Location:indexDesbloqueado.php");
}
?>