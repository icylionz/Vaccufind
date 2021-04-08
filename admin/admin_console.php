<?php 
session_start();

include "../php/patientRegistration.php";


if ($_SESSION['username'] && $_SESSION['passwrd']) {

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <link rel="stylesheet" href="assets/theme/css/notification_style.css">

    <!--Holds CSS for 
        { display classes,
        btn classes and - class="btn btn-primary display-4"}
        cid classes - class="menu menu2 cid-srkI4nsbXu" -->
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

    <!--holds cutom css changes
            patient and waiting list tables
    -->
    <link rel="stylesheet" href="assets/bootstrap/css/custom-css-added.css" type="text/css">
    <script src="assets/form/admin_forms.js"></script>


</head>
<?php
    include "../php/connect.php";
    ;
    
    $_SESSION['errorEssFirstName'] = "";
    $_SESSION['errorEssLastName'] = "";
    $_SESSION['errorEssNid'] = "";
    $_SESSION['errorMedFirstName'] = "";
    $_SESSION['errorMedLastName'] = "";
    $_SESSION['errorMedNid'] = "";
    

    
    // fetches requested patient data by name
    $patientSearchData = array();
    if($patientRecords = $conn->query("SELECT patientID, firstName, lastName, nid, passportNumber FROM patient")){
        if($patientRecords->num_rows > 0){
            while($patientRow = $patientRecords->fetch_object()){
                $patientSearchData[] = $patientRow;
            }
        }
    }
    
    // fetches all records in the waiting list
    $waitingTableData = array();
    if($waitingRecords = $conn->query("SELECT patientID, waitingID, firstName, lastName, dateAdded FROM waiting")){
        if($waitingRecords->num_rows > 0){
            while($waitingRow = $waitingRecords->fetch_object()){
                $waitingTableData[] = $waitingRow;
            }
        }
    }
    

    
?>
<body onload="forms();">

    <script type = "text/javascript" language = "javascript">
        
        // Loads the table data on patient list 
        $(document).on("click", "#searchPatientByID", function (){
            $.ajax({
                type: "POST",
                url: "php/searchedPatientByID.php",
                data:{
                    searchByID:$("#searchByID").val()
                },
                success: function (result) {
                    //change the body of the patient table
                    $("#searchedPatientTableData").html(result);
                }
            });
        });
        // Loads the table data on patient list for search by name
        $(document).on("click", "#searchPatientByName", function (){
            $.ajax({
                type: "POST",
                url: "php/searchedPatientByName.php",
                data:{
                    searchByFirstName:$("#searchByFirstName").val(), 
                    searchByLastName:$("#searchByLastName").val()
                },
                success: function (result) {
                    //change the body of the patient table
                    $("#searchedPatientTableData").html(result);
                }
            });
        });
        // Loads the table data on patient list for search by id
        $(document).on("click", "#patientList", function (){
            $.ajax({
                type: "POST",
                url: "php/patientInfoTable.php",
                success: function (result) {
                    //change the body of the patient table
                    $("#patientInfoTableData").html(result);
                }
            });
        });
        // Loads the table data on waiting list 
        $(document).on("click", "#waitList", function (){
            $.ajax({
                type: "POST",
                url: "php/waitingListTable.php",
                success: function (result) {
                    //change the body of the patient table
                    $("#waitingTableData").html(result);
                }
            });
        });
        // Loads the table data on waiting list 
        $(document).on("click", "#notifyList", function (){
            $.ajax({
                type: "POST",
                url: "php/notifyHandler.php",
                success: function (result) {
                    //change the body of the patient table
                    $("#notifications").html(result);
                }
            });
        });
        //Save settings changes
        $(document).on("click", "#saveSettings", function (){
            console.log(document.getElementById("selectFromWaiting").value);
            if(document.getElementById("selectFromWaiting").value == ""){
                document.getElementById("emptySelectFromWaiting").innerHTML = "Please Specify Value.";
            }
            if(document.getElementById("daysUntil").value == ""){
                document.getElementById("emptyDaysUntil").innerHTML="Please Specify Value.";
            }
            if(document.getElementById("elderlyAge").value == ""){
                document.getElementById("emptyElderlyAge").innerHTML="Please Specify Value.";
            }
            if((document.getElementById("selectFromWaiting").value != "") && (document.getElementById("daysUntil").value != "") && (document.getElementById("elderlyAge").value != "")){
                $.ajax({
                    type: "POST",
                    url: "php/settingsHandler.php",
                    data:{
                    selectFromWaiting:$('#selectFromWaiting').val(),
                    daysUntil:$('#daysUntil').val(),
                    elderlyAge:$('#elderlyAge').val(),
                    },
                    success: function (result) {
                        
                    },
                    complete:function(){
                        $.ajax({
                            type: "POST",
                            url: "php/settingsDisplay.php",

                            success: function (results) {
                                //change the body of the patient table
                                $("#settingsForm").html(results);
                            }
                        })
                    }
                });
                
            }
            
        });
        // Loads settings form
        $(document).on("click", "#settingsPanel", function (){
            $.ajax({
                type: "POST",
                url: "php/settingsDisplay.php",
                data:{
                    selectFromWaiting:$('selectFromWaiting').val(),
                    daysUntil:$('daysUntil').val(),
                    elderlyAge:$('elderlyAge').val(),
                    },
                success: function (result) {
                    //change the body of the patient table
                    $("#settingsForm").html(result);
                }
            });
        });
        //loads overlay data on cell click
        $(document).on("click", ".adminTables .patientID", function (){
            $.ajax({
                type: "POST",
                url: "php/handleOverlayID.php",
                data: {id: $(this).attr('id')},
                success: function (result) {
                    
                    //change the body of the patient table
                    $(".overlayDataInfo").html(result);
                }
            });
        });    
        
        
    </script>
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

                    <div class="navbar-buttons mbr-section-btn"><a class="btn btn-primary display-4" href="php/admin_logout.php">
                        Log Out</a></div>
                </div>
            </div>
        </nav>
    </section>


    <section class="form7 cid-srkFJnF1sD" id="form7-18">

        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12">
                <h3 class="mbr-section-title mbr-fonts-style mb-4 display-5">
                    <strong>&ensp; Admin <?php echo $_SESSION['adminFirstName']; ?> <?php echo $_SESSION['adminLastName']; ?></strong>
                </h3>
            </div>
        </div>
        <div class="form-col-3 form-menu">
            <div class="menu">
                <div class="button-1">
                    <button type="button" class="btn admin_btn btn-primary" onclick="searchList();">Search by ID or Name</button>
                </div>
                <div class="button-2">
                    <button type="button" id="patientList" class="btn admin_btn btn-primary" onclick="patientList();">Patient List</button>
                </div>
                <div class="button-3">
                    <button type="button" id="waitList" class="btn admin_btn btn-primary" onclick="waitList();">Waiting List</button>
                </div>
                <div class="button-4">
                    <button type="button" id="notifyList" class="btn admin_btn btn-primary" onclick="notificationTable();">Notifications Panel</button>
                </div>
                <div class="button-5">
                    <button type="button" class="btn admin_btn btn-primary" onclick="essentialForm();">Essential Workers Form</button>
                </div>
                <div class="button-6">
                    <button type="button" class="btn admin_btn btn-primary" onclick="medicalForm()">Medical Workers Form</button>
                </div>
                <div class="button-7">
                    <button type="button" class="btn admin_btn btn-primary" onclick="vacForm()">Vaccine Type Form</button>
                </div>
                <div class="button-8">
                    <button type="button" class="btn admin_btn btn-primary" id='vaccineInfo' onclick="vaccineList()">VaccineList</button>
                </div>
                <div class="button-9">
                    <button type="button" class="btn admin_btn btn-primary" id='settingsPanel' onclick="settingsPanel()">Settings</button>
                </div>
            </div>
        </div>

                            <!--  Default Panel -->        
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


                            <!--  Search List -->        
        <div id="search" class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form" style="align-content: center;">
                <div class="col-lg-12 col-md col-sm-12 form-group">
                        <label style="float:left"><a onclick="showByID()">Search by ID</a></label>

                        <label style="float:right"><a onclick="showByName()">Search by Name</a></label>
                    </div>
                    <br>
                    <div id="byID">
                        <form class="mbr-form form-with-styler mx-auto" style="padding-top:25px">
                            <div class="dragArea row">
                                <div class="col-lg-12 col-md col-sm-12 form-group">
                                    <label><strong>Search by ID</strong></label>
                                    <input type="text" name="searchByID" class="form-control" id="searchByID">
                                </div>
                                <div class="col-md-auto col-12 mbr-section-btn">
                                    <button type="button" id="searchPatientByID" name="searchIDSubmit" class="btn btn-black display-4" onclick="showByID()">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div id="byName">
                        <form class="mbr-form form-with-styler mx-auto" style="padding-top:25px">
                            <div class="dragArea row">
                                <div class="col-lg-12 col-md col-sm-12 form-group">
                                    <label><strong>Search by Name</strong></label>
                                    <br>
                                    <label><strong>First Name</strong></label>
                                    <input type="text" name="searchByFirstName" class="form-control" value="" id="searchByFirstName">
                                    <br>
                                    <label><strong>Last Name</strong></label>
                                    <input type="text" name="searchByLastName" class="form-control" value="" id="searchByLastName">
                                </div>
                                <div class="col-md-auto col-12 mbr-section-btn">
                                    <button type="button" id="searchPatientByName" name="searchNameSubmit" class="btn btn-black display-4" onclick="showByName()">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="wrapper">
                        <div class="notification_wrap">
                            <div class="dropdown">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h1 style="text-align: center;" class="mbr-section-title mb-4 display-2">
                                        <strong>Patient List</strong>
                                    </h1>
                                </div>
                                
                                <!--Display patient info table-->
                                <div>
                                <script>sessionStorage.setItem("clickedOverlay",1);</script>
                                    <table class='adminTables' id="patientInfoTable">
                                        <thead>
                                            <tr>
                                                <th>Patient ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>National ID</th>
                                                <th>Passport No.</th>
                                            </tr>
                                            </thead>
                                        <tbody id="searchedPatientTableData">
                                            <!-- display table data -->
                                            
                                       
                                        </tbody>
                                            
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                                

                <div class="overlays" id="overlay0" onclick="off0()">
                    <div id="panel">
                        <br>
                        <br>
                          
                        <form method="" class="mbr-form2 form-with-styler mx-auto" style="padding-top:25px">
                            <div class='overlayDataInfo' id="overlayData1" class="dragArea row" style="width:100%">
                                <!-- overlay data -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


                            <!--  Patient Info List -->        
        <div id="patient" class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form" style="align-content: center;">
                    <div class="wrapper">
                        <div class="notification_wrap">
                            <div class="dropdown">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h1 style="text-align: center;" class="mbr-section-title mb-4 display-2">
                                        <strong>Patient List</strong>
                                    </h1>
                                </div>
                                
                                <!--Display patient info table-->
                                <div>
                                
                                    <table class='adminTables' id="patientInfoTable">
                                        <thead>
                                            <tr>
                                                <th>Patient ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>National ID</th>
                                                <th>Passport No.</th>
                                            </tr>
                                        </thead>
                                        <tbody id="patientInfoTableData">
                                            <!-- display table data -->
                                            
                                       
                                        </tbody>
                                            
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                                

                <div class="overlays" id="overlay1" onclick="off1()">
                    <div id="panel">
                        <br>
                        <br>
                        
                                
                        <form method="" class="mbr-form2 form-with-styler mx-auto" style="padding-top:25px">
                            <div class="dragArea row">
                                <div class='col-lg-12 col-md-12 col-sm-12'>
                                    <h1 style='text-align: center;' class='mbr-section-title mb-4 display-2'>
                                        <strong>Patient Details</strong>
                                    </h1>
                                </div>
                                <div class="overlayDataInfo" style="width:100%">
                                <!-- overlay data -->
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

                            <!--  Waiting List -->
        <div id="wait" class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form" style="align-content: center;">
                    <form method="POST" action="php/scheduleAppointment.php" class="mbr-form form-with-styler mx-auto" style="padding-top:25px">
                        <div class="dragArea row">
                            
                            <div class="col-md-auto col-12 mbr-section-btn">
                                <button type="submit" class="btn btn-black display-4">Schedule Patients</button>
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
                                <!--Display waiting list-->
                                <div> 
                                    <table class='adminTables' id="waitingTable">
                                        <thead>
                                            <tr>
                                                <th>Patient ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>National ID</th>
                                                <th>Passport No.</th>
                                            </tr>
                                        </thead>
                                        <tbody id='waitingTableData'>
                                        <!-- waiting table info -->
                                        </tbody>
                                            
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="overlays" id="overlay2" onclick="off2()">
                    <div id="panel">
                        <br>
                        <br>
                        <form method="POST" class="mbr-form2 form-with-styler mx-auto" style="padding-top:25px">
                            <div class="dragArea row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h1 style="text-align: center;" class="mbr-section-title mb-4 display-2">
                                        <strong>Patient Details</strong>
                                    </h1>
                                </div>

                                
                                <div class="overlayDataInfo" id="overlayDataWaiting" style="width:100%">
                                <!-- overlay data -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

                            <!--Notification panel-->
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
                                <div id="notifications" class="adminTables">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="overlays" id="overlay3" onclick="off3()">
                        <div id="panel">
                            <br>
                            <br>
                            <form method="POST" class="mbr-form2 form-with-styler mx-auto" style="padding-top:25px">
                                <div class="dragArea row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h1 style="text-align: center;" class="mbr-section-title mb-4 display-2">
                                        <strong>Patient Details</strong>
                                    </h1>
                                </div>
                                <div class="overlayDataInfo" style="width:100%">
                                <!-- overlay data -->
                                </div>

                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                            <!--Essential Workers Form-->
        <div id="essential" class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form">
                    <form method="POST" action="php/enterEssentialWorker.php" class="mbr-form form-with-styler mx-auto" style="padding-top:25px">
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
                            <?php if (isset($_GET['error'])) { ?>
                                <?php if ($_GET['error'] == "First Name is required" || $_GET['error'] == "First Name must be between length of 3-25") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>Last Name</label>
                                <input type="text" name="ess_last_Name" class="form-control" value="" id="ess_last_Name-form3-1f">
                            </div>
                            <?php if (isset($_GET['error'])) { ?>
                                <?php if ($_GET['error'] == "Last Name is required" || $_GET['error'] == "Last Name must be between length of 3-25") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>National Id</label>
                                <input type="text" pattern="[0-9]{6}-[0-9]{4}" name="ess_natid" class="form-control" value="" id="ess_natid-form3-1f">
                            </div>
                            <?php if (isset($_GET['error'])) { ?>
                                <?php if ($_GET['error'] == "National ID is required") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <p style="color:lightcoral"><?php echo $_SESSION['errorEssNid']; ?></p>
                            <div class="col-md-auto col-12 mbr-section-btn">
                                <button type="submit" name="essentialSubmit"class="btn btn-black display-4">Submit</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

                            <!--Medical Workers Form-->
        <div id="medical" class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form">
                    <form method="POST" action="php/enterMedicalWorker.php" class="mbr-form form-with-styler mx-auto" style="padding-top:25px">
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
                            <?php if (isset($_GET['error2'])) { ?>
                                <?php if ($_GET['error2'] == "First Name is required" || $_GET['error2'] == "First Name must be between length of 3-25") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error2']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>Last Name</label>
                                <input type="text" name="med_last_Name" class="form-control" value="" id="med_last_Name-form3-1f">
                            </div>
                            <?php if (isset($_GET['error2'])) { ?>
                                <?php if ($_GET['error2'] == "Last Name is required" || $_GET['error2'] == "Last Name must be between length of 3-25") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error2']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>National Id</label>
                                <input type="text" pattern="[0-9]{6}-[0-9]{4}" name="med_natid" class="form-control" value="" id="med_natid-form3-1f">
                            </div>
                            <?php if (isset($_GET['error2'])) { ?>
                                <?php if ($_GET['error2'] == "National ID is required") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error2']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-md-auto col-12 mbr-section-btn">
                                <button type="submit" name="medicalSubmit"class="btn btn-black display-4">Submit</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

                            <!--Vaccine Form-->
        <div id="vac" class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form">
                    <form method="POST" action="php/vaccineEntry.php" class="mbr-form form-with-styler mx-auto" style="padding-top:25px">
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
                            <?php if (isset($_GET['error3'])) { ?>
                                <?php if ($_GET['error3'] == "Vaccine Name is required") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error3']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>No. of doses required</label>
                                <input type="number" name="dosesRequired" class="form-control" value="" id="dosesNum-form3-1f">
                            </div>
                            <?php if (isset($_GET['error3'])) { ?>
                                <?php if ($_GET['error3'] == "Number of doses is required") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error3']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>Length of time between doses (days)</label>
                                <input type="number" name="time" class="form-control" value="" id="time-form3-1f">
                            </div>
                            <?php if (isset($_GET['error3'])) { ?>
                                <?php if ($_GET['error3'] == "Length of time is required") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error3']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-lg-12 col-md col-sm-12 form-group">
                                <label>Number of doses available</label>
                                <input type="number" name="dosesAvailable" class="form-control" value="" id="time-form3-1f">
                            </div>
                            <?php if (isset($_GET['error3'])) { ?>
                                <?php if ($_GET['error3'] == "Number of doses available is required") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error3']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="medicalConditions">
                                <label>Medical Constraints (Patients with these conditions should not be administered this vaccine)</label>
                                <select name="medicalConstraints[]" class="form-control multi_select_conditions" value="" id="medical-form7-13" multiple data-selected-text-format="count > 3">
                              
                                    <option value="Asthma">Asthma / Pulmonary fibrosis / Respiratory Illnesses</option>
                                    <option value="Cerebrovascular Disease">Cerebrovascular Disease</option>
                                    <option value="Cystic Fibrosis">Cystic Fibrosis</option>
                                    <option value="Diabetes">Diabetes (High Blood Sugar)</option>
                                    <option value="Heart Conditions">Heart Conditions</option>
                                    <option value="Hypertension">Hypertension (High Blood Pressure)</option>
                                    <option value="Immunocompromised">Immunocompromised State</option>
                                    <option value="Kidney Disease">Kidney Disease</option>
                                    <option value="Liver Disease">Liver Disease</option>
                                    <option value="Neurologic conditions">Neurologic Conditions</option>
                                    <option value="Thalassemia">Thalassemia</option>
                                    <option value="Pregnant">Pregnant</option>
                                    <option value="Sickle Cell Disease">Sickle Cell Disease</option>
                                </select>
                                <small>Select one or more</small>
                            </div>
                            <div class="col-md-auto col-12 mbr-section-btn">
                                <button type="submit" name="vaccineSubmit" class="btn btn-black display-4">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

                            <!-- Vaccine Info Panel -->
        <div id="vaccineList" class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form">
                 
                

                </div>
            </div>
        </div>
        
                            <!-- Settings Panel -->
        <div id="settings" class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form">
                    <form method="POST" action="php/vaccineEntry.php" class="mbr-form form-with-styler mx-auto" style="padding-top:25px">
                        <div class="dragArea row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h1 style="text-align: center;" class="mbr-section-title mb-4 display-2">
                                    <strong>Settings</strong>
                                </h1>
                            </div>
                            <div id="settingsForm">
                            <!-- Settings Form -->
                            </div>
                            <div class="col-md-auto col-12 mbr-section-btn">
                                <button type="button" name="settingsSubmit" id="saveSettings" class="btn btn-black display-4">Save Changes</button>
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