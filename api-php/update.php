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

$id = $user->id;
$name = $user->name;
$email = $user->email;
$birthDate = $user->birthdate;
$sex = $user->sex;

$query = "UPDATE users SET
username = '$name', email = '$email', 
birthdate = '$birthDate', sex = '$sex'
where id = $id";


$connection->query($query);

echo"{'message': 'ok'}";