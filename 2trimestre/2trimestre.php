<?php
echo "EJERCICIO 1 Crear y mostrar un array:<br>";
$numeros = [];

$numeros[] = 5;
$numeros[] = 10;
$numeros[] = 15;

foreach ($numeros as $valor) {
    echo $valor . " ". "<br>";
}

echo "EJERCICIO 2 Índices no secuenciales:<br>";
$datos = [];

$datos[0] = "Rojo";
$datos[2] = "Verde";
$datos[5] = "Azul";

foreach ($datos as $indice => $valor) {
    echo $indice . " => " . $valor . "<br>";
}

echo "EJERCICIO 3 Mezclar índices manuales y automáticos:<br>";
$lista = [];

$lista[3] = "A";
$lista[]  = "B";
$lista[]  = "C";

foreach ($lista as $i => $v) {
    echo $i . ": " . $v . "<br>";
}


echo "EJERCICIO 4 — Recorrer y contar elementos: <br>";
$valores = [10, 20, 30, 40];
echo "Elementos:<br>";

foreach ($valores as $v) {
    echo $v . "<br>";
}
echo "Total: " . count($valores) . "<br>";


// BÚSQUEDAS. (¿DETECTAS EL ERROR?)

echo "EJERCICIO 1 — Búsqueda real: in_array()<br><br>";

$numeros = [];
for ($i = 0; $i < 10; $i++) {
    $numeros[] = rand(0, 20);
}

echo "Array: " . implode(", ", $numeros) . "<br><br>";
?>

<form method="post">
    Valor a buscar:
    <input type="number" name="buscar">
    <input type="submit" value="Buscar">
</form>

<?php
if (isset($_POST["buscar"])) {
    $buscar = (int) $_POST["buscar"];

    if (in_array($buscar, $numeros)) {
        echo "<br>El valor $buscar SÍ está en el array";
    } else {
        echo "<br>El valor $buscar NO está en el array";
    }
}


echo "EJERCICIO 2 — Posición: array_search() <br><br>";

$numeros = [];
for ($i = 0; $i < 10; $i++) {
    $numeros[] = rand(0, 20);
}

echo "Array: " . implode(", ", $numeros) . "<br><br>";
?>

<form method="post">
    Valor a buscar:
    <input type="number" name="buscar">
    <input type="submit" value="Buscar">
</form>

<?php
if (isset($_POST["buscar"])) {
    $buscar = (int) $_POST["buscar"];

    $pos = array_search($buscar, $numeros);

    if ($pos === false) {
        echo "<br>No existe";
    } else {
        echo "<br>Está en la posición: $pos";
    }
}
?>