<?php
require 'connect.php';
function appointmentCompletion($patientID) {
	$patientCompleted = searchForPatientByID($patientID);
	
	$patientCompleted["remainingDoses"] = patientCompleted["remainingDoses"] - 1;

	if ($patientCompleted["remainingDoses"] > 0) {
		$vaccinePatientHas = searchForVaccineByType($patientCompleted["vaccineName"]);
		scheduleAppointment($patientCompleted, $vaccinePatientHas["lengthOfTimeBetweenDoses"]);
	} else {
		$patientCompleted["appointmentDate"] = "";
	}
	updatePatientInfo($patientCompleted);
}


function searchForPatientByID($id){
	$conn = connectVaccufind();

	
    if($patientRecords = $conn->query("SELECT patientID, firstName, lastName, nid, passportNumber FROM patient WHERE patientID = $id;")){
        if($patientRecords->num_rows == 1){
            $patientRequested = $patientRecords->fetch_object();
			return $patientRequested;
        }
    }
}

function updatePatientInfo($patientUpdate){
	$conn = connectVaccufind();

	
}
?>