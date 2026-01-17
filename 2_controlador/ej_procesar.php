<?php

session_start();
require "../1_vista/ejemplo_formulario.php";

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

header("Location: ../1_vista/ejemplo_formulario.php");
exit;

?>
