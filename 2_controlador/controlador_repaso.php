<?php

session_start();

require "../3_modelo/modelo_repaso.php";

if (!isset($_SESSION["errores"])) {

    $_SESSION["errores"]=[];

}

if (!isset($_SESSION["resultados"])) {

    $_SESSION["resultados"]=[];

}

$edades=$_POST["edad"];
limpiar_edades($edades);

header("Location: ../1_vista/vista_repaso.php");
exit;

?>