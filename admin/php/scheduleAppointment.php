<?php
require 'connect.php';
require 'updatePatientInfo.php';
$conn = connectVaccufind();
if($patientsToBeScheduled = $conn->query("SELECT * FROM settings WHERE settingName = 'selectFromWaiting'")){
    $patientsToBeScheduled = $patientsToBeScheduled->fetch_assoc();
    $patientsToBeScheduled = $patientsToBeScheduled['settingValue'];
}
else {
    //display error message
    header("location: /vaccufind/ph/admin_console.php");
}
$offset = 0;
while($patientsToBeScheduled > 0){
    //selects patient at the top of the list 
    if($patientChosen = $conn->query("SELECT patient.* FROM waiting INNER JOIN patient ON patient.patientID = waiting.patientID ORDER BY patient.tag ASC, waiting.dateAdded ASC LIMIT 1 OFFSET '$offset';")){
        $patientChosen = $patientChosen->fetch_assoc();
        //find appropiate vaccine
        $vaccineID = selectAppropiateVaccine($patientChosen['medicalConditions'],$patientChosen['allergies']);
        if($vaccineID > -1){ //if vaccine found
            
            if($validVaccine = $conn->query("SELECT * FROM vaccine WHERE vaccineID = '$vaccineID'")){
                if($daysUntil = $conn->query("SELECT * FROM settings WHERE settingName = 'daysUntilAppointment'")){
                    $daysUntil = $daysUntil->fetch_assoc();
                    $validVaccine = $validVaccine->fetch_assoc();
                    $patientChosen['vaccineGivenID'] = $validVaccine['vaccineID'];
                    $patientChosen['noOfDosesRemaining'] = $validVaccine['noOfDosesRequired'];
                    scheduleAppointment($patientChosen, $daysUntil['settingValue']);
                    updatePatient($patientChosen);
                    //remove record from waiting list

                    $waitingID = $conn->query("SELECT waitingID FROM waiting INNER JOIN patient ON patient.patientID = waiting.patientID ORDER BY patient.tag ASC, waiting.dateAdded ASC LIMIT 1 OFFSET '$offset';")
                    $waitingID = $waitingID->fetch_assoc();
                    $waitingID = $waitingID['waitingID'];

                    $conn->query("DELETE FROM waiting WHERE waitingID = '$waitingID'");
                    //complete scheduling
                    $patientsToBeScheduled = $patientsToBeScheduled - 1;
                }
                
            }
           
        }
        else{ //if vaccine not found
            $offset = $offset + 1
        }
    }
    else { //when select query fails, exit the while
        $patientsToBeScheduled = 0;
        echo "<br>";
        echo "No more patients can be scheduled";
        echo "<br>";
    }
    
}


function selectAppropiateVaccine($medConditions,$allergies){
    $offset = 0;
    $medArr = explode(",",$medConditions);
    $allergiesArr = explode(",",$allergies);
    while(!$validVaccine){
        //selects vaccine at offset 
        
        if($vaccineSelected = $conn->query("SELECT * FROM vaccine LIMIT 1 OFFSET '$offset';")){
            $vaccineSelected = $vaccineSelected->fetch_assoc();
            $vaccMedCons = explode(",",$vaccineSelected['medicalConstraints']);
            $validVaccine = true;
            if($vaccineSelected['noOfDosesAvailable'] >= $vaccineSelected['noOfDosesRequired']){
                //check through medical conditions and allergies for conflicts
                foreach($vaccMedCons as $v){
                    foreach($medArr as $m){
                        if($medArr[$m] == $vaccMedCons[$v]){
                            $validVaccine = false
                        }
                    }
                    foreach($allergiesArr as $a){
                        if($allergiesArr[$a] == $vaccMedCons[$v]){
                            $validVaccine = false
                        }
                    }
                }
            }
            else{
                $validVaccine = false;
            }
                

            if(validVaccine){
                return $vaccineSelected['vaccineID'];
            }
            
        }
        else { //when select query fails, exit the while
            
            echo "<br>";
            echo "No more vaccines available";
            echo "<br>";
            return -1;
        }
        $offset = $offset + 1;
    }
}

function scheduleAppointment($patient,$days){
    
    date_default_timezone_set('America/Barbados'); // sets timezone to Barbados
    // sets appointment date
    $appointmentDate = date('Y-m-d', strtotime(" + $days")); 
    $patient['appointmentDate'] = $appointmentDate;
    //updates patient
    updatePatient($patient);

}
?>

