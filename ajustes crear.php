<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="js/icofont/icofont.min.css">
    <script src="js/jquery.min.js"></script>

</head>

<body style="background-color: #D8F5CA" class="text-muted">

    <!-- Nav desde aqui -->
    <?php
     $titulo_pagina= "Ajustes";
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


<h1 align="center">AJUSTES. CREAR USUARIO.</h1>

<form id="form_datos"></form>
       
<div class="container-fluid justify-content-center">
    <div class="container-fluid justify-content-center mt-2 mb-2 mr-1 ml-1 pt-1 pb-1 pl-1 pr-1 border border-dark rounded text-dark" style="background-color:#E4E4E4;">
        <div class="d-flex justify-content-around mr-1 ml-1 mt-1 mb-1">
            <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 ml-1 pt-1 pb-1 pr-1 pl-1 justify-content-center text-center">
                <button class="btn font-weight-bold border border-dark btn-lg" name="btn_guardar" id="btn_guardar"  style="background-color:#28a745;" onclick="guardar_datos()"><i class='icofont-ui-check'></i></button>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1 " >
            <div class="d-flex justify-content-around ">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                    <div class="input-group border border-dark rounded">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <strong>NOMBRE:</strong>
                            </div>
                        </div>
                        <input type="text" form="form_datos" name="nombre" id="nombre" class="form-control" value="" oninput="btn_guardar_rojo()" required>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around ">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                    <div class="input-group border border-dark rounded">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <strong>1º APELLIDO:</strong>
                            </div>
                        </div>
                        <input type="text" form="form_datos" name="apellido1" id="apellido1" class="form-control" value="" oninput="btn_guardar_rojo()" required>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around ">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                    <div class="input-group border border-dark rounded">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <strong>2º APELLIDO:</strong>
                            </div>
                        </div>
                        <input type="text" form="form_datos" name="apellido2" id="apellido2" class="form-control" value="" oninput="btn_guardar_rojo()" required>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around ">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                    <div class="input-group border border-dark rounded">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <strong>UET:</strong>
                            </div>
                        </div>
                        <input type="text" form="form_datos" name="uet" id="uet" class="form-control" value="" oninput="btn_guardar_rojo()" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-around mr-1 ml-1 mt-1 mb-1 pt-1 pb-1 pl-1 pr-1 " >
            <div class="d-flex justify-content-around ">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                    <div class="input-group border border-dark rounded">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <strong>JU:</strong>
                            </div>
                        </div>
                        <input type="text" form="form_datos" name="ju" id="ju" class="form-control" value="" oninput="btn_guardar_rojo()" required>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around ">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                    <div class="input-group border border-dark rounded">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <strong>USUARIO:</strong>
                            </div>
                        </div>
                        <input type="text" form="form_datos" name="usuario" id="usuario" class="form-control" value="" oninput="btn_guardar_rojo()" required>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around ">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                    <div class="input-group border border-dark rounded">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <strong>PASSWORD:</strong>
                            </div>
                        </div>
                        <input type="text" form="form_datos" name="password" id="password" class="form-control" value="" oninput="btn_guardar_rojo()" required>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around ">
                <div class="col-auto d-flex align-items-center mt-1 mb-1 mr-1 pt-1 pb-1 pr-1 justify-content-center text-center">
                    <div class="input-group border border-dark rounded">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <strong>TIPO:</strong>
                            </div>
                        </div>
                        <select form="form_datos" class="form-control" type="text" name="tipo" id="tipo"  value="" onchange="btn_guardar_rojo()" required>
                            <?php 
                                $default = "";
                                $states = array(
                                            ""=>"",
                                            "usuario"=>"usuario", 
                                            "superusuario"=>"superusuario");
                                foreach($states as $key=>$val) {
                                    echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                                }
                            ?>
                        </select>                                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function btn_guardar_rojo() {
        var boton_guardar = document.getElementById("btn_guardar");
        boton_guardar.style.background = "#dc3545";   
        boton_guardar.innerHTML  = "<i class='icofont-save'></i>";   
    }

    function btn_guardar_verde() {
        var boton_guardar = document.getElementById("btn_guardar");
        boton_guardar.style.background = "#28a745";   
        boton_guardar.innerHTML  = "<i class='icofont-ui-check'></i>";   
    }

    function guardar_datos()
    {
        btn_guardar_verde();
        var form = new FormData(document.getElementById("form_datos"));
        $.ajax({
            url: 'funciones_ajustes/guardar_ajuste_guardar_usuario.php',
            type: 'POST',
            dataType: "json",
            data: form,
            cache: false,
            contentType: false,
            processData: false
        });
    }

</script>

    
    <!-- Footer -->
    <?php echo file_get_contents('http://'.$ip.'/C-WIDO/footer.php');?>
    <!-- Footer -->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

</body>
</html>