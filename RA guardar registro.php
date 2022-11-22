<?php

include("conexion.php"); 
include("ipserver.php"); 
$ip="localhost";

session_start();
$num_ra=$_SESSION['num_ra'];


for ($i = 22; $i <= 64; $i++) {
    $dato4="";
    $dato4 = $_POST["medida_".$i] ;

    
    $sql1="UPDATE `ra_registro` SET `dato4` = '$dato4'WHERE `ra_registro`.`id` =$i AND `ra_registro`.`num_ra`='$num_ra' ";
    $consulta1 = mysqli_query($conexion, $sql1);
}

for ($i = 65; $i <= 87; $i++) {
        
    $dato1 = $_POST["data_".$i] ;

    
    $sql1="UPDATE `ra_registro` SET `dato1` = '$dato1'WHERE `ra_registro`.`id` =$i AND `ra_registro`.`num_ra`='$num_ra' ";
    $consulta1 = mysqli_query($conexion, $sql1);
}

for ($i = 88; $i <= 97; $i++) {
        
    $dato1 = $_POST["data_".$i] ;
    $dato2 = $_POST["data2_".$i] ;
    $dato3 = $_POST["data3_".$i] ;

    
    $sql1="UPDATE `ra_registro` SET `dato1` = '$dato1',`dato2` = '$dato2',`dato3` = '$dato3' WHERE `ra_registro`.`id` =$i AND `ra_registro`.`num_ra`='$num_ra' ";
    $consulta1 = mysqli_query($conexion, $sql1);
}

for ($i = 98; $i <= 101; $i++) {
    $nombre = $_POST["nombre_".$i] ;  
    $dato1 = $_POST["data_".$i] ;
    $dato2 = $_POST["data2_".$i] ;

    
    $sql1="UPDATE `ra_registro` SET `nombre` = '$nombre', `dato1` = '$dato1',`dato2` = '$dato2' WHERE `ra_registro`.`id` =$i AND `ra_registro`.`num_ra`='$num_ra' ";
    $consulta1 = mysqli_query($conexion, $sql1);
}

for ($i = 102; $i <= 107; $i++) {
        
    $dato1 = $_POST["data_".$i] ;

    
    $sql1="UPDATE `ra_registro` SET `dato1` = '$dato1'WHERE `ra_registro`.`id` =$i AND `ra_registro`.`num_ra`='$num_ra' ";
    $consulta1 = mysqli_query($conexion, $sql1);
}


header ('Location: mantenimiento.php');

?>