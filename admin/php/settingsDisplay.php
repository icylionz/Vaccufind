<?php
require 'connect.php';

//get the settings data for display
if($settings = $conn->query("SELECT * FROM settings")){
    while($settingsRow = $settings->fetch_object()){
        $setting[] = $settingsRow;
        foreach($setting as $s){
            if($s->settingName == "selectFromWaiting"){
                $selectFromWaiting = $s->settingValue;
                $selectFromWaiting = (int)$selectFromWaiting;
            }
            if($s->settingName == "daysUntilAppointment"){
                $daysUntilAppointment = $s->settingValue;
                $daysUntilAppointment = (int)$daysUntilAppointment;
            }
            if($s->settingName == "elderlyAge"){
                $elderlyAge = $s->settingValue;
                $elderlyAge = (int)$elderlyAge;
            }
        }
    }
}
//display settings form 
echo "<div class='col-lg-12 col-md col-sm-12 form-group'>
<label>Number of Patients to Select From Waiting</label>
<p id='emptySelectFromWaiting'style='color:lightcoral'></p>
<input type='number' id='selectFromWaiting' name='selectFromWaiting' class='form-control' value='$selectFromWaiting' >
<label>Current Value:$selectFromWaiting</label>
</div>

<div class='col-lg-12 col-md col-sm-12 form-group'>
<label>Number of Days Until First Appointment</label>
<p id='emptyDaysUntil'style='color:lightcoral'></p>
<input type='number' id='daysUntil' name='daysUntil' class='form-control' value='$daysUntilAppointment' >
<label>Current Value:$daysUntilAppointment</label>
</div>





<div class='col-lg-12 col-md col-sm-12 form-group'>
<label>Elderly Age (persons this age or older will be given the elderly tag)</label>
<p id='emptyElderlyAge'style='color:lightcoral'></p>
<input type='number' id='elderlyAge' name='elderlyAge' class='form-control' value='$elderlyAge' >
<label>Current Value:$elderlyAge</label>
</div>";










































function enterVaccine(){
    // ensures vaccine name is entered
    if (empty($_POST["vacName"])) {
        header("Location: ../admin_console.php?error3=Vaccine Name is required");
        exit();
    } 
    // ensures Number of doses is entered
    else if (empty($_POST["dosesRequired"])) {
        header("Location: ../admin_console.php?error3=Number of doses is required");
        exit();
    } 
    // ensures Length of time is entered
    else if (empty($_POST["time"])) {
        header("Location: ../admin_console.php?error3=Length of time is required");
        exit();
    } 
    // ensures Number of doses available is entered
    else if (empty($_POST["dosesAvailable"])) {
        header("Location: ../admin_console.php?error3=Number of doses available is required");
        exit();
    } 
    else{
        $name = modifyInput($_POST["vacName"]);
        $required = modifyInput($_POST["dosesRequired"]);
        $time = modifyInput(empty($_POST["time"]));
        $available = modifyInput($_POST["dosesAvailable"]);
        if (!empty($_POST["medicalConstraints[]"])) {
            $medicalConstraints = implode(",",$_POST["medicalConstraints[]"]);
         
            
            
            
        }
        else{ //set medical constraints to NULL
            insertVaccine($name, $required, $time, $available, NULL);
        }
    }

    
    

}


?>