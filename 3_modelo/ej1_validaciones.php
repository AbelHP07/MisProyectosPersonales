<?php
/********************************************************************
 *  MODELO (MODEL)
 *  Este archivo contiene funciones reutilizables.
 *  NO tiene HTML. NO imprime nada. NO redirige.
 *  Solo tiene lógica pura de PHP.
 ********************************************************************/

/*
 |-----------------------------------------------------------------
 | FUNCIÓN: limpiar_salario()
 |-----------------------------------------------------------------
 | Recibe un valor del formulario (texto).
 | 1. Quita espacios.
 | 2. Si está vacío → no es válido.
 | 3. Si no es número → no es válido.
 | 4. Si es válido → lo convierte a número real (float).
 |-----------------------------------------------------------------
*/
function limpiar_salario($valor) {

    // Quitar espacios
    $valor_limpio = trim($valor);

    // Ignorar vacíos
    if ($valor_limpio === "") {
        return null;
    }

    // Ignorar no numéricos
    if (!is_numeric($valor_limpio)) {
        return null;
    }

    // Valor correcto → convertir a float
    return (float)$valor_limpio;
}



/*
 |-----------------------------------------------------------------
 | FUNCIÓN: validar_salarios()
 |-----------------------------------------------------------------
 | Recibe un array (los salarios introducidos).
 | Devuelve otro array con SOLO los salarios válidos.
 |-----------------------------------------------------------------
*/
function validar_salarios($salarios) {

    $validos = [];  // array vacío para guardar los buenos

    foreach ($salarios as $s) {

        $limpio = limpiar_salario($s);  // validar uno a uno

        if ($limpio !== null) {
            $validos[] = $limpio;       // guardar solo los válidos
        }
    }

    return $validos;
}