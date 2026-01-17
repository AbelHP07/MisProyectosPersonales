<?php

function validar_dato($dato){

if(isset($dato)||trim($dato)!==""){

$_SESSION["resultados"]["boton"]=trim($dato);

} else {

$_SESSION["errores"][]= "No se ha pulsado el botón";

}

}

?>