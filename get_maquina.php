<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>

<?php
$q = $_GET['q'];

$con = mysqli_connect("10.217.144.35","dwido","d-widoMatriceria1","c-wido");
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");

$sql="SELECT*FROM `risk_assesments_assist` WHERE `area` = '".$q."'";
$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {

echo'
<option value="'.$row['maquina'].'">'.$row['maquina'].'</option>';
}

// echo'
// </select>';

mysqli_close($con);
?>
</body>
</html>
