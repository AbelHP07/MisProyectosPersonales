<?php

session_start();
require_once "../3_modelo/ej6_modelo.php";

if (!isset($_SESSION["errores"])) {

    $_SESSION["errores"]=[];

}

if (!isset($_SESSION["resultados"])) {

    $_SESSION["resultados"]=[];

}

$edades=$_POST["edad"];

validar_edad($edades);

header("Location: ../1_vista/ej6_vista.php");
exit;

?>