<?php

// define variables and set to empty values
$firstNameErr = $lastNameErr = $nidPassportErr = $dobErr = $streetAddressErr = $phoneEmailErr = $countryErr = "";
$medicalConditionsArr = array();
$allergiesArr = array();
if(isset($_POST['submit'])){
    
    // ensures first name is entered
    if (empty($_POST["firstName"])) {
        $firstNameErr = "First Name is required";
        echo "11";
    } 
    
    // ensures last name is entered
    else if (empty($_POST["lastName"])) {
        $lastNameErr = "Last Name is required";
        echo "2";
    } 
    // ensures nid or passport number is entered
    else if (empty($_POST["nid"]) and empty($_POST["passportNumber"])) {
        $nidPassportErr = "National Identification Number is required Or Passport Number is required";
        echo "3";
    } 
    // ensures phone number or email address is entered
    else if (empty($_POST["phoneNumber"]) and empty($_POST["email"])) {
        $phoneEmailErr = "Phone Number is required Or Email is required";
        echo "4";
    } 
    // ensures date of birth is entered
    else if (empty($_POST["dob"])) {
        $dobErr = "Date of Birth is required";
        echo "5";
    } 
    
    // ensures Street Address is entered
    else if (empty($_POST["streetAddress"])) {
        $streetAddressErr = "Street Address is required";
        echo "6";
    } 
    
    // ensures country is entered
    else if (empty($_POST["country"])) {
        $countryErr = "Country is required";
        echo "7";
    } 
    else {
        $lastName = modifyInput($_POST["lastName"]);
        $country = modifyInput($_POST["country"]);
        $phoneNumber = modifyInput($_POST["phoneNumber"]);
        $email = modifyInput($_POST["email"]);
        $streetAddress = modifyInput($_POST["streetAddress"]);
        $medicalConditionsArr = $_POST["medicalConditions"];
        $medicalConditions = implode(",",$medicalConditionsArr);
        $medicalConditions = modifyInput($medicalConditions);
        $allergiesArr = $_POST["allergies"];
        $allergies = implode(",",$allergiesArr);
        $allergies = modifyInput($allergies);
        $nid = modifyInput($_POST["nid"]);
        $passportNumber = modifyInput($_POST["passportNumber"]);
        $dob = modifyInput($_POST["dob"]);
        $firstName = modifyInput($_POST["firstName"]);
        insertPatient($firstName, $lastName, $dob, $streetAddress, $phoneNumber, $email, $country, $medicalConditions, $allergies, $nid, $passportNumber);
        echo "8";
    }
    //echo "1";
   // header("location: /vaccufind/registration.php");
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
    require "connect.php";

    $conn = connectVaccufind();
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