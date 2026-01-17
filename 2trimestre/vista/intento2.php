<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ej2</title>
    <link rel="stylesheet" href="../CSS/intento2.css">
</head>
<body>
    <form action="../controlador/intento2.php" method="post">
        <label>Pulsa para generar 10 n&uacute;meros aleatorios</label>
        <button type="submit" name="generado" value="pulsado" class="boton">Generar</button>
    </form>

<hr>

<?php

session_start();

if(!empty($_SESSION["errores"])){

echo "<div class='mal'>";

foreach($_SESSION["errores"] as $er){

echo "<ul>";

echo "<li>" . $er . "</li>";

echo "</ul>";

echo "</div>";

unset($_SESSION["errores"]);
unset($_SESSION["resultados"]);
unset($_SESSION["numeros"]);
unset($_SESSION["ordenados"]);

}



} elseif(!empty($_SESSION["resultados"])){

echo "<div class='bien'>";

echo "<p>Aquí tienes, tus 10 números aleatorios: ";

echo implode(", ", $_SESSION["numeros"]);

echo "</p>";

echo "<p>";

echo "-------------------------------------------";

echo "</p>";

echo "<p>Aquí se encuentran los números ordenados de mayor a menor: ";

echo implode(", ", $_SESSION["may_men"]);

echo "</p>";

echo "-------------------------------------------";

echo "<p>Aquí se encuentran los números ordenados de menor a mayor: ";

echo implode(", ", $_SESSION["men_may"]);

echo "</p>";

echo "</div>";

unset($_SESSION["errores"]);
unset($_SESSION["resultados"]);
unset($_SESSION["numeros"]);
unset($_SESSION["ordenados"]);

}

/* Lo conseguí */


?>

</body>
</html>