<?php 
session_start();
$id_check=$_SESSION['id_check'];

if(!empty($_FILES))
{
$tempFile=$_FILES['file']['tmp_name'];
$targetFile ='imagenes/check_radial/id_check_'.$id_check.'.jpg';
move_uploaded_file($tempFile,$targetFile);

}
?>