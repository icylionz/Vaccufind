<?php
    require 'connect.php';
    session_start();
    
  
    //echo $_GET['overlayID'];
    $_SESSION['patientOverlayID'] = $_GET['overlayID']; 
    
    //echo $_SESSION['patientOverlayID'];
   echo "<script>window.close();</script>";
?>