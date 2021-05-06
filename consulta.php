<?php
    session_start();
    include 'funciones.php';
    if($_SESSION['distrito'] && $_SESSION['codigo']){
        $distrito=$_SESSION['distrito'];
        $codigo=$_SESSION['codigo'];
    }else{
        echo "No se ha seleccionado distrito o codigo";
    }

    if($_GET['consulta']){
        $consulta=$_GET['consulta'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/consulta.css">
    <title>Consulta por <?php echo "$consulta" ?></title>

</head>
<body>
    <section class="top">
            <article class="margeni"></article>
            <article class="margend"><?php cabecera($distrito,$codigo) ?></article>
    </section>

    <section >
        <article>
        <h1>Consulta por <?php echo $consulta ?></h1>
        </article>
    </section>
    <section class="contenido">
        <?php consultaSql($consulta,$codigo,$distrito) ?>
    </section>
    <?php 
        if($consulta=="mapa"){
            echo "
            <div class='leyenda'>   
                <h2>Leyenda:</h2>
                <h3><span class='conflictiva'></span>---  Queja conflictiva</h3>
                <h3><span class='ambiental'></span>---  Queja ambiental</h3>
                <h3><span class='social'></span>---  Queja social</h3>
            </div>  
            ";
        }
    ?>

    <script>
        function mostrarDescripcion(event){

			elemento=event.target.firstChild;

			elemento.classList.remove("invisible");
			elemento.classList.add("visible");
        }
		function quitarDescripcion(event){
			elemento=event.target.firstChild;
			
			elemento.classList.remove("visible");
			elemento.classList.add("invisible");

		}
    </script>
</body>
</html>