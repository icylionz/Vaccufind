<?php
    require 'connect.php';
    require 'searchPatientID.php';
   
    $patientOverlay = searchPatientID($_POST['id']);
    $patientOverlayid = $patientOverlay['patientID'];
    $patientOverlayfirstname = $patientOverlay['firstName'];
    $patientOverlaylastname = $patientOverlay['lastName'];
    $patientOverlaydob = $patientOverlay['dob'];
    $patientOverlaystreetAddress = $patientOverlay['streetAddress'];
    $patientOverlayPhoneNumber = $patientOverlay['phoneNumber'];
    $patientOverlayemail = $patientOverlay['email'];
    $patientOverlayTag = $patientOverlay['tag'];
    $patientOverlayCountry = $patientOverlay['country'];
    $patientOverlayVaccineGiven = $patientOverlay['vaccineName'];
    $patientOverlayDosesRemaining = $patientOverlay['noOfDosesRemaining'];
    $patientOverlayAppointmentDate = $patientOverlay['appointmentDate'];
    $patientOverlaymedicalConditions = $patientOverlay['medicalConditions'];
    $patientOverlayallergies = $patientOverlay['allergies'];
    $patientOverlaynid = $patientOverlay['nid'];
    $patientOverlayPassportNumber = $patientOverlay['passportNumber'];
    
    echo "

    
    <div class=\"col-lg-12 col-md-12 col-sm-12\">
        <h2 style=\"text-align: center;\">
            <strong>$patientOverlayfirstname</strong>
            <strong>$patientOverlaylastname</strong> 
        </h2>
    </div>
                    
    <br>

    <div>
        <label style=\"float: left;\"><strong>National ID:</strong></label>
        <label style=\"margin-left:4em;\"><strong>Date of Birth:</strong></label>

        <br>
        <p style=\"float: left;\"> $patientOverlaynid</p>
        <p style=\"margin-left:10em;\">  $patientOverlaydob</p>
    </div>

    <br>

    <div>
        <label><strong>Medical Conditions:</strong></label>
        <p>  $patientOverlaymedicalConditions</p>
        
        <label><strong>Allergies:</strong></label>
        <p>  $patientOverlayallergies</p>
    </div>
    <div>
        <label><strong>Email:</strong></label>
        <p>  $patientOverlayemail</p>

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