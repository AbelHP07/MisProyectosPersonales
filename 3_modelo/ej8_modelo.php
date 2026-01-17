<?php

function validar_cadenas($valor) {

    if (!isset($valor)||!is_array($valor)){

        $_SESSION["errores"][]="Array inválido";

    } else {

        $cadenas_limpias=[];

        foreach ($valor as $c) {

            $c=trim($c);

            if($c!=="") {

                $cadenas_limpias[]=$c;

            }

        }

        $cadenas_limpias=array_unique($cadenas_limpias);

        sort($cadenas_limpias);

        if (empty($cadenas_limpias)) {

            $_SESSION["errores"][]="No hay cadenas válidas";

        } else {

            foreach ($cadenas_limpias as $cl) {

                $_SESSION["resultados"][]=$cl;

            }

        }

    }

}

?>