<?php
require 'connect.php';

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