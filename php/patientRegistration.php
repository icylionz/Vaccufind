<?php

// define variables and set to empty values
$firstNameErr = $lastNameErr = $nidPassportErr = $dobErr = $streetAddressErr = $phoneEmailErr = $countryErr = "";
$medicalConditionsArr = array();
$allergiesArr = array();
if(isset($_POST['submit'])){
    
    // ensures first name is entered
    if (empty($_POST["firstName"])) {
        header("Location: ../registration.php?error=First Name is required");
        exit();
    } 
    else if (strlen($_POST["firstName"]) < 3 || strlen($_POST["firstName"]) > 25 )
    {
        header("Location: ../registration.php?error=First Name must be between length of 3-25");
        exit();
    }
    // ensures last name is entered
    else if (empty($_POST["lastName"])) {
        header("Location: ../registration.php?error=Last Name is required");
        exit();
    }
    else if (strlen($_POST["lastName"]) < 3 || strlen($_POST["lastName"]) > 25 )
    {
        header("Location: ../registration.php?error=Last Name must be between length of 3-25");
        exit();
    }
    // ensures nid or passport number is entered
    else if (empty($_POST["nid"]) and empty($_POST["passportNumber"])) {
        header("Location: ../registration.php?error=National ID or Passport Number is required");
        exit();
    } 
    // ensures date of birth is entered
    else if (empty($_POST["dob"])) {
        header("Location: ../registration.php?error=Date of Birth is required");
        exit();
    } 
    // ensures phone number or email address is entered
    else if (empty($_POST["phoneNumber"]) and empty($_POST["email"])) {
        header("Location: ../registration.php?error=Phone Number or Email is required");
        exit();
    } 
    // ensures Street Address is entered
    else if (empty($_POST["streetAddress"])) {
        header("Location: ../registration.php?error=Street Address is required");
        exit();
    } 
    
    // ensures country is entered
    else if (empty($_POST["country"])) {
        header("Location: ../registration.php?error=Country is required");
        exit();
    } 
    else {
        $lastName = modifyInput($_POST["lastName"]);
        $country = modifyInput($_POST["country"]);
        $phoneNumber = modifyInput($_POST["phoneNumber"]);
        $email = modifyInput($_POST["email"]);
        $streetAddress = modifyInput($_POST["streetAddress"]);
        
        
        $nid = modifyInput($_POST["nid"]);
        $passportNumber = modifyInput($_POST["passportNumber"]);
        $dob = modifyInput($_POST["dob"]);
        $firstName = modifyInput($_POST["firstName"]);
        
        if(!empty($_POST["medicalConditions"]) && !empty($_POST["allergies"])){
            $medicalConditionsArr = $_POST["medicalConditions"];
            $medicalConditions = implode(",",$medicalConditionsArr);
            $medicalConditions = modifyInput($medicalConditions);
            $allergiesArr = $_POST["allergies"];
            $allergies = implode(",",$allergiesArr);
            $allergies = modifyInput($allergies);
            insertPatient($firstName, $lastName, $dob, $streetAddress, $phoneNumber, $email, $country, $medicalConditions, $allergies, $nid, $passportNumber);
        }
        else if(!empty($_POST["medicalConditions"])){
            $medicalConditionsArr = $_POST["medicalConditions"];
            $medicalConditions = implode(",",$medicalConditionsArr);
            $medicalConditions = modifyInput($medicalConditions);
            insertPatient($firstName, $lastName, $dob, $streetAddress, $phoneNumber, $email, $country, $medicalConditions, NULL, $nid, $passportNumber);
        }
        else if(!empty($_POST["allergies"])){
            $allergiesArr = $_POST["allergies"];
            $allergies = implode(",",$allergiesArr);
            $allergies = modifyInput($allergies);
            insertPatient($firstName, $lastName, $dob, $streetAddress, $phoneNumber, $email, $country, NULL, $allergies, $nid, $passportNumber);
        }
      
        
        
            
        
    }
    
    header("location: ../registration.php");
}


    
    
    
//modifies input
function modifyInput($input) {
    $input = stripslashes($input); // removes / and \ from the input
    $input = trim($input); // removes whitespaces from the input
    $input = htmlspecialchars($input); // security feature to rename special characters (prevents malicious attempts to enter html code into the form)
    return $input;
} 

//inserts the patient's record into the database
function insertPatient($firstNameInsert, $lastNameInsert, $dobInsert, $streetAddressInsert, $phoneNumberInsert, $emailInsert, $countryInsert, $medicalConditionsInsert, $allergiesInsert, $nidInsert, $passportNumberInsert){
    require "connect.php";
    //calculates patient's age
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dobInsert), date_create($today));
    $age = $diff->format('%y'); 
    $conn = connectVaccufind();
    //assign tag to patient
    $tagInsert = 5;
    //medical worker tag
    echo "medcon:",$medicalConditionsInsert;
    if($result = $conn->query("SELECT * FROM medicalworkers WHERE nid = $nidInsert")){
        if($result->num_rows > 0){
            $tagInsert = 1;
        }
    }
    //essential worker tag
   
    else if($result = $conn->query("SELECT * FROM essentialworkers WHERE nid = $nidInsert")){
        if($result->num_rows > 0){
            $tagInsert = 2;
        }
    }
    //elderly tag
    
    else if($age >= 65 ){
        $tagInsert = 3;    
    }
    //medically comprised tag
    
    else if($medicalConditionsInsert != NULL){
        $tagInsert = 4;
    }
    
    //inserts into patient table
    if(!empty($nidInsert) && !empty($passportNumberInsert)){
        $sql = "INSERT INTO patient (firstName, lastName, dob, streetAddress,phoneNumber,email,country,medicalConditions,allergies,nid,passportNumber,tag) 
        VALUES ('$firstNameInsert', '$lastNameInsert', '$dobInsert', '$streetAddressInsert', '$phoneNumberInsert', '$emailInsert', '$countryInsert', '$medicalConditionsInsert', '$allergiesInsert', , '$passportNumberInsert',$tagInsert);";
    }
    else if(empty($nidInsert)){
        $sql = "INSERT INTO patient (firstName, lastName, dob, streetAddress,phoneNumber,email,country,medicalConditions,allergies,nid,passportNumber,tag) 
        VALUES ('$firstNameInsert', '$lastNameInsert', '$dobInsert', '$streetAddressInsert', '$phoneNumberInsert', '$emailInsert', '$countryInsert', '$medicalConditionsInsert', '$allergiesInsert', NULL, '$passportNumberInsert',$tagInsert);";

    }
    else if(empty($passportNumberInsert)){
        $sql = "INSERT INTO patient (firstName, lastName, dob, streetAddress,phoneNumber,email,country,medicalConditions,allergies,nid,passportNumber,tag) 
        VALUES ('$firstNameInsert', '$lastNameInsert', '$dobInsert', '$streetAddressInsert', '$phoneNumberInsert', '$emailInsert', '$countryInsert', '$medicalConditionsInsert', '$allergiesInsert', '$nidInsert', NULL,$tagInsert);";
    }    
    
    if ($conn->query($sql) === TRUE) {
        echo "You have registered successfully";
    } else {
        echo "Error: Patient has already registered.". $conn->error;
    }
    //inserts into waiting table
    if($addedID = $conn->query("SELECT MAX(patientID) AS maxim FROM patient")){
        echo "patient id received";
    } 
    else {
        echo "Error: Patient id has not been regsitered.". $conn->error;
    }
    $addedID = $addedID->fetch_assoc();
   
   
    $addedID = $addedID['maxim'];
  
    $sql = "INSERT INTO waiting (patientID) VALUES ('$addedID')";
    if ($conn->query($sql) === TRUE) {
        echo "You have registered successfully";
    } else {
        echo "Error: Patient has already registered.". $conn->error;
    }
    $conn->close();
}

?> 