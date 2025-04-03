<?php
$hostname = '127.0.0.1';
$database = 's2694679_coursework_db';
$username = 's2694679';
$password = 'Modernwarfare2!';

$pdo = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); #Display errors properly as got confusing before.
?>