<?php
completeAppointment($_POST['id']);

function completeAppointment($id){
    require 'connect.php';
    require 'updateInfo.php';
    echo "called";
    if($patientComplete = $conn->query("SELECT * FROM patient WHERE patientID = $id")){
        $patientComplete = $patientComplete->fetch_assoc();
        //reduces number of doses
        $patientComplete['noOfDosesRemaining'] = $patientComplete['noOfDosesRemaining'] - 1;
        //check for remaining doses
        $vaccineGivenID = $patientComplete['vaccineGivenID'];
        if($patientComplete['noOfDosesRemaining'] > 0){
            $vaccineGiven = $conn->query("SELECT * FROM vaccine WHERE vaccineID = '$vaccineGivenID'");
            $vaccineGiven = $vaccineGiven->fetch_assoc();
            //schedules next appointment
            date_default_timezone_set('America/Barbados'); // sets timezone to Barbados
            // sets appointment date
            $timeUntil = $vaccineGiven['lengthOfTimeBetweenDoses'];
            $appointmentDate = date('Y-m-d', strtotime(date('Y-m-d')." + $timeUntil days")); 
            $patientComplete['appointmentDate'] = $appointmentDate;
            
        }
        else {
            $patientComplete['appointmentDate'] = NULL;
            $patientComplete['noOfDosesRemaining'] = -1;
        }
        //updates patient
        updatePatient($patientComplete);

    }


}

?>
