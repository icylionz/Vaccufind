<?php
function connectVaccufind(){
    $servername = "127.0.0.1";
    $username = "vaccufind";
    $password = "vaccufind";
    $dbname = "vaccufind";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

?>