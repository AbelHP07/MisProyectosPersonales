<?php
/********************************************************************
 *  CONTROLADOR (CONTROLLER)
 *  Este archivo recibe los datos del formulario.
 *  - NO tiene HTML.
 *  - Llama al modelo.
 *  - Guarda errores o resultados en la sesión.
 *  - Redirige de vuelta a la vista.
 ********************************************************************/

session_start();                          // activar sesión
require_once "../3_modelo/ej1_validaciones.php"; // cargar modelo

// Si no llegan salarios → error y volver a la vista
if (!isset($_POST["salarios"])) {

    $_SESSION["error"] = "No se recibieron salarios.";
    header("Location: ../1_vista/ej1_formulario.php");
    exit;
}

// Validar salarios (usar función del modelo)
$salarios_validos = validar_salarios($_POST["salarios"]);

// Si después de limpiar no queda nada → error
if (count($salarios_validos) === 0) {

    $_SESSION["error"] = "No hay salarios válidos.";
    header("Location: ../1_vista/ej1_formulario.php");
    exit;
}

// Cálculos matemáticos
$max   = max($salarios_validos);                   // máximo
$min   = min($salarios_validos);                   // mínimo
$media = array_sum($salarios_validos)              // promedio
         / count($salarios_validos);

// Guardar resultados en la sesión para que la vista los muestre
$_SESSION["resultados"] = [
    "total" => count($salarios_validos),
    "max"   => $max,
    "min"   => $min,
    "media" => $media
];

// Asegurarnos de que no queda error
unset($_SESSION["error"]);

// Volver a la vista (formulario.php)
header("Location: ../1_vista/ej1_formulario.php");
exit;
?>