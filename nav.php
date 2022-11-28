<?php

session_start();
$numero_empresa=$_SESSION['usuario'];
$nombrecompleto=$_SESSION['nombrecompleto'];

$_SESSION['nombrecompleto']=$nombrecompleto;
$_SESSION['usuario']=$numero_empresa;

if($nombrecompleto== "" AND $titulo_pagina!="LOGIN")
{
    header('Location:index.php');
}

$link_nav = array("1"=>"Mantenimiento ", "2"=>"Libro de Relevos Fabricación", "3"=>"App elementos elevación", "4"=>"FACTORIA 4.0 ",  "5"=>"Cambio molde", "6"=>"FOS", "7"=>"HxH inyectoras","8"=>"HORNOS ","9"=>"Check arranque parada","10"=>"Calidad");
$sublink_nav =array("1"=>"Sala 3D","2"=>"Comunicación JUs");


for ($i = 1; $i <= count($link_nav); $i++) {
    if($titulo_pagina==$link_nav[$i])
    {
        $color_texto[$i]="btn-warning border text-dark font-weight-bold rounded ";
    }
    else
    {
        $color_texto[$i]="border rounded text-light";
    }
}

for ($i = 1; $i <= count($sublink_nav); $i++) {
    if($subtitulo_pagina==$sublink_nav[$i])
    {
        $color_subtexto[$i]="bg-warning border text-dark font-weight-bold rounded";
    }
    else
    {
        $color_subtexto[$i]="bg-light border rounded text-dark";
    }
}


for ($i = 1; $i <= count($link_nav); $i++) {
    if ($titulo_pagina==$link_nav[$i]) {$estado_link_nav[$i]="active";}else{$estado_link_nav[$i]="";}
}

if($titulo_pagina=="LOGIN")
{
    $bloqueo_inicio="disabled";
}
else
{
    $bloqueo_inicio="";
}

$ip="10.217.144.35";

include("ipserver.php");


echo'



<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
    <a class="navbar-brand active" href="http://'.$ipserver.'/C-WIDO/"> C-WIDO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>';
    echo' 
    <div>
        <a class="navbar-nav justify-content-middle" >
            <img src="imagenes/Elefante.png" width=50% height=50%>
        </a>
    </div>
    <div align="center" mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 >
        <span class="navbar-text text-light">
            '.$nombrecompleto.'
        </span>
    </div>';
    


    echo'
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav mr-auto mt-lg-0">';
            echo'
            <li class="nav-item ml-1 mr-1 mt-1 mb-1 pl-1 pr-1 pt-1 pb-1">
                <a class="nav-link '.$color_texto[1].' '.$bloqueo_inicio.'"   href="mantenimiento.php">MANTENIMIENTO</a>
            </li>
            ';
            echo'
            <li class="nav-item ml-1 mr-1 mt-1 mb-1 pl-1 pr-1 pt-1 pb-1">
                <a class="nav-link '.$color_texto[2].' '.$bloqueo_inicio.'"   href="libro_relevos_fabricacion_menu.php">Libro de Relevos</a>
            </li>
            ';
            // echo'
            // <li class="nav-item ml-1 mr-1 mt-1 mb-1 pl-1 pr-1 pt-1 pb-1">
            //     <a class="nav-link '.$color_texto[3].' '.$bloqueo_inicio.'"   href="app elementos elevacion.php">App elementos elevación</a>
            // </li>
            // ';
            echo'
            <li class="nav-item ml-1 mr-1 mt-1 mb-1 pl-1 pr-1 pt-1 pb-1">
                <a class="nav-link '.$color_texto[4].' '.$bloqueo_inicio.'"   href="factoría4.0.php">Factoría 4.0</a>
            </li>
            ';
            echo'
            <li class="nav-item ml-1 mr-1 mt-1 mb-1 pl-1 pr-1 pt-1 pb-1">
                <a class="nav-link '.$color_texto[5].' '.$bloqueo_inicio.'"   href="cambiomolde.php">Cambio de molde</a>
            </li>
            ';

            // echo'
            // <li class="nav-item ml-1 mr-1 mt-1 mb-1 pl-1 pr-1 pt-1 pb-1">
            //     <a class="nav-link '.$color_texto[6].' '.$bloqueo_inicio.'"   href="fos.php">FOS</a>
            // </li>
            // ';

            // echo'
            // <li class="nav-item ml-1 mr-1 mt-1 mb-1 pl-1 pr-1 pt-1 pb-1">
            //     <a class="nav-link '.$color_texto[7].' '.$bloqueo_inicio.'"   href="HxH INY.php">HxH INY</a>
            // </li>
            // ';
            echo'
            <li class="nav-item ml-1 mr-1 mt-1 mb-1 pl-1 pr-1 pt-1 pb-1">
                <a class="nav-link '.$color_texto[8].' '.$bloqueo_inicio.'"   href="hornos.php">HORNOS</a>
            </li>
            ';
            echo'
            <li class="nav-item ml-1 mr-1 mt-1 mb-1 pl-1 pr-1 pt-1 pb-1">
                <a class="nav-link '.$color_texto[9].' '.$bloqueo_inicio.'"   href="checks arranque parada.php">Checks arranque parada</a>
            </li>
            ';
            echo'
            <li class="nav-item ml-1 mr-1 mt-1 mb-1 pl-1 pr-1 pt-1 pb-1">
                <div class="dropdown" >
                    <a class="nav-link '.$color_texto[10].' dropdown-toggle '.$bloqueo_inicio.'"    data-toggle="dropdown" href="">Calidad</a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item '.$color_subtexto[1].'"  href="sala_3d_menu.php">Sala 3D</a>  
                        <a class="dropdown-item '.$color_subtexto[2].'"  href="comunicacion_jus_menu.php">Comunicación JUs</a>  
                    </ul>
                </div>
            </li>
            ';
    echo'    
        </ul>  
    </div>';
        

        if($bloqueado==""){echo'<div border rounded><a class="navbar-nav justify-content-end" href="ajustes.php"><img src="imagenes/ajustes.png"></a></div>';}

        echo'
            
    </nav>


'?>