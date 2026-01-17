<?php

function limpiar_nombre($valor) {

    if (!isset($valor)) {

    $_SESSION["errores"][]="Nombre inv&aacutelido";
} elseif (trim($valor)==="") {

    $_SESSION["errores"][]="Nombre vac&iacuteo";
} else {

    $_SESSION["resultados"]["nombre"]=trim($valor);
}
}

function limpiar_edad($valor) {

    if (!isset($valor)) {

        $_SESSION["errores"][]="Edad vac&iacutea";
    } elseif (trim($valor)==="") {

        $_SESSION["errores"][]="Edad vac&iacutea";
    } else {

        $_SESSION["resultados"]["edad"]=trim($valor);
    }
}

?>