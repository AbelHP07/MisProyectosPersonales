<?php

function calcular_precios($valor) {

    if (!isset($valor)||!is_array($valor)) {

        $_SESSION["errores"][]="No existe el valor a calcular";

    } else {

        foreach ($valor as $prod=>$pre) {

            $pre_base=trim($pre);

            if ($pre_base===""||!is_numeric($pre_base)||$pre_base<0) {

                $_SESSION["errores"][]="El valor de " . $prod . " no es válido";

            } else {

                $pre_IVA=$pre_base*1.21;

                $_SESSION["resultados"][$prod]="El precio con IVA del " . $prod . " es de " . number_format($pre_IVA, 2, ",", ".") . "€";

            }

        }

    }

}

?>