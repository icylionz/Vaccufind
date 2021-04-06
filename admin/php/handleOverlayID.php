<?php
    require 'connect.php';
    session_start();
    if(isset($_GET[$ID])){
        
       $_SESSION['patientOverlayID'] = $_GET[$p->patientID]; 
    }
    
?>