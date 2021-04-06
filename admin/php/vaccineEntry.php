<?php
    enterVaccine();
    function enterEssentialWorker(){
        // define variables and set to empty values
        $_SESSION['errorEssFirstName'] = $_SESSION['errorEssLastName'] = $_SESSION['errorEssNid'] = "";
    
       
           
        // ensures first name is entered
        if (empty($_POST["vacName"])) {
            $_SESSION['errorVacName'] = "First Name is required";
            echo $_SESSION['errorVacName'];
        } 
        // ensures last name is entered
        else if (empty($_POST["dosesRequired"])) {
            $_SESSION['errorDosesRequired'] = "Last Name is required";
            echo $_SESSION['errorDosesRequired'];
        } 
        // ensures nid is entered
        else if (empty($_POST["time"])) {
            $_SESSION['errorTime'] = "National Identification Number is required";   
            echo $_SESSION['errorTime'];
        } 
        // ensures nid is entered
        else if (empty($_POST["dosesAvailable"])) {
            $_SESSION['errorDosesAvailable'] = "National Identification Number is required";   
            echo $_SESSION['errorDosesAvailable'];
        } 
        else{
            $name = modifyInput($_POST["vacName"]);
            $required = modifyInput($_POST["dosesRequired"]);
            $time = modifyInput(empty($_POST["time"]));
            $available = modifyInput($_POST["dosesAvailable"]);
            if (!empty($_POST["medicalConstraints[]"])) {
                $medicalConstraints = implode(",",$_POST["medicalConstraints[]"]);
             
                
                
                
            }
            else{ //set medical constraints to NULL
                insertVaccine($name, $required, $time, $available, NULL);
            }
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
?>