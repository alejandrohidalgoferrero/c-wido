<?php 

    include('./../conexion.php');

    $id_hoja_intervencion=$_GET['id_hoja_intervencion'];

    $fecha=$_POST['fecha'];
    echo 'fecha='.$fecha.'<br>';
    $turno=$_POST['turno'];

    $rango_a=$_POST['rango_a'];
    if($rango_a!=1){$rango_a=0;}; 

    $rango_b=$_POST['rango_b'];
    if($rango_b!=1){$rango_b=0;}; 

    $modelo=$_POST['modelo'];;
    $molde=$_POST['molde'];
    $impronta=$_POST['impronta'];
    $ju_matriceria=$_POST['ju_matriceria'];
    $ju_fabricacion=$_POST['ju_fabricacion'];

    $fecha_inicio_reparacion=$_POST['fecha_inicio_reparacion'];
    if($fecha_inicio_reparacion==""){$fecha_inicio_reparacion="0000-00-00";}; 

    $fecha_estimada_reparacion=$_POST['fecha_estimada_reparacion'];
    if($fecha_estimada_reparacion==""){$fecha_estimada_reparacion="0000-00-00";}; 

    $fecha_real_reparacion=$_POST['fecha_real_reparacion'];
    if($fecha_real_reparacion==""){$fecha_real_reparacion="0000-00-00";}; 

    $comentarios_fabricacion=$_POST['comentarios_fabricacion'];
    $comentarios_matriceria=$_POST['comentarios_matriceria'];

    $bdl_realizado=$_POST['bdl_realizado'];
    if($bdl_realizado!=1){$bdl_realizado=0;}; 

    $bdl_comentario=$_POST['bdl_comentario'];


    $sql="UPDATE `hoja_intervencion_registro` SET `fecha`='$fecha',`turno`='$turno',`rango_a`='$rango_a',`rango_b`='$rango_b',`modelo`='$modelo',`molde`='$molde',`impronta`='$impronta',`ju_matriceria`='$ju_matriceria', `ju_fabricacion`='$ju_fabricacion',`fecha_inicio_reparacion`='$fecha_inicio_reparacion',`fecha_estimada_reparacion`='$fecha_estimada_reparacion',`fecha_real_reparacion`='$fecha_real_reparacion',`comentarios_fabricacion`='$comentarios_fabricacion',`comentarios_matriceria`='$comentarios_matriceria',`bdl_realizado`='$bdl_realizado',`bdl_comentario`='$bdl_comentario' WHERE `id_hoja_intervencion`='$id_hoja_intervencion'";
    $consulta = mysqli_query($conexion, $sql);


    for ($i = 1; $i <= 15; $i++) {

        $descripcion_problema=$_POST['descripcion_problema_'.$i];
        $conductor=$_POST['conductor_'.$i];
        $realizado=$_POST['realizado_'.$i];
        if($realizado!=1){$realizado=0;}; 


        $sql="UPDATE `hoja_intervencion_datos` SET `descripcion_problema`='$descripcion_problema',`conductor`='$conductor',`realizado`='$realizado' WHERE `id_hoja_intervencion`='$id_hoja_intervencion' AND `id`=$i";
        $consulta = mysqli_query($conexion, $sql);
        
    }

    $pin_roto=$_POST['pin_roto'];
    $expulsor=$_POST['expulsor'];
    $fuga=$_POST['fuga'];
    $inserto=$_POST['inserto'];
    $arrastre=$_POST['arrastre'];
    $rotura_molde=$_POST['rotura_molde'];

    $sql="UPDATE `hoja_intervencion_datos` SET `pin_roto`='$pin_roto',`expulsor`='$expulsor',`fuga`='$fuga',`inserto`='$inserto',`arrastre`='$arrastre',`rotura_molde`='$rotura_molde' WHERE `id_hoja_intervencion`='$id_hoja_intervencion' AND `id`='1'";
    $consulta = mysqli_query($conexion, $sql);
     ?>