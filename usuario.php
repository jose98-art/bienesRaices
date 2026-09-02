<?php

// Importar la conexión
require 'includes/config/database.php';
$db = concetarDB();

// Crear un email y password
$email = "correo@correo.com";
$password = "1234";

$passwordHash = password_hash($password, PASSWORD_DEFAULT);


// Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash');";

// echo $query;


// Agregarlo a la base de datos
mysqli_query($db, $query);

