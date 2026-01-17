<?php

session_start();
require "../3_modelo/ej1_modelo.php";

if (!isset($_SESSION["errores"])) {

    $_SESSION["errores"]=[];
}

if (!isset($_SESSION["resultados"])) {

    $_SESSION["resultados"]=[];
}

validar_nombre($_POST["nombre"]);
validar_email($_POST["email"]);
validar_edad($_POST["edad"]);
validar_cursos($_POST["cursos"]);

header("Location: ../1_vista/ej1_vista.php");
exit;

?>