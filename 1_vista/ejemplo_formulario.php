<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo MVC</title>
</head>
<body>

    <h2>Ejemplo con nombre y edad</h2>
    <form action="../2_controlador/ejemplo_procesar.php" method="post">
        <p><label for="nom">Nombre: </label>
        <input type="text" name="nombre" id="nom" placeholder="Escribe aqu&iacute;"></p>
        <label for="ed">Edad: </label>
        <input type="text" name="edad" id="ed" placeholder="Escribe aqu&iacute;"></p>
        <button>Enviar datos</button>
    </form>

    <hr>

    <?php 
    session_start();
    if (!empty($_SESSION["errores"])) {
        echo "<h2 style='color:red'>Errores:</h2>";
        echo "<ul style='color:green'>";
        foreach ($_SESSION["errores"] as $mostrar) {
            echo "<li>" . $mostrar . "</li>";
        }
        echo "</ul>";
        unset($_SESSION["errores"]);
        unset($_SESSION["resultados"]);
    } elseif (!empty($_SESSION["resultados"])) {
        echo "<h2 style='color:blue'>Resultados:</h2>";
        echo "<p style='color:orange'>Nombre: " . $_SESSION["resultados"]["nombre"] . "</p>";
        echo "<p style='color:orange'>Edad: " . $_SESSION["resultados"]["edad"] . "</p>";
        unset($_SESSION["resultados"]);
        unset($_SESSION["errores"]);
    }
?>
</body>

</html>
