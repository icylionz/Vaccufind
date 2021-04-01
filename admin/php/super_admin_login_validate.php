<?php
include "db_conn.php";

$chkSupAdId = validate($_SESSION['admin_ID']);
$chkSupAdPass = validate($_SESSION['admin_password']);
$chkSupAdFName = validate($_SESSION['admin_fname']);
$chkSupAdLName= validate($_SESSION['admin_lname']);

$chkSql = "SELECT * FROM super_admins WHERE super_admin_ID='$chkSupAdId' AND super_admin_password='$chkSupAdPass' AND super_admin_fname='$chkSupAdFName' AND super_admin_lname='$chkSupAdLName'" ;

$chkResult = mysqli_query($conn, $chkSql);

if (mysqli_num_rows($chkResult) === 1)
{
    $row = mysqli_fetch_assoc($chkResult);
    if ($row['super_admin_ID'] === $chkSupAdId && $row['super_admin_password'] === $chkSupAdPass && $row['super_admin_fname'] === $chkSupAdFName && $row['super_admin_lname'] === $chkSupAdLName)
    {
        $sql = "SELECT * FROM super_admins WHERE super_admin_ID='$chkSupAdId' AND super_admin_password='$chkSupAdPass'";

        $Sresult = mysqli_query($conn, $sql);

        if (mysqli_num_rows($Sresult) === 1)
        {
            $row = mysqli_fetch_assoc($Sresult);
            if ($row['super_admin_ID'] === $chkSupAdId && $row['super_admin_password'] === $chkSupAdPass)
            {
                $_SESSION['super_admin_ID'] = $row['super_admin_ID'];
                $_SESSION['super_admin_password'] = $row['super_admin_password'];
                $_SESSION['super_admin_fname'] = $row['super_admin_fname'];
                $_SESSION['super_admin_lname'] = $row['super_admin_lname'];
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