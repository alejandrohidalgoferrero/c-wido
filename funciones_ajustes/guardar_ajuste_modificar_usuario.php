<?php
    include('./../conexion.php');

    $id=$_GET['id'];

    $nombre=$_POST['nombre'];
    $apellido1=$_POST['apellido1'];
    $apellido2=$_POST['apellido2'];
    $uet=$_POST['uet'];

    $ju=$_POST['ju'];
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];
    $tipo=$_POST['tipo'];

    $sql2="UPDATE `usuarios` SET `nombre` = '$nombre',`apellido1` = '$apellido1' ,`apellido2` = '$apellido2',`uet` = '$uet',`ju` = '$ju',`numero empresa` = '$usuario',`tipo` = '$tipo' ,`password` = '$password' WHERE `usuarios`.`id` =$id ";
    $consulta2 = mysqli_query($conexion, $sql2);
?>