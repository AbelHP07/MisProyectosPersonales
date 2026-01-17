<?php

function validar_edad($valor) {

    $i=1;

    if (!isset($valor)||!is_array($valor)) {

        $_SESSION["errores"][]="Array inválido";

    } else {

        foreach ($valor as $ed) {

            if (!is_numeric($ed)||$ed<0||$ed>120) {

                $_SESSION["errores"][]="Edad inválida";

            } else {

                $ed=trim($ed);
                $_SESSION["resultados"]["(" . $i . ")"]=$ed;
                $i++;

            }

        }

    }

}
?>