<?php

// define variables and set to empty values
$firstNameErr = $lastNameErr = $nidPassportErr = "";

if(isset($_POST['submit'])) {
    $validForm = 0;
    // ensures first name is entered
    if (empty($_POST["firstName"])) {
        $firstNameErr = "First Name is required";
        
    } 
    else {
        $firstName = modifyInput($_POST["firstName"]);
        $validForm = $validForm + 1;
    }
    // ensures last name is entered
    if (empty($_POST["lastName"])) {
        $lastNameErr = "Last Name is required";
        
    } 
    else {
        $lastName = modifyInput($_POST["lastName"]);
        $validForm = $validForm + 1;
    }
    // ensures nid or passport number is entered
    if (empty($_POST["nid"]) and empty($_POST["passportNumber"])) {
        $nidPassportErr = "National Identification Number is required Or Passport Number is required";
        
    } 
    else {
        $nid = modifyInput($_POST["nid"]);
        $passportNumber = modifyInput($_POST["passportNumber"]);
        $validForm = $validForm + 1;
    }
    // ensures phone number or email address is entered
    if (empty($_POST["phoneNumber"]) and empty($_POST["email"])) {
        $phoneEmailErr = "Phone Number is required Or Email is required";
        
    } 
    else {
        $phoneNumber = modifyInput($_POST["phoneNumber"]);
        $email = modifyInput($_POST["email"]);
        $validForm = $validForm + 1;
    }
    // ensures date of birth is entered
    if (empty($_POST["dob"])) {
        $dobErr = "Date of Birth is required";
    } 
    else {
        $dob = modifyInput($_POST["dob"]);
        $validForm = $validForm + 1;
    }
    // ensures Street Address is entered
    if (empty($_POST["address"])) {
        $streetAddressErr = "Street Address is required";
    } 
    else {
        $streetAddress = modifyInput($_POST["streetAddress"]);
        $validForm = $validForm + 1;
    }
    // ensures country is entered
    if (empty($_POST["country"])) {
        $countryErr = "Country is required";
    } 
    else {
        $country = modifyInput($_POST["country"]);
        $validForm = $validForm + 1;
    }
    $medicalConditions = modifyInput($_POST["medicalConditions"]);
    if($validForm >= 7){
        insertPatient($firstName, $lastName, $dob, $streetAddress, $phoneNumber, $email, $country, $medicalConditions, $nid, $passportNumber);
    }

}
    
//modifies input
function modifyInput($input) {
    $input = stripslashes($input); // removes / and \ from the input
    $input = trim($input); // removes whitespaces from the input
    $input = htmlspecialchars($input); // security feature to rename special characters (prevents malicious attempts to enter html code into the form)
    return $input;
} 

//inserts the patient's record into the database
function insertPatient($firstNameInsert, $lastNameInsert, $dobInsert, $streetAddressInsert, $phoneNumberInsert, $emailInsert, $countryInsert, $medicalConditionsInsert, $nidInsert, $passportNumberInsert){
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

    $sql = "INSERT INTO patient (firstName, lastName, dob, streetAddress,phoneNumber,email,country,medicalConditions,nid,passportNumber) 
    VALUES ($firstNameInsert, $lastNameInsert, $dobInsert, $streetAddressInsert, $phoneNumberInsert, $emailInsert, $countryInsert, $medicalConditionsInsert, $nidInsert, $passportNumberInsert)";

    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "You have registered successfully";
    } else {
        echo "Error: Patient has already registered.";
    }
    $conn->close();
}

?> 