<?php
//permite recibir peticiones desde cualquier direccion
header("Access-Control-Allow-Origin:*");
//para recibir datos enviados en el cuerpo de la peticion
$rawData = file_get_contents("php://input");
//transformar el rawdata en un objeto de PHP
$user = json_decode($rawData);
//para ver en pantalla que estamos recibiendo
$dsn = "mysql:dbname=store;host=localhost:3306";
$username = "root";
$password = "";

$connection = new PDO($dsn, $username, $password);

$name = $user->name;
$email = $user->email;
$birthDate = $user->birthdate;
$sex = $user->sex;

$query = "INSERT INTO users
(username, email, birthdate, sex) 
VALUES('$name', '$email', '$birthDate', '$sex')";

$connection->query($query);

echo "{'message': 'ok'}";