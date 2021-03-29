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
patientID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, --id of patient record in the table 
firstname VARCHAR(50) NOT NULL, -- patient's first name
lastname VARCHAR(50) NOT NULL, -- patient's last name
dob DATETIME2, -- patient's date of birth
streetAddress VARCHAR(100), -- patient's address
phoneNumber VARCHAR(10), -- patient's phone number
email VARCHAR(50), -- patient's email address
tag ENUM(1,2,3,4,5), -- patient's tag given by the system
country VARCHAR(25), -- patient's country
vaccineGivenID INT(10), -- vaccine id assigned to patient by the system
noOfDosesRemaining INT(3), -- number of vaccine doses left to be adminsitered to the patient
appointmentDate DATETIME2, -- patient's next appointment date
medicalConditions VARCHAR(300), -- patient's medical conditions (stores multiple medical conditions seperated by a ,)
nid VARCHAR(11), -- patient's Barbados national identification number
passportNumber VARCHAR(30), -- patient's passport number

CONSTRAINT  UC_uniquePatient UNIQUE (nid,passportNumber,patientID),
CONSTRAINT FK_patient FOREIGN KEY (vaccineTypeGivenID) REFERENCES vaccine(vaccineTypeID)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 