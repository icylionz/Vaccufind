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


    <title>Registration</title>
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

    <!--Holds CSS for 
        { display classes,
        btn classes and - class="btn btn-primary display-4"}
        cid classes - class="menu menu2 cid-srkI4nsbXu" -->
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">




</head>
<?php
include "php/patientRegistration.php";

?>
<body>
    <section class="menu menu2 cid-srkI4nsbXu" once="menu" id="menu2-1a">


        <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                    <a href="index.html">
                        <img src="assets/images/product-logo-black-96x70.png" alt="VaccuFind" style="height: 3rem;">
                    </a>
                </span>
                    <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-7" href="index.html">VaccuFind</a></span>
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
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.html#form4-14">
                            Home</a></li>
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.html#content13-w">
                            Vaccines</a></li>
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.html#contacts1-u">
                            Contacts</a></li>
                    </ul>

                    <div class="navbar-buttons mbr-section-btn"><a class="btn btn-primary display-4" href="admin/admin_login.php">
                        Admin Login</a></div>
                </div>
            </div>
        </nav>
    </section>


    <section class="form7 cid-srkCw23GFr" id="form7-13">


        <div class="mbr-overlay"></div>
        <div class="container">
            <div class="mbr-section-head">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Appointment Registration</strong></h3>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form">

                    <!--Patient Registration Form-->
                    <form name="appointment" method="POST" class="mbr-form form-with-styler mx-auto" data-form-title="Form Name" action="php/patientRegistration.php">
                        <p class="requiredError" class="mbr-text mbr-fonts-style align-center mb-4 display-7">
                            Required*</p>
                            <?php if (isset($_GET['error'])) { ?>
                                <?php if ($_GET['error'] == "Patient has already registered") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <br>
                        <div class="dragArea row">
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="firstName">
                                <label>First Name*</label>
                                <input type="text" name="firstName" data-form-field="firstname" class="form-control" value="" id="firstname-form7-13">
                            </div>
                            <?php if (isset($_GET['error'])) { ?>
                                <?php if ($_GET['error'] == "First Name is required" || $_GET['error'] == "First Name must be between length of 3-25") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="lastName">
                                <label>Last Name*</label>
                                <input type="text" name="lastName" data-form-field="lastname" class="form-control" value="" id="lastname-form7-13">
                            </div>
                            <?php if (isset($_GET['error'])) { ?>
                                <?php if ($_GET['error'] == "Last Name is required" || $_GET['error'] == "Last Name must be between length of 3-25") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label>National ID*</label>
                                <input type="text" name="nid" class="form-control" value="" id="nid-form7-13">
                            </div>
                            <?php if (isset($_GET['error'])) { ?>
                                <?php if ($_GET['error'] == "National ID or Passport Number is required" || $_GET['error'] == "National ID must be between length of 11") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="passportNumber">
                                <label>Passport Number*</label>
                                <input type="text" name="passportNumber" data-form-field="nid" class="form-control" value="" id="nid-form7-13">
                            </div>
                            <?php if (isset($_GET['error'])) { ?>
                                <?php if ($_GET['error'] == "National ID or Passport Number is required" || $_GET['error'] == "Passport Number must be between length of 11") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="dob">
                                <label>Date of Birth*</label>
                                <input type="date" name="dob" data-form-field="birthday" class="form-control" value="" id="birthday-form7-13">
                            </div>
                            <?php if (isset($_GET['error'])) { ?>
                                <?php if ($_GET['error'] == "Date of Birth is required") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label>Medical Conditions</label>
                                <select name="medicalConditions[]" class="form-control multi_select_conditions" value="" id="medical-form7-13" multiple data-selected-text-format="count > 3">
                              
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
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="allergies">
                                <label>Allergies</label>
                                <select name="allergies[]" class="form-control multi_select_allergies" value="" id="allergies-form7-13" multiple data-selected-text-format="count > 3">
                                    
                                    <option value="Penicillin">Penicillin</option>
                                    <option value="Aspirin">Aspirin</option>
                                    <option value="Erythromycin">Erythromycin</option>
                                    <option value="Latex or Rubber Products">Latex or Rubber Products</option>
                                    <option value="Codeine">Codeine</option>
                                    <option value="Tetracycline">Tetracycline</option>
                                    <option value="Germicides/Pesticides, Foods">Germicides/Pesticides, Foods</option>                                
                                </select>
                                <small>Select one or more</small>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="email">
                                <label>Email*</label>
                                <input type="email" name="email" data-form-field="email" class="form-control" value="" id="email-form7-13">
                            </div>
                            <?php if (isset($_GET['error'])) { ?>
                                <?php if ($_GET['error'] == "Phone Number or Email is required") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label>Phone Number*</label>
                                <input type="tel" name="phoneNumber"class="form-control" value="" id="phone-form7-13" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                                <small>Format: 123-123-4567</small>
                            </div>
                            <?php if (isset($_GET['error'])) { ?>
                                <?php if ($_GET['error'] == "Phone Number or Email is required") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="streetAddress">
                                <label>Street Address*</label>
                                <input type="text" name="streetAddress" data-form-field="address" class="form-control" value="" id="address-form7-13">
                            </div>
                            <?php if (isset($_GET['error'])) { ?>
                                <?php if ($_GET['error'] == "Street Address is required") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="country">
                                <label>Country*</label>
                                <select type="text" name="country" data-form-field="country" class="form-control" value="" id="country-form7-13">
                                    <option value="" disabled selected hidden>-- Select Country --</option>
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="India">India</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                            <?php if (isset($_GET['error'])) { ?>
                                <?php if ($_GET['error'] == "Country is required") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-auto mbr-section-btn align-center">
                               <!--  <input type="button"  onClick="WriteToFile(appointment)" value="Submit">-->
                                <input type="submit" class="btn btn-primary display-4" name="submit" value="Submit"/>                            
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </section>


    <section class="footer3 cid-s48P1Icc8J " once="footers " id="footer3-i ">


        <div class="container ">
            <div class="media-container-row align-center mbr-white ">
                <div class="row row-copirayt ">
                    <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7 ">
                        ?? Copyright 2021 CyberTraq. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section>
        <a href="https://mobirise.site/x "></a>
    </section>


    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/smoothscroll/smooth-scroll.js"></script>
    <script src="assets/datepicker/jquery.datetimepicker.full.js"></script>
    <script src="assets/dropdown/js/nav-dropdown.js"></script>
    <script src="assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
    <script src="assets/theme/js/script.js"></script>


</body>

</html>