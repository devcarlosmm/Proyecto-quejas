<?php
include 'funciones.php';
    session_start();

    if($_SESSION['distrito'] && $_SESSION['codigo']){
        $distrito=$_SESSION['distrito'];
        $codigo=$_SESSION['codigo'];
    }else{
        echo "No se ha seleccionado distrito o codigo";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/seleccionconsulta.css">
    <title>Seleccion de consultas</title>

</head>
<body>
    <section class="top">
            <article class="margeni"></article>
            <article class="margend"><?php cabecera($distrito,$codigo) ?></article>
    </section>
    <section >
        <article>
        <h1>Seleccione consulta a realizar</h1>
            <p class="imagenseleccion">

            <img src="./images/consultas.jpg" alt="" width="350" height="200" usemap="#Map"/>
            <map name="Map">
            <area alt="Por perfil" title="Por perfil" shape="poly" coords="35,64,58,59,85,58,114,61,133,69,148,81,150,96,130,108,104,116,70,118,40,112,22,104,9,92,14,75" href="consulta.php?consulta=perfil">
            <area alt="Por mapa" title="Por mapa" shape="poly" coords="264,77,285,77,308,81,332,90,340,93,348,108,342,125,320,133,292,140,266,140,241,136,221,126,209,115,209,100,225,89,242,82" href="consulta.php?consulta=mapa">
            <area alt="Por sexo" title="Por sexo" shape="poly" coords="129,124,153,125,177,131,198,143,205,155,197,170,177,178,155,185,125,186,98,180,79,172,66,161,63,147,78,136,102,128" href="consulta.php?consulta=sexo">
            <area alt="Por edad" title="Por edad" shape="poly" coords="177,4,202,9,221,15,240,25,246,40,236,54,221,60,197,67,172,68,150,63,133,60,116,52,106,40,105,30,117,20,141,11,156,7" href="consulta.php?consulta=edad">
            </map>
    </p>
        </article>
    </section>

</body>
</html>