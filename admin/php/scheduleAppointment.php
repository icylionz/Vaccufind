<?php
require 'connect.php';
require 'updateInfo.php';


if($patientsToBeScheduled = $conn->query("SELECT * FROM settings WHERE settingName = 'selectFromWaiting'")){

    $patientsToBeScheduled = $patientsToBeScheduled->fetch_assoc();
    $patientsToBeScheduled = $patientsToBeScheduled['settingValue'];
    
    
}
else {
    //display error message
    header("location: /vaccufind/admin/admin_console.php");
}
$offset = 0;echo "dgadfda";
while($patientsToBeScheduled > 0){
    //selects patient at the top of the list 
    $size = $conn->query("SELECT * FROM waiting INNER JOIN patient ON patient.patientID = waiting.patientID ORDER BY patient.tag ASC, waiting.dateAdded ASC");
    $size = $size->num_rows;
    if($offset >= $size){
        $patientsToBeScheduled = 0;
        
    }
    else {

    
        $sql = "SELECT patient.* FROM waiting INNER JOIN patient ON patient.patientID = waiting.patientID ORDER BY patient.tag ASC, waiting.dateAdded ASC LIMIT 1 OFFSET $offset";
    
        if($patientChosen = $conn->query($sql)){
            if($patientChosen->num_rows > 0){
                $patientChosen = $patientChosen->fetch_assoc();
                //find appropiate vaccine
                $vaccineID = selectAppropiateVaccine($patientChosen['medicalConditions'],$patientChosen['allergies']);
                echo "vaccineid:",$vaccineID;
                if($vaccineID > -1){ //if vaccine found
                    echo "vaccine gud";
                    if($validVaccine = $conn->query("SELECT * FROM vaccine WHERE vaccineID = $vaccineID")){
                        if($daysUntil = $conn->query("SELECT * FROM settings WHERE settingName = 'daysUntilAppointment'")){
                            $daysUntil = $daysUntil->fetch_assoc();
                            $validVaccine = $validVaccine->fetch_assoc();
                            $patientChosen['vaccineGivenID'] = $validVaccine['vaccineID'];
                            $patientChosen['noOfDosesRemaining'] = $validVaccine['noOfDosesRequired'];
                            $validVaccine['noOfDosesAvailable'] = $validVaccine['noOfDosesAvailable'] - $validVaccine['noOfDosesRequired']; // updates vaccine doses available
                            
                            updateVaccine($validVaccine);
                            echo "Patient Chosen's ID: ", $patientChosen['patientID'];
                            updatePatient($patientChosen);

                            echo $daysUntil['settingValue'];
                            scheduleAppointment($patientChosen, $daysUntil['settingValue']);
                            //remove record from waiting list

                            $waitingID = $conn->query("SELECT waitingID FROM waiting INNER JOIN patient ON patient.patientID = waiting.patientID ORDER BY patient.tag ASC, waiting.dateAdded ASC LIMIT 1 OFFSET $offset");
                            $waitingID = $waitingID->fetch_assoc();
                            $waitingID = $waitingID['waitingID'];
                            
                            $conn->query("DELETE FROM waiting WHERE waitingID = '$waitingID'");

                            
                            //complete scheduling
                            $patientsToBeScheduled = $patientsToBeScheduled - 1;

                        }
                        else{
                            echo "days until not fetched",$conn->error;
                        }
                        
                    }
                    else{
                        echo "vaccine not fetched",$conn->error;
                    }
                
                }
                else{ //if vaccine not found
                    $offset = $offset + 1;
                }    
            }
            else{
                $patientsToBeScheduled = 0;
                echo "No more patients can be scheduled", $conn->error;
                echo "<br>";
                header("location: /vaccufind/admin/admin_console.php");
            }
            
        }
        else { //when select query fails, exit the while
            $patientsToBeScheduled = 0;
            echo "Error has occured", $conn->error;
            echo "<br>";
            header("location: /vaccufind/admin/admin_console.php");
        }
    }
}
header("location: /vaccufind/admin/admin_console.php");

function selectAppropiateVaccine($medConditions,$allergies){
    require 'connect.php';
    $offset = 0;
    $size = $conn->query("SELECT * FROM vaccine;");
    $size = $size->num_rows;
    echo "size: ",$size;
    $medArr = explode(",",$medConditions);
    $allergiesArr = explode(",",$allergies);
    $validVaccine = false;
    while($validVaccine == false){
        //selects vaccine at offset 
    
        if($offset < $size){
            
            if($vaccineSelected = $conn->query("SELECT * FROM vaccine LIMIT 1 OFFSET $offset;")){
                echo "entered";
                $vaccineSelected = $vaccineSelected->fetch_assoc();
                
                $vaccMedCons = explode(",",$vaccineSelected['medicalConstraints']);
                $validVaccine = true;
                echo "before ammount check ",$validVaccine;
                if($vaccineSelected['medicalConstraints'] == ""){
                    $validVaccine = true;
                    echo "empty";
                }
                else if($vaccineSelected['noOfDosesAvailable'] >= $vaccineSelected['noOfDosesRequired']){
                    //check through medical conditions and allergies for conflicts
                    echo "<br>inside amount check";
                    foreach($vaccMedCons as $v){
                        echo "<br>compare with",$v;
                        foreach($medArr as $m){
                            if($m == $v){
                                echo $m;
                                echo "<br>";
                                $validVaccine = false;
                                echo "<br>Turned false by ",$m;
                            }
                            
                        }
                        foreach($allergiesArr as $a){
                            if($a == $v){
                                echo $a;
                                echo "<br>";
                                $validVaccine = false;
                               
                            }
                            
                        }
                    }
                    
                }
                else{
                    echo "Boolean: ",$validVaccine;
                    $validVaccine = false;
                }
                    

                if($validVaccine){
                    $vaccineSelectedID = $vaccineSelected['vaccineID'];
                    return $vaccineSelectedID;
                }
                
            }
            else { //when select query fails, exit the while
                
                echo "<br>";
                echo "Query Error: ",$conn->error;
                echo "<br>";
                return -1;
            }
            $offset = $offset + 1;
        }
        else {
            echo "No valid Vaccines";
            return -1;
        }
        
    }
}

function scheduleAppointment($patient,$days){
    
    date_default_timezone_set('America/Barbados'); // sets timezone to Barbados
    // sets appointment date
    $current = date('Y-m-d');
    $appointmentDate = date('Y-m-d', strtotime($current." + $days days")); 
    echo $appointmentDate;
    $patient['appointmentDate'] = $appointmentDate;
    //updates patient
    updatePatient($patient);

}
?>

