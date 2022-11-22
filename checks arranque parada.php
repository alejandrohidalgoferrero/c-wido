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
     $titulo_pagina= "Check arranque parada";
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
    
    $fecha_actual= date("d-m-Y");
    $fecha_superior= date("d-m-Y",strtotime($fecha_actual."+ 2 days")); 
    $fecha_inferior= date("d-m-Y",strtotime($fecha_actual."- 2 days")); 
    $hora=date("H:i:s");
    $fecha_completa=date("Y-m-d H:i:s");
    
    if(strtotime($hora)>=strtotime('00:00:00') and strtotime($hora)<=strtotime('05:59:59') ) {$turno="Noche";} 
    if(strtotime($hora)>=strtotime('06:00:00') and strtotime($hora)<=strtotime('13:59:59') ) {$turno="Mañana";} 
    if(strtotime($hora)>=strtotime('14:00:00') and strtotime($hora)<=strtotime('21:59:59') ) {$turno="Tarde";} 
    if(strtotime($hora)>=strtotime('22:00:00') and strtotime($hora)<=strtotime('23:59:59') ) {$turno="Noche";} 
    ?>

    <!-- Nav hasta aqui -->
<br>
<h1 align=center>CHECKS ARRANQUE/PARADA</h1>
<br>
<div class="container justify-content-center m-auto pt-1 pb-1 pl-1 pr-1" style= "background-color: #D6DBD3">
    
     
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  border rounded border-dark align-self-center " style= "background-color: #FFFFFF" align= "center">
            <h2 align=center style="color:black"> OP-10 </h2>
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
                     <img src="imagenes/checks arranque parada/OP-10 Horno fusor.jpg" class="img-fluid">
                </div>
            </div>
            <form action= "checks arranque parada support.php" method= "Post">
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">


                        <strong style="color:black"> op_10_checklist</strong>
                        <select class="mdb-select md-form ml-1" type="text" name="accion" id="accion" required>'; 
                            <?php 
                            $default = "";
                            $states = array(""=>"", "arranque"=>"arranque", "parada"=>"parada");
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" id="operacion" name="operacion" value="op_10"></input>
                </div>    
            </div>

            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">                    
                    <input type="submit" value= Registros class="btn btn-primary">
                    </input>
                </div>    
            </div>
            </form>                          
            
        </div>    
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  border rounded border-dark align-self-center" style= "background-color: #FFFFFF" align= "center">
            <h2 align=center style="color:black"> OP-30 </h2>
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
                     <img src="imagenes/checks arranque parada/OP-30_Horno_lethiguel.jpg" class="img-fluid">
                </div>
            </div>
            <form action= "checks arranque parada support.php" method= "Post">
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
                    
                        
                        <strong style="color:black"> op_30_checklist</strong>
                        <select class="mdb-select md-form ml-1" type="text" name="accion" id="accion" required>'; 
                            <?php 
                            $default = "";
                            $states = array(""=>"", "arranque"=>"arranque", "parada"=>"parada");
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" id="operacion" name="operacion" value="op_30"></input>
                </div>    
            </div>
                        
            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">                    
                        <input type="submit" value= Registros class="btn btn-primary">
                        </input>
                </div>    
            </div>
            </form>                          
            
        </div>  
        
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  border rounded border-dark align-self-center" style= "background-color: #FFFFFF" align= "center">
            <h2 align=center style="color:black"> OP-40 </h2>
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
                     <img src="imagenes/checks arranque parada/OP-40 Inyectora.jpg" class="img-fluid">
                </div>
            </div>
            <form action= "checks arranque parada support.php" method= "Post">
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
                    
                        
                        <strong style="color:black"> op_40_checklist</strong>
                        <select class="mdb-select md-form ml-1" type="text" name="accion" id="accion" required>'; 
                            <?php 
                            $default = "";
                            $states = array(""=>"", "arranque"=>"arranque", "parada"=>"parada");
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" id="operacion" name="operacion" value="op_40"></input>
                </div>    
            </div>
                        
            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">                    
                    <input type="submit" value= Registros class="btn btn-primary">
                    </input>
                </div>    
            </div>
            </form>                          
            
        </div>                        

    </div>
    
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  border rounded border-dark align-self-center" style= "background-color: #FFFFFF" align= "center">
            <h2 align=center style="color:black"> OP-80 </h2>
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
                     <img src="imagenes/checks arranque parada/OP-80_Horno_T5.jpg" class="img-fluid">
                </div>
            </div>
            <form action= "checks arranque parada support.php" method= "Post">
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">


                        <strong style="color:black"> op_80_checklist</strong>
                        <select class="mdb-select md-form ml-1" type="text" name="accion" id="accion" required>'; 
                            <?php 
                            $default = "";
                            $states = array(""=>"", "arranque"=>"arranque", "parada"=>"parada");
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" id="operacion" name="operacion" value="op_80"></input>
                </div>    
            </div>

            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">                    
                    <input type="submit" value= Registros class="btn btn-primary">
                    </input>
                </div>    
            </div>
            </form>                          
            
        </div>    
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  border rounded border-dark align-self-center" style= "background-color: #FFFFFF" align= "center">
            <h2 align=center style="color:black"> OP-1130 </h2>
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
                     <img src="imagenes/checks arranque parada/OP-1130 Lavadora.jpg" class="img-fluid">
                </div>
            </div>
            <form action= "checks arranque parada support.php" method= "Post">
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
                    
                        
                        <strong style="color:black"> op_1130_checklist</strong>
                        <select class="mdb-select md-form ml-1" type="text" name="accion" id="accion" required>'; 
                            <?php 
                            $default = "";
                            $states = array(""=>"", "arranque"=>"arranque", "parada"=>"parada");
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" id="operacion" name="operacion" value="op_1130"></input>
                </div>    
            </div>
                        
            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">                    
                        <input type="submit" value= Registros class="btn btn-primary">
                        </input>
                </div>    
            </div>
            </form>                          
            
        </div>  
        
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  border rounded border-dark align-self-center" style= "background-color: #FFFFFF" align= "center">
            <h2 align=center style="color:black"> OP-1140 </h2>
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
                     <img src="imagenes/checks arranque parada/OP-1140 Estanqueidad.jpg" class="img-fluid">
                </div>
            </div>
            <form action= "checks arranque parada support.php" method= "Post">
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
                    
                        
                        <strong style="color:black"> op_1140_checklist</strong>
                        <select class="mdb-select md-form ml-1" type="text" name="accion" id="accion" required>'; 
                            <?php 
                            $default = "";
                            $states = array(""=>"", "parada"=>"parada");
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" id="operacion" name="operacion" value="op_1140"></input>
                </div>    
            </div>
                        
            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">                    
                    <input type="submit" value= Registros class="btn btn-primary">
                    </input>
                </div>    
            </div>
            </form>                          
            
        </div>                        

    </div>
    
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  border rounded border-dark align-self-center" style= "background-color: #FFFFFF" align= "center">
            <h2 align=center style="color:black"> OP-1150 </h2>
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
                     <img src="imagenes/checks arranque parada/OP-1150 Multicontrol.jpg" class="img-fluid">
                </div>
            </div>
            <form action= "checks arranque parada support.php" method= "Post">
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">


                        <strong style="color:black"> op_1150_checklist</strong>
                        <select class="mdb-select md-form ml-1" type="text" name="accion" id="accion" required>'; 
                            <?php 
                            $default = "";
                            $states = array(""=>"", "parada"=>"parada");
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" id="operacion" name="operacion" value="op_1150"></input>
                </div>    
            </div>

            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">                    
                    <input type="submit" value= Registros class="btn btn-primary">
                    </input>
                </div>    
            </div>
            </form>                          
            
        </div>    
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  border rounded border-dark align-self-center" style= "background-color: #FFFFFF" align= "center">
            <h2 align=center style="color:black"> OP-CV FINAL </h2>
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
                     <img src="imagenes/checks arranque parada/OP-CV final.jpg" class="img-fluid">
                </div>
            </div>
            <form action= "checks arranque parada support.php" method= "Post">
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
                    
                        
                        <strong style="color:black"> op_cv_final_checklist</strong>
                        <select class="mdb-select md-form ml-1" type="text" name="accion" id="accion" required>'; 
                            <?php 
                            $default = "";
                            $states = array(""=>"", "parada"=>"parada");
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" id="operacion" name="operacion" value="op_cv_final"></input>
                </div>    
            </div>
                        
            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">                    
                        <input type="submit" value= Registros class="btn btn-primary">
                        </input>
                </div>    
            </div>
            </form>                          
            
        </div>  
        
        <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  border rounded border-dark align-self-center" style= "background-color: #FFFFFF" align= "center">
            <h2 align=center style="color:black"> OP-1200 </h2>
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
                     <img src="imagenes/checks arranque parada/OP-1200_Portico_descarga.jpg" class="img-fluid">
                </div>
            </div>
            <form action= "checks arranque parada support.php" method= "Post">
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
                    
                        
                        <strong style="color:black"> op_1200_checklist</strong>
                        <select class="mdb-select md-form ml-1" type="text" name="accion" id="accion" required>'; 
                            <?php 
                            $default = "";
                            $states = array(""=>"", "parada"=>"parada");
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" id="operacion" name="operacion" value="op_1200"></input>
                </div>    
            </div>
                        
            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">                    
                    <input type="submit" value= Registros class="btn btn-primary">
                    </input>
                </div>    
            </div>
            </form>                          
            
        </div>                        

    </div>
    <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
        <div class="col-4 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  border rounded border-dark align-self-center" style= "background-color: #FFFFFF">
            <h2 align=center style="color:black"> OP-SVS </h2>
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
                     <img src="imagenes/checks arranque parada/OP-SVS Separadora viruta.jpg" class="img-fluid">
                </div>
            </div>
            <form action= "checks arranque parada support.php" method= "Post">
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">


                        <strong style="color:black"> op_svs</strong>
                        <select class="mdb-select md-form ml-1" type="text" name="accion" id="accion" required>'; 
                            <?php 
                            $default = "";
                            $states = array(""=>"", "parada"=>"parada");
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" id="operacion" name="operacion" value="op_svs"></input>
                </div>    
            </div>

            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">                    
                    <input type="submit" value= Registros class="btn btn-primary">
                    </input>
                </div>    
            </div>
            </form>                          
            
        </div>

        <div class="col-4 mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1  border rounded border-dark align-self-center" style= "background-color: #FFFFFF">
            <h2 align=center style="color:black"> OP-1110 </h2>
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">
                     <img src="imagenes/checks arranque parada/OP-1110 MAG.jpg" class="img-fluid">
                </div>
            </div>
            <form action= "checks arranque parada support.php" method= "Post">
            <div class= "row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">


                        <strong style="color:black"> op_1110</strong>
                        <select class="mdb-select md-form ml-1" type="text" name="accion" id="accion" required>'; 
                            <?php 
                            $default = "";
                            $states = array(""=>"", "parada"=>"parada");
                            foreach($states as $key=>$val) {
                                echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" id="operacion" name="operacion" value="op_1110"></input>
                </div>    
            </div>

            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 align-self-center">
                <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" align= "center">                    
                    <input type="submit" value= Registros class="btn btn-primary">
                    </input>
                </div>    
            </div>
            </form>                          
            
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