<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Precio producto</title>
</head>
<body>

    <h2>Introduzca los precios a calcular</h2>

    <form action="../2_controlador/ej5_controlador.php" method="post">

        <p><label for="tec">Teclado:</label>
        <input type="text" name="productos[teclado]" id="tec" placeholder="Escribe aquí"><p>

        <p><label for="rat">Ratón:</label>
        <input type="text" name="productos[raton]" id="tec" placeholder="Escribe aquí"><p>

        <p><label for="screen">Pantalla:</label>
        <input type="text" name="productos[pantalla]" id="screen" placeholder="Escribe aquí"><p>

        <button type="submit">Calcular IVA</button>

    </form>

<hr>

<?php

session_start();

if (!empty($_SESSION["errores"])) {


    echo "<h2 style='color:red'>ERRORES</h2>";
    echo "<ul style='color:red'>";

    foreach ($_SESSION["errores"] as $er) {

        echo "<li>" . $er . "</li>";

    }

    echo "</ul>";

    unset($_SESSION["errores"]);
    unset($_SESSION["resultados"]);

} elseif (!empty($_SESSION["resultados"])) {

    echo "<p>" . $_SESSION["resultados"]["teclado"] . "</p>";
    echo "<p>" . $_SESSION["resultados"]["raton"] . "</p>";
    echo "<p>" . $_SESSION["resultados"]["pantalla"] . "</p>";

    unset($_SESSION["errores"]);
    unset($_SESSION["resultados"]);

}

?>

</body>
</html>