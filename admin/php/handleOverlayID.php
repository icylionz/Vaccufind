<?php
    require 'connect.php';
    require 'searchPatientID.php';
   
    $patientOverlay = searchPatientID($_POST['id']);
    $patientOverlayid = $patientOverlay['patientID'];
    $patientOverlaynid = $patientOverlay['nid'];
    $patientOverlaydob = $patientOverlay['dob'];
    $patientOverlaymedicalConditions = $patientOverlay['medicalConditions'];
    $patientOverlayallergies = $patientOverlay['allergies'];
    $patientOverlayemail = $patientOverlay['email'];
    $patientOverlaystreetAddress = $patientOverlay['streetAddress'];
    
    echo "
                    
    <div>
        <label><strong>National ID:</strong></label>
        <p> $patientOverlaynid</p>
    </div>

    <div class='blank'>
    </div>

    <div>
        <label><strong>Date of Birth:</strong></label>
        <p>  $patientOverlaydob</p>
    </div>

    <br>

    <div>
        <label><strong>Medical Conditions:</strong></label>
        <p>  $patientOverlaymedicalConditions</p>
    </div>

    <div class='blnk'>
    </div>

    <div>
        <label><strong>Allergies:</strong></label>
        <p>  $patientOverlayallergies</p>
    </div>
    <div>
        <label><strong>Email:</strong></label>
        <p>  $patientOverlayemail</p>
    </div>

    <div>
        <label><strong>Street Address:</strong></label>
        <p>  $patientOverlaystreetAddress</p>
    </div>
    <div class='col-md-auto col-12 mbr-section-btn'>
        <button type='button' name='$patientOverlayid' id='completeAppointment'class='btn btn-black display-4'>Complete Appointment</button>
    </div>
    <br>
    
    <div class='col-md-auto col-12 mbr-section-btn'>
        <button type='button' class='btn btn-black display-4' onClick='off1();'>Close</button>
    </div>";
?>