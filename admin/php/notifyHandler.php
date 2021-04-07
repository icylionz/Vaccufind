<?php
require 'connect.php';
// fetches all patient records
$notifyData = array();
if($notifyRecords = $conn->query("SELECT * FROM patient WHERE appointmentDate IS NOT NULL ORDER BY ABS(DATEDIFF(appointmentDate, NOW())) ASC")){
    if($notifyRecords->num_rows > 0){
        while($notifyRow = $notifyRecords->fetch_object()){
            $notifyData[] = $notifyRow;
            
        }
        if(count($notifyData) > 0){
            foreach($notifyData as $w){
        
        
                echo "
                    <div class='notify_item'>
                        <br>
                        <br>
                        <p><a class='patientID' id='$w->patientID' onclick='on3();'>[#$w->patientID]$w->firstName $w->lastName</a>'s Appointment scheduled for $w->appointmentDate </p>
                        <br>
                    </div>
                    
                ";
                
            
               
            }
        }
    }
    else{
        echo "No appointments scheduled";
    }

}




$conn->close();


?>