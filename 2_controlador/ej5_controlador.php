<?php

session_start();

require "../3_modelo/ej5_modelo.php";

if (!isset($_SESSION["errores"])) {

    $_SESSION["errores"]=[];

}

if (!isset($_SESSION["resultados"])) {

    $_SESSION["resultados"]=[];

}

$precio=$_POST["productos"];
calcular_precios($precio);

header("Location: ../1_vista/ej5_vista.php");
exit;

?>