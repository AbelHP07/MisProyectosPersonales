<?php

function validar_nombre($valor) {

    if (!isset($valor)) {

        $_SESSION["errores"][]="No se ha reibido ningún nombre";

    } elseif (trim($valor)=="") {

        $_SESSION["errores"][]="No se permiten nombres con solo espacios (que te he pillado)";

    } else {

        $_SESSION["resultados"]["nombre"]=trim($valor);

    }
}


function validar_contraseña($valor) {

    if (!isset($valor)) {

        $_SESSION["errores"][]="No se ha reibido ninguna contraseña";

    } elseif (trim($valor)=="") {

        $_SESSION["errores"][]="No se permiten contraseñas con solo espacios (que te he pillado)";

    } elseif (!is_numeric($valor)) {

        $_SESSION["errores"][]="La contraseña debe ser numérica";

    } else {

        $_SESSION["resultados"]["password"]=trim($valor);

    }

}


function validar_rol($valor) {

    switch ($valor) {

        case "admin":

            $_SESSION["resultados"]["rol"]="Has seleccionado el rol de ADMIN, disfute con sus servicios de modificación absoluta";
            break;

        case "moder":

            $_SESSION["resultados"]["rol"]="Has seleccionado el rol de MODERADOR, disfute con sus servicios de modificación básica";
            break;

        case "user":

            $_SESSION["resultados"]["rol"]="Has seleccionado el rol de USUARIO, disfute con sus servicios de de solo lectura";
            break;

        default:

            $_SESSION["errores"][]="No has seleccionado ningún rol";
            break;

    }
}


?>