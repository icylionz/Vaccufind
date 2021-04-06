<?php
require 'connect.php';
function updatePatient($patientUpdate){
    $conn = connectVaccufind();
    //updates patient record
    if($conn->query("UPDATE patient SET firstName = '$patientUpdate["firstName"]', lastName = '$patientUpdate["lastName"]', dob = '$patientUpdate["dob"]', streetAddress = '$patientUpdate["streetAddress"]',phoneNumber = '$patientUpdate["phoneNumber"]',email = '$patientUpdate["email"]',tag = '$patientUpdate["tag"],country = '$patientUpdate["country"],vaccineGivenID = '$patientUpdate["vaccineGivenID"]',noOfDosesRemaining = '$patientUpdate["noOfDosesRemaining"]',appointmentDate = '$patientUpdate["appointmentDate"]',medicalConditions = '$patientUpdate["medicalConditions"]',allergies = '$patientUpdate["allergies"]',nid = '$patientUpdate["nid"]',passportNumber = '$patientUpdate["passportNumber"]' WHERE patientID = '$patientUpdate["patientID"]';")){
        echo "Updated patient record";
    }
    else{
        //display error message
    }
}

?>