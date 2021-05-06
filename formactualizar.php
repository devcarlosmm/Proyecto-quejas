<?php
include 'funciones.php';
session_start();
if($_SESSION['nombre'] && $_SESSION['pass']){
    if($_GET['id']){
        $id=$_GET['id'];
        echo "
        <section>
            <article>
                <h1>Formulario de edicion de queja</h1>
            </article>
        </section>
        ";
        recuperarQueja($id);
    }else{
       echo "<p>Id no seleccionado</p>
            <meta http-equiv='refresh' content='1; url=login.php'>
            ";
    }
}else{
    echo "<p>No se ha logueado correctamente</p>
    <meta http-equiv='refresh' content='1; url=formadmin.html'>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de queja</title>
    <style>
        .top{
            display:flex;
            flex-wrap: wrap;
            margin-bottom:10px;
            color:whitesmoke;
        }
        .margeni{
            width:69%;
        }
        .margend{
            width:25%;
            background-color:steelblue;
            padding: 0px 3%;
            letter-spacing: 3px;
        }
        table{
            background:steelblue;
            margin:auto;
            padding:3%;
        }
        table{
            font-size:120%;
            color:whitesmoke;
            border-spacing: 0 15px;
        }
        .titulo{
            background:whitesmoke;
            text-align:center;
            padding:12px 20px;
            border-radius:2px;
            color:black;
        }
        textarea{
            width:100%;
            margin-top: 15px;
        }
        .boton{
            width:100%;
            padding:10px;
        }
        h1{
            text-align: center;
            background: steelblue;
            color: whitesmoke;
            padding: 20px;
        }
    </style>
</head>
<body>
    
            <script>
                function enviarDatos(){
                    sexo = document.formularioqueja.sexo.value;
                    tipoQueja=document.formularioqueja.tipoqueja.value;
                    perfil=document.formularioqueja.perfil.value;
                    descripcion=document.formularioqueja.descripcion.value;
                    console.log(sexo,tipoQueja,perfil,descripcion);
                    if(sexo=="" || tipoQueja=="" || perfil=="" || descripcion==""){
                        alert("Al menos un campo esta vacio, por favor, rellene los campos");
                    }else{
                        document.formularioqueja.submit();
                    }
                }
            </script>
</body>
</html>