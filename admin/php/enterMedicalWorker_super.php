<?php
enterMedicalWorker();
function enterMedicalWorker(){
    // ensures first name is entered
    if (empty($_POST["med_first_Name"])) {
        header("Location: ../admin_console.php?error2=First Name is required");
        exit();
    } 
    else if (strlen($_POST["med_first_Name"]) < 3 || strlen($_POST["med_first_Name"]) > 25 )
    {
        header("Location: ../admin_console.php?error=First Name must be between length of 3-25");
        exit();
    }
    // ensures last name is entered
    else if (empty($_POST["med_last_Name"])) {
        header("Location: ../admin_console.php?error2=Last Name is required");
        exit();
    } 
    else if (strlen($_POST["med_last_Name"]) < 3 || strlen($_POST["med_last_Name"]) > 25 )
    {
        header("Location: ../admin_console.php?error2=Last Name must be between length of 3-25");
        exit();
    }
    // ensures nid is entered
    else if (empty($_POST["med_natid"])) {
        header("Location: ../admin_console.php?error2=National ID is required");
        exit();
    } 
    else{
        
        $firstName = modifyInput($_POST["med_first_Name"]);
        $lastName = modifyInput($_POST["med_last_Name"]);
        $nid = modifyInput($_POST["med_natid"]);
        echo $firstName,$lastName,$nid;
        insertMedical($firstName, $lastName, $nid);
    }

    
    header("location: ../super_admin_console.php");   

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
    require 'updateInfo.php';

    $sql = "INSERT INTO medicalworkers (medicalWorkerFirstName, medicalWorkerLastName , nid) 
    VALUES ('$firstNameInsert', '$lastNameInsert', '$nidInsert')";


    if ($conn->query($sql) === TRUE) {
        echo "New record created succmedfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //update patient records of anyone that matches this record
    $sql = "SELECT * FROM patient WHERE nid = '$nidInsert' LIMIT 1";
    if ($result = $conn->query($sql)) {
        if($result->num_rows > 0){
            $result = $result->fetch_assoc();
            if($result['tag'] > 1){
                $result['tag'] = 1;
                updatePatient($result);
            }

        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?> 