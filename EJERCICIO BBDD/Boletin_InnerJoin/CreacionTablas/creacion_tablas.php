<?php

include_once "../CONEXION/conexion.php";

/*Creamos la tabla "curso"*/

$cursos="CREATE TABLE IF NOT EXISTS curso (
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(50) NOT NULL,
aula VARCHAR(20)
)";

/*Comprobamos que se crea correctamente, si no, indicamos el error*/

if(!@mysqli_query($c,$cursos)){
    die("Error: ".mysqli_error());
}else{
    echo "Tabla cursos creada<br><br>";
}

/*Creamos la tabla "alumno"*/

$alumnos="CREATE TABLE IF NOT EXISTS alumno (
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(100) NOT NULL,
id_curso INT,
FOREIGN KEY (id_curso) REFERENCES curso(id)
)";

/*Comprobamos que se crea correctamente, si no, indicamos el error*/

if(!@mysqli_query($c,$alumnos)){
    die("Error: ".mysqli_error());
}else{
    echo "Tabla alumnos creada<br><br>";
}

/*Insertamos los datos*/

$datos="INSERT INTO curso (nombre,aula)
VALUES ('PHP Básico','Aula 101'),
('Diseño Web','Aula 202'),
('BBDD Avanzado','Aula 303')";

/*Comprobamos que los datos se han insertado correctamente*/

if(!@mysqli_query($c,$datos)){
    die("Error: ".mysqli_error());
}else{
    echo "Datos insertados correctamente";
}

?>