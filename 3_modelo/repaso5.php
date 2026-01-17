<?php

function validar_precio($valor) {

    if (!isset($valor)||!is_array($valor)) {

        $_SESSION["errores"][]="Array inválido";

    } else {

        foreach ($valor as $prod=>$precio) {

            $precio=trim($precio);

            if (!is_numeric($precio)) {

                $_SESSION["errores"][$prod]="no es un número";

            } elseif ($precio==""||$precio<0) {

                $_SESSION["resultados"][$prod]="Precio inválido";

            } else {

                $precio=(float)$precio;

                $precio_IVA=$precio*1.21;

                $_SESSION["resultados"][$prod]=number_format($precio_IVA, 2, ",", ".");

            }

        }

    }

}

?>