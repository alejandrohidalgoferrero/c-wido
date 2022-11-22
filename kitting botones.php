<div class="row justify-content-center mr-auto ml-auto mt-1 mb-3" style="width: 88%" >

    <div class="col-8 pt-2 pb-2 pl-2 pr-2 justify-content-center" style= "border:muted 3px solid">               
        <img src="imagenes/leyenda kitting.png" alt="leyenda">
    </div>
    <div class="col pt-2 pb-2 pl-2 pr-2 justify-content-center" style= "border:muted 3px solid">               
        <a  href="http://fmi.intra.renault.fr/fmi/jsp/index.jsp" target="_blank">
            <img src="imagenes/logo_map_small.gif" width="50%" height="50%" alt="">
            <figcaption>Maintenance Access Portal</figcaption>
        </a>
    </div> 
</div> 



<div class="row justify-content-center mr-auto ml-auto mt-1 mb-3" style="width: 88%" >
       
       <form action="kitting buscar mabec.php" method="POST"> 
           <div class="col pt-2 pb-2 pl-2 pr-2 border rounded" style= "border:muted 3px solid">               
               <input type="submit" value="Buscar por MABEC" class="btn btn-primary">
               <input type="text" id="mabec" name="mabec" placeholder="MABEC" required autofocus>
           </div>             
       </form>
       <form action="kitting buscar familia.php" method="POST"> 
           <div class="col pt-2 pb-2 pl-2 pr-2 border rounded" style= "border:muted 3px solid">               
               <input type="submit" value="Buscar por familia" class="btn btn-secondary">
               <select class="mdb-select md-form" type="text" name="familia" id="familia"required>
                <?php 
                $default = "";
                $states = array(""=>"", "AGV"=>"AGV", "CABLES"=>"CABLES","CASQUILLOS"=>"CASQUILLOS", "CAUDALIMETROS"=>"CAUDALIMETROS", "CILINDRO"=>"CILINDRO","CORREAS"=>"CORREAS", "DETECTORES"=>"DETECTORES","EJES"=>"EJES","ELECTRICO"=>"ELECTRICO","ENGRASE"=>"ENGRASE","EUCHNER"=>"EUCHNER","FILTROS"=>"FILTROS","FLUIDOS"=>"FLUIDOS","GUIA"=>"GUIA","HIDRAULICA"=>"HIDRAULICA","IGUS"=>"IGUS","JUNTAS"=>"JUNTAS","MANUTENCION"=>"MANUTENCION","MECANICA"=>"MECANICA","NEUMATICA"=>"NEUMATICA","NITROGENO"=>"NITROGENO","PALETAS"=>"PALETAS","PATIN"=>"PATIN","PLANOS"=>"PLANOS","QUEMADOR"=>"QUEMADOR","RODAMIENTO"=>"RODAMIENTO","TERMOPAR"=>"TERMOPAR","TOPES"=>"TOPES","TORNILLERIA"=>"TORNILLERIA","UTILLAJE"=>"UTILLAJE","VACIO"=>"VACIO","VALVULA"=>"VALVULA");
                foreach($states as $key=>$val) {
                    echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                }
                ?>
            </select>
           </div>             
       </form>
       <form action="kitting buscar cajonera.php" method="POST"> 
           <div class="col pt-2 pb-2 pl-2 pr-2 border rounded" style= "border:muted 3px solid">               
               <input type="submit" value="Buscar por cajonera" class="btn btn-danger">
               <select class="mdb-select md-form" type="text" name="familia" id="familia" required>
                <?php 
                $default = "";
                $states = array(""=>"", "1"=>"1", "2"=>"2","3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9");
                foreach($states as $key=>$val) {
                    echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
                }
                ?>
            </select>
           </div>             
       </form>
       <form action="kitting buscar nombre.php" method="POST"> 
           <div class="col pt-2 pb-2 pl-2 pr-2 border rounded" style= "border:muted 3px solid">               
               <input type="submit" value="Buscar por nombre" class="btn btn-info">
           </div>             
       </form>
       
   </div>  