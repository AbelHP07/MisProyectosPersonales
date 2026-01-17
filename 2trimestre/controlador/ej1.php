<?php

session_start();

require "../modelo/ej1.php";

if(!isset($_SESSION["resultados"])){

$_SESSION["resultados"]=[];

}

if(!isset($_SESSION["errores"])){

$_SESSION["errores"]=[];

}

if(!isset($_SESSION["numeros"])){

$_SESSION["numeros"]=[];

}

$boton=$_POST["boton_pulsado"];
validar_dato($boton);

for($i=0;$i<10;$i++){

$_SESSION["numeros"][]=rand(0,50);

}

$_SESSION["numeros"]["random"]=implode(", ",$_SESSION["numeros"]);

header("Location: ../vista/ej1.php");
exit;

?>