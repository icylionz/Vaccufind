<?php
    require 'connect.php';
    session_start();
    if(isset($_GET[$p->patientID])){
        
       $_SESSION['patientOverlayID'] = $_GET[$p->patientID]; 
    }
    
?>