<?php
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['adminFirstName']);
    unset($_SESSION['adminLastName']);
    echo '<script>alert("You have been logged out.")</script>';
    $_SESSION['message'] = "You have been logged out.";
    session_destroy();
    header("Location: ../admin_login.php");
?>