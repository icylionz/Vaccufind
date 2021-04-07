<?php
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['passwrd']);
    unset($_SESSION['adminFirstName']);
    unset($_SESSION['adminLastName']);
    echo '<script>alert("You have been logged out.")</script>';
    header("Location: ../admin_login.php");
?>