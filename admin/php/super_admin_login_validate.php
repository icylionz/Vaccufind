<?php
include "../php/connect.php";

$chkSupAdId = validate($_SESSION['username']);
$chkSupAdPass = validate($_SESSION['passwrd']);

<<<<<<< HEAD
$chkSql = "SELECT * FROM superAdminLogin WHERE username='$chkSupAdId' AND passwrd='$chkSupAdPass'";
=======

$chkSql = "SELECT * FROM superAdminLogin WHERE username='$chkSupAdId' AND passwrd='$chkSupAdPass'" ;
>>>>>>> 3b4935e6ba229bf235800da224119fefd57657e4

$chkResult = $conn->query($chkSql);

if ($chkResult->num_rows === 1)
{
    $row = $chkResult->fetch_assoc();
    if ($row['username'] === $chkSupAdId && $row['passwrd'] === $chkSupAdPass)
    {
        $sql = "SELECT * FROM superAdminLogin WHERE username='$chkSupAdId' AND passwrd='$chkSupAdPass'";

        $Sresult = $conn->query($sql);

        if ($Sresult->num_rows === 1)
        {
            $row = $Sresult->fetch_assoc();
            if ($row['username'] === $chkSupAdId && $row['passwrd'] === $chkSupAdPass)
            {
                $_SESSION['username'] = $row['username'];
                $_SESSION['passwrd'] = $row['passwrd'];
                $_SESSION['superAdminFirstName'] = $row['superAdminFirstName'];
                $_SESSION['superAdminLastName'] = $row['superAdminLastName'];
                header("Location: ../super_admin_console.php");
                exit();
            }
            else
            {
                header("Location: ../admin_console.php");
                exit();
            }
        }
        else
        {
            header("Location: ../admin_console.php");
            exit();
        }
    }
}
else
{
    header("Location: ../admin_console.php");
    exit();
}