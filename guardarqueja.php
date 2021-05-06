<?php
session_start();
include 'funciones.php';
if($_SESSION['distrito'] && $_SESSION['codigo']){
    $distrito=$_SESSION['distrito'];
    $codigo=intval($_SESSION['codigo']);
}else{
    echo "No se ha seleccionado distrito o codigo";
	echo "<meta http-equiv='refresh' content='3; url=index.html'>";
}

if($_GET['mapa_x'] && $_GET['mapa_y'] && $_GET['sexo'] && $_GET['tipoqueja'] && $_GET['perfil'] && $_GET['descripcion']){
    $mapa_x=intval($_GET['mapa_x']);
    $mapa_y=intval($_GET['mapa_y']);
    $sexo=$_GET['sexo'];
    $tipoqueja=$_GET['tipoqueja'];
    $perfil=$_GET['perfil'];
    $descripcion=$_GET['descripcion'];
}else{
    $mapa_x=$_POST['mapa_x'];
    $mapa_y=$_POST['mapa_y'];
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
    <section class="top">
            <article class="margeni"></article>
            <article class="margend"><?php cabecera($distrito,$codigo) ?></article>
    </section> 
    <?php guardarqueja($codigo,$mapa_x,$mapa_y,$sexo,$tipoqueja,$perfil,$descripcion) ?>
</body>
</html>