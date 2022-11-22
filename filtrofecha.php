<?php

    $fecha=$_POST['fecha'];
    $datetime = new DateTime($fecha);

    session_start();
    $_SESSION['fecha'] =$datetime;

    echo '$fecha='.$fecha.'<br>';
    echo '$datetime='.$datetime.'<br>';
    echo '    $_SESSION[fecha]='.$_SESSION['fecha'] .'<br>';

    // header ('Location: visualizaciontipoindicador.php');

?>