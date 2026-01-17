<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ej 8</title>
</head>
<body>
    <form action="../2_controlador/ej8_controlador.php" method="post">

        <p><label for="c1">Cadena 1</label>
        <input type="text" name="cadenas[]" id="c1" placeholder="Escribe aqu&iacute;"></input></p>

        <p><label for="c2">Cadena 2</label>
        <input type="text" name="cadenas[]" id="c2" placeholder="Escribe aqu&iacute;"></input></p>

        <p><label for="c3">Cadena 3</label>
        <input type="text" name="cadenas[]" id="c3" placeholder="Escribe aqu&iacute;"></input></p>

        <p><label for="c4">Cadena 4</label>
        <input type="text" name="cadenas[]" id="c4" placeholder="Escribe aqu&iacute;"></input></p>

        <p><label for="c5">Cadena 5</label>
        <input type="text" name="cadenas[]" id="c5" placeholder="Escribe aqu&iacute;"></input></p>

        <p><button type="submit">Mandar cadenas</button></p>

    </form>

<?php

session_start();

if (!empty($_SESSION["errores"])) {

    echo "<ul>";

    foreach ($_SESSION["errores"] as $er) {

        echo "<li>" . $er . "</li>";

    }

    echo "</ul>";

    unset($_SESSION["errores"]);
    unset($_SESSION["resultados"]);

} elseif (!empty($_SESSION["resultados"])) {

    echo "<ul>";

    foreach ($_SESSION["resultados"] as $result) {

        echo "<li>" . $result . "</li>";

    }

    echo "</ul>";
    
    unset($_SESSION["errores"]);
    unset($_SESSION["resultados"]);

}

?>

</body>
</html>