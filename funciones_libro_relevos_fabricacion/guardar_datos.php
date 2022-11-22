<?php 
    $servername5="10.217.144.35";
    $database5 = "c-wido";
    $username5 = "dwido";
    $password5 = "d-widoMatriceria1";
    $conn = mysqli_connect($servername5, $username5, $password5, $database5);

    $id_libro=$_GET['id_libro'];

    $autor=$_POST['creador'];

    for ($id = 1; $id <= 3; $id++) {
        $top_3_fab=$_POST['top_3_fab_'.$id];
        $tiempo_top_3_fab=$_POST['tiempo_top_3_fab_'.$id];
        $top_3_cal=$_POST['top_3_cal_'.$id];
        $tiempo_top_3_fab=$_POST['tiempo_top_3_cal_'.$id];

        $sql5="UPDATE `libro_relevos_fabricacion_registro_datos` SET `top_3_fabricacion` = '$top_3_fab', `time_top_3_fabricacion` = '$tiempo_top_3_fab', `top_3_calidad` = '$top_3_cal', `time_top_3_calidad` = '$tiempo_top_3_fab' WHERE  `id_libro`='$id_libro' AND `id`='$id'";
        $consulta5 = mysqli_query($conn, $sql5);

        for ($iny = 1; $iny <= 8; $iny++) {

            $columna_top_fab_iny='iny_'.$iny.'_top_3_fabricacion';
            $columna_time_top_fab_iny='iny_'.$iny.'_time_top_3_fabricacion';
            $columna_top_cal_iny='iny_'.$iny.'_top_3_calidad';
            $columna_time_top_cal_iny='iny_'.$iny.'_time_top_3_calidad';

            $dato_top_fab_iny=$_POST['top_3_iny_'.$iny.'_fab_'.$id];
            $dato_tiempo_top_fab_iny=$_POST['tiempo_top_3_iny_'.$iny.'_fab_'.$id];
            $dato_top_cal_iny=$_POST['top_3_iny_'.$iny.'_cal_'.$id];
            $dato_tiempo_top_cal_iny=$_POST['tiempo_top_3_iny_'.$iny.'_cal_'.$id];

            $sql5="UPDATE `libro_relevos_fabricacion_registro_datos` SET $columna_top_fab_iny = '$dato_top_fab_iny', $columna_time_top_fab_iny = '$dato_tiempo_top_fab_iny', $columna_top_cal_iny = '$dato_top_cal_iny', $columna_time_top_cal_iny = '$dato_tiempo_top_cal_iny' WHERE  `id_libro`='$id_libro' AND `id`='$id'";
            $consulta5 = mysqli_query($conn, $sql5);

        }
    }

    for ($id = 1; $id <= 5; $id++) {
        for ($iny = 1; $iny <= 8; $iny++) {

            $columna_molde='iny_'.$iny.'_molde';
            $columna_molde_motivos='iny_'.$iny.'_molde_motivos';

            $dato_molde=$_POST['iny_'.$iny.'_molde_'.$id];
            $dato_molde_motivos=$_POST['motivos_iny_'.$iny.'_'.$id];


            $columna_inyectadas='iny_'.$iny.'_inyectadas';
            $columna_chatarra='iny_'.$iny.'_chatarra';

            $dato_inyectadas=$_POST['inyectadas_iny_'.$iny];
            $dato_chatarra=$_POST['chatarra_iny_'.$iny];

            $sql5="UPDATE `libro_relevos_fabricacion_registro_datos` SET $columna_molde = '$dato_molde', $columna_molde_motivos = '$dato_molde_motivos', `autor`='$autor', $columna_inyectadas = '$dato_inyectadas', $columna_chatarra = '$dato_chatarra' WHERE  `id_libro`='$id_libro' AND `id`='$id'";
            $consulta5 = mysqli_query($conn, $sql5);
        }
    }
?>