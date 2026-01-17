<?php

session_start();

require "../3_modelo/repaso5.php";

if (!isset($_SESSION["errores"])) {

    $_SESSION["errores"]=[];

}

if (!isset($_SESSION["resultados"])) {

    $_SESSION["resultados"]=[];

}

$precios_sin_IVA=$_POST["producto"];

validar_precio($precios_sin_IVA);

header("Location: ../1_vista/repaso5.php");

exit;

?>