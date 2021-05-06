<?php

// Cabecera
function cabecera($distrito,$codigo){
    echo "<h3>Distrito: $distrito </h3><p>Codigo: $codigo </p>";
}

// Pintar mapa
function pintarMapa($distrito){
    echo '<input type="image" name="mimapa" src="./images/' .$distrito. '.gif" alt="Mapa de "' .$distrito. ' alt="Mapa de "' .$distrito. '>';
}

// Guardar queja
function guardarqueja($codigo,$mapa_x,$mapa_y,$sexo,$tipoqueja,$perfil,$descripcion){
    $conexion = new mysqli('localhost','carlos','1234','quejasmadrid');
    if($conexion->connect_errno){
        die("Error al conectar con la base de datos");
    }else{
        $sql="INSERT INTO t_quejas VALUES (
            DEFAULT,
            ".$codigo.",
            ".$mapa_x.",
            ".$mapa_y.",
            '".$sexo."',
            '".$tipoqueja."',
            '".$perfil."',
            '".$descripcion."'
            )";
        
        $conexion->query($sql);

        if($conexion->affected_rows >= 1){
            echo "<section class='mensaje'>
                    <article>
                        <h1>Gracias por enviarnos su queja.</h1>
                        <h3>Reenviando a la pagina principal...</h3>
                        <meta http-equiv='refresh' content='3; url=index.html'> 
                    </article>
                </section>
            ";
            session_destroy();
        }else{
            echo "Error al insertar la fila";
        }
    }
}

// Consulta SQL
function consultaSql($consulta,$codigo,$distrito){
    $conexion = new mysqli('localhost','carlos','1234','quejasmadrid');
    if($conexion->connect_errno){
        die("Error al conectar con la base de datos");
    }else{
        switch($consulta){
            case "sexo":
                porSexo($conexion,$codigo);
                break;
            case "perfil":
                porPerfil($conexion,$codigo);
                break;
            case "mapa":
                porMapa($conexion,$codigo,$distrito);
                break;
            case "edad":
                echo "<h2 style='text-align:center'>Actualmente estamos trabajando en ello.</h2>";
                echo"<meta http-equiv='refresh' content='3; url=http://localhost/carlosmorillo/php/proyectoquejas/index.html'>";
                break;
            default:
                echo "Error en la seleccion";
                break;
        }
    }
}

// Consulta por sexo
function porSexo($conexion,$codigo){
    $sql="SELECT sexo FROM t_quejas WHERE codigo=$codigo";
    /* echo $sql; */
    $resultado=$conexion->query($sql);
    if($resultado->num_rows){
        /* echo "Por sexo"; */
        $hombre=0;
        $mujer=0;
        //Esto comprueba si hay filas, en caso de que retorne que hay mas filas, las pinta, si no, para.
        while($fila= $resultado->fetch_assoc()){
            /* echo $fila['sexo']; */
            if($fila['sexo']=="M"){
                $hombre=$hombre+1;
            }else{
                $mujer=$mujer+1;
            }
        }
        echo "<table>
                <tr align='center'>
                    <td><p class='hombre' style='height:".$hombre."0px'></p></td>
                    <td class='tdmujer'><p class='mujer' style='height:".$mujer."0px'></p></td>
                </tr>
                <tr align='center'>
                    <td><h3>Hombres: $hombre</h3></td>
                    <td><h3>Mujeres: $mujer</h3></td>
                </tr>
            </table>
        ";
    }else{
        echo "No hay datos";
    }
}

// Consulta por perfil
function porPerfil($conexion,$codigo){
    $sql="SELECT perfil FROM t_quejas WHERE codigo=$codigo";
    /* echo $sql; */
    $resultado=$conexion->query($sql);
    if($resultado->num_rows){
        /* echo "Por perfil"; */
        $estudiante=0;
        $trabajador=0;
        $parado=0;
        //Esto comprueba si hay filas, en caso de que retorne que hay mas filas, las pinta, si no, para.
        while($fila= $resultado->fetch_assoc()){
            switch($fila['perfil']){
                case "estudiante":
                    $estudiante=$estudiante+1;
                    break;
                case "trabajador":
                    $trabajador=$trabajador+1;
                    break;
                case "parado":
                    $parado=$parado+1;
                    break;
                default:
                    echo "Error";
            }
        }
        echo "<table>
                <tr align='center'>
                    <td class='tdmujer'><p class='estudiante' style='height:".$estudiante."0px'></p></td>
                    <td class='tdmujer'><p class='trabajador' style='height:".$trabajador."0px'></p></td>
                    <td class='tdmujer'><p class='parado' style='height:".$parado."0px'></p></td>
                </tr>
                    <tr align='center'>
                    <td><h3>Estudiante: $estudiante</h3></td>
                    <td><h3>Trabajador: $trabajador<h3></td>
                    <td><h3>Parado: $parado<h3></td>
                </tr>
            </table>
        ";
    }else{
        echo "No hay datos";
    }
}

// Consulta por mapa
function porMapa($conexion,$codigo,$distrito){
    $sql="SELECT * FROM t_quejas WHERE codigo=$codigo";
    /* echo $sql; */
    $resultado=$conexion->query($sql);
    if($resultado->num_rows){
        $i=1;
        /* echo "Por mapa"; */
        echo "
            <div class='padre'>
                <img src='./images/".$distrito.".gif'>
        ";
        //Esto comprueba si hay filas, en caso de que retorne que hay mas filas, las pinta, si no, para.
        while($fila= $resultado->fetch_assoc()){

            $fila['y']=$fila['y']-24;
            $fila['x']=$fila['x']-8;

            echo "<p
                    onmouseover='mostrarDescripcion(event)'
                    onmouseout='quitarDescripcion(event)'
                    id='".$i."queja' 
                    class='".$fila['tipo']."' 
                    style='top:".$fila['y']."px;left:".$fila['x']."px' 
                    alt='Queja ".$fila['tipo']." | ".$fila['descripcion']." 
                    title='Queja ".$fila['tipo']." | ".$fila['descripcion']." 
                    ><span id='".$i."descripcion' class='invisible'>Tipo de queja - ".$fila['tipo']."<br>Descripcion: " .$fila['descripcion']."</span></p>";
            $i++;
        }
        echo "
            </div>
            ";
    }else{
        echo "No hay datos";
    }
}

// Loguear
function loguear($nombre,$pass){
    $conexion = new mysqli('localhost','carlos','1234','quejasmadrid');
    if($conexion->connect_errno){
        die("Error al conectar con la base de datos");
    }else{
        $sql="SELECT * FROM t_admin WHERE nombre='$nombre' && pass='$pass'";
        $resultado = $conexion->query($sql);
        if($resultado->num_rows){
            while($fila=$resultado->fetch_assoc()){
                if($fila['nombre']==$nombre && $fila['pass']==$pass){
                 echo "<meta http-equiv='refresh' content='0; url=login.php'> ";
                }
            }
        }else{
            echo "
            <section class='mensaje'>
                    <article>
                        <h1>Nombre o contraseña incorrectos.</h1>
                        <h3>Reenviando a la pagina principal...</h3>
                        <meta http-equiv='refresh' content='2; url=login.php'> 
                    </article>
                </section>
            <meta http-equiv='refresh' content='2; url=formadmin.html'> 
            ";
        }
    }
}

// Listar Quejas
function listarQuejas(){
    $conexion = new mysqli('localhost','carlos','1234','quejasmadrid');
    if($conexion->connect_errno){
        die("Error al conectar con la base de datos");
    }else{
        $sql="SELECT * FROM t_quejas";
        $resultado = $conexion->query($sql);
        if($resultado->num_rows){
            echo "    
            <section>
                <article>
                    <h1>Panel de administracion</h1>
                </article>
                <article class='cerrar-sesion'>
                    <a href='logout.php'>Cerrar sesion</a>
                </article>
            </section>
            <table>
            <thead>
                <tr class='cabecera'>
                    <th>Codigo</th>
                    <th>Sexo</th>
                    <th>Tipo</th>
                    <th>Perfil</th>
                    <th>Descripcion</th>
                    <th colspan=2>Acciones</th>
                </tr>
            </thead>
            ";
            $i=0;
            while($fila=$resultado->fetch_assoc()){
                
                $class="";
                ($i%2!=0)?$class="blanco":$class="gris";    
                echo "
                            <tr class='$class'>
                                <td>".$fila['codigo']."</td>
                                <td>".$fila['sexo']."</td>
                                <td>".$fila['tipo']."</td>
                                <td>".$fila['perfil']."</td>
                                <td>".$fila['descripcion']."</td>
                                <td>
                                    <a class='boton-editar' href='formactualizar.php?id=".$fila['id']."'>Editar</a>
                                </td>
                                <td>
                                    <a class='boton-borrar' href='borrarqueja.php?id=".$fila['id']."'>Borrar</a>
                                </td>
                            </tr>
                     ";
                     $i=$i+1;
            }
            echo "</table>

                 ";
        }else{
            echo "No se han encontrado datos";
        }
    }

}

// Borrar Quejas
function borrarQueja($id){
    $conexion = new mysqli('localhost','carlos','1234','quejasmadrid');
    if($conexion->connect_errno){
        die("Error al conectar con la base de datos");
    }else{
        $sql="DELETE FROM t_quejas WHERE id='$id'";
        if ($conexion->query($sql) === TRUE) {
            echo " 
                <section class='mensaje'>
                    <article>
                        <h1>Queja borrada</h1>
                        <h3>Reenviando a la pagina principal...</h3>
                        <meta http-equiv='refresh' content='2; url=login.php'> 
                    </article>
                </section>";
          } else {
            echo "Error deleting record: " . $conexion->error;
          }
    }

}

// Actualizar queja
function actualizarqueja($id,$codigo,$mapa_x,$mapa_y,$sexo,$tipoqueja,$perfil,$descripcion){
    $conexion = new mysqli('localhost','carlos','1234','quejasmadrid');
    if($conexion->connect_errno){
        die("Error al conectar con la base de datos");
    }else{
        $sql="UPDATE t_quejas SET 
        id='".$id."',
        codigo='".$codigo."',
        x='".$mapa_x."',
        y='".$mapa_y."',
        sexo='".$sexo."',
        tipo='".$tipoqueja."',
        perfil='".$perfil."',
        descripcion='".$descripcion."'
        WHERE id=$id";
        /* echo $sql; */
        $conexion->query($sql);

        if($conexion->affected_rows >= 1){
            echo "<section class='mensaje'>
                    <article>
                        <h1>Queja actualizada con los nuevos datos</h1>
                        <h3>Reenviando a la pagina principal...</h3>
                        <meta http-equiv='refresh' content='2; url=login.php'> 
                    </article>
                </section>
            ";
        }else{
            echo "Error al insertar la fila";
        }
    }
}

// Recuperar queja
function recuperarQueja($id){
    $conexion = new mysqli('localhost','carlos','1234','quejasmadrid');
    if($conexion->connect_errno){
        die("Error al conectar con la base de datos");
    }else{
        $sql="SELECT * FROM t_quejas WHERE id='$id'";
        $resultado = $conexion->query($sql);
        if($resultado->num_rows){
            while($fila=$resultado->fetch_assoc()){
                echo "
                <form name='formularioqueja' action='editarqueja.php'>
                            <table>
                            <input type='hidden' name='id' value='".$fila['id']."'>
                            <input type='hidden' name='codigo' value='".$fila['codigo']."'>
                            <input type='hidden' name='mapa_x' value='".$fila['x']."'>
                            <input type='hidden' name='mapa_y' value='".$fila['y']."'>
                                <tr>
                                    <td>Sexo</td>
                                    <td align='right'>";
                if($fila['sexo']=='M'){
                    echo "
                                    <input type='radio' name='sexo' value='M' id='M' checked>
                                    <label for='M'>M</label>
                                    <input type='radio' name='sexo' value='F' id='F'>
                                    <label for='F'>F</label>
                                    </td>
                                </tr>
                         ";
                }else{
                    echo "
                            <input type='radio' name='sexo' value='M' id='M'>
                            <label for='M'>M</label>
                            <input type='radio' name='sexo' value='F' id='F' checked>
                            <label for='F'>F</label>
                            </td>
                            </tr>
                         ";
                }
                switch($fila['tipo']){
                    case "ambiental":
                        echo "
                            <tr>
                                <td>Tipo de queja</td>
                                <td align='right'>
                                    <select name='tipoqueja'>
                                        <option value=''>Seleccione un tipo de queja</option>
                                        <option value='ambiental' selected>Ambiental</option>
                                        <option value='social'>Social</option>
                                        <option value='conflictiva'>Conflictiva</option>
                                    </select>
                                </td>
                            </tr>
                        ";
                        break;
                    case "social":
                        echo "
                            <tr>
                                <td>Tipo de queja</td>
                                <td align='right'>
                                    <select name='tipoqueja'>
                                        <option value=''>Seleccione un tipo de queja</option>
                                        <option value='ambiental'>Ambiental</option>
                                        <option value='social' selected>Social</option>
                                        <option value='conflictiva'>Conflictiva</option>
                                    </select>
                                </td>
                            </tr>
                        ";
                        break;
                    case "conflictiva":
                        echo "
                            <tr>
                                <td>Tipo de queja</td>
                                <td align='right'>
                                    <select name='tipoqueja'>
                                        <option value=''>Seleccione un tipo de queja</option>
                                        <option value='ambiental'>Ambiental</option>
                                        <option value='social'>Social</option>
                                        <option value='conflictiva' selected>Conflictiva</option>
                                    </select>
                                </td>
                            </tr>
                        ";
                        break;
                        default:
                        echo "
                            <tr>
                                <td>Tipo de queja</td>
                                <td align='right'>
                                    <select name='tipoqueja'>
                                        <option value='' selected>Seleccione un tipo de queja</option>
                                        <option value='ambiental'>Ambiental</option>
                                        <option value='social'>Social</option>
                                        <option value='conflictiva'>Conflictiva</option>
                                    </select>
                                </td>
                            </tr>
                        ";
                }
                //
                switch($fila['perfil']){
                    case "estudiante":
                        echo "
                              <tr>
                                    <td>
                                        Perfil
                                    </td>
                                    <td align='right'>
                                    <select name='perfil'>
                                            <option value=''>Seleccione un perfil</option>
                                            <option value='estudiante' selected>Estudiante</option>
                                            <option value='trabajador'>Trabajador</option>
                                            <option value='parado'>En paro</option>
                                        </select>
                                    </td>
                                </tr>
                        ";
                        break;
                    case "trabajador":
                        echo "
                                <tr>
                                    <td>
                                        Perfil
                                    </td>
                                    <td align='right'>
                                    <select name='perfil'>
                                            <option value=''>Seleccione un perfil</option>
                                            <option value='estudiante'>Estudiante</option>
                                            <option value='trabajador' selected>Trabajador</option>
                                            <option value='parado'>En paro</option>
                                        </select>
                                    </td>
                                </tr>
                        ";
                        break;
                    case "parado":
                        echo "
                                <tr>
                                    <td>
                                        Perfil
                                    </td>
                                    <td align='right'>
                                    <select name='perfil'>
                                            <option value=''>Seleccione un perfil</option>
                                            <option value='estudiante'>Estudiante</option>
                                            <option value='trabajador'>Trabajador</option>
                                            <option value='parado' selected>En paro</option>
                                        </select>
                                    </td>
                                </tr>
                        ";
                        break;
                        default:
                        echo "
                              <tr>
                                    <td>
                                        Perfil
                                    </td>
                                    <td align='right'>
                                    <select name='perfil'>
                                            <option value='' selected>Seleccione un perfil</option>
                                            <option value='estudiante'>Estudiante</option>
                                            <option value='trabajador'>Trabajador</option>
                                            <option value='parado'>En paro</option>
                                        </select>
                                    </td>
                                </tr>
                        ";
                }
                //
                echo "
                        <tr>
                            <td colspan='2'>
                                <label>Descripcion:</label>
                                <br>
                                <textarea name='descripcion' id='descripcion' cols='30' rows='10'>".$fila['descripcion']."</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan='2' align='center'>
                                <input class='boton' type='button' value='Enviar Queja' onclick='enviarDatos()'>
                            </td>
                        </tr>
                    </table>
                </form>
                ";
            }
        }else{
            echo "No se han encontrado datos";
        }
    }
}

// Queja
function queja(){
    echo "
        <form name='formularioqueja' action='guardarqueja.php'>
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
        ";
}
?>
