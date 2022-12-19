<!DOCTYPE html>
<html lang="en"></html>
<html>

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">

    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background-color: #D8F5CA" class="text-muted">

<!-- Nav desde aqui -->
<?php
     $titulo_pagina= "LOGIN";
     include("conexion.php");
     include("ipserver.php");
    // $sql="UPDATE tabla_navegador SET uso = '0'";
    // $consulta = mysqli_query($conexion, $sql);

    //  $sql="UPDATE tabla_navegador SET uso = '1' WHERE tabla_navegador.titulo = '$titulo_pagina'";
    //  $consulta = mysqli_query($conexion, $sql);

    //  $sql="UPDATE tabla_navegador SET `usuario` = '' WHERE `titulo` ='usuario'";
    //  $consulta=mysqli_query($conexion, $sql);
     ?>
     
     <title><?php echo $titulo_pagina?></title>

    <?php 
    $ip="10.217.144.35";
    session_start();
    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    include('nav.php');

    

    ?>

    <!-- Nav hasta aqui -->

    <h1 align="center" class="text-muted">Login</h1>
    
    <!--<h1 align="center" style="color: black; top:20px;">Login<h1> -->
    
    <form action="ingreso.php" method="POST">
    	<input type="text" id="matricero"name="matricero" placeholder="Nº empresa" required>
    	<input type="password" id="password"name="password" placeholder="Contraseña" required >
    	<input type="submit" name="verificar" value="VERIFICAR">            
    
        
    
    </form>
     

<?php echo file_get_contents('http://'.$ip.'/C-WIDO/footer.php');?>
<!-- Footer -->   

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

</body>
</html>