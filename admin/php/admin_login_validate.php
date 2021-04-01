<?php
session_start();
include "";

if (isset($_POST['username']) && isset($_POST['adminpass']))
{
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $adid = validate($_POST['username']);
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
        $sql = "SELECT * FROM adminLogin WHERE username='$adid' AND passwrd='$adpass'";

        $result = mysqli_query($conn, $sql);

        $rows=mysqli_num_rows($result);
        if (mysqli_num_rows($result) === 1)
        {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $adid && $row['passwrd'] === $adpass)
            {
                $_SESSION['username'] = $row['username'];
                $_SESSION['passwrd'] = $row['passwrd'];
                $_SESSION['adminFirstName'] = $row['adminFirstName'];
                $_SESSION['adminLastName'] = $row['adminLastName'];
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