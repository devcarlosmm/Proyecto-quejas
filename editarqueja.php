<?php
include 'funciones.php';

if($_GET['codigo'] && $_GET['mapa_x'] && $_GET['mapa_y'] && $_GET['sexo'] && $_GET['tipoqueja'] && $_GET['perfil'] && $_GET['descripcion']){
    $id=intval($_GET['id']);
    $codigo=intval($_GET['codigo']);
    $mapa_x=intval($_GET['mapa_x']);
    $mapa_y=intval($_GET['mapa_y']);
    $sexo=$_GET['sexo'];
    $tipoqueja=$_GET['tipoqueja'];
    $perfil=$_GET['perfil'];
    $descripcion=$_GET['descripcion'];
}else{
    $id=intval($_POST['id']);
    $codigo=intval($_POST['codigo']);
    $mapa_x=intval($_POST['mapa_x']);
    $mapa_y=intval($_POST['mapa_y']);
    $sexo=$_POST['sexo'];
    $tipoqueja=$_POST['tipoqueja'];
    $perfil=$_POST['perfil'];
    $descripcion=$_POST['descripcion'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar queja</title>
    <link rel="stylesheet" href="./css/guardarqueja.css">
</head>
<body>
    <?php actualizarqueja($id,$codigo,$mapa_x,$mapa_y,$sexo,$tipoqueja,$perfil,$descripcion) ?>
</body>
</html>