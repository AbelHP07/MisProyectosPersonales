<?php

function limpiar_edades($valor) {

    if (!isset($valor)||!is_array($valor)) {

        $_SESSION["errores"][]="Array inválido";

    } else {

        $i=1;

        foreach ($valor as $v) {

            $v=trim($v);

            if ($v=="") {

                $_SESSION["errores"][]="La edad número " . $i . " está vacía";
                $i++;

            } elseif (!is_numeric($v)||$v<0||$v>120) {

                $_SESSION["errores"][$i . "º"]="Edad inválida (debe estar entre 0 y 120)";
                $i++;

            } else {

                $_SESSION["resultados"][$i . "º"]=$v;
                $i++;

            }

        }

    }

}

?>