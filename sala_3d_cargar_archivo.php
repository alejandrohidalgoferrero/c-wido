<?php
// $servername = "D-WIDO_SERVER";  
$servername="10.217.144.35";
$database = "c-wido";
$username = "dwido";
$password = "d-widoMatriceria1";
$conexion2 = mysqli_connect($servername, $username, $password, $database);

 if (!empty($_FILES)) {
    // SUBIDA DE FICHEROS
    $ds          = DIRECTORY_SEPARATOR;  //1

    $storeFolder = ".".$ds."sala_3d_archivos";   //2
    
    mkdir ("$storeFolder", 0777, true);
    chmod("$storeFolder",0777);
    echo $storeFolder;
    
    session_start();
    $id_sala_3d=$_SESSION["id_sala_3d"];

    $nombre='sala_3d_archivo_'.$id_sala_3d;

    $tempFile = $_FILES['file']['tmp_name'];          //3              
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    echo "<br>".$targetPath;
    



    $targetFile =  $targetPath.$nombre.'.pdf';  //5
    echo "<br>".$targetFile;

    $sql2="UPDATE `comunicacion_sala_3d` SET `archivo_adjunto` = 1,`nombre_archivo`='$nombre' WHERE `comunicacion_sala_3d`.`id` = '$id_sala_3d'";
    $consulta2 = mysqli_query($conexion2, $sql2);


    move_uploaded_file($tempFile,$targetFile); //6


}

?>
