<?php
session_start();

/*Incluimos el archivo de conexión a la base de datos para poder realizar las consultas*/
include_once "../CONEXION/conexion.php";

/*Obtenemos el id y el nombre de las clases existentes*/
$sql="SELECT id,nombre FROM curso";
$resultado=mysqli_query($c,$sql);

/*Si falla la consulta, devuelve error, sino, se guarda en la variable $fila para usarla posteriormente en el formulario*/
if(!$resultado){
     die("Error: ".mysqli_error());
}else{
    $fila=[];
    while($filas=mysqli_fetch_assoc($resultado)){
        $fila[]=$filas;
    }
};
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <title>Colegio</title>
</head>
<body>
    <?php
    /*Inicializamos las variables*/
    $sql="";
    $stmt="";
    /*Si se pulsa el botón de editar alumno, se recogen los datos almacenados en el respectivo alumno*/
    if(isset($_GET["editar_alumno"])){
        /*Realizamos la consulta para obtener el nombre del alumno y el id del curso en el que está matriculado*/
        $sql="SELECT a.nombre AS 'Alumno', c.id AS 'Curso'
        FROM alumno a INNER JOIN curso c ON a.id_curso = c.id WHERE a.id = ?";
        /*Con la consulta preparada, podemos añadir el id del alumno para así seleccionar cuál editamos*/
        $stmt=mysqli_prepare($c,$sql);
        mysqli_stmt_bind_param($stmt,"i",$_GET["editar_alumno"]);
        mysqli_stmt_execute($stmt);
        $resultado=mysqli_stmt_get_result($stmt);
        $datos_alumno=mysqli_fetch_assoc($resultado);
        /*Guardamos el nombre y el id (reitero, del curso)*/
        $alumno=$datos_alumno["Alumno"];
        $curso=$datos_alumno["Curso"];
        /*Aquí, si le damos al botón de enviar después de recibir por get el id del alumno,
        ejecutamos una sentencia sql para actualizar los datos*/
        $sql="";
        if(isset($_POST["enviar"])){
            $sql="UPDATE alumno SET
            nombre = ?,
            id_curso = ?
            WHERE id = ?";
            $stmt=mysqli_prepare($c,$sql);
            mysqli_stmt_bind_param($stmt,"sii",$_POST["nuevo_alumno"],$_POST["aula"],$_GET["editar_alumno"]);
            mysqli_stmt_execute($stmt);
            /*Redireccionamos a la misma página*/
            /*También podría ser header("Location: gestion.php") donde solo cambiaría que le especifico el nombre del archivo
            pero al ser el mismo, funciona igual*/
            header("Location:".$_SERVER['PHP_SELF']);
            exit;
        }
    }
    /*Como usamos más de una vez las variables, las volvemos a inicializar*/
    $sql="";
    $stmt="";
    /*Si recibimos el id del alumno a eliminar por GET, preparamos y ejecutamos la consulta de borrado*/
    if(isset($_GET["eliminar_alumno"])){
        $sql="DELETE FROM alumno WHERE id = ?";
        $stmt=mysqli_prepare($c,$sql);
        mysqli_stmt_bind_param($stmt,"i",$_GET["eliminar_alumno"]);
        mysqli_stmt_execute($stmt);
        $_SESSION["mensaje"]="Alumno eliminado exitosamente";

        header("Location: gestion_total.php");
        exit();
    }
    /*Si recibimos el id de la asignatura a eliminar, procedemos con su borrado*/
    if(isset($_GET["eliminar_asignatura"])){
        $sql="DELETE FROM curso WHERE id = ?";
        $stmt=mysqli_prepare($c,$sql);
        mysqli_stmt_bind_param($stmt,"i",$_GET["eliminar_asignatura"]);
        mysqli_stmt_execute($stmt);
        /*El error 1451 indica una violación de la restricción de la clave foránea, es decir, hay alumnos matriculados en este curso*/
        if(mysqli_errno($c)==1451){
            $_SESSION["mensaje"]="No se ha podido eliminar la asignatura porque hay alumnos matriculados";
        }else{
            $_SESSION["mensaje"]="Asignatura eliminada exitosamente";
        }

        header("Location: gestion_total.php");
        exit();
    }
    ?>
    <form action="" method="POST">
        <strong>Insertar un nuevo alumno</strong><br><br>
        <label for="na">Nombre: </label>
        <input type="text" id="na" name="nuevo_alumno"
        value="<?php echo isset($alumno)&&$alumno!=='' ? $alumno : ''?>"><br><br>
        <label for="aula">Selecciona el aula: </label>
        <select name="aula" id="aula">
            <?php foreach($fila as $curso_disponible): ?>
            <option value="<?php echo $curso_disponible["id"]?>" <?php echo (isset($curso) && $curso == $curso_disponible["id"]) ? 'selected' : ''; ?>><?php echo $curso_disponible["nombre"]?></option>
            <?php endforeach; ?>
        </select><br><br>
        <button type="submit" name="enviar">Enviar</button><br><br>
        <?php
        /*Mostramos los mensajes guardados en la sesión (éxitos o errores) y luego los eliminamos para que no persistan*/
        if(isset($_SESSION["mensaje"])&&$_SESSION["mensaje"]!==""){
            echo "<h3>".$_SESSION["mensaje"]."</h3>";
            unset($_SESSION["mensaje"]);
        }
        ?>
    </form>
        <?php
        $nombre="";
        $aula="";
        /*Si se pulsa enviar y no estamos en modo edición, procedemos a insertar el nuevo alumno*/
        if(isset($_POST["enviar"])&&!isset($_GET["editar_alumno"])){
            $nombre=$_POST["nuevo_alumno"];
            $aula=$_POST["aula"];

            /*Comprobamos previamente si el alumno ya existe en esa misma clase para evitar duplicados*/
            $sql="SELECT nombre, id_curso FROM alumno WHERE nombre LIKE ? AND id_curso = ?";
            $stmt=mysqli_prepare($c,$sql);
            mysqli_stmt_bind_param($stmt,"si",$nombre,$aula);

            mysqli_stmt_execute($stmt);

            $resultado=mysqli_stmt_get_result($stmt);

            mysqli_stmt_close($stmt);

            /*Si la consulta devuelve resultados, el alumno ya está registrado en ese curso y detenemos la ejecución*/
            if(mysqli_num_rows($resultado)>0){
                die("El alumno ya se encuentra asignado a una clase");
            }

            /*Preparamos la consulta de inserción con los datos validados del formulario*/
            $insertar="INSERT INTO alumno (nombre,id_curso) VALUES (?,?)";
            $stmt=mysqli_prepare($c,$insertar);
            mysqli_stmt_bind_param($stmt, "si", $nombre, $aula);

             if(mysqli_stmt_execute($stmt)){
                echo "Alumno insertado correctamente";
            }else{
                die("No se han podido insertar los datos del alumno");
            }

            mysqli_stmt_close($stmt);

            header("Location:".$_SERVER['PHP_SELF']);
        }
        ?>
        <hr>
        <?php
            $sql="";
            /*Realizamos un INNER JOIN para listar todos los alumnos junto al nombre del curso en el que están matriculados*/
            $sql="SELECT a.nombre AS 'Alumno', a.id AS 'ID', c.nombre AS 'Curso'
            FROM alumno a INNER JOIN curso c ON a.id_curso = c.id ORDER BY Alumno";
            $stmt=mysqli_prepare($c,$sql);
            mysqli_stmt_execute($stmt);
            $resultados=mysqli_stmt_get_result($stmt);
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                    echo "<th>Alumno</th>";
                    echo "<th>Curso</th>";
                    echo "<th>Opciones</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                /*Recorremos los resultados de la consulta para generar dinámicamente las filas de la tabla de alumnos*/
                while($filas=mysqli_fetch_assoc($resultados)){
                    echo "<tr>";
                    echo "<td>".$filas["Alumno"]."</td>";
                    echo "<td>".$filas["Curso"]."</td>";
                    echo "<td><a href='gestion_total.php?editar_alumno=".$filas["ID"]."'>Editar</a>//
                    <a href='gestion_total.php?eliminar_alumno=".$filas["ID"]."' onclick=\"return confirm('¿Estás seguro de que quieres eliminar a este alumno?');\">Eliminar</a></td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";

                echo "<br><br>";

                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                    echo "<th>Curso</th>";
                    echo "<th>Aula</th>";
                    echo "<th>Opciones</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                /*Obtenemos y listamos los datos de todos los cursos disponibles para la segunda tabla*/
                $sql="SELECT nombre, id, aula FROM curso";
                $resultados=mysqli_query($c,$sql);

                /*Recorremos los resultados para construir la tabla de cursos con sus opciones de eliminación*/
                while($asignatura=mysqli_fetch_assoc($resultados)){
                    echo "<tr>";
                    echo "<td>".$asignatura["nombre"]."</td>";
                    echo "<td>".$asignatura["aula"]."</td>";
                    echo "<td><a href='gestion_total.php?eliminar_asignatura=".$asignatura["id"]."' onclick=\"return confirm('¿Estás seguro de que quieres eliminar este curso?');\">Eliminar</a></td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";

            mysqli_stmt_close($stmt);
        ?>
</body>
</html>