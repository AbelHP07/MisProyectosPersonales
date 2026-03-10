<?php
// Desactivar reporte de errores como excepciones
mysqli_report(MYSQLI_REPORT_OFF);

// Conectar a la base de datos
$c = @mysqli_connect("localhost", "root", "", "gestion_colegio");

// Comprobar si la conexión ha fallado
if (!$c) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>