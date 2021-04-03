<?php
require 'php/connect.php';
$conn = connectVaccufind();


// fetches all patient records
$patientTableData = array();
if($patientRecords = $conn->query("SELECT patientID, firstName, lastName, nid, passportNumber FROM patient ")){
    if($patientRecords->num_rows > 0){
        while($patientRow = $patientRecords->fetch_object()){
            $patientTableData[] = $patientRow;
        }
    }
    else{
        echo "No patient records stored";
    }
}




$conn->close();
?> 