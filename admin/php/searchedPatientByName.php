<?php
require 'connect.php';

function modifyInput($input) {
    $input = stripslashes($input); // removes / and \ from the input
    $input = trim($input); // removes whitespaces from the input
    $input = htmlspecialchars($input); // security feature to rename special characters (prevents malicious attempts to enter html code into the form)
    return $input;
} 

$searchByFirstName = modifyInput($_POST["searchByFirstName"]);
$searchByLastName = modifyInput($_POST["searchByLastName"]);

// fetches all patient records
$patientTableData = array();
if($patientRecords = $conn->query("SELECT patientID, firstName, lastName, nid, passportNumber FROM patient WHERE firstName='$searchByFirstName' AND lastName='$searchByLastName'")){
    if($patientRecords->num_rows > 0){
        while($patientRow = $patientRecords->fetch_object()){
            $patientTableData[] = $patientRow;
            
        }
        if(count($patientTableData) > 0){
            foreach($patientTableData as $p){
        
        
                echo "<tr>
                    
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