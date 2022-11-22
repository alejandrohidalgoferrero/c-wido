<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
     <script src="js/plotly.min.js"></script>

     <title>HxH INY</title>
          
</head>

<body style="background-color: #D8F5CA" class="text-muted">

    <!-- Nav desde aqui -->
    <?php
     $titulo_pagina= "HxH inyectoras";
     include("conexion.php");
    $sql="UPDATE tabla_navegador SET uso = '0'";
    $consulta = mysqli_query($conexion, $sql);

     $sql="UPDATE tabla_navegador SET uso = '1' WHERE tabla_navegador.titulo = '$titulo_pagina'";
     $consulta = mysqli_query($conexion, $sql);
     ?>
     
     <title><?php echo $titulo_pagina?></title>

    <?php 
    $ip="LOCALHOST";

    include('nav.php');
    
    session_start();
    $fecha=$_SESSION['fecha'];
    $iny=$_SESSION['iny'];
    $inyectora=$_SESSION['inyectora'];
    $tabla=$_SESSION['tabla'];
    $tabla_problemas=$_SESSION['tabla_problemas'];


    $date=strtotime($fecha);
    $dia = date("d",$date);
    $mes = date("m",$date);
    $año = date("Y",$date);



    ?>

    <!-- Nav hasta aqui -->

<h1 align="center">HxH inyectora <?php echo $iny?></h1>
<br>
<h3 align="center"><?php echo $dia.'/'.$mes.'/'.$año?> </h3>

<form action="HxH INY cargar fecha.php" method="POST"> 
    <div class="container" style="background-color:#ECECEC">
        <div class="row-md-10 offset-md-1  align-items-center mr-auto ml-auto mt-1 mb-3 pt-2 pb-2 pl-2 pr-2 border border-dark" style="width: 100%" >            

            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '6h-7h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto1A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
            $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color1A='rgba(255,0,0,0.9)';
              } else {
                $texto1A ="";
                $color1A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '7h-8h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto2A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color2A='rgba(255,0,0,1)';

              } else {
                  
                $texto2A="";
                $color2A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '8h-9h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto3A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color3A='rgba(255,0,0,1)';

              } else {
                  
                $texto3A="";
                $color3A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '9h-10h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto4A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color4A='rgba(255,0,0,1)';

              } else {
                  
                $texto4A="";
                $color4A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '10h-11h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto5A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color5A='rgba(255,0,0,1)';

              } else {
                  
                $texto5A="";
                $color5A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '11h-12h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto6A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color6A='rgba(255,0,0,1)';

              } else {
                  
                $texto6A="";
                $color6A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '12h-13h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto7A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color7A='rgba(255,0,0,1)';

              } else {
                  
                $texto7A="";
                $color7A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '13h-14h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto8A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color8A='rgba(255,0,0,1)';

              } else {
                  
                $texto8A="";
                $color8A='rgba(255,255,255,1)';
              }
            ?>


              <!-- PROBLEMAS 2 -->

              <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '6h-7h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto1B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
            $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color1B='rgba(255,0,0,0.9)';
              } else {
                $texto1B ="";
                $color1B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '7h-8h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto2B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color2B='rgba(255,0,0,1)';

              } else {
                  
                $texto2B="";
                $color2B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '8h-9h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto3B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color3B='rgba(255,0,0,1)';

              } else {
                  
                $texto3B="";
                $color3B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '9h-10h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto4B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color4B='rgba(255,0,0,1)';

              } else {
                  
                $texto4B="";
                $color4B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '10h-11h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto5B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color5B='rgba(255,0,0,1)';

              } else {
                  
                $texto5B="";
                $color5B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '11h-12h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto6B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color6B='rgba(255,0,0,1)';

              } else {
                  
                $texto6B="";
                $color6B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '12h-13h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto7B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color7B='rgba(255,0,0,1)';

              } else {
                  
                $texto7B="";
                $color7B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '13h-14h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto8B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color8B='rgba(255,0,0,1)';

              } else {
                  
                $texto8B="";
                $color8B='rgba(255,255,255,1)';
              }
            ?>

            <!-- PROBLEMA 3 -->

        <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '6h-7h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto1C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
            $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color1C='rgba(255,0,0,0.9)';
              } else {
                $texto1C ="";
                $color1C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '7h-8h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto2C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color2C='rgba(255,0,0,1)';

              } else {
                  
                $texto2C="";
                $color2C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '8h-9h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto3C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color3C='rgba(255,0,0,1)';

              } else {
                  
                $texto3C="";
                $color3C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '9h-10h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto4C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color4A='rgba(255,0,0,1)';

              } else {
                  
                $texto4C="";
                $color4C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '10h-11h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto5C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color5C='rgba(255,0,0,1)';

              } else {
                  
                $texto5C="";
                $color5C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '11h-12h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto6C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color6C='rgba(255,0,0,1)';

              } else {
                  
                $texto6C="";
                $color6C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '12h-13h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto7C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color7C='rgba(255,0,0,1)';

              } else {
                  
                $texto7C="";
                $color7C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '13h-14h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto8C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color8C='rgba(255,0,0,1)';

              } else {
                  
                $texto8C="";
                $color8C='rgba(255,255,255,1)';
              }
            ?>

            <?php
            $sql = "SELECT `piezas_buenas` FROM `$tabla` WHERE `fecha` = '$fecha' AND  `id` >0 AND  `id` < 9 AND `inyectora` = '$iny' ";
            $consulta = mysqli_query($conexion, $sql);

            $piezas_ok = array();
            $acumulado = array();

            while($row = mysqli_fetch_array($consulta)){
                $piezas_ok[] = $row['piezas_buenas'];
            }


            for ($i = 0; $i <= 7; $i++) {

                if ($piezas_ok[$i]  > "29") {

                    $color_barra[$i]='rgba(0,255,0,1)';
                }else{

                    $color_barra[$i]='rgba(255,0,0,1)';

                }
            }

            $piezas_acumulado=0;


            for ($i = 0; $i <= 7; $i++) {

            $piezas_acumulado=$piezas_acumulado+$piezas_ok[$i];
            $acumulado[$i]=$piezas_acumulado;

            }       





            $sql = "SELECT `hora` FROM `$tabla` WHERE `fecha` = '$fecha' AND  `id` >0 AND  `id` < 9 AND `inyectora` = '$iny' ";
            $consulta = mysqli_query($conexion, $sql);
            $array = array();

            while($ver=mysqli_fetch_row($consulta)){

                $array[]=$ver[0];

            }
            $datos=json_encode($array)
            ?>


                <h2 align="center">Turno de mañana.</h2>
                <div id="myDiv">

                </div>
                
                <script type="text/javascript" >
                function crearCadenaLineal(json){
                    var parsed = JSON.parse(json);
                    var arr =[];
                    for(var x in parsed){
                        arr.push(parsed[x]);
                    }
                    return arr;
                }

                </script>

                <script type="text/javascript"  >

                datosX=crearCadenaLineal('<?php echo $datos?>')
                var trace1 = {
                    x: datosX,
                    y: [38, 76, 114, 152, 190, 228, 266, 304],
                    name: '100% RO',
                    mode: 'lines',
                };  
                var trace2 = {
                    x:datosX,
                    y: [30, 60, 90, 120, 150, 180, 210, 240],
                    name: '78% RO',
                    mode: 'lines',
                };
                var trace3 = {
                    x: datosX,
                    y: [30, 30, 30, 30, 30, 30, 30, 30],
                    name: 'OBJ HORA',
                    mode: 'lines',
                
                };
                var trace4 = {
                    x: datosX,
                    y: [<?php echo $piezas_ok[0];?>, <?php echo $piezas_ok[1];?>, <?php echo $piezas_ok[2];?>, <?php echo $piezas_ok[3];?>, <?php echo $piezas_ok[4];?>, <?php echo $piezas_ok[5];?>, <?php echo $piezas_ok[6];?>, <?php echo $piezas_ok[7];?>],
                    marker:{
                    color: ['<?php echo $color_barra[0];?>', '<?php echo $color_barra[1];?>', '<?php echo $color_barra[2];?>', '<?php echo $color_barra[3];?>', '<?php echo $color_barra[4];?>', '<?php echo $color_barra[5];?>', '<?php echo $color_barra[6];?>', '<?php echo $color_barra[7];?>']
                    },
                    
                    name: 'PIEZAS',
                    type: 'bar'
                    
                };
                var trace5 = {
                    x: datosX,
                    y: [<?php echo $acumulado[0];?>, <?php echo $acumulado[1];?>, <?php echo $acumulado[2];?>, <?php echo $acumulado[3];?>, <?php echo $acumulado[4];?>, <?php echo $acumulado[5];?>, <?php echo $acumulado[6];?>, <?php echo $acumulado[7];?>],
                    name: 'Acumulado',
                    mode: 'lines',
                
                };
                var trace6 = {
                    x: datosX,
                    y: [400, 400, 400, 400, 400, 400, 400, 400],
                    mode: 'markers',
                    type: 'scatter',
                    name: 'Parada 1',
                    text: ['<?php echo $texto1A;?>', '<?php echo $texto2A;?>', '<?php echo $texto3A;?>', '<?php echo $texto4A;?>', '<?php echo $texto5A;?>', '<?php echo $texto6A;?>', '<?php echo $texto7A;?>', '<?php echo $texto8A;?>'],
                    textposition: 'top center',
                    textfont: {
                    family:  'Raleway, sans-serif'
                    },
                    marker: { 
                        size: 6,
                        color: ['<?php echo $color1A;?>', '<?php echo $color2A;?>', '<?php echo $color3A;?>', '<?php echo $color4A;?>', '<?php echo $color5A;?>', '<?php echo $color6A;?>', '<?php echo $color7A;?>', '<?php echo $color8A;?>']
                    },
                };

                var trace7 = {
                    x: datosX,
                    y: [375, 375, 375, 375, 375, 375, 375, 375],
                    mode: 'markers',
                    type: 'scatter',
                    name: 'Parada 2',
                    text: ['<?php echo $texto1B;?>', '<?php echo $texto2B;?>', '<?php echo $texto3B;?>', '<?php echo $texto4B;?>', '<?php echo $texto5B;?>', '<?php echo $texto6B;?>', '<?php echo $texto7B;?>', '<?php echo $texto8B;?>'],
                    textposition: 'top center',
                    textfont: {
                    family:  'Raleway, sans-serif'
                    },
                    marker: { 
                        size: 6,
                        color: ['<?php echo $color1B;?>', '<?php echo $color2B;?>', '<?php echo $color3B;?>', '<?php echo $color4B;?>', '<?php echo $color5B;?>', '<?php echo $color6B;?>', '<?php echo $color7B;?>', '<?php echo $color8B;?>']
                    },
                };
                var trace8 = {
                    x: datosX,
                    y: [350, 350, 350, 350, 350, 350, 350, 350],
                    mode: 'markers',
                    type: 'scatter',
                    name: 'Parada 3',
                    text: ['<?php echo $texto1C;?>', '<?php echo $texto2C;?>', '<?php echo $texto3C;?>', '<?php echo $texto4C;?>', '<?php echo $texto5C;?>', '<?php echo $texto6C;?>', '<?php echo $texto7C;?>', '<?php echo $texto8C;?>'],
                    textposition: 'top center',
                    textfont: {
                    family:  'Raleway, sans-serif'
                    },
                    marker: { 
                        size: 6,
                        color: ['<?php echo $color1C;?>', '<?php echo $color2C;?>', '<?php echo $color3C;?>', '<?php echo $color4C;?>', '<?php echo $color5C;?>', '<?php echo $color6C;?>', '<?php echo $color7C;?>', '<?php echo $color8C;?>']
                    },
                };
                var data = [trace1, trace2, trace3, trace4, trace5, trace6, trace7, trace8];
                var layout = {
                    title: {
                    font: {
                        family: 'Arial, monospace',
                        size: 24
                    },
                    xref: 'paper',
                    x: 0.05,
                    },
                    xaxis: {
                    title: {
                        text: 'Hora',
                        font: {
                        family: 'Arial, monospace',
                        size: 18,
                        color: '#7f7f7f'
                        }
                    },
                    },
                    yaxis: {
                    title: {
                        text: 'Nº de piezas',
                        font: {
                        family: 'Arial, monospace',
                        size: 18,
                        color: '#7f7f7f'
                        }
                    }
                    }
                };

                Plotly.newPlot('myDiv', data, layout);
                </script>
        </div>

        </form>
        <div class="row">
        <div class="col">

        <form action="hxh_inyectoras_guardarpiezas.php" method="POST"> 

        <font size="2" face="Arial">  

        <table style="text-align: center;" align="center" border="1"class="table table-striped table-sm ">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">HORA </td>
                  <th scope="col">6-7<br></td>
                  <th scope="col">7-8<br></td>
                  <th scope="col">8-9<br></td>
                  <th scope="col">9-10<br></td>
                  <th scope="col">10-11<br></td>
                  <th scope="col">11-12<br></td>
                  <th scope="col">12-13<br></td>
                  <th scope="col">13-14<br></td>

                </tr>
            </thead>
            <tbody>
            </tr>
    </thead>
    <tbody>
        <tr>
        <?php

            echo '
            <td style="vertical-align: middle;">
                BUENAS
            </td>' 
            ;
            
        for ($i = 1; $i <= 8; $i++) {
        $consulta = "SELECT * FROM $tabla WHERE `fecha` = '$fecha' AND `id`=$i AND `inyectora` = '$iny'" ;
        $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
        while ($row = mysqli_fetch_array($resultado)) {
    ?>                    

            <?php echo '<td style="vertical-align: middle;">
                  <input type="text" class="form-control" id="piezas_buenas_'.$i.'" name="piezas_buenas_'.$i.'" value="'. $row['piezas_buenas'].'">        
            </td>' ;
                
            ?>

            <?php }  };?>
        </tr>
        <tr>
        <?php

            echo '
            <td style="vertical-align: middle;">
                CHATARRA
            </td>' 
            ;
            
        for ($i = 1; $i <= 8; $i++) {
        $consulta = "SELECT * FROM $tabla WHERE `fecha` = '$fecha' AND `id`=$i AND `inyectora` = '$iny'" ;
        $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
        while ($row = mysqli_fetch_array($resultado)) {
        ?>                    

            <?php echo '<td style="vertical-align: middle;">
                  <input type="text" class="form-control" id="piezas_malas_'.$i.'" name="piezas_malas_'.$i.'" value="'. $row['piezas_malas'].'">        
            </td>' ;?>

            <?php }  };?>
        </tr>
        <tr>
        <?php

            echo '
            <td style="vertical-align: middle;">
                MOLDE
            </td>' 
            ;
            
        for ($i = 1; $i <= 8; $i++) {
        $consulta = "SELECT * FROM $tabla WHERE `fecha` = '$fecha' AND `id`=$i AND `inyectora` = '$iny'" ;
        $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
        while ($row = mysqli_fetch_array($resultado)) {
        ?>                    

            <?php echo '<td style="vertical-align: middle;">
                  <input type="text" class="form-control" id="molde_'.$i.'" name="molde_'.$i.'" value="'. $row['molde'].'">        
            </td>' ;?>

            <?php }  };?>
        </tr>
        <tr>
        <?php

            echo '
            <td style="vertical-align: middle;">
                COMENTARIOS
            </td>' 
            ;
            
        for ($i = 1; $i <= 8; $i++) {
        $consulta = "SELECT * FROM $tabla WHERE `fecha` = '$fecha' AND `id`=$i AND `inyectora` = '$iny'" ;
        $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
        while ($row = mysqli_fetch_array($resultado)) {
    ?>                    

            <?php echo '<td style="vertical-align: middle;">
                  <input type="text" class="form-control" id="comentarios_'.$i.'" name="comentarios_'.$i.'" value="'. $row['comentarios'].'">        
            </td>' ;?>

            <?php }  };?>
        </tr>
    
    </tbody>
</table>

</font>
</div>
            <input style="vertical-align: middle;" type="submit" value="GUARDAR" class=" btn btn-primary btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
            <input type="hidden" id="fecha" name="fecha" value="<?php echo $fecha?>"  >
            <input type="hidden" id="inyectora" name="inyectora" value="<?php echo $inyectora?>"  >
            <input type="hidden" id="tabla" name="tabla" value="<?php echo $tabla?>"  >
            <input type="hidden" id="operario" name="operario" value="<?php echo $nombrecompleto?>"  >
            <input type="hidden" id="uet" name="uet" value="<?php echo $uet?>"  >
            <input type="hidden" id="ju" name="ju" value="<?php echo $ju?>"  >
            <input type="hidden" id="turno" name="turno" value="MAÑANA" >
            <input type="hidden" id="iny" name="iny" value="<?php echo $iny?>"  >
            <input type="hidden" id="id" name="id" value="<?php echo $i?>"  >

</div>
</form>

<br>
<div class="row">
    <form action="hxh_inyectoras_añadirparada.php" method="POST"> 
            <input style="vertical-align: middle;" type="submit" value="+ PARADA" class=" btn btn-warning btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
            <input type="hidden" id="turno" name="turno" value="MAÑANA"  >
            <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#tabla_mañana">Desplegar</button>

    </form>
</div>


<div id="tabla_mañana" class="collapse">

<div class="row">

<font size="2" face="Arial">  

<table style="text-align: center;" align="center" border="1"class="table table-striped table-sm ">
    <thead class="thead-dark">
        <tr>
          <th scope="col"> </td>
          <th scope="col">HORA<br></td>
          <th scope="col">SINTOMA<br></td>
          <th scope="col">CAUSA<br></td>
          <th scope="col">RESULTADO<br></td>
          <th scope="col">TIPO<br></td>
          <th scope="col">TIEMPO<br></td>
          <tr>

          <?php
                $consulta = "SELECT * FROM $tabla_problemas WHERE `fecha`='$fecha' AND `inyectora`='$iny' AND  `turno`='MAÑANA'  ORDER BY `hour` ASC ";
                $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
                while ($row = mysqli_fetch_array($resultado)) {
                ?>   
                <?php

                    echo '
                    <td style="vertical-align: middle;">
                        <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" >
                            <form action="hxh_inyectoras_añadirparada modificar.php" method="POST"> 
                                    <input style="vertical-align: middle;" type="submit" value="Modificar" class=" btn btn-warning btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                                    <input type="hidden" id="id" name="id" value="'.$row['id'].'"  >
                            </form>
                            <form action="hxh_inyectoras_añadirparada eliminar.php" method="POST"> 
                                    <input style="vertical-align: middle;" type="submit" value="Eliminar" class=" btn btn-danger btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                                    <input type="hidden" id="id" name="id" value="'.$row['id'].'"  >
                            </form>
                        </div>                    
                    </td>' 
                    ;
                ?>
                <?php echo '<td style="vertical-align: middle;">'. $row['hora'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['sintoma'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['causa'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['resultado'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['tipo'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['tiempo'].'</td>' ;?>

                </tr>
                
                <?php  };?>  
</tbody>
</table>

</font>


</div>

</div>

<br>
<br>

<br>

<!-- TURNO DE TARDE -->
<div class="row-md-10 offset-md-1  align-items-center mr-auto ml-auto mt-1 mb-3 pt-2 pb-2 pl-2 pr-2 border border-dark" style="width: 100%" >            

<?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '14h-15h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto9A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
            $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color9A='rgba(255,0,0,0.9)';
              } else {
                $texto9A ="";
                $color9A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '15h-16h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto10A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color10A='rgba(255,0,0,1)';

              } else {
                  
                $texto10A="";
                $color10A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '16h-17h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto11A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color11A='rgba(255,0,0,1)';

              } else {
                  
                $texto11A="";
                $color11A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '17h-18h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto12A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color12A='rgba(255,0,0,1)';

              } else {
                  
                $texto12A="";
                $color12A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '18h-19h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto13A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color13A='rgba(255,0,0,1)';

              } else {
                  
                $texto13A="";
                $color13A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '19h-20h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto14A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color14A='rgba(255,0,0,1)';

              } else {
                  
                $texto14A="";
                $color14A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '20h-21h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto15A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color15A='rgba(255,0,0,1)';

              } else {
                  
                $texto15A="";
                $color15A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '21h-22h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto16A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color16A='rgba(255,0,0,1)';

              } else {
                  
                $texto16A="";
                $color16A='rgba(255,255,255,1)';
              }
            ?>


              <!-- PROBLEMAS 2 -->

              <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '14h-15h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto9B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
            $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color9B='rgba(255,0,0,0.9)';
              } else {
                $texto9B ="";
                $color9B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '15h-16h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto10B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color10B='rgba(255,0,0,1)';

              } else {
                  
                $texto10B="";
                $color10B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '16h-17h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto11B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color11B='rgba(255,0,0,1)';

              } else {
                  
                $texto11B="";
                $color11B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '17h-18h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto4B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color12B='rgba(255,0,0,1)';

              } else {
                  
                $texto12B="";
                $color12B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '18h-19h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto13B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color13B='rgba(255,0,0,1)';

              } else {
                  
                $texto13B="";
                $color13B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '19h-20h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto14B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color14B='rgba(255,0,0,1)';

              } else {
                  
                $texto14B="";
                $color14B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '20h-21h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto15B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color15B='rgba(255,0,0,1)';

              } else {
                  
                $texto15B="";
                $color15B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '21h-22h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto16B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color16B='rgba(255,0,0,1)';

              } else {
                  
                $texto16B="";
                $color16B='rgba(255,255,255,1)';
              }
            ?>

            <!-- PROBLEMA 3 -->

        <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '14h-15h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto1C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
            $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color9C='rgba(255,0,0,0.9)';
              } else {
                $texto9C ="";
                $color9C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '15h-16h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto10C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color10C='rgba(255,0,0,1)';

              } else {
                  
                $texto10C="";
                $color10C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '16h-17h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto11C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color11C='rgba(255,0,0,1)';

              } else {
                  
                $texto11C="";
                $color11C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '17h-18h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto12C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color12A='rgba(255,0,0,1)';

              } else {
                  
                $texto12C="";
                $color12C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '18h-19h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto13C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color13C='rgba(255,0,0,1)';

              } else {
                  
                $texto13C="";
                $color13C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '19h-20h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto14C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color14C='rgba(255,0,0,1)';

              } else {
                  
                $texto14C="";
                $color14C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '20h-21h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto15C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color15C='rgba(255,0,0,1)';

              } else {
                  
                $texto15C="";
                $color15C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'TARDE' AND `hora` = '21h-22h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto16C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color16C='rgba(255,0,0,1)';

              } else {
                  
                $texto16C="";
                $color16C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $sql = "SELECT `piezas_buenas` FROM `$tabla` WHERE `fecha` = '$fecha' AND  `id` >8 AND  `id` < 17 AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);



            while($row = mysqli_fetch_array($consulta)){
                $piezas_ok[] = $row['piezas_buenas'];
            }


            for ($i = 8; $i <= 15; $i++) {

                if ($piezas_ok[$i]  > "29") {

                    $color_barra[$i]='rgba(0,255,0,1)';
                }else{

                    $color_barra[$i]='rgba(255,0,0,1)';

                }
            }

            $piezas_acumulado=0;


            for ($i = 8; $i <= 15; $i++) {

            $piezas_acumulado=$piezas_acumulado+$piezas_ok[$i];
            $acumulado[$i]=$piezas_acumulado;

            }       





            $sql = "SELECT `hora` FROM `$tabla` WHERE `fecha` = '$fecha' AND  `id` >8 AND  `id` < 17 AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);
            $array = array();

            while($ver=mysqli_fetch_row($consulta)){

                $array[]=$ver[0];

            }
            $datos=json_encode($array)
            ?>


            <h2 align="center">Turno de tarde</h2>

            
                <div id="myDiv1">

                </div>
                
                <script type="text/javascript" >
                function crearCadenaLineal(json){
                    var parsed = JSON.parse(json);
                    var arr =[];
                    for(var x in parsed){
                        arr.push(parsed[x]);
                    }
                    return arr;
                }

                </script>

                <script type="text/javascript"  >

                datosX=crearCadenaLineal('<?php echo $datos?>')
                var trace11 = {
                    x: datosX,
                    y: [38, 76, 114, 152, 190, 228, 266, 304],
                    name: '100% RO',
                    mode: 'lines',
                };  
                var trace12 = {
                    x:datosX,
                    y: [30, 60, 90, 120, 150, 180, 210, 240],
                    name: '78% RO',
                    mode: 'lines',
                };
                var trace13 = {
                    x: datosX,
                    y: [30, 30, 30, 30, 30, 30, 30, 30],
                    name: 'OBJ HORA',
                    mode: 'lines',
                
                };
                var trace14 = {
                    x: datosX,
                    y: [<?php echo $piezas_ok[8];?>, <?php echo $piezas_ok[9];?>, <?php echo $piezas_ok[10];?>, <?php echo $piezas_ok[11];?>, <?php echo $piezas_ok[12];?>, <?php echo $piezas_ok[13];?>, <?php echo $piezas_ok[14];?>, <?php echo $piezas_ok[15];?>],
                    marker:{
                    color: ['<?php echo $color_barra[8];?>', '<?php echo $color_barra[9];?>', '<?php echo $color_barra[10];?>', '<?php echo $color_barra[11];?>', '<?php echo $color_barra[12];?>', '<?php echo $color_barra[13];?>', '<?php echo $color_barra[14];?>', '<?php echo $color_barra[15];?>']
                    },
                    
                    name: 'PIEZAS',
                    type: 'bar'
                    
                };
                var trace15 = {
                    x: datosX,
                    y: [<?php echo $acumulado[8];?>, <?php echo $acumulado[9];?>, <?php echo $acumulado[10];?>, <?php echo $acumulado[11];?>, <?php echo $acumulado[12];?>, <?php echo $acumulado[13];?>, <?php echo $acumulado[14];?>, <?php echo $acumulado[15];?>],
                    name: 'Acumulado',
                    mode: 'lines',
                
                };
                var trace16 = {
                    x: datosX,
                    y: [400, 400, 400, 400, 400, 400, 400, 400],
                    mode: 'markers',
                    type: 'scatter',
                    name: 'Parada 1',
                    text: ['<?php echo $texto9A;?>', '<?php echo $texto10A;?>', '<?php echo $texto11A;?>', '<?php echo $texto12A;?>', '<?php echo $texto13A;?>', '<?php echo $texto14A;?>', '<?php echo $texto15A;?>', '<?php echo $texto16A;?>'],
                    textposition: 'top center',
                    textfont: {
                    family:  'Raleway, sans-serif'
                    },
                    marker: { 
                        size: 6,
                        color: ['<?php echo $color9A;?>', '<?php echo $color10A;?>', '<?php echo $color11A;?>', '<?php echo $color12A;?>', '<?php echo $color13A;?>', '<?php echo $color14A;?>', '<?php echo $color15A;?>', '<?php echo $color16A;?>']
                    },
                };

                var trace17 = {
                    x: datosX,
                    y: [375, 375, 375, 375, 375, 375, 375, 375],
                    mode: 'markers',
                    type: 'scatter',
                    name: 'Parada 2',
                    text: ['<?php echo $texto9B;?>', '<?php echo $texto10B;?>', '<?php echo $texto11B;?>', '<?php echo $texto12B;?>', '<?php echo $texto13B;?>', '<?php echo $texto14B;?>', '<?php echo $texto15B;?>', '<?php echo $texto16B;?>'],
                    textposition: 'top center',
                    textfont: {
                    family:  'Raleway, sans-serif'
                    },
                    marker: { 
                        size: 6,
                        color: ['<?php echo $color9B;?>', '<?php echo $color10B;?>', '<?php echo $color11B;?>', '<?php echo $color12B;?>', '<?php echo $color13B;?>', '<?php echo $color14B;?>', '<?php echo $color15B;?>', '<?php echo $color16B;?>']
                    },
                };
                var trace18 = {
                    x: datosX,
                    y: [350, 350, 350, 350, 350, 350, 350, 350],
                    mode: 'markers',
                    type: 'scatter',
                    name: 'Parada 3',
                    text: ['<?php echo $texto9C;?>', '<?php echo $texto10C;?>', '<?php echo $texto11C;?>', '<?php echo $texto12C;?>', '<?php echo $texto13C;?>', '<?php echo $texto14C;?>', '<?php echo $texto15C;?>', '<?php echo $texto16C;?>'],
                    textposition: 'top center',
                    textfont: {
                    family:  'Raleway, sans-serif'
                    },
                    marker: { 
                        size: 6,
                        color: ['<?php echo $color9C;?>', '<?php echo $color10C;?>', '<?php echo $color11C;?>', '<?php echo $color12C;?>', '<?php echo $color13C;?>', '<?php echo $color14C;?>', '<?php echo $color15C;?>', '<?php echo $color16C;?>']
                    },
                };
                var data = [trace11, trace12, trace13, trace14, trace15, trace16, trace17, trace18];
                var layout = {
                    title: {
                    font: {
                        family: 'Arial, monospace',
                        size: 24
                    },
                    xref: 'paper',
                    x: 0.05,
                    },
                    xaxis: {
                    title: {
                        text: 'Hora',
                        font: {
                        family: 'Arial, monospace',
                        size: 18,
                        color: '#7f7f7f'
                        }
                    },
                    },
                    yaxis: {
                    title: {
                        text: 'Nº de piezas',
                        font: {
                        family: 'Arial, monospace',
                        size: 18,
                        color: '#7f7f7f'
                        }
                    }
                    }
                };

                Plotly.newPlot('myDiv1', data, layout);
                </script>
        </div>

        </form>
        <div class="row">
        <div class="col">

        <form action="hxh_inyectoras_guardarpiezas.php" method="POST"> 
        <input type="hidden" id="iny" name="iny" value="<?php echo $iny?>"  >

        <font size="2" face="Arial">  

        <table style="text-align: center;" align="center" border="1"class="table table-striped table-sm ">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">HORA </td>
                  <th scope="col">14-15<br></td>
                  <th scope="col">15-16<br></td>
                  <th scope="col">16-17<br></td>
                  <th scope="col">17-18<br></td>
                  <th scope="col">18-19<br></td>
                  <th scope="col">19-20<br></td>
                  <th scope="col">20-21<br></td>
                  <th scope="col">21-22<br></td>

                </tr>
            </thead>
            <tbody>
            </tr>
    </thead>
    <tbody>
        <tr>
        <?php

            echo '
            <td style="vertical-align: middle;">
                OK
            </td>' 
            ;
            
        for ($i = 9; $i <= 16; $i++) {
        $consulta = "SELECT * FROM $tabla WHERE `fecha` = '$fecha' AND `id`=$i AND `inyectora` = '$iny'" ;
        $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
        while ($row = mysqli_fetch_array($resultado)) {
    ?>                    

            <?php echo '<td style="vertical-align: middle;">
                  <input type="text" class="form-control" id="piezas_buenas_'.$i.'" name="piezas_buenas_'.$i.'"value="'. $row['piezas_buenas'].'">        
            </td>' ;?>

            <?php }  };?>
        </tr>
        <tr>
        <?php

            echo '
            <td style="vertical-align: middle;">
                NOK
            </td>' 
            ;
            
        for ($i = 9; $i <= 16; $i++) {
        $consulta = "SELECT * FROM $tabla WHERE `fecha` = '$fecha' AND `id`=$i AND `inyectora` = '$iny'" ;
        $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
        while ($row = mysqli_fetch_array($resultado)) {
        ?>                    

            <?php echo '<td style="vertical-align: middle;">
                  <input type="text" class="form-control" id="piezas_malas_'.$i.'" name="piezas_malas_'.$i.'" value="'. $row['piezas_malas'].'">        
            </td>' ;?>

            <?php }  };?>
        </tr>
        <tr>
        <?php

            echo '
            <td style="vertical-align: middle;">
                MOLDE
            </td>' 
            ;
            
        for ($i = 9; $i <= 16; $i++) {
        $consulta = "SELECT * FROM $tabla WHERE `fecha` = '$fecha' AND `id`=$i AND `inyectora` = '$iny'" ;
        $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
        while ($row = mysqli_fetch_array($resultado)) {
        ?>                    

            <?php echo '<td style="vertical-align: middle;">
                  <input type="text" class="form-control" id="molde_'.$i.'" name="molde_'.$i.'" value="'. $row['molde'].'">        
            </td>' ;?>

            <?php }  };?>
        </tr>
        <tr>
        <?php

            echo '
            <td style="vertical-align: middle;">
                COMENTARIOS
            </td>' 
            ;
            
        for ($i = 9; $i <= 16; $i++) {
        $consulta = "SELECT * FROM $tabla WHERE `fecha` = '$fecha' AND `id`=$i AND `inyectora` = '$iny'" ;
        $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
        while ($row = mysqli_fetch_array($resultado)) {
    ?>                    

            <?php echo '<td style="vertical-align: middle;">
                  <input type="text" class="form-control" id="comentarios_'.$i.'" name="comentarios_'.$i.'" value="'. $row['comentarios'].'">        
            </td>' ;?>

            <?php }  };?>
        </tr>
    
    </tbody>
</table>

</font>
</div>
            <input style="vertical-align: middle;" type="submit" value="GUARDAR" class=" btn btn-primary btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
            <input type="hidden" id="fecha" name="fecha" value="<?php echo $fecha?>"  >
            <input type="hidden" id="inyectora" name="inyectora" value="<?php echo $inyectora?>"  >
            <input type="hidden" id="tabla" name="tabla" value="<?php echo $tabla?>"  >
            <input type="hidden" id="operario" name="operario" value="<?php echo $nombrecompleto?>"  >
            <input type="hidden" id="uet" name="uet" value="<?php echo $uet?>"  >
            <input type="hidden" id="ju" name="ju" value="<?php echo $ju?>"  >
            <input type="hidden" id="turno" name="turno" value="TARDE" >
</div>
</form>

<br>
<div class="row">
    <form action="hxh_inyectoras_añadirparada.php" method="POST"> 
            <input style="vertical-align: middle;" type="submit" value="+ PARADA" class=" btn btn-warning btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
            <input type="hidden" id="turno" name="turno" value="TARDE"  >
            <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#tabla_tarde">Desplegar</button>

    </form>
</div>


<div id="tabla_tarde" class="collapse">

<div class="row">

<font size="2" face="Arial">  

<table style="text-align: center;" align="center" border="1"class="table table-striped table-sm ">
    <thead class="thead-dark">
        <tr>
          <th scope="col"> </td>
          <th scope="col">HORA<br></td>
          <th scope="col">SINTOMA<br></td>
          <th scope="col">CAUSA<br></td>
          <th scope="col">RESULTADO<br></td>
          <th scope="col">TIPO<br></td>
          <th scope="col">TIEMPO<br></td>
          <tr>

          <?php
                $consulta = "SELECT * FROM $tabla_problemas WHERE `fecha`='$fecha' AND `inyectora`='$iny' AND  `turno`='TARDE'  ORDER BY `hour` ASC ";
                $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
                while ($row = mysqli_fetch_array($resultado)) {
                ?>   
                <?php

                    echo '
                    <td style="vertical-align: middle;">
                        <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" >
                            <form action="hxh_inyectoras_añadirparada modificar.php" method="POST"> 
                                    <input style="vertical-align: middle;" type="submit" value="Modificar" class=" btn btn-warning btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                                    <input type="hidden" id="id" name="id" value="'.$row['id'].'"  >
                            </form>
                            <form action="hxh_inyectoras_añadirparada eliminar.php" method="POST"> 
                                    <input style="vertical-align: middle;" type="submit" value="Eliminar" class=" btn btn-danger btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                                    <input type="hidden" id="id" name="id" value="'.$row['id'].'"  >
                            </form>
                        </div>                    
                    </td>' 
                    ;
                ?>
                <?php echo '<td style="vertical-align: middle;">'. $row['hora'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['sintoma'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['causa'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['resultado'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['tipo'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['tiempo'].'</td>' ;?>

                </tr>
                
                <?php  };?>  
</tbody>
</table>

</font>

</div>
</div>
<br>
<br>
<br>
<!-- TURNO DE NOCHE -->


<div class="row-md-10 offset-md-1  align-items-center mr-auto ml-auto mt-1 mb-3 pt-2 pb-2 pl-2 pr-2 border border-dark" style="width: 100%" >            

            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '22h-23h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto17A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
            $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color17A='rgba(255,0,0,0.9)';
              } else {
                $texto17A ="";
                $color17A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '23h-0h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto18A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color18A='rgba(255,0,0,1)';

              } else {
                  
                $texto18A="";
                $color18A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '0h-1h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto19A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color19A='rgba(255,0,0,1)';

              } else {
                  
                $texto19A="";
                $color19A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '1h-2h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto20A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color20A='rgba(255,0,0,1)';

              } else {
                  
                $texto20A="";
                $color20A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '2h-3h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto21A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color21A='rgba(255,0,0,1)';

              } else {
                  
                $texto21A="";
                $color21A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '3h-4h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto22A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color22A='rgba(255,0,0,1)';

              } else {
                  
                $texto22A="";
                $color22A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '4h-5h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto23A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color23A='rgba(255,0,0,1)';

              } else {
                  
                $texto23A="";
                $color23A='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '5h-6h' AND `numero` = 1  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto24A = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color24A='rgba(255,0,0,1)';

              } else {
                  
                $texto24A="";
                $color24A='rgba(255,255,255,1)';
              }
            ?>


              <!-- PROBLEMAS 2 -->

              <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '22h-23h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto17B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
            $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color17B='rgba(255,0,0,0.9)';
              } else {
                $texto17B ="";
                $color17B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '23h-0h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto18B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color18B='rgba(255,0,0,1)';

              } else {
                  
                $texto18B="";
                $color18B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '0h-1h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto19B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color19B='rgba(255,0,0,1)';

              } else {
                  
                $texto19B="";
                $color19B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '1h-2h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto20B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color20B='rgba(255,0,0,1)';

              } else {
                  
                $texto20B="";
                $color20B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '2h-3h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto21B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color5B='rgba(255,0,0,1)';

              } else {
                  
                $texto21B="";
                $color21B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '3h-4h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto22B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color22B='rgba(255,0,0,1)';

              } else {
                  
                $texto22B="";
                $color22B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '4h-5h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto23B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color23B='rgba(255,0,0,1)';

              } else {
                  
                $texto23B="";
                $color23B='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '5h-6h' AND `numero` = 2  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto24B = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color24B='rgba(255,0,0,1)';

              } else {
                  
                $texto24B="";
                $color24B='rgba(255,255,255,1)';
              }
            ?>

            <!-- PROBLEMA 3 -->

        <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '22h-23h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto17C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
            $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color17C='rgba(255,0,0,0.9)';
              } else {
                $texto17C ="";
                $color17C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '23h-0h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto18C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color18C='rgba(255,0,0,1)';

              } else {
                  
                $texto18C="";
                $color18C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '0h-1h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto19C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];

            }

            if ($tipo != "") {
                $color19C='rgba(255,0,0,1)';

              } else {
                  
                $texto19C="";
                $color19C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '1h-2h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto20C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color20A='rgba(255,0,0,1)';

              } else {
                  
                $texto20C="";
                $color20C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '2h-3h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto21C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color21C='rgba(255,0,0,1)';

              } else {
                  
                $texto21C="";
                $color21C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '3h-4h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto22C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color22C='rgba(255,0,0,1)';

              } else {
                  
                $texto22C="";
                $color22C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '4h-5h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto23C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color23C='rgba(255,0,0,1)';

              } else {
                  
                $texto23C="";
                $color23C='rgba(255,255,255,1)';
              }
            ?>
            <?php
            $tipo="";
            $sql = "SELECT*FROM `$tabla_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'NOCHE' AND `hora` = '5h-6h' AND `numero` = 3  AND `inyectora` = '$iny'";
            $consulta = mysqli_query($conexion, $sql);

            while($row = mysqli_fetch_array($consulta)){
                $texto24C = 'TIPO: '.$row['tipo'].'<br>Sintoma: '.$row['sintoma'].'<br>Causa: '.$row['causa'].'<br>Resultado: '.$row['resultado'].'<br>Tiempo: '.$row['tiempo'].' min';
                $tipo=$row['tipo'];
            }

            if ($tipo != "") {
                $color24C='rgba(255,0,0,1)';

              } else {
                  
                $texto24C="";
                $color24C='rgba(255,255,255,1)';
              }
            ?>

            <?php
            $sql = "SELECT `piezas_buenas` FROM `$tabla` WHERE `fecha` = '$fecha' AND  `id` >16 AND  `id` < 25 AND `inyectora` = '$iny' ";
            $consulta = mysqli_query($conexion, $sql);


            while($row = mysqli_fetch_array($consulta)){
                $piezas_ok[] = $row['piezas_buenas'];
            }


            for ($i = 16; $i <= 23; $i++) {

                if ($piezas_ok[$i]  > "29") {

                    $color_barra[$i]='rgba(0,255,0,1)';
                }else{

                    $color_barra[$i]='rgba(255,0,0,1)';

                }
            }

            $piezas_acumulado=0;


            for ($i = 16; $i <= 23; $i++) {

            $piezas_acumulado=$piezas_acumulado+$piezas_ok[$i];
            $acumulado[$i]=$piezas_acumulado;

            }       





            $sql = "SELECT `hora` FROM `$tabla` WHERE `fecha` = '$fecha' AND  `id` >16 AND  `id` < 25 AND `inyectora` = '$iny' ";
            $consulta = mysqli_query($conexion, $sql);
            $array = array();

            while($ver=mysqli_fetch_row($consulta)){

                $array[]=$ver[0];

            }
            $datos=json_encode($array)
            ?>

            <h2 align="center">Turno de noche</h2>

            
                <div id="myDiv2">

                </div>
                
                <script type="text/javascript" >
                function crearCadenaLineal(json){
                    var parsed = JSON.parse(json);
                    var arr =[];
                    for(var x in parsed){
                        arr.push(parsed[x]);
                    }
                    return arr;
                }

                </script>

                <script type="text/javascript"  >

                datosX=crearCadenaLineal('<?php echo $datos?>')
                var trace21 = {
                    x: datosX,
                    y: [38, 76, 114, 152, 190, 228, 266, 304],
                    name: '100% RO',
                    mode: 'lines',
                };  
                var trace22 = {
                    x:datosX,
                    y: [30, 60, 90, 120, 150, 180, 210, 240],
                    name: '78% RO',
                    mode: 'lines',
                };
                var trace23 = {
                    x: datosX,
                    y: [30, 30, 30, 30, 30, 30, 30, 30],
                    name: 'OBJ HORA',
                    mode: 'lines',
                
                };
                var trace24 = {
                    x: datosX,
                    y: [<?php echo $piezas_ok[16];?>, <?php echo $piezas_ok[17];?>, <?php echo $piezas_ok[18];?>, <?php echo $piezas_ok[19];?>, <?php echo $piezas_ok[20];?>, <?php echo $piezas_ok[21];?>, <?php echo $piezas_ok[22];?>, <?php echo $piezas_ok[23];?>],
                    marker:{
                    color: ['<?php echo $color_barra[16];?>', '<?php echo $color_barra[17];?>', '<?php echo $color_barra[18];?>', '<?php echo $color_barra[19];?>', '<?php echo $color_barra[20];?>', '<?php echo $color_barra[21];?>', '<?php echo $color_barra[22];?>', '<?php echo $color_barra[23];?>']
                    },
                    
                    name: 'PIEZAS',
                    type: 'bar'
                    
                };
                var trace25 = {
                    x: datosX,
                    y: [<?php echo $acumulado[16];?>, <?php echo $acumulado[17];?>, <?php echo $acumulado[18];?>, <?php echo $acumulado[19];?>, <?php echo $acumulado[20];?>, <?php echo $acumulado[21];?>, <?php echo $acumulado[22];?>, <?php echo $acumulado[23];?>],
                    name: 'Acumulado',
                    mode: 'lines',
                
                };
                var trace26 = {
                    x: datosX,
                    y: [400, 400, 400, 400, 400, 400, 400, 400],
                    mode: 'markers',
                    type: 'scatter',
                    name: 'Parada 1',
                    text: ['<?php echo $texto17A;?>', '<?php echo $texto18A;?>', '<?php echo $texto19A;?>', '<?php echo $texto20A;?>', '<?php echo $texto21A;?>', '<?php echo $texto22A;?>', '<?php echo $texto23A;?>', '<?php echo $texto24A;?>'],
                    textposition: 'top center',
                    textfont: {
                    family:  'Raleway, sans-serif'
                    },
                    marker: { 
                        size: 6,
                        color: ['<?php echo $color17A;?>', '<?php echo $color18A;?>', '<?php echo $color19A;?>', '<?php echo $color20A;?>', '<?php echo $color21A;?>', '<?php echo $color22A;?>', '<?php echo $color23A;?>', '<?php echo $color24A;?>']
                    },
                };

                var trace27 = {
                    x: datosX,
                    y: [375, 375, 375, 375, 375, 375, 375, 375],
                    mode: 'markers',
                    type: 'scatter',
                    name: 'Parada 2',
                    text: ['<?php echo $texto17B;?>', '<?php echo $texto18B;?>', '<?php echo $texto19B;?>', '<?php echo $texto20B;?>', '<?php echo $texto21B;?>', '<?php echo $texto22B;?>', '<?php echo $texto23B;?>', '<?php echo $texto24B;?>'],
                    textposition: 'top center',
                    textfont: {
                    family:  'Raleway, sans-serif'
                    },
                    marker: { 
                        size: 6,
                        color: ['<?php echo $color17B;?>', '<?php echo $color18B;?>', '<?php echo $color19B;?>', '<?php echo $color20B;?>', '<?php echo $color21B;?>', '<?php echo $color22B;?>', '<?php echo $color23B;?>', '<?php echo $color24B;?>']
                    },
                };
                var trace28 = {
                    x: datosX,
                    y: [350, 350, 350, 350, 350, 350, 350, 350],
                    mode: 'markers',
                    type: 'scatter',
                    name: 'Parada 3',
                    text: ['<?php echo $texto17C;?>', '<?php echo $texto18C;?>', '<?php echo $texto19C;?>', '<?php echo $texto20C;?>', '<?php echo $texto21C;?>', '<?php echo $texto22C;?>', '<?php echo $texto23C;?>', '<?php echo $texto24C;?>'],
                    textposition: 'top center',
                    textfont: {
                    family:  'Raleway, sans-serif'
                    },
                    marker: { 
                        size: 6,
                        color: ['<?php echo $color17C;?>', '<?php echo $color18C;?>', '<?php echo $color19C;?>', '<?php echo $color20C;?>', '<?php echo $color21C;?>', '<?php echo $color22C;?>', '<?php echo $color23C;?>', '<?php echo $color24C;?>']
                    },
                };
                var data = [trace21, trace22, trace23, trace24, trace25, trace26, trace27, trace28];
                var layout = {
                    title: {
                    font: {
                        family: 'Arial, monospace',
                        size: 24
                    },
                    xref: 'paper',
                    x: 0.05,
                    },
                    xaxis: {
                    title: {
                        text: 'Hora',
                        font: {
                        family: 'Arial, monospace',
                        size: 18,
                        color: '#7f7f7f'
                        }
                    },
                    },
                    yaxis: {
                    title: {
                        text: 'Nº de piezas',
                        font: {
                        family: 'Arial, monospace',
                        size: 18,
                        color: '#7f7f7f'
                        }
                    }
                    }
                };

                Plotly.newPlot('myDiv2', data, layout);
                </script>
        </div>

        </form>
        <div class="row">
        <div class="col">

        <form action="hxh_inyectoras_guardarpiezas.php" method="POST"> 
        <input type="hidden" id="iny" name="iny" value="<?php echo $iny?>"  >

        <font size="2" face="Arial">  

        <table style="text-align: center;" align="center" border="1"class="table table-striped table-sm ">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">HORA </td>
                  <th scope="col">22-23<br></td>
                  <th scope="col">23-0<br></td>
                  <th scope="col">0-1<br></td>
                  <th scope="col">1-2<br></td>
                  <th scope="col">2-3<br></td>
                  <th scope="col">3-4<br></td>
                  <th scope="col">4-5<br></td>
                  <th scope="col">5-6<br></td>

                </tr>
            </thead>
            <tbody>
            </tr>
    </thead>
    <tbody>
        <tr>
        <?php

            echo '
            <td style="vertical-align: middle;">
                OK
            </td>' 
            ;
            
        for ($i = 17; $i <= 24; $i++) {
        $consulta = "SELECT * FROM $tabla WHERE `fecha` = '$fecha' AND `id`=$i AND `inyectora` = '$iny'" ;
        $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
        while ($row = mysqli_fetch_array($resultado)) {
    ?>                    

            <?php echo '<td style="vertical-align: middle;">
                  <input type="text" class="form-control" id="piezas_buenas_'.$i.'" name="piezas_buenas_'.$i.'"value="'. $row['piezas_buenas'].'">        
            </td>' ;?>

            <?php }  };?>
        </tr>
        <tr>
        <?php

            echo '
            <td style="vertical-align: middle;">
                NOK
            </td>' 
            ;
            
        for ($i = 17; $i <= 24; $i++) {
        $consulta = "SELECT * FROM $tabla WHERE `fecha` = '$fecha' AND `id`=$i AND `inyectora` = '$iny'" ;
        $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
        while ($row = mysqli_fetch_array($resultado)) {
        ?>                    

            <?php echo '<td style="vertical-align: middle;">
                  <input type="text" class="form-control" id="piezas_malas_'.$i.'" name="piezas_malas_'.$i.'" value="'. $row['piezas_malas'].'">        
            </td>' ;?>

            <?php }  };?>
        </tr>
        <tr>
        <?php

            echo '
            <td style="vertical-align: middle;">
                MOLDE
            </td>' 
            ;
            
        for ($i = 17; $i <= 24; $i++) {
        $consulta = "SELECT * FROM $tabla WHERE `fecha` = '$fecha' AND `id`=$i AND `inyectora` = '$iny'" ;
        $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
        while ($row = mysqli_fetch_array($resultado)) {
        ?>                    

            <?php echo '<td style="vertical-align: middle;">
                  <input type="text" class="form-control" id="molde_'.$i.'" name="molde_'.$i.'" value="'. $row['molde'].'">        
            </td>' ;?>

            <?php }  };?>
        </tr>
        <tr>
        <?php

            echo '
            <td style="vertical-align: middle;">
                COMENTARIOS
            </td>' 
            ;
            
        for ($i = 17; $i <= 24; $i++) {
        $consulta = "SELECT * FROM $tabla WHERE `fecha` = '$fecha' AND `id`=$i AND `inyectora` = '$iny'" ;
        $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
        while ($row = mysqli_fetch_array($resultado)) {
    ?>                    

            <?php echo '<td style="vertical-align: middle;">
                  <input type="text" class="form-control" id="comentarios_'.$i.'" name="comentarios_'.$i.'" value="'. $row['comentarios'].'">        
            </td>' ;?>

            <?php }  };?>
        </tr>
    
    </tbody>
</table>

</font>
</div>
            <input style="vertical-align: middle;" type="submit" value="GUARDAR" class=" btn btn-primary btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
            <input type="hidden" id="fecha" name="fecha" value="<?php echo $fecha?>"  >
            <input type="hidden" id="inyectora" name="inyectora" value="<?php echo $inyectora?>"  >
            <input type="hidden" id="tabla" name="tabla" value="<?php echo $tabla?>"  >
            <input type="hidden" id="operario" name="operario" value="<?php echo $nombrecompleto?>"  >
            <input type="hidden" id="uet" name="uet" value="<?php echo $uet?>"  >
            <input type="hidden" id="ju" name="ju" value="<?php echo $ju?>"  >
            <input type="hidden" id="turno" name="turno" value="NOCHE" >
</div>
</form>

<br>
<div class="row">
    <form action="hxh_inyectoras_añadirparada.php" method="POST"> 
            <input style="vertical-align: middle;" type="submit" value="+ PARADA" class=" btn btn-warning btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
            <input type="hidden" id="turno" name="turno" value="NOCHE"  >
            <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#tabla_mañana">Desplegar</button>

    </form>
</div>


<div id="tabla_mañana" class="collapse">

<div class="row">

<font size="2" face="Arial">  

<table style="text-align: center;" align="center" border="1"class="table table-striped table-sm ">
    <thead class="thead-dark">
        <tr>
          <th scope="col"> </td>
          <th scope="col">HORA<br></td>
          <th scope="col">SINTOMA<br></td>
          <th scope="col">CAUSA<br></td>
          <th scope="col">RESULTADO<br></td>
          <th scope="col">TIPO<br></td>
          <th scope="col">TIEMPO<br></td>
          <tr>

          <?php
                $consulta = "SELECT * FROM $tabla_problemas WHERE `fecha`='$fecha' AND `inyectora`='$iny' AND  `turno`='NOCHE'  ORDER BY `hour` ASC ";
                $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));                             
                while ($row = mysqli_fetch_array($resultado)) {
                ?>   
                <?php

                    echo '
                    <td style="vertical-align: middle;">
                        <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" >
                            <form action="hxh_inyectoras_añadirparada modificar.php" method="POST"> 
                                    <input style="vertical-align: middle;" type="submit" value="Modificar" class=" btn btn-warning btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                                    <input type="hidden" id="id" name="id" value="'.$row['id'].'"  >
                            </form>
                            <form action="hxh_inyectoras_añadirparada eliminar.php" method="POST"> 
                                    <input style="vertical-align: middle;" type="submit" value="Eliminar" class=" btn btn-danger btn-sm mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                                    <input type="hidden" id="id" name="id" value="'.$row['id'].'"  >
                            </form>
                        </div>                    
                    </td>' 
                    ;
                ?>
                <?php echo '<td style="vertical-align: middle;">'. $row['hora'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['sintoma'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['causa'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['resultado'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['tipo'].'</td>' ;?>
                <?php echo '<td style="vertical-align: middle;">'. $row['tiempo'].'</td>' ;?>

                </tr>
                
                <?php  };?>  
</tbody>
</table>

</font>


</div>

</div>
    </div>



    <!-- Footer -->
    <?php echo file_get_contents('http://'.$ip.'/C-WIDO/footer.php');?>
    <!-- Footer -->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

</body>
</html>