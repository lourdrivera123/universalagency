<?php
$mysqli = new mysqli("localhost", "root", "");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$mysqli->query('drop database universal_agency');
$mysqli->query('create database universal_agency');

system('php artisan migrate');
system('php artisan db:seed');

?>