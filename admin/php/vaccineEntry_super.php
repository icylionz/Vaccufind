<?php
    enterVaccine();
    function enterVaccine(){
        // ensures vaccine name is entered
        if (empty($_POST["vacName"])) {
            header("Location: ../admin_console.php?error3=Vaccine Name is required");
            exit();
        } 
        // ensures Number of doses is entered
        else if (empty($_POST["dosesRequired"])) {
            header("Location: ../admin_console.php?error3=Number of doses is required");
            exit();
        } 
        // ensures Length of time is entered
        else if (empty($_POST["time"])) {
            header("Location: ../admin_console.php?error3=Length of time is required");
            exit();
        } 
        // ensures Number of doses available is entered
        else if (empty($_POST["dosesAvailable"])) {
            header("Location: ../admin_console.php?error3=Number of doses available is required");
            exit();
        } 
        else{
            $name = modifyInput($_POST["vacName"]);
            $required = modifyInput($_POST["dosesRequired"]);
            $time = modifyInput($_POST["time"]);
            $available = modifyInput($_POST["dosesAvailable"]);
            
            if (!empty($_POST["medicalConstraints"])) {
                $medicalConstraints = implode(",",$_POST["medicalConstraints"]);  
                insertVaccine($name, $required, $time, $available, $medicalConstraints);
            }
            else{ //set medical constraints to NULL
                insertVaccine($name, $required, $time, $available, NULL);
            }
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
    
    //inserts the essential worker's record into the database
    function insertVaccine($vacname,$dosesreq,$time,$dosesavailable,$medConst){
        require 'connect.php';
    
        $sql = "INSERT INTO vaccine (vaccineName, lengthOfTimeBetweenDoses, noOfDosesRequired, medicalConstraints, noOfDosesAvailable) 
        VALUES ('$vacname', '$time', '$dosesreq','$medConst','$dosesavailable')";
    
        $result = $conn->query($sql);
    
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    
?>