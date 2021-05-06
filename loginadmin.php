<?php
include 'funciones.php';
session_start();
if($_GET['nombre'] && $_GET['pass']){
    $nombre=$_GET['nombre'];
    $pass=$_GET['pass'];
    $_SESSION['nombre']=$nombre;
    $_SESSION['pass']= $pass;
    loguear($nombre,$pass);
}else{
    echo "<p>No se han enviado los datos requeridos</p>
          <meta http-equiv='refresh' content='2; url=formadmin.html'> 
         ";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logueando</title>
    <link rel="stylesheet" href="./css/guardarqueja.css">
</head>
<body>

</body>
</html>