<?php
include 'funciones.php';
    session_start();
    if($_SESSION['distrito'] && $_SESSION['codigo']){
        $distrito=$_SESSION['distrito'];
        $codigo=$_SESSION['codigo'];
        echo "
        <section class='top'>
            <article class='margeni'></article>
            <article class='margend'>";
            cabecera($distrito,$codigo);
        echo "
            </article>
        </section>
        <section>
                <article>
                <h1>Marcar y Consultar</h1>
                </article>
        </section>
        ";
    }else{
        echo "
        <section class='mensaje'>
            <article>
                <h1>No se ha seleccionado distrito o codigo</h1>
                <h3>Reenviando a la pagina principal...</h3>
                <meta http-equiv='refresh' content='2; url=index.html'> 
            </article>
        </section>
        ";
    }

    if($_GET['mimapa_x'] && $_GET['mimapa_y']){
        $mapa_x=$_GET['mimapa_x'];
        $mapa_y=$_GET['mimapa_y'];
    }else{
        $mapa_x=$_POST['mimapa_x'];
        $mapa_y=$_POST['mimapa_y'];
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

        <form name='formularioqueja' action='guardarqueja.php'>
<input type='hidden' name='id' value='".$fila['id']."'>

            <input type="hidden" name="codigo" value="<?php echo $codigo?>">
            <input type="hidden" name="mapa_x" value="<?php echo $mapa_x?>">
            <input type="hidden" name="mapa_y" value="<?php echo $mapa_y?>"> 
            <table>
                <tr>
                    <td>Sexo</td>
                    <td align='right'>
                        <input type='radio' name='sexo' value='M' id='M' checked>
                        <label for='M'>M</label>
                        <input type='radio' name='sexo' value='F' id='F'>
                        <label for='F'>F</label>
                    </td>
                </tr>
                <tr>
                    <td>Tipo de queja</td>
                    <td align='right'>
                        <select name='tipoqueja'>
                            <option value=''>Seleccione un tipo de queja</option>
                            <option value='ambiental'>Ambiental</option>
                            <option value='social'>Social</option>
                            <option value='conflictiva'>Conflictiva</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Perfil
                    </td>
                    <td align='right'>
                        <select name='perfil'>
                            <option value=''>Seleccione un perfil</option>
                            <option value='estudiante'>Estudiante</option>
                            <option value='trabajador'>Trabajador</option>
                            <option value='parado'>En paro</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <label>Descripcion:</label>
                        <br>
                        <textarea name='descripcion' id='descripcion' cols='30' rows='10'></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan='2' align='center'>
                        <input class='boton' type='button' value='Enviar Queja' onclick='enviarDatos()'>
                    </td>
                </tr>
            </table>
        </form>

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