<?php

session_start();

$resultado=$_SESSION['resultado'];
$user=$_SESSION['user'];
$rol=$_SESSION['rol'];

//Esto logra contar cuántas veces se ha iniciado sesión
//sin importar si te sales y vuelves a entrar

if (!isset($_SESSION["intentos_login"])) {
    $_SESSION["intentos_login"] = 0;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Simple</title>
</head>
<body>
    <h2>Login simulado</h2>
    <form action="../2_controlador/Ej4(3Ay3B)contro.php" method="post">
        
        <p><label for="user">Usuario:</label>
        <input type="text" name="user" id="user" pattern="[A-Z][a-z]*"></p>

        <p><label for="password">Contraseña:</label>
        <input type="password" name="password" id="password"></p>

        <p><label>Rol:</label>
        <select name="rol">
            <option value="admin">Admin</option>
            <option value="user">User</option>
            <option value="invitado">Invitado</option>
        </select></p>

        <button type="submit">Iniciar sesión</button>
    </form>
</body>

<hr>

<?php

echo $resultado;
echo '<h2>Hola,' . $user . '</h2>';
echo '<p>Tiene acceso de ' . $rol . '</p>';
echo '<p>Un placer contar con usted un d&iacutea m&aacutes</p>';
?>
</html>