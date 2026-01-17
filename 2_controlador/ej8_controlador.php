<?php

session_start();
require "../3_modelo/ej8_modelo.php";

if (!isset($_SESSION["errores"])) {

    $_SESSION["errores"]=[];

}

if (!isset($_SESSION["resultados"])) {

    $_SESSION["resultados"]=[];

}

$cadena=$_POST["cadenas"];
validar_cadenas($cadena);


header("Location: ../1_vista/ej8_vista.php");
exit;

?>