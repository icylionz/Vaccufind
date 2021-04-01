<?php
function enterMedicalWorker(){
    // define variables and set to empty values
    $firstNameErr = $lastNameErr = $nidErr = "";

    if(isset($_POST['submit'])) {
        $validForm = 0;
        // ensures first name is entered
        if (empty($_POST["firstName"])) {
            $firstNameErr = "First Name is required";
            
        } 
        // ensures last name is entered
        else if (empty($_POST["lastName"])) {
            $lastNameErr = "Last Name is required";
            
        } 
        // ensures nid is entered
        else if (empty($_POST["nid"])) {
            $nidErr = "National Identification Number is required";
         
        } 
        else {
            $firstName = modifyInput($_POST["firstName"]);
            $lastName = modifyInput($_POST["lastName"]);
            $nid = modifyInput($_POST["nid"]);
            insertMedical($firstName,$lastName,$nid);
        }    
    }
}


//modifies input
function modifyInput($input) {
    $input = stripslashes($input); // removes / and \ from the input
    $input = trim($input); // removes whitespaces from the input
    $input = htmlspecialchars($input); // security feature to rename special characters (prevents malicious attempts to enter html code into the form)
    return $input;
} 

//inserts the medical worker's record into the database
function insertMedical($firstNameInsert,$lastNameInsert,$nidInsert){
    require 'connect.php';
    $conn = connectVaccufind();
    
    $sql = "INSERT INTO medical (firstName, lastName, nid) 
    VALUES ($firstNameInsert, $lastNameInsert, $nidInsert)";

    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?> 