<?php
require 'connect.php';



// fetches all patient records
$patientTableData = array();
if($patientRecords = $conn->query("SELECT patientID, firstName, lastName, nid, passportNumber FROM patient")){
    if($patientRecords->num_rows > 0){
        while($patientRow = $patientRecords->fetch_object()){
            $patientTableData[] = $patientRow;
            
        }
        if(count($patientTableData) > 0){
            foreach($patientTableData as $p){
        
        
                echo "<tr>
                    
                    <td><a class='patientID' id='$p->patientID' onclick='on1()'>$p->patientID</a></td>
                    <td><a class='patientID' id='$p->patientID' onclick='on1()'>$p->firstName</a></td>
                    <td><a class='patientID' id='$p->patientID' onclick='on1()'>$p->lastName</a></td>
                    <td><a class='patientID' id='$p->patientID' onclick='on1()'>$p->nid</a></td>
                    <td><a class='patientID' id='$p->patientID' onclick='on1()'>$p->passportNumber</a></td>
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