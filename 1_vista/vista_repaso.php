<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hola</title>
</head>
<body style="font-family:'Comic Sans Ms'">
    <form action="../2_controlador/controlador_repaso.php" method="post">

        <p><label for="ed1">Edad 1</label>
        <input type="text" name="edad[]" id="ed1" placeholder="Escriba aqu&iacute;"></input></p>

        <p><label for="ed2">Edad 2</label>
        <input type="text" name="edad[]" id="ed2" placeholder="Escriba aqu&iacute;"></input></p>

        <p><label for="ed3">Edad 3</label>
        <input type="text" name="edad[]" id="ed3" placeholder="Escriba aqu&iacute;"></input></p>

        <p><label for="ed4">Edad 4</label>
        <input type="text" name="edad[]" id="ed4" placeholder="Escriba aqu&iacute;"></input></p>

        <p><label for="ed5">Edad 5</label>
        <input type="text" name="edad[]" id="ed5" placeholder="Escriba aqu&iacute;"></input></p>

        <p><button type="submit">Comprobar</button></p>

    </form>

<hr>

<?php

session_start();

if (!empty($_SESSION["errores"])) {

    echo "<h2 style='color:red'>Errores</h2>";
    echo "<ul style='color:red';font-size:15px;>";

    foreach ($_SESSION["errores"] as $er) {

        echo "<li>" . $er . "</li>";

    }

    echo "</ul>";

    unset($_SESSION["errores"]);
    unset($_SESSION["resultados"]);

} elseif (!empty($_SESSION["resultados"])) {

echo "<h2 style='color:green'>Resultados</h2>";
    echo "<ul style='color:green';font-size:15px;>";

    foreach ($_SESSION["resultados"] as $result=>$val) {

        echo "<li>Edad número " . $result . ": " . $val . "</li>";

    }

    echo "</ul>";

    unset($_SESSION["errores"]);
    unset($_SESSION["resultados"]);

}

?>

</body>
</html>