<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Edad</title>
</head>
<body>

    <h2>Ingrese las edades</h2>

    <form action="../2_controlador/ej6_controlador.php" method="post">

        <p><label for="edad1">Edad 1</label>
        <input type="text" name="edad[]" id="edad1" placeholder="Escribe aquí"></input></p>

        <p><label for="edad2">Edad 2</label>
        <input type="text" name="edad[]" id="edad2" placeholder="Escribe aquí"></input></p>

        <p><label for="edad3">Edad 3</label>
        <input type="text" name="edad[]" id="edad3" placeholder="Escribe aquí"></input></p>

        <p><label for="edad4">Edad 4</label>
        <input type="text" name="edad[]" id="edad4" placeholder="Escribe aquí"></input></p>

        <p><label for="edad5">Edad 5</label>
        <input type="text" name="edad[]" id="edad5" placeholder="Escribe aquí"></input></p>

        <button type="submit">Hacer historiograma</button>

    </form>

<hr>

<?php

session_start();

if (!empty($_SESSION["errores"])) {

    echo "<h2 style='color:red'>ERROR</h2>";
    echo "<ul style='color:red'>";

    foreach ($_SESSION["errores"] as $error) {

        echo "<li>" . $error . "</li>";

    }

    echo "</ul>";

    unset($_SESSION["errores"]);
    unset($_SESSION["resultados"]);

} elseif (!empty($_SESSION["resultados"])) {

    echo "<h2 style='color:green'>RESULTADOS</h2>";
    echo "<ul style='color:green'>";

    foreach ($_SESSION["resultados"] as $indice=>$result) {

        echo "<li>" . $indice . " " . $result . "</li>";

    }

}

?>

</body>
</html>