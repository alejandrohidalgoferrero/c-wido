<?php
// $servername = "D-WIDO_SERVER";  
$servername="10.217.144.35";
$database = "c-wido";
$username = "dwido";
$password = "d-widoMatriceria1";
// Realizamos la conexion a la Base de Datos
$conexion = mysqli_connect($servername, $username, $password, $database);
// Verificamos que la conexión se realizo, no fuera así mostrara un mensaje de error
// if (!$conexion) {
//     die("No se a producido la conexión a la Base de Datos" . mysqli_connect_error());
// }

 function filtrado($datos){
     $datos = trim($datos); // Elimina espacios antes y después de los datos
     $datos = stripslashes($datos); // Elimina backslashes \
     $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
     return $datos;
 }
?>
