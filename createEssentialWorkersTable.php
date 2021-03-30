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
$sql = "CREATE TABLE essentialWorkers (
essentialID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, -- id of essential worker's record
essentialWorkerFirstName VARCHAR(50) DEFAULT NULL, -- first name of the essential worker
essentialWorkerLastName VARCHAR(50) DEFAULT NULL, -- last name of the essential worker
nid VARCHAR(11), -- Barbados nid of essential worker

CONSTRAINT NN_waiting NOT NULL (nid),
CONSTRAINT UC_waiting UNIQUE (nid, essentialID)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}


$conn->close();
?> 