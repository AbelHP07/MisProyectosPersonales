<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ej 5</title>
</head>
<body style="font-family:'Comic Sans Ms'">
    <form action="../2_controlador/repaso5.php" method="post">

        <p><label fro="tec">Teclado: </label>
        <input type="text" name="producto[teclado]" id="tec" placeholder="Escribe aqu&iacute;"></p>

        <p><label fro="rat">Rat&oacute;n: </label>
        <input type="text" name="producto[raton]" id="rat" placeholder="Escribe aqu&iacute;"></p>

        <p><label fro="screen">Pantalla: </label>
        <input type="text" name="producto[pantalla]" id="screen" placeholder="Escribe aqu&iacute;"></p>

        <p><button type="submit">Calcular IVA</button></p>

    </form>

<hr>

<?php

session_start();

if (!empty($_SESSION["errores"])) {

    echo "<h2 style='color:red'>Errores:</h2>";
    echo "<ul style='color:red'>";

    foreach ($_SESSION["errores"] as $obj=>$er) {

        echo "<li>El precio del producto " . $obj . " " . $er . "</li>";

    }

    echo "</ul>";

    unset($_SESSION["errores"]);
    unset($_SESSION["resultados"]);

} elseif (!empty($_SESSION["resultados"])) {

    echo "<h2 style='color:green'>Resultados:</h2>";
    echo "<ul style='color:green'>";

    foreach ($_SESSION["resultados"] as $objeto=>$euros) {

        echo "<li>El objeto " . $objeto . " tiene, como precio final (con IVA): " . $euros . "</li>";

    }

    echo "</ul>";

    unset($_SESSION["errores"]);
    unset($_SESSION["resultados"]);

}






















?>