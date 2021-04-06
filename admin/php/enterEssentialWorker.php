<?php
enterEssentialWorker();
function enterEssentialWorker(){
    // define variables and set to empty values
    $_SESSION['errorEssFirstName'] = $_SESSION['errorEssLastName'] = $_SESSION['errorEssNid'] = "";

   
       
    // ensures first name is entered
    if (empty($_POST["ess_first_Name"])) {
        $_SESSION['errorEssFirstName'] = "First Name is required";
        echo $_SESSION['errorEssFirstName'];
    } 
    // ensures last name is entered
    else if (empty($_POST["ess_last_Name"])) {
        $_SESSION['errorEssLastName'] = "Last Name is required";
        echo $_SESSION['errorEssLastName'];
    } 
    // ensures nid is entered
    else if (empty($_POST["ess_natid"])) {
        $_SESSION['errorEssNid'] = "National Identification Number is required";   
        echo $_SESSION['errorEssNid'];
    } 
    else{
        
        $firstName = modifyInput($_POST["ess_first_Name"]);
        $lastName = modifyInput($_POST["ess_last_Name"]);
        $nid = modifyInput($_POST["ess_natid"]);
        echo $firstName,$lastName,$nid;
        insertEssential($firstName, $lastName, $nid);
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

//inserts the essential worker's record into the database
function insertEssential($firstNameInsert,$lastNameInsert,$nidInsert){
    require 'connect.php';

    $sql = "INSERT INTO essentialworkers (essentialWorkerFirstName, essentialWorkerLastName , nid) 
    VALUES ('$firstNameInsert', '$lastNameInsert', '$nidInsert')";

    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?> 