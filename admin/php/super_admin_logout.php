<?php
    session_start();
    unset($_SESSION['super_admin_ID']);
    unset($_SESSION['super_admin_fname']);
    unset($_SESSION['super_admin_lname']);
    include "admin_logout.php";
?>