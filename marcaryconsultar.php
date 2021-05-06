<?php
if($_GET['distrito']){
    $distrito=$_GET['distrito'];
}else{
    $distrito=$_POST['distrito'];
}

if($_GET['codigo']){
    $codigo=$_GET['codigo'];
}else{
    $codigo=$_POST['codigo'];
}
include 'funciones.php';
session_start();
$_SESSION['distrito']=$distrito;
$_SESSION['codigo']=$codigo;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/marcaryconsultar.css">
    <title>Marcar y Consultar</title>

</head>
<body>
    <section class="top">
            <article class="margeni"></article>
            <article class="margend"><?php cabecera($distrito,$codigo) ?></article>
    </section>
    <section>
            <article>
            <h1>Marcar y Consultar</h1>
            </article>
    </section>
    <table>
        <tr>
            <td align="center">
            <img src="./images/consultasymarcar.jpg" alt="Marcar y consultar" title="Marcar y consultar" width="381" height="213" usemap="#Map"/>
<map name="Map">
  <area shape="poly" coords="215,21,213,44,208,64,200,78,192,90,185,98,174,110,167,121,161,139,155,155,157,171,158,184,162,197,112,189,83,177,64,169,41,155,23,136,14,113,22,84,38,65,67,45,106,31,148,24,183,21" alt="Marcar punto" title="Marcar punto" href="mapa.php">
  <area shape="poly" coords="214,21,214,37,211,53,207,65,197,82,188,95,177,108,166,125,161,142,157,162,157,176,159,188,160,197,182,198,208,199,229,197,255,193,281,186,302,177,326,167,345,153,361,137,368,116,366,94,356,74,340,57,307,40,274,30,238,22,214,19" alt="Realizar consulta" title="Realizar consulta" href="seleccionconsulta.php">
</map>

            </td>
        </tr>
    </table>


</body>
</html>