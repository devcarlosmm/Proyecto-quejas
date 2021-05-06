<?php
include 'funciones.php';
session_start();
if($_GET['id']){
    $id=intval($_GET['id']);
    if($_SESSION['nombre'] && $_SESSION['pass']){
        borrarQueja($id);
    }else{
        echo "
        <section class='mensaje'>
            <article>
                <h1>Id no seleccionado</h1>
                <h3>Reenviando a la pagina principal...</h3>
                <meta http-equiv='refresh' content='2; url=login.php'> 
            </article>
        </section>
        ";
    }
    
}else{
    $id=intval($_POST['id']);
    if($_SESSION['nombre'] && $_SESSION['pass']){
        borrarQueja($id);
    }else{
        echo "
        <section class='mensaje'>
            <article>
                <h1>Id no seleccionado</h1>
                <h3>Reenviando a la pagina principal...</h3>
                <meta http-equiv='refresh' content='2; url=login.php'> 
            </article>
        </section>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar queja</title>
    <link rel="stylesheet" href="./css/guardarqueja.css">
</head>
<body>

</body>
</html>