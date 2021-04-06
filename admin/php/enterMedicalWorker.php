<?php
enterMedicalWorker();
function enterMedicalWorker(){
    // define variables and set to empty values
    $_SESSION['errorMedFirstName'] = $_SESSION['errorMedLastName'] = $_SESSION['errorMedNid'] = "";

   
       
    // ensures first name is entered
    if (empty($_POST["med_first_Name"])) {
        $_SESSION['errorMedFirstName'] = "First Name is required";
        echo $_SESSION['errorMedFirstName'];
    } 
    // ensures last name is entered
    else if (empty($_POST["med_last_Name"])) {
        $_SESSION['errorMedLastName'] = "Last Name is required";
        echo $_SESSION['errorMedLastName'];
    } 
    // ensures nid is entered
    else if (empty($_POST["med_natid"])) {
        $_SESSION['errorMedNid'] = "National Identification Number is required";   
        echo $_SESSION['errorMedNid'];
    } 
    else{
        
        $firstName = modifyInput($_POST["med_first_Name"]);
        $lastName = modifyInput($_POST["med_last_Name"]);
        $nid = modifyInput($_POST["med_natid"]);
        echo $firstName,$lastName,$nid;
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

    $sql = "INSERT INTO medicalworkers (medicalWorkerFirstName, medicalWorkerLastName , nid) 
    VALUES ('$firstNameInsert', '$lastNameInsert', '$nidInsert')";

    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "New record created succmedfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?> 