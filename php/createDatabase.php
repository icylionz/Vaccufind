<?php
createDatabase();

function createDatabase(){
  $servername = "127.0.0.1";
  $username = "root@localhost";
  $password = "";

  // Create connection
  $conn = new mysqli($servername, $username, $password);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Create database
  $sql = "CREATE DATABASE vaccufind";
  if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
  } 

  $conn->close();
}

?> 