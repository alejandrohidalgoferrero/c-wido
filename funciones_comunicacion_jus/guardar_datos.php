<?php 
    $servername5="10.217.144.35";
    $database5 = "c-wido";
    $username5 = "dwido";
    $password5 = "d-widoMatriceria1";
    $conn = mysqli_connect($servername5, $username5, $password5, $database5);

    $id_com_jus=$_GET['id_com_jus'];
    $num_a_revisar=$_GET['num_a_revisar'];

    $autor=$_POST['creador'];
    $ju_matriceria=$_POST['ju_matriceria'];
    $ju_fabricacion=$_POST['ju_fabricacion'];
    $nombrecompleto=$_SESSION['nombrecompleto'];


    $sql5="UPDATE `comunicacion_jus_registro_dias` SET `ultimo_modificador`='$nombrecompleto',`fecha_ultima_modificacion`=CURRENT_TIMESTAMP,`ju_matriceria`='$ju_matriceria',`ju_fabricacion`='$ju_fabricacion' WHERE  `id_com_jus`='$id_com_jus'";
    $consulta5 = mysqli_query($conn, $sql5);

    for ($i = 1; $i <= $num_a_revisar; $i++) {

        $a_revisar=$_POST['checkbox_a_revisar_'.$i];

        if($a_revisar!=1)
        {
            $a_revisar=0; 
        }
        
        $sql5="UPDATE `comunicacion_jus_registro_datos` SET `a_revisar`='$a_revisar' WHERE  `id_com_jus`='$id_com_jus' AND `num_conformidad`='$i'";
        $consulta5 = mysqli_query($conn, $sql5);
    }



    // for ($id = 1; $id <= 3; $id++) {
    //     $top_3_fab=$_POST['top_3_fab_'.$id];
    //     $tiempo_top_3_fab=$_POST['tiempo_top_3_fab_'.$id];
    //     $top_3_cal=$_POST['top_3_cal_'.$id];
    //     $tiempo_top_3_fab=$_POST['tiempo_top_3_cal_'.$id];

    //     $sql5="UPDATE `libro_relevos_fabricacion_registro_datos` SET `top_3_fabricacion` = '$top_3_fab', `time_top_3_fabricacion` = '$tiempo_top_3_fab', `top_3_calidad` = '$top_3_cal', `time_top_3_calidad` = '$tiempo_top_3_fab' WHERE  `id_libro`='$id_libro' AND `id`='$id'";
    //     $consulta5 = mysqli_query($conn, $sql5);

    //     for ($iny = 1; $iny <= 8; $iny++) {

    //         $columna_top_fab_iny='iny_'.$iny.'_top_3_fabricacion';
    //         $columna_time_top_fab_iny='iny_'.$iny.'_time_top_3_fabricacion';
    //         $columna_top_cal_iny='iny_'.$iny.'_top_3_calidad';
    //         $columna_time_top_cal_iny='iny_'.$iny.'_time_top_3_calidad';

    //         $dato_top_fab_iny=$_POST['top_3_iny_'.$iny.'_fab_'.$id];
    //         $dato_tiempo_top_fab_iny=$_POST['tiempo_top_3_iny_'.$iny.'_fab_'.$id];
    //         $dato_top_cal_iny=$_POST['top_3_iny_'.$iny.'_cal_'.$id];
    //         $dato_tiempo_top_cal_iny=$_POST['tiempo_top_3_iny_'.$iny.'_cal_'.$id];

    //         $sql5="UPDATE `libro_relevos_fabricacion_registro_datos` SET $columna_top_fab_iny = '$dato_top_fab_iny', $columna_time_top_fab_iny = '$dato_tiempo_top_fab_iny', $columna_top_cal_iny = '$dato_top_cal_iny', $columna_time_top_cal_iny = '$dato_tiempo_top_cal_iny' WHERE  `id_libro`='$id_libro' AND `id`='$id'";
    //         $consulta5 = mysqli_query($conn, $sql5);

    //     }
    // }

?>