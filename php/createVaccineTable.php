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
$sql = "CREATE TABLE vaccine (
vaccineID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, -- id of vaccine
vaccineName VARCHAR(50), -- name of the vaccine 
lengthOfTimeBetweenDoses INT(4) DEFAULT 0, -- length of time required between each dose administered to the patient
noOfDosesRequired INT(4) DEFAULT 1, -- number of doses the patient must be adminsitered
medicalConstraints VARCHAR(300) DEFAULT NULL, -- vaccine should not be administered to any patient with these medical conditions (stores multiple medical conditions seperated by a ,)
noOfDosesAvailable INT(4) DEFAULT 0, -- number of doses available 

CONSTRAINT FK_waiting FOREIGN KEY patientID REFERENCES patient(patientID) ON DELETE SET NULL,
CONSTRAINT NN_waiting NOT NULL (vaccineID, lengthOfTimeBetweenDoses, vaccineName, noOfDosesStored),
CONSTRAINT UC_waiting UNIQUE (vaccineID, vaccineName)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 