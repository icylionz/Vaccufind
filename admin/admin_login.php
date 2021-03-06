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


    <title>Admin Login</title>
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

<body>


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
                    <ul class="navbar-nav nav-dropdown">
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="../index.html#form4-14">
                            Home</a></li>
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="../index.html#content13-w">
                            Vaccines</a></li>
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="../index.html#contacts1-u">
                            Contacts</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>


    <section class="form7 cid-srkFJnF1sC" id="form7-18">


        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 mx-auto mbr-form">
                    <form action="php/admin_login_validate.php" method="POST" class="mbr-form form-with-styler mx-auto">
                        <div class="dragArea row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h1 style="text-align: center;" class="mbr-section-title mb-4 display-2">
                                    <strong>Admin Login</strong>
                                </h1>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label>Admin Username</label>
                                <input type="text" name="username" class="form-control" value="" id="username-form7-18">
                            </div>
                            <?php if (isset($_GET['error'])) { ?>
                                <?php if ($_GET['error'] == "Admin ID is required" || $_GET['error'] == "Incorrect Admin ID or Password") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label>Password</label>
                                <input type="password" name="passwrd" class="form-control" value="" id="passwrd-form7-18">
                            </div>
                            <?php if (isset($_GET['error'])) { ?>
                                <?php if ($_GET['error'] == "Password is required" || $_GET['error'] == "Incorrect Admin ID or Password") { ?>
                                    <p style="color:lightcoral"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <div class="col-auto mbr-section-btn align-center">
                                <button type="submit" class="btn btn-primary display-4">Login</button>
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