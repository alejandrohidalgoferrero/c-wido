<?php
    include('./../conexion.php');

    $nombre=$_POST['nombre'];
    $apellido1=$_POST['apellido1'];
    $apellido2=$_POST['apellido2'];
    $uet=$_POST['uet'];

    $ju=$_POST['ju'];
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];
    $tipo=$_POST['tipo'];

    $sql="INSERT INTO `usuarios`( `nombre`, `apellido1`, `apellido2`, `uet`,`ju`, `numero empresa`, `tipo`, `password`) VALUES ('$nombre','$apellido1','$apellido2','$uet','$ju' ,'$usuario','$tipo' ,'$password')";
    $consulta = mysqli_query($conexion, $sql);
?>