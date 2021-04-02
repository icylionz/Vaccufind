<?php
include "connect.php";

session_start();

if (isset($_POST['username']) && isset($_POST['passwrd']))
{
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $adid = validate($_POST['username']);
    $adpass = validate($_POST['passwrd']);

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

        $result = $conn->query($sql);

        if ($result->num_rows === 1)
        {
            $row = $result->fetch_assoc();
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