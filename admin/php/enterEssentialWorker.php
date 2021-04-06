<?php
enterEssentialWorker();
function enterEssentialWorker(){
    // ensures first name is entered
    if (empty($_POST["ess_first_Name"])) {
        header("Location: ../admin_console.php?error=First Name is required");
        exit();
    } 
    else if (strlen($_POST["ess_first_Name"]) < 3 || strlen($_POST["ess_first_Name"]) > 25 )
    {
        header("Location: ../admin_console.php?error=First Name must be between length of 3-25");
        exit();
    }
    // ensures last name is entered
    else if (empty($_POST["ess_last_Name"])) {
        header("Location: ../admin_console.php?error=Last Name is required");
        exit();
    } 
    else if (strlen($_POST["ess_last_Name"]) < 3 || strlen($_POST["ess_last_Name"]) > 25 )
    {
        header("Location: ../admin_console.php?error=Last Name must be between length of 3-25");
        exit();
    }
    // ensures nid is entered
    else if (empty($_POST["ess_natid"])) {
        header("Location: ../admin_console.php?error=National ID is required");
        exit();
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