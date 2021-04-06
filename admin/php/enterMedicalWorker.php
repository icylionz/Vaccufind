<?php
enterMedicalWorker();
function enterMedicalWorker(){
    // define variables and set to empty values
    $errorMedFirstName = $errorMedLastName = $errorMedNid = "";

        $validForm = 0;
        // ensures first name is entered
        if (empty($_POST["firstName"])) {
            $errorMedFirstName = "First Name is required";
            $validForm = $validForm + 1;
        } 
        else {
            $firstName = modifyInput($_POST["firstName"]);
        }
        // ensures last name is entered
        if (empty($_POST["lastName"])) {
            $errorMedLastName = "Last Name is required";
            $validForm = $validForm + 1;
        } 
        else {
            $lastName = modifyInput($_POST["lastName"]);
        }
        // ensures nid is entered
        if (empty($_POST["nid"])) {
            $errorMedNid = "National Identification Number is required";
            $validForm = $validForm + 1;
        } 
        else {
            $nid = modifyInput($_POST["nid"]);
        }
        if($validForm == 3){
            insertMedical($firstName, $lastName, $nid);
        }
  
    header("location: /vaccufind/admin/admin_console.php");
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