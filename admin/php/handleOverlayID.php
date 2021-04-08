<?php
    require 'connect.php';
    require 'searchPatientID.php';
   
    $patientOverlay = searchPatientID($_POST['id']);
    $patientOverlayid = $patientOverlay['patientID'];
    $patientOverlayfirstname = $patientOverlay['firstName'];
    $patientOverlaylastname = $patientOverlay['lastName'];

    if ($patientOverlay['nid'] == NULL)
    {

        $patientOverlaynid = "NIL";
    }
    else if ($patientOverlay['nid'] != NULL)
    {
        $patientOverlaynid = $patientOverlay['nid'];
    }

    if ($patientOverlay['passportNumber'] == NULL)
    {

        $patientOverlayPassportNumber = "NIL";
    }
    else if ($patientOverlay['passportNumber'] != NULL)
    {
        $patientOverlayPassportNumber = $patientOverlay['passportNumber'];
    }

    $patientOverlaydob = $patientOverlay['dob'];
    $patientOverlayemail = $patientOverlay['email'];
    $patientOverlayPhoneNumber = $patientOverlay['phoneNumber'];
    $patientOverlaystreetAddress = $patientOverlay['streetAddress'];
    $patientOverlayCountry = $patientOverlay['country'];

    if ($patientOverlay['medicalConditions'] == NULL)
    {

        $patientOverlaymedicalConditions = "NIL";
    }
    else if ($patientOverlay['medicalConditions'] != NULL)
    {
        $patientOverlaymedicalConditions = $patientOverlay['medicalConditions'];
    }

    if ($patientOverlay['allergies'] == NULL)
    {

        $patientOverlayallergies = "NIL";
    }
    else if ($patientOverlay['allergies'] != NULL)
    {
        $patientOverlayallergies = $patientOverlay['allergies'];
    }

    if ($patientOverlay['tag'] == NULL)
    {

        $patientOverlayTag = "NIL";
    }
    else if ($patientOverlay['tag'] == 1)
    {
        $patientOverlayTag = "Medical Worker";
    }
    else if ($patientOverlay['tag'] == 2)
    {
        $patientOverlayTag = "Essential Worker";
    }
    else if ($patientOverlay['tag'] == 3)
    {
        $patientOverlayTag = "Elderly";
    }
    else if ($patientOverlay['tag'] == 4)
    {
        $patientOverlayTag = "Medically Compromised";
    }
    else if ($patientOverlay['tag'] == 5)
    {
        $patientOverlayTag = "Medical Worker & Medically Compromised";
    }
    else if ($patientOverlay['tag'] == 6)
    {
        $patientOverlayTag = "Essential Worker & Medically Compromised";
    }
    else if ($patientOverlay['tag'] == 7)
    {
        $patientOverlayTag = "Elderly & Medically Compromised";
    }

    if ($patientOverlay['vaccineName'] == NULL)
    {

        $patientOverlayVaccineGiven = "NIL";
    }
    else if ($patientOverlay['vaccineName'] != NULL)
    {
        $patientOverlayVaccineGiven = $patientOverlay['vaccineName'];
    }

    if ($patientOverlay['noOfDosesRemaining'] == NULL)
    {

        $patientOverlayDosesRemaining = "Unvaccinated";
    }
    else if ($patientOverlay['noOfDosesRemaining'] == -1)
    {
        $patientOverlayDosesRemaining = "Vaccinated";
    }
    else if ($patientOverlay['noOfDosesRemaining'] > 0)
    {
        $patientOverlayDosesRemaining = $patientOverlay['noOfDosesRemaining'];
    }

    if ($patientOverlay['appointmentDate'] == NULL)
    {

        $patientOverlayAppointmentDate = "NIL";
    }
    else if ($patientOverlay['appointmentDate'] != NULL)
    {
        $patientOverlayAppointmentDate = $patientOverlay['appointmentDate'];
    }
    
    
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
        <label style=\"margin-left:4em;\"><strong>Passport Number:</strong></label>
        <label style=\"margin-left:4em;\"><strong>Date of Birth:</strong></label>
        <label style=\"margin-left:4em;\"><strong>Email:</strong></label>

        <br>

        <label><p> $patientOverlaynid</p></label>
        <label><p style=\"margin-left:4em;\">  $patientOverlayPassportNumber</p></label>
        <label><p style=\"margin-left:8em;\">  $patientOverlaydob</p></label>
        <label><p style=\"margin-left:4.5em;\">  $patientOverlayemail</p></label>
    </div>

    <div>
        <label style=\"float: left;\"><strong>Street Address:</strong></label>
        <label style=\"margin-left:12.5em;\"><strong>Country:</strong></label>

        <br>

        <p style=\"float: left;\">  $patientOverlaystreetAddress</p>
        <p style=\"margin-left:20em;\">  $patientOverlayCountry</p>
    </div>

    <div>
        <label><strong>Medical Conditions:</strong></label>
        <p>  $patientOverlaymedicalConditions</p>
        
        <label><strong>Allergies:</strong></label>
        <p>  $patientOverlayallergies</p>
    </div>

    <div>
        <label style=\"float: left;\"><strong>Tag:</strong></label>
        <label style=\"margin-left:5em;\"><strong>Vaccine Given:</strong></label>
        <label style=\"margin-left:10em;\"><strong>Doses Remaining:</strong></label>
        
        <br>

        <label><p> $patientOverlayTag</p></label>
        <label><p style=\"margin-left:5.5em;\">  $patientOverlayVaccineGiven</p></label>
        <label><p style=\"margin-left:15.5em;\">  $patientOverlayDosesRemaining</p></label>
    </div>

    <div>
        <label><strong>Appointment Date:</strong></label>
        <p>  $patientOverlayAppointmentDate</p>
    </div>

    <div class='col-md-auto col-12 mbr-section-btn'>
        <button type='button' name='$patientOverlayid' id='completeAppointment'class='btn btn-black display-4'>Complete Appointment</button>
    </div>
    <br>
    
    <div class='col-md-auto col-12 mbr-section-btn'>
        <button type='button' class='btn btn-black display-4' onClick='off1();'>Close</button>
    </div>";
?>