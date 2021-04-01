<?php
session_start();
include "db_conn.php";

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$chkSupAdId = validate($_SESSION['admin_ID']);
$chkSupAdFName = validate($_SESSION['admin_fname']);
$chkSupAdLName= validate($_SESSION['admin_lname']);

$chkSql = "SELECT * FROM super_admin WHERE super_admin_ID='$chkSupAdId' AND super_admin_fname='$chkSupAdFName' AND super_admin_lname='$chkSupAdLName'" ;

$chkResult = mysqli_query($conn, $chkSql);

if (mysqli_num_rows($chkResult) === 1)
{
    $row = mysqli_fetch_assoc($chkResult);
    if ($row['super_admin_ID'] === $chkSupAdId && $row['super_admin_fname'] === $chkSupAdFName && $row['super_admin_lname'] === $chkSupAdLName)
    {
        if (isset($_POST['super_admin_ID']) && isset($_POST['super_admin_Pass']))
        {
            $supAdId = validate($_POST['super_admin_ID']);
            $supAdPass = validate($_POST['super_admin_Pass']);

            if (empty($supAdId))
            {
                header("Location: ../admin_console.php?error2=Super Admin ID is required");
                exit();
            }
            else if (empty($supAdPass))
            {
                header("Location: ../admin_console.php?error2=Password is required");
                exit();
            }
            else
            {
                $sql = "SELECT * FROM super_admin WHERE super_admin_ID='$supAdId' AND super_admin_password='$supAdPass'";

                $Sresult = mysqli_query($conn, $sql);

                if (mysqli_num_rows($Sresult) === 1)
                {
                    $row = mysqli_fetch_assoc($Sresult);
                    if ($row['super_admin_ID'] === $supAdId && $row['super_admin_password'] === $supAdPass)
                    {
                        $_SESSION['super_admin_ID'] = $row['super_admin_ID'];
                        $_SESSION['super_admin_fname'] = $row['super_admin_fname'];
                        $_SESSION['super_admin_lname'] = $row['super_admin_lname'];
                        header("Location: ../super_admin_console.php");
                        exit();
                    }
                    else
                    {
                        header("Location: ../admin_console.php?error2=Incorrect Super Admin ID or Password");
                        exit();
                    }
                }
                else
                {
                    header("Location: ../admin_console.php?error2=Incorrect Super Admin ID or Password");
                    exit();
                }
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