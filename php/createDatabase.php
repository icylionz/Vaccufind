<?php
createDatabase();
createEssentialWorkersTable();
createMedicalWorkersTable();

createSuperAdminLoginTable();

createVaccineTable();
createAdminLoginTable();
createSettingsTable();
createPatientTable();
createWaitingListTable();
addRootAdmin();

function createDatabase(){
  $servername = "127.0.0.1";
  $username = "vaccufind";
  $password = "vaccufind";

  // Create connection
  $conn = new mysqli($servername, $username, $password);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Create database
  $sql = "CREATE DATABASE IF NOT EXISTS vaccufind";
  if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
    echo "<br>";
  } 
  else{
    echo "Database already exists";
  }

  $conn->close();
}

function createEssentialWorkersTable(){
  
  include "connect.php";
  
  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS essentialWorkers (
  essentialID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE, -- id of essential worker's record
  essentialWorkerFirstName TEXT DEFAULT NULL, -- first name of the essential worker
  essentialWorkerLastName TEXT DEFAULT NULL, -- last name of the essential worker
  nid TEXT UNIQUE NOT NULL -- Barbados nid of essential worker

  )";

  if ($conn->query($sql) === TRUE) {
    echo "Table essentialWorkers created successfully";
    echo "<br>";
  } else {
    echo "Error creating table: " . $conn->error;
    echo "<br>";
  }


  $conn->close();
}

function createMedicalWorkersTable(){
  
  include "connect.php";

  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS medicalWorkers (
  medicalID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE, -- id of medical worker's record
  MedicalWorkerFirstName TEXT DEFAULT '', -- first name of the medical worker
  MedicalWorkerLastName TEXT DEFAULT '', -- last name of the medical worker
  nid TEXT NOT NULL UNIQUE -- Barbados nid of medical worker

  )";

  if ($conn->query($sql) === TRUE) {
    echo "Table medicalWorkers created successfully";
    echo "<br>";
  } else {
    echo "Error creating table: " . $conn->error;
    echo "<br>";
  }

  $conn->close();
}

function createPatientTable(){
  
  include "connect.php";

  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS patient (
    patientID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY , -- id of patient record in the table 
    firstName TEXT NOT NULL, -- patient's first name
    lastName TEXT NOT NULL, -- patient's last name
    dob DATE, -- patient's date of birth
    streetAddress TEXT, -- patient's address
    phoneNumber TEXT, -- patient's phone number
    email TEXT, -- patient's email address
    tag INT, -- patient's tag given by the system
    country TEXT, -- patient's country
    vaccineGivenID INT UNSIGNED, -- vaccine id assigned to patient by the system
    noOfDosesRemaining INT, -- number of vaccine doses left to be adminsitered to the patient
    appointmentDate DATE, -- patient's next appointment date
    medicalConditions TEXT, -- patient's medical conditions (stores multiple medical conditions seperated by a ,)
    allergies TEXT, -- patient's allergies (stores multiple allergies seperated by a ,)
    nid TEXT UNIQUE, -- patient's Barbados national identification number
    passportNumber TEXT UNIQUE, -- patient's passport number
    
    FOREIGN KEY (vaccineGivenID) REFERENCES vaccine(vaccineID)
    );";

  if ($conn->query($sql) === TRUE) {
    echo "Table patient created successfully";
    echo "<br>";
  } else {
    echo "Error creating table: " . $conn->error;
    echo "<br>";
  }

  $conn->close();
}

function createSuperAdminLoginTable(){
  
  include "connect.php";

  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS superAdminLogin (
  superAdminID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE, -- id of superAdmin login record
  superAdminFirstName TEXT DEFAULT NULL, -- first name of the super admin
  superAdminLastName TEXT DEFAULT NULL, -- last name of the super admin 
  username TEXT NOT NULL UNIQUE, -- username of super admin
  passwrd TEXT NOT NULL UNIQUE -- passowrd of super admin



  )";

  if ($conn->query($sql) === TRUE) {
    echo "Table superAdminLogin created successfully";
    echo "<br>";
  } else {
    echo "Error creating table: " . $conn->error;
    echo "<br>";
  }

  $conn->close();
}
function createAdminLoginTable(){
  
  include "connect.php";

  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS adminLogin (
  adminID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE, -- id of admin login record
  adminFirstName TEXT DEFAULT NULL, -- first name of the super admin
  adminLastName TEXT DEFAULT NULL, -- last name of the super admin 
  username TEXT NOT NULL UNIQUE, -- username of super admin
  passwrd TEXT NOT NULL UNIQUE -- passowrd of super admin



  )";

  if ($conn->query($sql) === TRUE) {
    echo "Table adminLogin created successfully";
    echo "<br>";
  } else {
    echo "Error creating table: " . $conn->error;
    echo "<br>";
  }

  $conn->close();
}
function createVaccineTable(){
  
  include "connect.php";

  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS vaccine (
  vaccineID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, -- id of vaccine
  vaccineName TEXT NOT NULL UNIQUE, -- name of the vaccine 
  lengthOfTimeBetweenDoses INT DEFAULT 0 NOT NULL, -- length of time required between each dose administered to the patient
  noOfDosesRequired INT DEFAULT 1, -- number of doses the patient must be adminsitered
  medicalConstraints TEXT DEFAULT NULL, -- vaccine should not be administered to any patient with these medical conditions (stores multiple medical conditions seperated by a ,)
  noOfDosesAvailable INT DEFAULT 0 NOT NULL -- number of doses available 

  )";

  if ($conn->query($sql) === TRUE) {
    echo "Table vaccine created successfully";
    echo "<br>";
  } else {
    echo "Error creating table: " . $conn->error;
    echo "<br>";
  }

  $conn->close();
}

function createWaitingListTable(){
  
  include "connect.php";

  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS waiting (
  waitingID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, -- id of record in the waiting list
  patientID INT UNSIGNED NOT NULL UNIQUE ,  -- id of patient from patient table
  dateAdded DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, -- date when patient was added to the waiting list

  FOREIGN KEY (patientID) REFERENCES patient(patientID) ON DELETE CASCADE
  
  ) ENGINE = InnoDB;";

  if ($conn->query($sql) === TRUE) {
    echo "Table waiting created successfully";
    echo "<br>";
  } else {
    echo "Error creating table: " . $conn->error;
    echo "<br>";
  }

  $conn->close();
}

function createSettingsTable(){
  
  include "connect.php";
  
  
  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS settings (
  settingName TEXT UNIQUE NOT NULL, -- name of setting
  settingValue INT NOT NULL -- value of setting

  )";

  if ($conn->query($sql) === TRUE) {
    echo "Table settings created successfully";
    echo "<br>";
  } else {
    echo "Error creating table: " . $conn->error;
    echo "<br>";
  }

  $conn->query("INSERT INTO settings (settingName,settingValue) VALUES ('selectFromWaiting','1')");
  $conn->query("INSERT INTO settings (settingName,settingValue) VALUES ('daysUntilAppointment','1')");
  $conn->query("INSERT INTO settings (settingName,settingValue) VALUES ('elderlyAge','65')");

  $conn->close();
}

function addRootAdmin(){
  include "connect.php";
  $conn->query("INSERT INTO superAdminLogin (username,passwrd) VALUES ('root','root')");
  $conn->query("INSERT INTO adminLogin (username,passwrd) VALUES ('root','root')");
}


?> 
