<?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "vaccufind";

$conn = new mysqli($sname, $unmae, $password, $db_name);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
  }