<?php

// define variables and set to empty values
$firstNameErr = $lasstNameErr = $nidErr = "";

if(isset($_POST['submit'])) {
    $validForm = 0;
    // ensures first name is entered
    if (empty($_POST["firstName"])) {
        $firstNameErr = "First Name is required";
        $validForm = $validForm + 1;
    } 
    else {
        $firstName = modifyInput($_POST["firstName"]);
    }
    // ensures last name is entered
    if (empty($_POST["lastName"])) {
        $lastNameErr = "Last Name is required";
        $validForm = $validForm + 1;
    } 
    else {
        $lastName = modifyInput($_POST["lastName"]);
    }
    // ensures nid is entered
    if (empty($_POST["nid"])) {
        $nidErr = "National Identification Number is required";
        $validForm = $validForm + 1;
    } 
    else {
        $nid = modifyInput($_POST["nid"]);
    }
    if($validForm == 3){
        insertEssential($firstName, $lastName, $nid);
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
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "myDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

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