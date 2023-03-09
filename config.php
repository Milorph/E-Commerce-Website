<?php

$servername = "cssql.seattleu.edu";
$username = "bd_rwidjaja1";
$password = "3300rwidjaja1-Bvkw";
$dbname = "bd_rwidjaja1";

try {
	$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo 'Error: ' . $e->getMessage();
	exit();
}
