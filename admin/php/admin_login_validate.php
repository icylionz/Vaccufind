<?php
session_start();
include "db_conn.php";

if (isset($_POST['adminId']) && isset($_POST['adminpass']))
{
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $adid = validate($_POST['adminId']);
    $adpass = validate($_POST['adminpass']);

    if (empty($adid))
    {
        header("Location: ../admin_login.php?error=Admin ID is required");
        exit();
    }
    else if (empty($adpass))
    {
        header("Location: ../admin_login.php?error=Password is required");
        exit();
    }
    else
    {
        $sql = "SELECT * FROM admins WHERE admin_ID='$adid' AND admin_password='$adpass'";

        $result = mysqli_query($conn, $sql);

        $rows=mysqli_num_rows($result);
        if (mysqli_num_rows($result) === 1)
        {
            $row = mysqli_fetch_assoc($result);
            if ($row['admin_ID'] === $adid && $row['admin_password'] === $adpass)
            {
                $_SESSION['admin_ID'] = $row['admin_ID'];
                $_SESSION['admin_password'] = $row['admin_password'];
                $_SESSION['admin_fname'] = $row['admin_fname'];
                $_SESSION['admin_lname'] = $row['admin_lname'];
                include "super_admin_login_validate.php";
                exit();
            }
            else
            {
                header("Location: ../admin_login.php?error=Incorrect Admin ID or Password");
                exit();
            }
        }
        else
        {
            header("Location: ../admin_login.php?error=Incorrect Admin ID or Password");
            exit();
        }
    }
}
else
{
    header("Location: ../admin_login.php");
    exit();
}