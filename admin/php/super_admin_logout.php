<?php
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['superAdminFirstName']);
    unset($_SESSION['superAdminLastName']);
    include "admin_logout.php";
?>