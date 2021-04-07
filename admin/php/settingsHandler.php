<?php
require 'connect.php';
$selectFromWaiting =$_POST["selectFromWaiting"];
$daysUntil = $_POST["daysUntil"];
$elderlyAge = $_POST["elderlyAge"];
insertSettings($selectFromWaiting, $daysUntil, $elderlyAge);

//modifies input
function modifyInput($input) {
    $input = stripslashes($input); // removes / and \ from the input
    $input = trim($input); // removes whitespaces from the input
    $input = htmlspecialchars($input); // security feature to rename special characters (prevents malicious attempts to enter html code into the form)
    return $input;
} 

//inserts the essential worker's record into the database
function insertSettings($selectFromWaiting, $daysUntil, $elderlyAge){
    require 'connect.php';
    $selectFromWaiting = $selectFromWaiting;
    $daysUntil = $daysUntil;
    $elderlyAge = $elderlyAge;
    $sql = "UPDATE settings SET settingValue = '$selectFromWaiting' WHERE settingName = 'selectFromWaiting'";
    if ($conn->query($sql)) {
        echo "New record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql = "UPDATE settings SET settingValue = '$daysUntil' WHERE settingName = 'daysUntilAppointment'";
    if ($conn->query($sql)) {
        echo "New record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql = "UPDATE settings SET settingValue = '$elderlyAge' WHERE settingName = 'elderlyAge'";
    if ($conn->query($sql)) {
        echo "New record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>