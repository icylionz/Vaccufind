<?php
    session_start();
    unset($_SESSION['super_admin_ID']);
    unset($_SESSION['super_admin_fname']);
    unset($_SESSION['super_admin_lname']);
    echo '<script>alert("You have been logged out.")</script>';
    $_SESSION['message'] = "You have been logged out.";
    header("Location: ../admin_console.php");
?>