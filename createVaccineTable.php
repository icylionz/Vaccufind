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
$sql = "CREATE TABLE vaccine (
vaccineID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
vaccineName VARCHAR(50)
lengthOfTimeBetweenDoses INT(4) DEFAULT 0,
noOfDosesRequired INT(4) DEFAULT 1,

CONSTRAINT FK_waiting FOREIGN KEY patientID REFERENCES patient(patientID) ON DELETE SET NULL,
CONSTRAINT NN_waiting NOT NULL (vaccineID, lengthOfTimeBetweenDoses, vaccineName),
CONSTRAINT UC_waiting UNIQUE (vaccineID, vaccineName)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 