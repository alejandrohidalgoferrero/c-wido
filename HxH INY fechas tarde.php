<div class="row-md-10 offset-md-1  align-items-center mr-auto ml-auto mt-1 mb-3 pt-2 pb-2 pl-2 pr-2 border" style="width: 100%" >            

<?php
            $tipo="";
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '14h-15h' AND `numero` = 1";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '15h-16h' AND `numero` = 1";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '16h-17h' AND `numero` = 1";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '17h-18h' AND `numero` = 1";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '18h-19h' AND `numero` = 1";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '19h-20h' AND `numero` = 1";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '20h-21h' AND `numero` = 1";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '21h-22h' AND `numero` = 1";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '14h-15h' AND `numero` = 2";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '15h-16h' AND `numero` = 2";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '16h-17h' AND `numero` = 2";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '17h-18h' AND `numero` = 2";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '18h-19h' AND `numero` = 2";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '19h-20h' AND `numero` = 2";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '20h-21h' AND `numero` = 2";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '21h-22h' AND `numero` = 2";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '14h-15h' AND `numero` = 3";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '15h-16h' AND `numero` = 3";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '16h-17h' AND `numero` = 3";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '17h-18h' AND `numero` = 3";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '18h-19h' AND `numero` = 3";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '19h-20h' AND `numero` = 3";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '20h-21h' AND `numero` = 3";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '21h-22h' AND `numero` = 3";
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
            $sql = "SELECT `piezas_buenas` FROM `hxh_inyectora_1` WHERE `fecha` = '$fecha' AND  `id` >8 AND  `id` < 17 ";
            $consulta = mysqli_query($conexion, $sql);

            $piezas_ok = array();
            $acumulado = array();

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





            $sql = "SELECT `hora` FROM `hxh_inyectora_1` WHERE `fecha` = '$fecha' AND  `id` >8 AND  `id` < 17 ";
            $consulta = mysqli_query($conexion, $sql);
            $array = array();

            while($ver=mysqli_fetch_row($consulta)){

                $array[]=$ver[0];

            }
            $datos=json_encode($array)
            ?>


            
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
                    text:'Turno de tarde',
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
        $consulta = "SELECT * FROM $tabla WHERE `fecha` = '$fecha' AND `id`=$i" ;
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
        $consulta = "SELECT * FROM $tabla WHERE `fecha` = '$fecha' AND `id`=$i" ;
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
                COMENTARIOS
            </td>' 
            ;
            
        for ($i = 9; $i <= 16; $i++) {
        $consulta = "SELECT * FROM $tabla WHERE `fecha` = '$fecha' AND `id`=$i" ;
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
                $consulta = "SELECT * FROM hxh_inyectora_problemas WHERE `fecha`='$fecha' AND `inyectora`='$iny' AND  `turno`='TARDE'  ORDER BY `hour` ASC ";
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