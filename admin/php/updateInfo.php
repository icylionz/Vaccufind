<?php
require 'connect.php';
function updatePatient($patientUpdate){
    $firstName = $patientUpdate["firstName"];
    $lastName = $patientUpdate["lastName"];
    $dob = $patientUpdate["dob"];
    $streetAddress = $patientUpdate["streetAddress"];
    $phoneNumber = $patientUpdate["phoneNumber"];
    $email = $patientUpdate["email"];
    $tag = $patientUpdate["tag"];
    $country = $patientUpdate["country"];
    $vaccineGivenID = $patientUpdate["vaccineGivenID"];
    $noOfDosesRemaining = $patientUpdate["noOfDosesRemaining"];
    $appointmentDate = $patientUpdate["appointmentDate"];
    $medicalConditions = $patientUpdate["medicalConditions"];
    $allergies = $patientUpdate["allergies"];
    $nid = $patientUpdate["nid"];
    $passportNumber = $patientUpdate["passportNumber"];

    
    //updates patient record
    if($conn->query("UPDATE patient SET firstName = '$firstName', lastName = '$lastName', dob = '$dob', streetAddress = '$streetAddress',phoneNumber = '$phoneNumber',email = '$email',tag = '$tag,country = '$country,vaccineGivenID = '$vaccineGivenID',noOfDosesRemaining = '$noOfDosesRemaining',appointmentDate = '$appointmentDate',medicalConditions = '$medicalConditions',allergies = '$allergies',nid = '$nid',passportNumber = '$passportNumber' WHERE patientID = '$patientID';")){
        echo "Updated patient record";
    }
    else{
        //display error message
    }
}
function updateVaccine($vaccineUpdate){
    $vaccineName=$vaccineUpdate["vaccineName"];
    $lengthOfTimeBetweenDoses = $vaccineUpdate["lengthOfTimeBetweenDoses"];
    $noOfDosesRequired = $vaccineUpdate["noOfDosesRequired"];
    $medicalConstraints = $vaccineUpdate["medicalConstraints"];
    $noOfDosesAvailable = $vaccineUpdate["noOfDosesAvailable"];
    //updates patient record
    if($conn->query("UPDATE vaccine SET vaccineName = '$vaccineName', 	lengthOfTimeBetweenDoses  = '$lengthOfTimeBetweenDoses', noOfDosesRequired  = '$noOfDosesRequired', medicalConstraints  = '$medicalConstraints',noOfDosesAvailable = '$noOfDosesAvailable';")){
        echo "Updated vaccine record";
    }
    else{
        //display error message
    }
}
?>