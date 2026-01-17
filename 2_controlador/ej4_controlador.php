<?php

session_start();

require "../3_modelo/ej4_modelo.php";

if (!isset($_SESSION["intentos_login"])) {

    $_SESSION["intentos_login"]=0;

}

$maximos_intentos=3;

if ($_SESSION["intentos_login"]>=$maximos_intentos) {

    $_SESSION["limite_intentos"]="Has superado el límite de intentos, cierra el navegador o borra las cookies para volver a intentarlo";

}

if (!isset($_SESSION["errores"])) {

    $_SESSION["errores"]=[];

}

if (!isset($_SESSION["resultados"])) {

    $_SESSION["resultados"]=[];

}

validar_nombre($_POST["nombre"]);
validar_contraseña($_POST["password"]);
validar_rol($_POST["rol"]);

$valor_correcto="1234";

if (!empty($_SESSION["resultados"]["password"])) {

    if ($_SESSION["resultados"]["password"]===$valor_correcto) {

        $_SESSION["resultados"]["password"]="Contraseña correcta";

    } else {

        $_SESSION["error_contraseña"]="Contraseña incorrecta";

    }

}


header ("Location: ../1_vista/ej4_vista.php");
exit;


?>