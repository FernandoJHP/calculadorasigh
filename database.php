<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "calculadorasigh";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn);

// Realizar una consulta MySQL
$query = 'SELECT * FROM literales';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
/*
defined('BASEPATH') OR exit('No direct script access allowed');
$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'sigh',
	'dbdriver' => 'mysqli'
);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn);*/
?>