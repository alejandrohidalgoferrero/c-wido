<?php 


include('conexion.php');

$sql = "SELECT * FROM kitting_elementos_estado";
$consulta = mysqli_query($conexion, $sql);

$numVar = mysqli_num_rows($consulta);
while ($row = mysqli_fetch_array($consulta)) {

    $numVar=$row['id'];
}

for ($i = 1; $i <= $numVar; $i++) {
        
    $sql = "SELECT * FROM kitting_elementos_estado WHERE `kitting_elementos_estado`.`id` =$i";
    $consulta = mysqli_query($conexion, $sql);
    
    while ($row = mysqli_fetch_array($consulta)) {

        $stock=$row['unidades en stock'];
        $stock_minimo=$row['stock minimo'];
        $stock_pedido=$row['stock pedido'];
    }
    
    if($stock_pedido==0){
        if($stock>= $stock_minimo){
          $estado="0";
        }
        if($stock< $stock_minimo){
            $estado="1";
        }
      
        if($stock ==0 ){
            $estado="2";
        }  
      }else{
        $estado="3";
      }
    $sql1="UPDATE `kitting_elementos_estado` SET `estado`='$estado' WHERE `kitting_elementos_estado`.`id` =$i";
    $consulta1 = mysqli_query($conexion, $sql1);
}
?>