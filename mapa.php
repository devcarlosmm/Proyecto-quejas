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
    <title>Mapa de distrito</title>
    <link rel="stylesheet" href="./css/mapa.css">
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
            <form action="formulario.php">
                <table>
                    <tr>
                        <td align="center">
                        <?php pintarMapa($distrito) ?>
                        </td>
                    </tr>
                </table>

</form>

</body>
</html>