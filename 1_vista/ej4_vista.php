
<?php

session_start();

if (!empty($_SESSION["limite_intentos"])) {

    echo $_SESSION["limite_intentos"];

    unset($_SESSION["intentos_login"]);

    exit;

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login Simulado</h2>
    <form action="../2_controlador/ej4_controlador.php" method="post">
        
        <p><label for="nom">Nombre: </label>
        <input type="text" name="nombre" id="nom" placeholder="Escriba aquí"></p>

        <p><label for="pass">Contraseña: </label>
        <input type="password" name="password" id="pass" placeholder="Escriba aquí"></p>

        <p><label>Rol: </label>
        <select name="rol">
            <option value="">--Selecciona--</option>
            <option value="admin">--Admin--</option>
            <option value="moder">--Moderador--</option>
            <option value="user">--Usuario--</option>
        </select></p>
        <button type="submit">Comprobar login</button>
    </form>

<?php

if (!empty($_SESSION["errores"])) {

    echo "<h2 style='color:red'>Errores:</h2>";

    echo "<ul>";

    foreach ($_SESSION["errores"] as $er) {

        echo "<li style='color:red'>" . $er . "</li>";

    }

    echo "</ul>";

    unset ($_SESSION["errores"]);
    unset($_SESSION["resultados"]);

} elseif (!empty($_SESSION["error_contraseña"])) {

    $_SESSION["intentos_login"]++;

    echo "<p style='color:orange'>" . $_SESSION["error_contraseña"] . "</p>";

    unset ($_SESSION["errores"]);
    unset($_SESSION["resultados"]);
    unset ($_SESSION["error_contraseña"]);

} elseif (!empty($_SESSION["resultados"])) {

    echo "<p style='color:green'>" . $_SESSION["resultados"]["nombre"] . "</p>";
    echo "<p style='color:green'>" . $_SESSION["resultados"]["rol"] . "</p>";
    echo "<p style='color:green'>" . $_SESSION["resultados"]["password"] . "</p>";

    unset ($_SESSION["errores"]);
    unset($_SESSION["resultados"]);
    unset($_SESSION["intentos_login"]);

}

?>

</body>
</html>