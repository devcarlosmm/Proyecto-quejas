<?php
session_start();
session_destroy();
echo " 
    <section class='mensaje'>
        <article>
            <h1>Sesion cerrada con exito</h1>
            <h3>Reenviando a la pagina principal...</h3>
            <meta http-equiv='refresh' content='1; url=formadmin.html'>
        </article>
    </section>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrar sesion</title>
    <link rel="stylesheet" href="./css/guardarqueja.css">
</head>
<body>

</body>
</html>