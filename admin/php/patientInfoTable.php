<?php
require 'connect.php';



// fetches all patient records
$patientTableData = array();
if($patientRecords = $conn->query("SELECT patientID, firstName, lastName, nid, passportNumber FROM patient ")){
    if($patientRecords->num_rows > 0){
        while($patientRow = $patientRecords->fetch_object()){
            $patientTableData[] = $patientRow;
            
        }
        if(count($patientTableData) > 0){
            foreach($patientTableData as $p){
        
        
                echo "<tr id='$p->patientID'>
                    
                    <td class='patientID' id='$p->patientID' onclick='on1()'>$p->patientID</td>
                    <td>$p->firstName</td>
                    <td>$p->lastName</td>
                    <td>$p->nid</td>
                    <td>$p->passportNumber</td>
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