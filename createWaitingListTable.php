<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE waiting (
waitingID INT(10) UNSIGNED UNIQUE AUTO_INCREMENT PRIMARY KEY,
patientID INT(10) NOT NULL UNIQUE , 
dateAdded DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
CONSTRAINT FK_waiting FOREIGN KEY patientID REFERENCES patient(patientID) ON DELETE SET NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 