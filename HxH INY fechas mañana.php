<div class="row-md-10 offset-md-1  align-items-center mr-auto ml-auto mt-1 mb-3 pt-2 pb-2 pl-2 pr-2 border" style="width: 100%" >            

<?php
            $tipo="";
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '6h-7h' AND `numero` = 1";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '7h-8h' AND `numero` = 1";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '8h-9h' AND `numero` = 1";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '9h-10h' AND `numero` = 1";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '10h-11h' AND `numero` = 1";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '11h-12h' AND `numero` = 1";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '12h-13h' AND `numero` = 1";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '13h-14h' AND `numero` = 1";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '6h-7h' AND `numero` = 2";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '7h-8h' AND `numero` = 2";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '8h-9h' AND `numero` = 2";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '9h-10h' AND `numero` = 2";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '10h-11h' AND `numero` = 2";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '11h-12h' AND `numero` = 2";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '12h-13h' AND `numero` = 2";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '13h-14h' AND `numero` = 2";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '6h-7h' AND `numero` = 3";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '7h-8h' AND `numero` = 3";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '8h-9h' AND `numero` = 3";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '9h-10h' AND `numero` = 3";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '10h-11h' AND `numero` = 3";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '11h-12h' AND `numero` = 3";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '12h-13h' AND `numero` = 3";
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
            $sql = "SELECT*FROM `hxh_inyectora_problemas` WHERE `fecha` = '$fecha' AND  `turno` = 'MAÑAÑA' AND `hora` = '13h-14h' AND `numero` = 3";
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
            $sql = "SELECT `piezas_buenas` FROM `hxh_inyectora_1` WHERE `fecha` = '$fecha' AND  `id` >0 AND  `id` < 9 ";
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





            $sql = "SELECT `hora` FROM `hxh_inyectora_1` WHERE `fecha` = '$fecha' AND  `id` >0 AND  `id` < 9 ";
            $consulta = mysqli_query($conexion, $sql);
            $array = array();

            while($ver=mysqli_fetch_row($consulta)){

                $array[]=$ver[0];

            }
            $datos=json_encode($array)
            ?>


            
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
                    text:'Turno de mañana',
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
                OK
            </td>' 
            ;
            
        for ($i = 1; $i <= 8; $i++) {
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
            
        for ($i = 1; $i <= 8; $i++) {
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
            
        for ($i = 1; $i <= 8; $i++) {
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
                $consulta = "SELECT * FROM hxh_inyectora_problemas WHERE `fecha`='$fecha' AND `inyectora`='$iny' AND  `turno`='MAÑANA'  ORDER BY `hour` ASC ";
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