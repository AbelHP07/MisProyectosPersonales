<?php

session_start();
require_once '..\3_modelo\Ej4(3Ay3B)vali.php';

//Número máximo de intentos = 3

$max_intentos=3;

//Si el número de intentos es igual o supera a 3
//Te dice lo de abajo y te impide volver a logearte

if ($_SESSION["intentos_login"] >= $max_intentos) {
    $resultado= "<h2>Acceso bloqueado</h2>/nHas superado el número máximo de intentos ($max_intentos)./nCierra el navegador o borra las cookies para volver a intentar.";
    exit;
}

if (!isset($_POST["user"])) {

    $_SESSION["error"] = "No se recibi&oacute un usuario.";
    header("Location: ../1_vista/ej1_formulario.php");
    exit;
}

$_SESSION['user']=limpiar($_POST["user"]);

if (!isset($_POST["rol"])) {

    $_SESSION["error"] = "No se recibi&oacute un rol.";
    header("Location: ../1_vista/ej1_formulario.php");
    exit;
}

$_SESSION['rol']=validar_rol($_POST["rol"]);

if (!isset($_POST["password"])) {

    $_SESSION["error"] = "No se recibi&oacute una contraseña.";
    header("Location: ../1_vista/ej1_formulario.php");
    exit;
}

$_SESSION['password']=limpiar($_POST["password"]);

$password_correcta='1234';

if ($password===$password_correcta) {

    $_SESSION["intentos_login"]=0;
    $_SESSION['resultado']="<h2>Login correcto</h2>/nBienvenido, <b>$user</b>./nRol: <b>$rol</b>/n$permisos";
} else {

    $_SESSION["intentos_login"]++;
    $_SESSION['resultado']= "<h2>Login incorrecto</h2>/nContraseña incorrecta./nIntentos usados: " . $_SESSION["intentos_login"] . " de $max_intentos.";

    if ($_SESSION["intentos_login"] >= $max_intentos) {

        $_SESSION['resultado']= "<p><b>Has superado el número máximo de intentos.</b></p>";
    } else {

        $_SESSION['resultado']= "<p><a href='Ej4(3Ay3B)PHP.html'>Volver al formulario</a></p>";
    }
}

header("Location: ../1_vista/Ej4(3Ay3B)form.php");
exit

?>