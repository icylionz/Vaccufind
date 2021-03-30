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

$sql = "SELECT id, firstName, lastName, nid, passportNumber, tag, vaccineGivenID, appointmentDate FROM patient
        ORDER BY firstName, lastName ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // display table row
    //**********to be added*************
  }
} else {
  //empty table
}
$conn->close();
?> 