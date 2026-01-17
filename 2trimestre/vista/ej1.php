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

echo "<div id='er'>";

echo $er;

echo "</div>";

unset($_SESSION["errores"]);
unset($_SESSION["resultados"]);
unset($_SESSION["numeros"]);

} elseif(!empty($_SESSION["resultados"])){

$ran=$_SESSION["numeros"]["random"];

echo "<div id='num'>";

echo $ran;

echo "</div>";

unset($_SESSION["errores"]);
unset($_SESSION["resultados"]);
unset($_SESSION["numeros"]);
unset($ran);

}

?>

</body>
</html>