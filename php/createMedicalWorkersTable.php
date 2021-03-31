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
$sql = "CREATE TABLE medicalWorkers (
medicalID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, -- id of medical worker's record
MedicalWorkerFirstName VARCHAR(50) DEFAULT NULL, -- first name of the medical worker
MedicalWorkerLastName VARCHAR(50) DEFAULT NULL, -- last name of the medical worker
nid VARCHAR(11), -- Barbados nid of medical worker

CONSTRAINT NN_waiting NOT NULL (nid),
CONSTRAINT UC_waiting UNIQUE (nid, medicalID)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 