<?php
function enterEssentialWorker(){
    // define variables and set to empty values
    $firstNameErr = $lastNameErr = $nidErr = "";

    if(isset($_POST['submit'])) {
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
            
            $lastName = modifyInput($_POST["lastName"]);
            $firstName = modifyInput($_POST["firstName"]);
            $nid = modifyInput($_POST["nid"]);
            insertEssential($firstName,$lastName,$nid);
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

//inserts the essential worker's record into the database
function insertEssential($firstNameInsert,$lastNameInsert,$nidInsert){
    require 'connect.php';
    $conn = connectVaccufind();

    $sql = "INSERT INTO essential (firstName, lastName, nid) 
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