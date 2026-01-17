<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset="UTF-8>">
    <title>Ej 1</title>
    <link rel="stylesheet" href="ej1.css">
</head>
<body>
    <p><form action="../controlador/ej1.php" method="post">
        <label>Cuando pulses, se generar&aacute;n 10 n&uacute;meros aleatorios </label>
        <button type='submit' name="boton_pulsado">Generar</button>
    </form></p>

<hr>

<?php

session_start();

if(!empty($_SESSION["errores"])){

foreach($_SESSION["errores"] as $er)

echo "<div class='er'>";

echo "<ul>";

foreach($_SESSION["errores"] as $er){

echo "<li>" . $er . ", </li>";

}

echo "</ul>";

echo "</div>";

unset($_SESSION["errores"]);
unset($_SESSION["resultados"]);
unset($_SESSION["numeros"]);
unset($ran);
unset($_SESSION["ordenados"]);

} elseif(!empty($_SESSION["resultados"])){

echo "<div class='num'>";

echo "<ul>";

foreach($_SESSION["numeros"] as $num){

echo "<li>" . $num . ", </li>";

}

echo "</ul>";

echo "<hr>";

echo "<ul>";

foreach($_SESSION["num_ordenados"] as $ord){

echo "<li>" . $ord . ", </li>";

}

echo "</ul>";

echo "</div>";

unset($_SESSION["errores"]);
unset($_SESSION["resultados"]);
unset($_SESSION["numeros"]);
unset($ran);
unset($_SESSION["num_ordenados"]);

}

?>

</body>
</html>