<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
    
          
</head>

<body style="background-color: #D8F5CA" class="text-muted">

<!-- Nav desde aqui -->
<?php
     $titulo_pagina= "Mantenimiento ";
     include("conexion.php");
    $sql="UPDATE tabla_navegador SET uso = '0'";
    $consulta = mysqli_query($conexion, $sql);

     $sql="UPDATE tabla_navegador SET uso = '1' WHERE tabla_navegador.titulo = '$titulo_pagina'";
     $consulta = mysqli_query($conexion, $sql);
     ?>
     
     <title><?php echo $titulo_pagina?></title>

    <?php 
    $ip="LOCALHOST";

    include('nav.php')?>

    <!-- Nav hasta aqui -->

<h1 align="center">Checks SEGURIDAD</h1>

<!-- Auí introduciremos los contenidos que lleve la pagina -->



<div class="container-fluid  mt-2 mb-2 pt-1 pb-1 border ">
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <div class="col-4 justify-content-center mr-1 ml-1 mt-1 mb-1" >
            <form action="checks_mto_seguridad_generacion.php"  method="POST"> 
                <div class="input-group">
                    <select required class="custom-select" id="tipo_check" name="tipo_check">
                        <option selected value="">Elija el tipo de check</option>
                        <option value="cancamos">Cáncamos</option>
                        <option value="eslingas">Eslingas</option>
                        <option value="radial">Radial</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Crear nuevo check</button>
                        <input type="hidden" name="tipo_generacion" id="tipo_generacion" value="nuevo">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >

        <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">                
            <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center border border-dark rounded">
                <div class="d-inline-block mr-1 ml-1">
                    <span><strong>Filtro fecha:</strong></span>
                </div>
                <div class="d-inline-block mr-1 ml-1">
                    <span>Inicio:</span>
                </div>
                <div class="d-inline-block mr-1 ml-1">
                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                </div>
                <div class="d-inline-block mr-1 ml-1">
                    <span>Fin:</span>
                </div>
                <div class="d-inline-block mr-1 ml-1">
                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control">
                </div>
                <div class="d-inline-block mr-1 ml-1">
                    <button type="button" id="btn_filtrar" name="btn_filtrar" class="btn btn-secondary"  onclick="function_filtro_fecha()">Filtrar</button>
                </div>                        
            </div>  
            <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center border border-dark rounded">
                <div class="d-inline-block mr-1 ml-1">
                    <span><strong>Filtro Tipo Check:</strong></span>
                </div>
                <div class="d-inline-block mr-1 ml-1">
                    <?php
                        $array_tipo_check[""]="";
                        $sql = "SELECT DISTINCT `tipo_check` FROM `checks_mto_seguridad_registro` WHERE `tipo_check` IS NOT NULL";
                        $consulta = mysqli_query($conexion, $sql);
                        while ($row = mysqli_fetch_array($consulta)) {
                            $array_tipo_check[$row['tipo_check']]=$row['tipo_check'];
                        }
                    ?> 
                    <select class="form-control" name="filtro_tipo_check" id="filtro_tipo_check"  onchange="function_filtro_tipo_check()">
                    <?php
                        $default ="";
                        $states =$array_tipo_check;
                        foreach($states as $key=>$val) {
                            echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$key</option>":"<option value=\"$key\">$key</option>";
                        }
                    ?>
                    </select>
                </div>
            </div>  
        </div>
    </div>
    <div class="row justify-content-center mr-1 ml-1 mt-1 mb-1" >
        <table class="table table-sm table-bordered table-striped" id="tabla_checks_seguridad" name="tabla_checks_seguridad">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" style="vertical-align: middle" scope="col"></th>
                    <th class="text-center" style="vertical-align: middle" scope="col">Fecha</th>
                    <th class="text-center" style="vertical-align: middle" scope="col">Turno</th>
                    <th class="text-center" style="vertical-align: middle" scope="col">Operario</th>
                    <th class="text-center" style="vertical-align: middle" scope="col">Tipo de CHECK</th>
                    <th class="text-center" style="vertical-align: middle" scope="col">Elemento</th>
                    <th class="text-center" style="vertical-align: middle" scope="col">Comentarios</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $consulta = "SELECT * FROM `checks_mto_seguridad_registro`";
                  $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));
                  while ($row = mysqli_fetch_array($resultado)) {
            ?>
                <tr>
                    <td class="w-auto text-center">
                        <form action="checks_mto_seguridad_generacion.php"  method="POST"> 
                            <button type="submit" name="" id="" class="btn btn-info">VER <?php echo $row['id_check']?></button>
                            <input type="hidden" name="tipo_generacion" id="tipo_generacion" value="modificar">
                            <input type="hidden" name="id_check" id="id_check" value="<?php echo $row['id_check']?>">
                            <input type="hidden" name="tipo_check" id="tipo_check" value="<?php echo $row['tipo_check']?>">
                        </form>
                    </td>
                    <td class="text-center" style="vertical-align: middle"><?php echo date("d-m-Y", strtotime($row['fecha']));?></td>
                    <td class="text-center" style="vertical-align: middle">
                        <?php echo $row['turno']?>
                    </td>
                    <td class="text-center" style="vertical-align: middle">
                        <?php echo $row['usuario_modificacion']?>
                    </td>
                    <td class="text-center" style="vertical-align: middle"><?php echo $row['tipo_check']?></td>
                    <td class="text-center" style="vertical-align: middle">
                        <?php echo $row['elemento']?>
                    </td>
                    <td class="text-center" style="vertical-align: middle">
                        <?php echo $row['comentarios']?>
                    </td>
                </tr>
            <?php 
                  }
            ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function function_filtro_tipo_check() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("filtro_tipo_check");
        filter = input.value;
        table = document.getElementById("tabla_checks_seguridad");
        tr = table.getElementsByTagName("tr");
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[4];
            if (td) {
                txtValue = td.textContent || td.innerText;

                if (txtValue.indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    var valor_fecha=1;

    function function_filtro_fecha() {
        btn_filtrar = document.getElementById("btn_filtrar");

        if(valor_fecha==1)
        {

            var input_startDate, input_stopDate, tr, i;
            input_startDate =  new Date(document.getElementById("fecha_inicio").value);
            input_stopDate =  new Date(document.getElementById("fecha_fin").value);

            console.log("input_startDate= "+input_startDate);        
            console.log("input_stopDate= "+input_stopDate);        

            table = document.getElementById("tabla_checks_seguridad");
            tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {

                let td = tr[i].getElementsByTagName("td");

                if (!td || !td[2]) continue;

                let date = td[1].textContent[6]+td[1].textContent[7]+td[1].textContent[8]+td[1].textContent[9]+"-"+td[1].textContent[3]+td[1].textContent[4]+"-"+td[1].textContent[0]+td[1].textContent[1];
                console.log("date= "+date);        

                let td_date = new Date(date);
                console.log("td_date= "+td_date);        

                if (td_date) {
                    if (td_date >= input_startDate && td_date <= input_stopDate) {
                        tr[i].style.display ="";
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }
            btn_filtrar.innerText="Borrar filtro";
            valor_fecha=0;
        }
        else
        {
            table = document.getElementById("tabla_checks_seguridad");
            tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {
                tr[i].style.display ="";
            }
            
            btn_filtrar.innerText="Filtrar";

            valor_fecha=1;
        }

    }
</script>     

    <!-- Footer -->
    <?php echo file_get_contents('http://'.$ip.'/D-WIDO/footer.php');?>
    <!-- Footer -->

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

</body>
</html>