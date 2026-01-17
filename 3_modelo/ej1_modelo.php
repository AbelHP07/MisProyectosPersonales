<?php

function validar_nombre($valor) {

    if (!isset($valor)){

        $_SESSION["errores"][]="Nombre no recibido";

    } elseif (trim($valor)=="") {

        $_SESSION["errores"][]="Nombre vacío";

    } else {

        $_SESSION["resultados"]["nombre"]=trim($valor);

    }
}

function validar_email($valor) {

    if (!isset($valor)){

        $_SESSION["errores"][]="Email no recibido";

    } elseif (trim($valor)=="") {

        $_SESSION["errores"][]="Email vacío";

    } elseif (!filter_var($valor, FILTER_VALIDATE_EMAIL)) {

        $_SESSION["errores"][]="El email no es válido";

    } else {

        $_SESSION["resultados"]["email"]=trim($valor);

    }
}

function validar_edad($valor) {

    if (!isset($valor)){

        $_SESSION["errores"][]="Edad no recibido";

    } elseif (trim($valor)=="") {

        $_SESSION["errores"][]="Edad vacía";

    } elseif (!is_numeric($valor)) {

        $_SESSION["errores"][]="La edad no es válida";

    } else {

        $_SESSION["resultados"]["edad"]=trim($valor);

    }
}

function validar_cursos($valor) {

    if (isset($valor) && is_array($valor)) {

    foreach ($valor as $c){

        $c_limpio=trim($c);

        if ($c_limpio !=="") {

            $cursos_limpios[]= $c_limpio;
        }
    }

    if (!empty($cursos_limpios)) {
        
        $_SESSION["cursos"]= $cursos_limpios;
        
    } 
    }
}
?>