<?php
require 'connect.php';



// fetches all patient records
$waitingTableData = array();
if($waitingRecords = $conn->query("SELECT patient.patientID, patient.firstName, patient.lastName, patient.nid, patient.passportNumber FROM waiting INNER JOIN patient ON patient.patientID = waiting.patientID ORDER BY patient.tag ASC, waiting.dateAdded ASC")){
    if($waitingRecords->num_rows > 0){
        while($waitingRow = $waitingRecords->fetch_object()){
            $waitingTableData[] = $waitingRow;
            
        }
        if(count($waitingTableData) > 0){
            foreach($waitingTableData as $w){
        
        
                echo "<tr>
                    
                    <td class='patientID' id='$w->patientID' onclick='on2()'>$w->patientID</td>
                    <td>$w->firstName</td>
                    <td>$w->lastName</td>
                    <td>$w->nid</td>
                    <td>$w->passportNumber</td>
                </tr>";
                
            
               
            }
        }
    }
    else{
        echo "No patient records stored";
    }

}




$conn->close();
?> 