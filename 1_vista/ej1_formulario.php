<?php
/********************************************************************
 *  VISTA (VIEW)
 *  Este archivo:
 *    - Muestra el formulario.
 *    - Muestra los resultados.
 *    - Muestra los errores.
 *  NO hace procesamientos. NO valida.
 *  Solo enseña cosas al usuario.
 ********************************************************************/

session_start();

// Leer error (si existe)
$error = $_SESSION["error"] ?? null;

// Leer resultados (si existen)
$resultados = $_SESSION["resultados"] ?? null;

// Limpiar sesión para no repetir mensajes siempre
unset($_SESSION["error"]);
unset($_SESSION["resultados"]);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Salarios MVC + Sesiones</title>
</head>
<body>

<h1>Salarios (MVC con Sesión)</h1>

<!-- Mostrar error en rojo -->
<?php if ($error): ?>
    <p style="color:red; font-weight:bold;">
        <?= $error ?>
    </p>
<?php endif?>

<!-- FORMULARIO -->
<form action="../2_controlador/ej1_procesar.php" method="post">

    <p>Introduce salarios (puedes dejar campos vacíos):</p>

    <input type="text" name="salarios[]" placeholder="Salario 1"><br>
    <input type="text" name="salarios[]" placeholder="Salario 2"><br>
    <input type="text" name="salarios[]" placeholder="Salario 3"><br>
    <input type="text" name="salarios[]" placeholder="Salario 4"><br>
    <input type="text" name="salarios[]" placeholder="Salario 5"><br><br>

    <button type="submit">Calcular</button>
</form>

<hr>

<!-- Mostrar resultados -->
<?php if ($resultados): ?>
    <h2>Resultados</h2>

    <p><b>Salarios v&aacutelidos:</b> <?= $resultados["total"] ?></p>

    <p><b>Máximo:</b>
        <?= number_format($resultados["max"], 2, ",", ".") ?> €
    </p>

    <p><b>Mínimo:</b>
        <?= number_format($resultados["min"], 2, ",", ".") ?> €
    </p>

    <p><b>Media:</b>
        <?= number_format($resultados["media"], 2, ",", ".") ?> €
    </p>

<?php endif; ?>

</body>
</html>