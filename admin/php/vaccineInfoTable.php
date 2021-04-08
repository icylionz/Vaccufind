<?php
require 'connect.php';



// fetches all patient records
$vaccineTableData = array();
if($vaccineRecords = $conn->query("SELECT * FROM vaccine")){
    if($vaccineRecords->num_rows > 0){
        while($vaccineRow = $vaccineRecords->fetch_object()){
            $vaccineTableData[] = $vaccineRow;
            
        }
        if(count($vaccineTableData) > 0){
            foreach($vaccineTableData as $v){
        
        
                echo "<tr>
                    
                    <td>$v->vaccineID</td>
                    <td>$v->vaccineName</td>
                    <td>$v->lengthOfTimeBetweenDoses </td>
                    <td>$v->noOfDosesRequired </td>
                    <td>$v->noOfDosesAvailable</td>
                    <td style='word-wrap: break-word'>$v->medicalConstraints</td>
                    
                </tr>";
                
            
               
            }
        }
    }
    else{
        echo "No vaccine records stored";
    }

}




$conn->close();
?> 