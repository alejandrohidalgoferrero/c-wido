<?php
// $servername = "D-WIDO_SERVER";  
$servername="10.217.144.35";
$database = "d-wido";
$username = "dwido";
$password = "d-widoMatriceria1";
// Realizamos la conexion a la Base de Datos
$conexion = mysqli_connect($servername, $username, $password, $database);
// Verificamos que la conexión se realizo, no fuera así mostrara un mensaje de error
// if (!$conexion) {
//     die("No se a producido la conexión a la Base de Datos" . mysqli_connect_error());
// }
 $formato=$_POST['formato'];
 $mabec=$_POST['mabec'];

 if ($formato=="") { $formato='.jpg';}

 function filtrado($datos){
     $datos = trim($datos); // Elimina espacios antes y después de los datos
     $datos = stripslashes($datos); // Elimina backslashes \
     $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
     return $datos;
 }
 if (!empty($_FILES)) {
    // SUBIDA DE FICHEROS
    $ds          = DIRECTORY_SEPARATOR;  //1

    $storeFolder = ".".$ds."imagenes";   //2
    
    mkdir ("$storeFolder", 0777, true);
    chmod("$storeFolder",0777);
    echo $storeFolder;
    
    session_start();

    $nombre= $mabec.$formato;


    $tempFile = $_FILES['file']['tmp_name'];          //3              
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    echo "<br>".$targetPath;
    



    $targetFile =  $targetPath.$nombre;  //5
    echo "<br>".$targetFile;

    $sql="SELECT  foto en uso FROM sinoptico_modula WHERE sinoptico_modula.`id`=1";
    $consulta = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($consulta)) {

    $fila=$row['foto en uso'];

    }
    echo $fila;
    

    move_uploaded_file($tempFile,$targetFile); //6


}

?>
