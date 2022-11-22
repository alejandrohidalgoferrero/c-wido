<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>

<?php

$q = $_GET['q'];

echo '<br> prueba= '.$q.'<br>';
$con = mysqli_connect("10.217.144.35","dwido","d-widoMatriceria1","informe_buhler");
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");

echo'
<option value=""></option>';

$sql="SELECT*FROM `tabla_heavy_maintenance` WHERE `tipo_molde` = '".$q."'";
$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {

echo'
<option value="'.$row['molde'].'">'.$row['molde'].'</option>';
}

// echo'
// </select>';

mysqli_close($con);
?>
</body>
</html>
