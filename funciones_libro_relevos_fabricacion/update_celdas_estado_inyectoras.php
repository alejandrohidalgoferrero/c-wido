<?php 
    $servername5="10.217.144.35";
    $database5 = "c-wido";
    $username5 = "dwido";
    $password5 = "d-widoMatriceria1";
    $conn = mysqli_connect($servername5, $username5, $password5, $database5);

    $id_libro=$_GET['id_libro'];
    $estado_nuevo_celda=$_GET['estado_nuevo_celda'];
    $iny=$_GET['iny'];

    $columna_iny='iny_'.$iny.'_estado';
    $sql5="UPDATE `libro_relevos_fabricacion_registro_dias` SET $columna_iny = '$estado_nuevo_celda' WHERE  `id_libro`='$id_libro'";
    $consulta5 = mysqli_query($conn, $sql5);




?>