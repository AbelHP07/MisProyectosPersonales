<?php

function validar_dato($dato){

if(isset($dato)){

$dato=trim($dato);

if($dato!==""){

$_SESSION["resultados"][]= "Se ha pulsado el botón";

} else {

$_SESSION["errores"][]= "No se ha pulsado el botón";

}

} else {

$_SESSION["errores"][]= "No se ha pulsado el botón";

}

}

/* Lo conseguí */

?>