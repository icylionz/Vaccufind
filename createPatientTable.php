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
$sql = "CREATE TABLE patient (
patientID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(50) NOT NULL,
lastname VARCHAR(50) NOT NULL,
dob DATETIME2,
streetAddress VARCHAR(100),
phoneNumber VARCHAR(10),
email VARCHAR(50),
tag ENUM(1,2,3,4,5),
country VARCHAR(25),
vaccineTypeGivenID INT(10),
noOfDosesRemaining INT(3),
appointmentDate DATETIME2,
medicalConditions VARCHAR(300),
nid VARCHAR(11),
passportNumber VARCHAR(30),
CONSTRAINT  UC_uniquePatient UNIQUE (nid,passportNumber)
CONSTRAINT FK_patient FOREIGN KEY (vaccineTypeGivenID)
REFERENCES vaccine(vaccineTypeID)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 