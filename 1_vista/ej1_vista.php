<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ej 1</title>
</head>
<body>
    <h2>Login</h2>
    <form action="../2_controlador/ej1_controlador.php" method="post">

        <p><b><label for="nom">Nombre: </label></b>
        <input type="text" name="nombre" id="nom" placeholder="Escriba aqu&iacute"></p>

        <p><b><label for="em">Email: </label></b>
        <input type="text" name="email" id="em" placeholder="Escriba aqu&iacute"></p>

        <p><b><label for="ed">Edad: </label></b>
        <input type="text" name="edad" id="ed" placeholder="Escriba aqu&iacute"></p>

        <p><b><label>Cursos: </label></b></p>
        <input type="checkbox" name="cursos[]" value="PHP" id="p"><label for="p">PHP</label><br>
        <input type="checkbox" name="cursos[]" value="JavaScript" id="j"><label for="j">JavaScript</label><br>
        <input type="checkbox" name="cursos[]" value="Bases de datos" id="b"><label for="b">Bases de datos</label><br>
        <input type="checkbox" name="cursos[]" value="HTML y CSS" id="h"><label for="h">HTML y CSS</label><br>

        <p><button type="submit">Aceptar</button></p>
    </form>

<hr>

<?php

session_start();

if (!empty($_SESSION["errores"])) {

    echo "<h2 style='color:red'>Errores:</h2>";
    echo "<ul style='color:red'>";
    echo "<ul>";

    foreach ($_SESSION["errores"] as $mostrar) {

        echo "<li>" . $mostrar . "</li>";

    }
    echo "</ul>";
    unset($_SESSION["errores"]);
    unset($_SESSION["resultados"]);
    unset($_SESSION["cursos"]);



} elseif (!empty($_SESSION["resultados"])) {

    echo "<h2 style='color:green'>Resultados:</h2>";
    echo "<ul style='color:green'>";
    
    echo "<p>Nombre: " . $_SESSION["resultados"]["nombre"] . "</p>";
    echo "- - - - - - - - - - - - - - - - - - - -";
    echo "<p>Email: " . $_SESSION["resultados"]["email"] . "</p>";
    echo "- - - - - - - - - - - - - - - - - - - -";
    echo "<p>Edad: " . $_SESSION["resultados"]["edad"] . "</p><hr>";

    if (!empty($_SESSION["cursos"])) {

        echo "<p style='color:orange'>Cursos seleccionados:</p>";
        echo "<ul style='color:orange'>";
        echo "<ul>";

        foreach ($_SESSION["cursos"] as $mostrar) {

            echo "<li>" . $mostrar . "</li>";

        }
        echo "</ul>";

    } else {

        echo "<p style='color:green'>No se ha seleccionado ning&uacuten curso (por voluntad propia)</p>";

    }

    unset($_SESSION["errores"]);
    unset($_SESSION["resultados"]);
    unset($_SESSION["cursos"]);


}
?>

</body>
</html>