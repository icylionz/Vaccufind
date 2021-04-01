<?php
include "db_conn.php";

$chkSupAdId = validate($_SESSION['username']);
$chkSupAdPass = validate($_SESSION['passwrd']);
$chkSupAdFName = validate($_SESSION['adminFirstName']);
$chkSupAdLName= validate($_SESSION['adminLastName']);

$chkSql = "SELECT * FROM superAdminLogin WHERE username='$chkSupAdId' AND passwrd='$chkSupAdPass' AND superAdminFirstName='$chkSupAdFName' AND superAdminLastName='$chkSupAdLName'" ;

$chkResult = mysqli_query($conn, $chkSql);

if (mysqli_num_rows($chkResult) === 1)
{
    $row = mysqli_fetch_assoc($chkResult);
    if ($row['username'] === $chkSupAdId && $row['passwrd'] === $chkSupAdPass && $row['superAdminFirstName'] === $chkSupAdFName && $row['superAdminLastName'] === $chkSupAdLName)
    {
        $sql = "SELECT * FROM super_admins WHERE username='$chkSupAdId' AND passwrd='$chkSupAdPass'";

        $Sresult = mysqli_query($conn, $sql);

        if (mysqli_num_rows($Sresult) === 1)
        {
            $row = mysqli_fetch_assoc($Sresult);
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