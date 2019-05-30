<?php
$dsn = 'mysql:host=localhost;dbname=watermeter';
$username = 'root';
$password = '1234';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}