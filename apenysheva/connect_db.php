<?php
$servername = 'localhost';
$username = 'root';
$password = '11111111';
$dbname = 'mudbai';
//создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);
	
//проверка подключения
if ($conn->connect_error) {
	die('Connection failed: ' . $conn->connect_error);
}
?>
