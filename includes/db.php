<?php


$host = "localhost";
$database = "formation_cda";
$username = "root";
$password = "";

$mysqli= new Mysqli(
                hostname: $host,
                username: $username,
                password: $password,
                database: $database);

if($myslqi->connect_error){
    die("Erreur de Connexion : ".$mysqli->connect_error);
}
