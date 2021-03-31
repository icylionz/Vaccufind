<?php 
session_start();

if (isset($_SESSION['admin_ID'])) {

?>
<!DOCTYPE html>
<html>

<head>
    <!-- Site made with Mobirise Website Builder v5.3.0, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v5.3.0, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="assets/images/product-logo-black-128x93.png" type="image/x-icon">
    <meta name="description" content="">


    <title>Admin Panel</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/datepicker/jquery.datetimepicker.min.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--Holds CCS for
        nav-dropdown classes, class="navbar-nav nav-dropdown" 
    -->
    <link rel="stylesheet" href="assets/dropdown/css/style.css">

    <!--Holds CSS for
        body tag, - <body></body>
        section tags & classes, - <section></section>
        { mbr classes,
        align property, - class="mbr-text mbr-fonts-style align-center mb-4 display-7"
        mb classes, }
        a tags, - <a>
        header tags, - <h3></h3>
        span tags, - <span></span>
        hidden property, - hidden="hidden"
        menu classes, - class="menu menu2 cid-srkI4nsbXu"
        nav tags & classes, - <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        { row classes, 
        justify classes, - class="row justify-content-center mt-4"
        mt classes, } 
        { media class,
        container classes, - class="media-container-row align-center mbr-white" }
        input tags, - <input>
        form tags & classes, - class="col-lg-8 mx-auto mbr-form" data-form-type="formoid"
        alert tags & classes and - data-form-alert-danger="" class="alert alert-danger col-12"
        ul tags, <ul></ul> -->
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="stylesheet" href="assets/theme/css/notification_style.css">

    <!--Holds CSS for 
        { display classes,
        btn classes and - class="btn btn-primary display-4"}
        cid classes - class="menu menu2 cid-srkI4nsbXu" -->
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

    <script src="assets/form/admin_forms.js"></script>


</head>

<body onload="forms();">


    <section class="menu menu2 cid-srkHLfPwRd" once="menu" id="menu2-19">


        <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                    <a href="../index.html">
                        <img src="assets/images/product-logo-black-96x70.png" alt="VaccuFind" style="height: 3rem;">
                    </a>
                </span>
                    <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-7" href="../index.html">VaccuFind</a></span>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="../index.html#form4-14">
                            Home</a></li>
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="../index.html#content13-w">
                            Vaccines</a></li>
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="../index.html#contacts1-u">
                            Contacts</a></li>
                    </ul>

                    <div class="navbar-buttons mbr-section-btn"><a class="btn btn-primary display-4" href="admin_login.html">
                        Log Out</a></div>
                </div>
            </div>
        </nav>
    </section>


    <section class="form7 cid-srkFJnF1sD" id="form7-18">

        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12">
                <h3 class="mbr-section-title mbr-fonts-style mb-4 display-5">
                    <strong>&ensp; Admin <?php echo $_SESSION['admin_name']; ?></strong>
                </h3>
            </div>
        </div>
        <div class="form-col-3 form-menu">
            <div class="menu">
                <div class="button-1">
                    <button type="button" class="btn admin_btn btn-primary" onclick="clientList();">Client List</button>
                </div>
                <div class="button-2">
                    <button type="button" class="btn admin_btn btn-primary" onclick="waitList();">Waiting List</button>
                </div>
                <div class="button-3">
                    <button type="button" class="btn admin_btn btn-primary" onclick="notificationTable();">Notifications Panel</button>
                </div>
                <div class="button-4">
                    <button type="button" class="btn admin_btn btn-primary" onclick="essentialForm();">Essential Workers Form</button>
                </div>
                <div class="button-5">
                    <button type="button" class="btn admin_btn btn-primary" onclick="medicalForm()">Medical Workers Form</button>
                </div>
                <div class="button-6">
                    <button type="button" class="btn admin_btn btn-primary" onclick="vacForm()">Vaccine Type Form</button>
                </div>
                <div class="button-7">
                    <button type="button" class="btn admin_btn btn-primary" onclick="superForm();">Super Admin</button>
                </div>
            </div>
        </div>


        <div id="default" class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>


        <div id="client" class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form" style="align-content: center;">
                    <div class="wrapper">
                        <div class="notification_wrap">
                            <div class="dropdown">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h1 style="text-align: center;" class="mbr-section-title mb-4 display-2">
                                        <strong>Client List</strong>
                                    </h1>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <p>
                                        <a id="p1" class="patient" onclick="on1();">Example</a>
                                    </p>
                                    <br>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p>
                                        <a id="p2" class="patient" onclick="on1();">Example</a>
                                    </p>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p>
                                        <a id="p3" class="patient" onclick="on1();">Example</a>
                                    </p>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p>
                                        <a id="p4" class="patient" onclick="on1();">Example</a>
                                    </p>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <p>
                                        <a id="p5" class="patient" onclick="on1();">Example</a>
                                    </p>
                                    <br>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p>
                                        <a id="p6" class="patient" onclick="on1();">Example</a>
                                    </p>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p>
                                        <a id="p7" class="patient" onclick="on1();">Example</a>
                                    </p>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p>
                                        <a id="p8" class="patient" onclick="on1();">Example</a>
                                    </p>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="overlay1" onclick="off1()">
                    <div id="panel">
                        <br>
                        <br>
                        <form method="POST" class="mbr-form2 form-with-styler mx-auto" style="padding-top:25px">
                            <div class="dragArea row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h1 style="text-align: center;" class="mbr-section-title mb-4 display-2">
                                        <strong>Example</strong>
                                    </h1>
                                </div>

                                <div>
                                    <label><strong>National ID:</strong></label>
                                    <p>Example</p>
                                </div>

                                <div class="blank">
                                </div>

                                <div>
                                    <label><strong>Date of Birth:</strong></label>
                                    <p>Example</p>
                                </div>

                                <br>

                                <div>
                                    <label><strong>Medical Conditions:</strong></label>
                                    <p>Example</p>
                                </div>

                                <div class="blnk">
                                </div>

                                <div>
                                    <label><strong>Allergies:</strong></label>
                                    <p>Example</p>
                                </div>
                                <div>
                                    <label><strong>Email:</strong></label>
                                    <p>Example</p>
                                </div>

                                <div>
                                    <label><strong>Street Address:</strong></label>
                                    <p>Example</p>
                                </div>
                                <div class="col-md-auto col-12 mbr-section-btn">
                                    <button type="button" class="btn btn-black display-4">Complete Appointment</button>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="col-md-auto col-12 mbr-section-btn">
                                    <button type="button" class="btn btn-black display-4" onClick="off1();">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div id="wait" class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form" style="align-content: center;">
                    <form method="POST" class="mbr-form form-with-styler mx-auto" style="padding-top:25px">
                        <div class="dragArea row">
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>No. of Persons to be selected each day</label>
                                <input type="text" name="noP" class="form-control" value="" id="noP-form3-1f">
                            </div>
                            <div class="col-md-auto col-12 mbr-section-btn">
                                <button type="button" class="btn btn-black display-4">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="col-lg-8 mx-auto mbr-form" style="align-content: center;">
                    <div class="wrapper">
                        <div class="notification_wrap">
                            <div class="dropdown">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h1 style="text-align: center;" class="mbr-section-title mb-4 display-2">
                                        <strong>Waiting List</strong>
                                    </h1>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <p id="time">XX:XX <a class="patient" onclick="on2();">Example</a> is waiting for an Appointment to be scheduled.</p>
                                    <br>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p id="time">XX:XX <a class="patient" onclick="on2();">Example</a> is waiting for an Appointment to be scheduled.</p>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p id="time">XX:XX <a class="patient" onclick="on2();">Example</a> is waiting for an Appointment to be scheduled.</p>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p id="time">XX:XX <a class="patient" onclick="on2();">Example</a> is waiting for an Appointment to be scheduled.</p>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <p id="time">XX:XX <a class="patient" onclick="on2();">Example</a> is waiting for an Appointment to be scheduled.</p>
                                    <br>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p id="time">XX:XX <a class="patient" onclick="on2();">Example</a> is waiting for an Appointment to be scheduled.</p>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p id="time">XX:XX <a class="patient" onclick="on2();">Example</a> is waiting for an Appointment to be scheduled.</p>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p id="time">XX:XX <a class="patient" onclick="on2();">Example</a> is waiting for an Appointment to be scheduled.</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="overlay2" onclick="off2()">
                    <div id="panel">
                        <br>
                        <br>
                        <form method="POST" class="mbr-form2 form-with-styler mx-auto" style="padding-top:25px">
                            <div class="dragArea row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h1 style="text-align: center;" class="mbr-section-title mb-4 display-2">
                                        <strong>Example</strong>
                                    </h1>
                                </div>

                                <div>
                                    <label><strong>National ID:</strong></label>
                                    <p>Example</p>
                                </div>

                                <div class="blank">
                                </div>

                                <div>
                                    <label><strong>Date of Birth:</strong></label>
                                    <p>Example</p>
                                </div>

                                <br>

                                <div>
                                    <label><strong>Medical Conditions:</strong></label>
                                    <p>Example</p>
                                </div>

                                <div class="blnk">
                                </div>

                                <div>
                                    <label><strong>Allergies:</strong></label>
                                    <p>Example</p>
                                </div>
                                <div>
                                    <label><strong>Email:</strong></label>
                                    <p>Example</p>
                                </div>

                                <div>
                                    <label><strong>Street Address:</strong></label>
                                    <p>Example</p>
                                </div>
                                <div class="col-md-auto col-12 mbr-section-btn">
                                    <button type="button" class="btn btn-black display-4">Complete Appointment</button>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="col-md-auto col-12 mbr-section-btn">
                                    <button type="button" class="btn btn-black display-4" onClick="off1();">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div id="notification" class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form">
                    <div class="wrapper">
                        <div class="notification_wrap">
                            <div class="dropdown">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h1 style="text-align: center;" class="mbr-section-title mb-4 display-2">
                                        <strong>Notification Panel</strong>
                                    </h1>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <p id="time">XX:XX <a class="patient" onclick="on3();">Example</a>'s Appointment scheduled for XX/XX/XX XX:XX XX</p>
                                    <br>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p id="time">XX:XX <a class="patient" onclick="on3();">Example</a>'s Appointment scheduled for XX/XX/XX XX:XX XX</p>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p id="time">XX:XX <a class="patient" onclick="on3();">Example</a>'s Appointment scheduled for XX/XX/XX XX:XX XX</p>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p id="time">XX:XX <a class="patient" onclick="on3();">Example</a>'s Appointment scheduled for XX/XX/XX XX:XX XX</p>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p id="time">XX:XX <a class="patient" onclick="on3();">Example</a>'s Appointment scheduled for XX/XX/XX XX:XX XX</p>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p id="time">XX:XX <a class="patient" onclick="on3();">Example</a>'s Appointment scheduled for XX/XX/XX XX:XX XX</p>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p id="time">XX:XX <a class="patient" onclick="on3();">Example</a>'s Appointment scheduled for XX/XX/XX XX:XX XX</p>
                                    <br>
                                </div>
                                <div class="notify_item">
                                    <br>
                                    <br>
                                    <p id="time">XX:XX <a class="patient" onclick="on3();">Example</a>'s Appointment scheduled for XX/XX/XX XX:XX XX</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="overlay3" onclick="off3()">
                        <div id="panel">
                            <br>
                            <br>
                            <form method="POST" class="mbr-form2 form-with-styler mx-auto" style="padding-top:25px">
                                <div class="dragArea row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h1 style="text-align: center;" class="mbr-section-title mb-4 display-2">
                                            <strong>Example</strong>
                                        </h1>
                                    </div>

                                    <div>
                                        <label><strong>National ID:</strong></label>
                                        <p>Example</p>
                                    </div>

                                    <div class="blank">
                                    </div>

                                    <div>
                                        <label><strong>Date of Birth:</strong></label>
                                        <p>Example</p>
                                    </div>

                                    <br>

                                    <div>
                                        <label><strong>Medical Conditions:</strong></label>
                                        <p>Example</p>
                                    </div>

                                    <div class="blnk">
                                    </div>

                                    <div>
                                        <label><strong>Allergies:</strong></label>
                                        <p>Example</p>
                                    </div>
                                    <div>
                                        <label><strong>Email:</strong></label>
                                        <p>Example</p>
                                    </div>

                                    <div>
                                        <label><strong>Street Address:</strong></label>
                                        <p>Example</p>
                                    </div>
                                    <div class="col-md-auto col-12 mbr-section-btn">
                                        <button type="button" class="btn btn-black display-4">Complete Appointment</button>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-md-auto col-12 mbr-section-btn">
                                        <button type="button" class="btn btn-black display-4" onClick="off2();">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="essential" class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form">
                    <form method="POST" class="mbr-form form-with-styler mx-auto" style="padding-top:25px">
                        <div class="dragArea row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h1 style="text-align: center;" class="mbr-section-title mb-4 display-2">
                                    <strong>Essential Workers Form</strong>
                                </h1>
                            </div>
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>First Name</label>
                                <input type="text" name="ess_first_Name" class="form-control" value="" id="ess_first_Name-form3-1f">
                            </div>
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>Last Name</label>
                                <input type="text" name="ess_last_Name" class="form-control" value="" id="ess_last_Name-form3-1f">
                            </div>
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>National Id</label>
                                <input type="text" name="ess_natid" class="form-control" value="" id="ess_natid-form3-1f">
                            </div>
                            <div class="col-md-auto col-12 mbr-section-btn">
                                <button type="button" class="btn btn-black display-4">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div id="medical" class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form">
                    <form method="POST" class="mbr-form form-with-styler mx-auto" style="padding-top:25px">
                        <div class="dragArea row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h1 style="text-align: center;" class="mbr-section-title mb-4 display-2">
                                    <strong>Medical Workers Form</strong>
                                </h1>
                            </div>
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>First Name</label>
                                <input type="text" name="med_first_Name" class="form-control" value="" id="med_first_Name-form3-1f">
                            </div>
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>Last Name</label>
                                <input type="text" name="med_last_Name" class="form-control" value="" id="med_last_Name-form3-1f">
                            </div>
                            <div dclass="col-lg-12 col-md col-sm-12 form-group">
                                <label>National Id</label>
                                <input type="text" name="med_natid" class="form-control" value="" id="med_natid-form3-1f">
                            </div>
                            <div class="col-md-auto col-12 mbr-section-btn">
                                <button type="button" class="btn btn-black display-4">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div id="vac" class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form">
                    <form method="POST" class="mbr-form form-with-styler mx-auto" style="padding-top:25px">
                        <div class="dragArea row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h1 style="text-align: center;" class="mbr-section-title mb-4 display-2">
                                    <strong>Vaccine Type Form</strong>
                                </h1>
                            </div>
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>Vaccine Name</label>
                                <input type="text" name="vacName" class="form-control" value="" id="vacName-form3-1f">
                            </div>
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>No. of doses required</label>
                                <input type="text" name="dosesNum" class="form-control" value="" id="dosesNum-form3-1f">
                            </div>
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>Length of time between doses</label>
                                <input type="text" name="time" class="form-control" value="" id="time-form3-1f">
                            </div>
                            <div class="col-md-auto col-12 mbr-section-btn">
                                <button type="button" class="btn btn-black display-4">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div id="super" class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form" >
                    <form method="POST" class="mbr-form form-with-styler mx-auto" style="padding-top:25px">
                        <div class="dragArea row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h1 style="text-align: center;" class="mbr-section-title mb-4 display-2">
                                    <strong>Super Admin Login</strong>
                                </h1>
                            </div>
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>Super Admin Id</label>
                                <input type="text" name="super_admin_ID" class="form-control" value="" id="super_admin_ID-form3-1f">
                            </div>
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>Password</label>
                                <input type="password" name="super_admin_Pass" class="form-control" value="" id="super_admin_Pass-form3-1f">
                            </div>
                            <div class="col-md-auto col-12 mbr-section-btn">
                                <button type="button" class="btn btn-black display-4" onclick="document.location='super_admin_console.html'">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
    </section>


    <section class="footer3 cid-s48P1Icc8J " once="footers " id="footer3-i ">


        <div class="container ">
            <div class="media-container-row align-center mbr-white ">
                <div class="row row-copirayt ">
                    <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7 ">
                        © Copyright 2021 CyberTraq. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section>
        <a href="https://mobirise.site/x "></a>
    </section>


    <script src="assets/form/overlay.js"></script>
    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/tether/tether.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/smoothscroll/smooth-scroll.js"></script>
    <script src="assets/datepicker/jquery.datetimepicker.full.js"></script>
    <script src="assets/dropdown/js/nav-dropdown.js"></script>
    <script src="assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
    <script src="assets/theme/js/script.js"></script>


</body>

</html>

<?php
}
else
{
    header("Location: admin_login.php");
    exit();
}

?>