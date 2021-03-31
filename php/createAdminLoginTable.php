<?php
$servername = "127.0.01";
$username = "root";
$password = "password";
$dbname = "vaccufind";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE adminLogin (
adminID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, -- id of admin login record
adminFirstName VARCHAR(50) DEFAULT NULL, -- first name of the admin
adminLastName VARCHAR(50) DEFAULT NULL, -- last name of the admin
username VARCHAR(50), -- username of admin
passwrd VARCHAR(50), -- passowrd of admin

CONSTRAINT NN_waiting NOT NULL (username, passwrd),
CONSTRAINT UC_waiting UNIQUE (adminID, username)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 