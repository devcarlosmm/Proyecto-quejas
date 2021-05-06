<?php
include 'funciones.php';
session_start();
if($_SESSION['nombre'] && $_SESSION['pass']){
    $nombre=$_SESSION['nombre'];
    $pass=$_SESSION['pass'];
    listarQuejas();
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
    <title>Admin panel</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>

</body>
</html>