<?php
function searchPatientID($id){
    require 'connect.php';
    ;
    if($patientInfo = $conn->query("SELECT * FROM patient WHERE patientID = $id")){
        if($patientInfo->num_rows > 0){
            $patientDisplay = $patientInfo->fetch_assoc();
            return $patientDisplay;
        }
        else{
            echo "Error - No patient records exist with that ID";
        }
    }
}







?>