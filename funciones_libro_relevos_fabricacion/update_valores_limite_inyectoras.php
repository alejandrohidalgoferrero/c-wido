<?php 
    $servername5="10.217.144.35";
    $database5 = "c-wido";
    $username5 = "dwido";
    $password5 = "d-widoMatriceria1";
    $conn = mysqli_connect($servername5, $username5, $password5, $database5);

    $valor_warning=$_GET['valor_warning'];
    $valor_danger=$_GET['valor_danger'];
    $id=$_GET['id'];

    $sql5="UPDATE `libro_relevos_fabricacion_asistente` SET `warning` = '$valor_warning', `danger` = '$valor_danger'WHERE  `id`='$id'";
    $consulta5 = mysqli_query($conn, $sql5);




?>