<?php
 include("conexion.php");
 include("ipserver.php");
 $ip="localhost";

 
 $consulta = "INSERT INTO `hornos_desgasificado` (`horno origen`, `inyectora destino`, `programa`, `desgasificado`, `operario`, `comentarios`) VALUES (NULL,NULL,NULL,NULL, NULL, NULL);";               
 $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));




 header ('Location: desgasificadonuevo.php');
?>