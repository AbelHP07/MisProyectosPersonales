<?php

session_start();

require "../modelo/intento2.php";

if(!isset($_SESSION["errores"])){

$_SESSION["errores"]=[];

}

if(!isset($_SESSION["resultados"])){

$_SESSION["resultados"]=[];

}

if(!isset($_SESSION["numeros"])){

$_SESSION["numeros"]=[];

}

if(!isset($_SESSION["may_men"])){

$_SESSION["may_men"]=[];

}

if(!isset($_SESSION["men_may"])){

$_SESSION["men_may"]=[];

}

if(!isset($numeros)){

$numeros=[];

}

$boton=$_POST["generado"];
validar_dato($boton);

for($i=0;$i<10;$i++){

$numeros[]=rand(0,50);

}

$_SESSION["numeros"]=$numeros;

rsort($numeros);
$_SESSION["may_men"]=$numeros;

sort($numeros);
$_SESSION["men_may"]=$numeros;

/* Lo conseguí */

header("Location: ../vista/intento2.php");
exit;


?>