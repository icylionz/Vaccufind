<?php
createDatabase();
createEssentialWorkersTable();
createMedicalWorkersTable();
createPatientTable();
createSuperAdminLoginTable();
createWaitingListTable();
createVaccineTable();
createSuperAdminLoginTable();

function createDatabase(){
  $servername = "127.0.0.1";
  $username = "root";
  $password = "password";

  // Create connection
  $conn = new mysqli($servername, $username, $password);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Create database
  $sql = "CREATE DATABASE vaccufind";
  if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
  } 
  else{
    echo "Database already exists";
  }

  $conn->close();
}

function createEssentialWorkersTable(){
  $servername = "127.0.0.1";
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
  $sql = "CREATE TABLE IF NOT EXISTS essentialWorkers (
  essentialID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE, -- id of essential worker's record
  essentialWorkerFirstName VARCHAR(50) DEFAULT NULL, -- first name of the essential worker
  essentialWorkerLastName VARCHAR(50) DEFAULT NULL, -- last name of the essential worker
  nid VARCHAR(11) UNIQUE NOT NULL -- Barbados nid of essential worker

  )";

  if ($conn->query($sql) === TRUE) {
    echo "Table essentialWorkers created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }


  $conn->close();
}

function createMedicalWorkersTable(){
  $servername = "127.0.0.1";
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
  $sql = "CREATE TABLE IF NOT EXISTS medicalWorkers (
  medicalID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE, -- id of medical worker's record
  MedicalWorkerFirstName VARCHAR(50) DEFAULT '', -- first name of the medical worker
  MedicalWorkerLastName VARCHAR(50) DEFAULT '', -- last name of the medical worker
  nid VARCHAR(11) NOT NULL UNIQUE -- Barbados nid of medical worker

  )";

  if ($conn->query($sql) === TRUE) {
    echo "Table medicalWorkers created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  $conn->close();
}

function createPatientTable(){
  $servername = "127.0.0.1";
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
  $sql = "CREATE TABLE IF NOT EXISTS patient (
    patientID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY , -- id of patient record in the table 
    firstName VARCHAR(50) NOT NULL, -- patient's first name
    lastName VARCHAR(50) NOT NULL, -- patient's last name
    dob DATE, -- patient's date of birth
    streetAddress VARCHAR(100), -- patient's address
    phoneNumber VARCHAR(10), -- patient's phone number
    email VARCHAR(50), -- patient's email address
    tag INT, -- patient's tag given by the system
    country VARCHAR(25), -- patient's country
    vaccineGivenID INT UNSIGNED, -- vaccine id assigned to patient by the system
    noOfDosesRemaining INT, -- number of vaccine doses left to be adminsitered to the patient
    appointmentDate DATE, -- patient's next appointment date
    medicalConditions VARCHAR(300), -- patient's medical conditions (stores multiple medical conditions seperated by a ,)
    allergies VARCHAR(300), -- patient's allergies (stores multiple allergies seperated by a ,)
    nid VARCHAR(11) UNIQUE, -- patient's Barbados national identification number
    passportNumber VARCHAR(30) UNIQUE, -- patient's passport number
    
    FOREIGN KEY (vaccineGivenID) REFERENCES vaccine(vaccineID)
    );";

  if ($conn->query($sql) === TRUE) {
    echo "Table patient created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  $conn->close();
}

function createSuperAdminLoginTable(){
  $servername = "127.0.0.1";
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
  $sql = "CREATE TABLE IF NOT EXISTS superAdminLogin (
  superAdminID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE, -- id of superAdmin login record
  superAdminFirstName VARCHAR(50) DEFAULT NULL, -- first name of the super admin
  superAdminLastName VARCHAR(50) DEFAULT NULL, -- last name of the super admin 
  username VARCHAR(50) NOT NULL UNIQUE, -- username of super admin
  passwrd VARCHAR(50) NOT NULL UNIQUE -- passowrd of super admin



  )";

  if ($conn->query($sql) === TRUE) {
    echo "Table superAdminLogin created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  $conn->close();
}

function createVaccineTable(){
  $servername = "127.0.0.1";
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
  $sql = "CREATE TABLE IF NOT EXISTS vaccine (
  vaccineID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, -- id of vaccine
  vaccineName VARCHAR(50) NOT NULL UNIQUE, -- name of the vaccine 
  lengthOfTimeBetweenDoses INT DEFAULT 0 NOT NULL, -- length of time required between each dose administered to the patient
  noOfDosesRequired INT DEFAULT 1, -- number of doses the patient must be adminsitered
  medicalConstraints VARCHAR(300) DEFAULT NULL, -- vaccine should not be administered to any patient with these medical conditions (stores multiple medical conditions seperated by a ,)
  noOfDosesAvailable INT DEFAULT 0 NOT NULL -- number of doses available 

  )";

  if ($conn->query($sql) === TRUE) {
    echo "Table vaccine created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  $conn->close();
}

function createWaitingListTable(){
  $servername = "127.0.0.1";
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
  $sql = "CREATE TABLE IF NOT EXISTS waiting (
  waitingID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, -- id of record in the waiting list
  patientID INT UNSIGNED NOT NULL UNIQUE ,  -- id of patient from patient table
  dateAdded DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, -- date when patient was added to the waiting list

  FOREIGN KEY (patientID) REFERENCES patient(patientID) ON DELETE CASCADE
  
  ) ENGINE = InnoDB;";

  if ($conn->query($sql) === TRUE) {
    echo "Table waiting created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  $conn->close();
}





?> 
