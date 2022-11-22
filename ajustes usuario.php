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


<h1 align="center">AJUSTES USUARIO</h1>

            <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" style="align-items-start" >
            <div class="text-left border rounded align-middle mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" >
                <form  class="text-center" style="font-style: italic; font-weight: bold;" action="ajustes crear.php" method="POST" enctype="multipart/form-data">
                    <div >
                    <input type="submit" name="submit" value="Introducir usuario." class="btn btn-primary align-middle btn-lg">
                    </div>
                </form>
            </div>                   
        </div>                   
        <div class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1" style="align-items-start" >
            <div class="col mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 text-dark border rounded" style="background-color:#E0F4F2;">
                <div align="center" class=" mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1 " >
                    <label><strong>Listado de usuarios:</strong></label>
                </div>
                    <table id="tabla" class="table table-striped table-bordered table-sm"  align="center">
                        <thead>
                            <tr>
                                <td colspan="12">
                                <input id="buscar" type="text" class="form-control" placeholder="Escriba algo para filtrar" />
                                </td>
                            </tr>
                            <tr>                                
                                <th scope="col" style="background-color: #EEF1AF;" class="text-center align-middle mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1"></th>
                                <th scope="col" style="background-color: #EEF1AF;" class="text-center align-middle mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">Nombre</th>
                                <th scope="col" style="background-color: #EEF1AF;" class="text-center align-middle mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">1º apellido </th>
                                <th scope="col" style="background-color: #EEF1AF;" class="text-center align-middle mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">2º apellido</th>
                                <th scope="col" style="background-color: #EEF1AF;" class="text-center align-middle mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">UET</th>
                                <th scope="col" style="background-color: #EEF1AF;" class="text-center align-middle mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">JU</th>
                                <th scope="col" style="background-color: #EEF1AF;" class="text-center align-middle mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">Usuario</th>
                                <!-- <th scope="col" style="background-color: #EEF1AF;" class="text-center align-middle mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">Password</th> -->
                                <th scope="col" style="background-color: #EEF1AF;" class="text-center align-middle mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">Tipo usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <script>
                                var busqueda = document.getElementById('buscar');
                                var table = document.getElementById("tabla").tBodies[0];                         
                                buscaTabla = function(){
                                    texto = busqueda.value.toLowerCase();
                                    var r=0;
                                    while(row = table.rows[r++])
                                    {
                                    if ( row.innerText.toLowerCase().indexOf(texto) !== -1 )
                                        row.style.display = null;
                                    else
                                        row.style.display = 'none';
                                    }
                                }                            
                                busqueda.addEventListener('keyup', buscaTabla);
                            </script>

                                    <?php 
                                        $color="background-color: #FFDBFF;"; 
                                        $consulta = "SELECT * FROM usuarios";
                                        $resultado = mysqli_query($conexion, $consulta);
                                        $contador =1;                       
                                        while ($row = mysqli_fetch_array($resultado)) {
                                        $id=$row['id'];             
                                    ?>
                        <tr >

                            <?php 
                            
                            echo '<th scope="row">
                                <div align="left" class="row mt-1 mb-1 ml-1 mr-1 pt-1 pb-1 pl-1 pr-1">
                                    <div class="ml-1 mr-1 pl-1 pr-1">
                                        <form  class="text-left" style="font-style: italic; font-weight: bold;" action="ajustes modificar.php" method="POST" enctype="multipart/form-data">
                                            <input type="submit" name="submit" value="Modificar" class="btn btn-secondary">
                                            <input type="hidden" name="id" value="'.$row['id'].'" placeholder="id" class="align-middle" required>  
                                        </form>
                                    </div>
                                    <div class="ml-1 mr-1 pl-1 pr-1">
                                        <form  class="text-left" style="font-style: italic; font-weight: bold;" action="ajustes eliminar.php" method="POST" enctype="multipart/form-data">
                                            <input type="submit" name="submit" value="Eliminar" class="btn btn-danger">
                                            <input type="hidden" name="id" value="'.$row['id'].'" placeholder="id" class="align-middle" required>  
                                        </form> 
                                    </div>
                                </div>
                            </th>';
                            echo '<td class="text-center align-middle">'.$row['nombre'].' </div></td>';
                            echo '<td class="text-center align-middle">'.$row['apellido1'].' </div></td>';
                            echo '<td class="text-center align-middle">'.$row['apellido2'].' </div></td>';
                            echo '<td class="text-center align-middle">'.$row['uet'].' </div></td>';
                            echo '<td class="text-center align-middle">'.$row['ju'].' </div></td>';
                            echo '<td class="text-center align-middle">'.$row['numero empresa'].' </div></td>';
                            // echo '<td class="text-center align-middle">'.$row['password'].' </div></td>';
                            echo '<td class="text-center align-middle">'.$row['tipo'].' </div></td>';

                            ?>
                        </tr>
                            <?php
                                $contador++;
                                } 
                            ?>
                        </tbody>
                    </table>                                  
                 
            </div>
        </div> 


    
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