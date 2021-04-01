<?php
    session_start();
    unset($_SESSION['admin_ID']);
    unset($_SESSION['admin_fname']);
    unset($_SESSION['admin_lname']);
    echo '<script>alert("You have been logged out.")</script>';
    $_SESSION['message'] = "You have been logged out.";
    session_destroy();
    header("Location: ../admin_login.php");
?>