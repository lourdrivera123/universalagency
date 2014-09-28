<?php
$mysqli = new mysqli("universalagency.mysql.eu1.frbit.com", "universalagency", "ewYSEWJJH7C3OOZC");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$mysqli->query('drop database universalagency');
$mysqli->query('create database universalagency');

// system('php artisan migrate');
// system('php artisan db:seed');

?>