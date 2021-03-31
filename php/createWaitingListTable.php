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
$sql = "CREATE TABLE waiting (
waitingID INT(10) UNSIGNED UNIQUE AUTO_INCREMENT PRIMARY KEY, -- id of record in the waiting list
patientID INT(10) NOT NULL UNIQUE ,  -- id of patient from patient table
dateAdded DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, -- date when patient was added to the waiting list

CONSTRAINT FK_waiting FOREIGN KEY patientID REFERENCES patient(patientID) ON DELETE SET NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 