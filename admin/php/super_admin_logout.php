<?php
    unset($_SESSION['username']);
    unset($_SESSION['passwrd']);
    unset($_SESSION['superAdminFirstName']);
    unset($_SESSION['superAdminLastName']);
    include "admin_logout.php";
?>