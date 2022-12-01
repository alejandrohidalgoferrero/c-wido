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
        $accion=$_POST['accion_'.$i];

        if($a_revisar!=1)
        {
            $a_revisar=0; 
        }
        
        $sql5="UPDATE `comunicacion_jus_registro_datos` SET `a_revisar`='$a_revisar',`accion`='$accion' WHERE  `id_com_jus`='$id_com_jus' AND `num_conformidad`='$i'";
        $consulta5 = mysqli_query($conn, $sql5);
    }

?>